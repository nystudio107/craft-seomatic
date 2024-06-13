<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\helpers;

use Craft;
use craft\base\Element;
use craft\errors\SiteNotFoundException;
use craft\helpers\DateTimeHelper;
use craft\web\twig\variables\Paginate;
use DateTime;
use nystudio107\seomatic\events\AddDynamicMetaEvent;
use nystudio107\seomatic\fields\SeoSettings;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\Localization as LocalizationHelper;
use nystudio107\seomatic\helpers\Text as TextHelper;
use nystudio107\seomatic\models\Entity;
use nystudio107\seomatic\models\jsonld\BreadcrumbList;
use nystudio107\seomatic\models\jsonld\ContactPoint;
use nystudio107\seomatic\models\jsonld\LocalBusiness;
use nystudio107\seomatic\models\jsonld\OpeningHoursSpecification;
use nystudio107\seomatic\models\jsonld\Organization;
use nystudio107\seomatic\models\jsonld\Thing;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\models\MetaLink;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\Helper as SeomaticHelper;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Throwable;
use yii\base\Event;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use function count;
use function in_array;
use function is_array;
use function is_string;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class DynamicMeta
{
    // Constants
    // =========================================================================

    /**
     * @event AddDynamicMetaEvent The event that is triggered when SEOmatic has
     *        included the standard meta containers, and gives your plugin/module
     *        the chance to add whatever custom dynamic meta items you like
     *
     * ---
     * ```php
     * use nystudio107\seomatic\events\AddDynamicMetaEvent;
     * use nystudio107\seomatic\helpers\DynamicMeta;
     * use yii\base\Event;
     * Event::on(DynamicMeta::class, DynamicMeta::EVENT_ADD_DYNAMIC_META, function(AddDynamicMetaEvent $e) {
     *     // Add whatever dynamic meta items to the containers as you like
     * });
     * ```
     */
    public const EVENT_ADD_DYNAMIC_META = 'addDynamicMeta';

    // Static Methods
    // =========================================================================

    /**
     * Paginate based on the passed in Paginate variable as returned from the
     * Twig {% paginate %} tag:
     * https://docs.craftcms.com/v3/templating/tags/paginate.html#the-pageInfo-variable
     *
     * @param ?Paginate $pageInfo
     */
    public static function paginate(?Paginate $pageInfo)
    {
        if ($pageInfo !== null && $pageInfo->currentPage !== null) {
            // Let the meta containers know that this page is paginated
            Seomatic::$plugin->metaContainers->paginationPage = (string)$pageInfo->currentPage;
            // See if we should strip the query params
            $stripQueryParams = true;
            $pageTrigger = Craft::$app->getConfig()->getGeneral()->pageTrigger;
            // Is this query string-based pagination?
            if ($pageTrigger[0] === '?') {
                $stripQueryParams = false;
            }
            // Set the canonical URL to be the paginated URL
            // see: https://github.com/nystudio107/craft-seomatic/issues/375#issuecomment-488369209
            $url = $pageInfo->getPageUrl($pageInfo->currentPage);
            if ($stripQueryParams) {
                $url = preg_replace('/\?.*/', '', $url);
            }
            if (!empty($url)) {
                $url = UrlHelper::absoluteUrlWithProtocol($url);
                Seomatic::$seomaticVariable->meta->canonicalUrl = $url;
                $canonical = Seomatic::$seomaticVariable->link->get('canonical');
                if ($canonical !== null) {
                    $canonical->href = $url;
                }
            }
            // Set the previous URL
            $url = $pageInfo->getPrevUrl();
            if ($stripQueryParams) {
                $url = preg_replace('/\?.*/', '', $url);
            }
            if (!empty($url)) {
                $url = UrlHelper::absoluteUrlWithProtocol($url);
                $metaTag = Seomatic::$plugin->link->create([
                    'rel' => 'prev',
                    'href' => $url,
                ]);
            }
            // Set the next URL
            $url = $pageInfo->getNextUrl();
            if ($stripQueryParams) {
                $url = preg_replace('/\?.*/', '', $url);
            }
            if (!empty($url)) {
                $url = UrlHelper::absoluteUrlWithProtocol($url);
                $metaTag = Seomatic::$plugin->link->create([
                    'rel' => 'next',
                    'href' => $url,
                ]);
            }
            // If this page is paginated, we need to factor that into the cache key
            // We also need to re-add the hreflangs
            if (Seomatic::$plugin->metaContainers->paginationPage !== '1') {
                if (Seomatic::$settings->addHrefLang && Seomatic::$settings->addPaginatedHreflang) {
                    self::addMetaLinkHrefLang();
                }
            }
        }
    }

    /**
     * Include any headers for this request
     */
    public static function includeHttpHeaders()
    {
        self::addCspHeaders();
        // Don't include headers for any response code >= 400
        $request = Craft::$app->getRequest();
        if (!$request->isConsoleRequest) {
            $response = Craft::$app->getResponse();
            if ($response->statusCode >= 400 || SeomaticHelper::isPreview()) {
                return;
            }
        }
        // Assuming they have headersEnabled, add the response code to the headers
        if (Seomatic::$settings->headersEnabled) {
            $response = Craft::$app->getResponse();
            // X-Robots-Tag header
            $robots = Seomatic::$seomaticVariable->tag->get('robots');
            if ($robots !== null && $robots->include) {
                $robotsArray = $robots->renderAttributes();
                $content = $robotsArray['content'] ?? '';
                if (!empty($content)) {
                    // The content property can be a string or an array
                    if (is_array($content)) {
                        $headerValue = '';
                        foreach ($content as $contentVal) {
                            $headerValue .= ($contentVal . ',');
                        }
                        $headerValue = rtrim($headerValue, ',');
                    } else {
                        $headerValue = $content;
                    }
                    $response->headers->set('X-Robots-Tag', $headerValue);
                }
            }
            // Link canonical header
            $canonical = Seomatic::$seomaticVariable->link->get('canonical');
            if ($canonical !== null && $canonical->include) {
                $canonicalArray = $canonical->renderAttributes();
                $href = $canonicalArray['href'] ?? '';
                if (!empty($href)) {
                    // The href property can be a string or an array
                    if (is_array($href)) {
                        $headerValue = '';
                        foreach ($href as $hrefVal) {
                            $headerValue .= ('<' . $hrefVal . '>' . ',');
                        }
                        $headerValue = rtrim($headerValue, ',');
                    } else {
                        $headerValue = '<' . $href . '>';
                    }
                    $headerValue .= "; rel='canonical'";
                    $response->headers->add('Link', $headerValue);
                }
            }
            // Referrer-Policy header
            $referrer = Seomatic::$seomaticVariable->tag->get('referrer');
            if ($referrer !== null && $referrer->include) {
                $referrerArray = $referrer->renderAttributes();
                $content = $referrerArray['content'] ?? '';
                if (!empty($content)) {
                    // The content property can be a string or an array
                    if (is_array($content)) {
                        $headerValue = '';
                        foreach ($content as $contentVal) {
                            $headerValue .= ($contentVal . ',');
                        }
                        $headerValue = rtrim($headerValue, ',');
                    } else {
                        $headerValue = $content;
                    }
                    $response->headers->add('Referrer-Policy', $headerValue);
                }
            }
            // The X-Powered-By tag
            if (Seomatic::$settings->generatorEnabled) {
                $response->headers->add('X-Powered-By', 'SEOmatic');
            }
        }
    }

    /**
     * Add the Content-Security-Policy script-src headers
     */
    public static function addCspHeaders()
    {
        $cspNonces = self::getCspNonces();
        $container = Seomatic::$plugin->script->container();
        if ($container !== null) {
            $container->addNonceHeaders($cspNonces);
        }
    }

    /**
     * Get all of the CSP Nonces from containers that can have them
     *
     * @return array
     */
    public static function getCspNonces(): array
    {
        $cspNonces = [];
        // Add in any fixed policies from Settings
        if (!empty(Seomatic::$settings->cspScriptSrcPolicies)) {
            $fixedCsps = Seomatic::$settings->cspScriptSrcPolicies;
            $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($fixedCsps));
            foreach ($iterator as $value) {
                $cspNonces[] = $value;
            }
        }
        // Add in any CSP nonce headers
        $container = Seomatic::$plugin->jsonLd->container();
        if ($container !== null) {
            $cspNonces = array_merge($cspNonces, $container->getCspNonces());
        }
        $container = Seomatic::$plugin->script->container();
        if ($container !== null) {
            $cspNonces = array_merge($cspNonces, $container->getCspNonces());
        }

        return $cspNonces;
    }

    /**
     * Add the Content-Security-Policy script-src tags
     */
    public static function addCspTags()
    {
        $cspNonces = self::getCspNonces();
        $container = Seomatic::$plugin->script->container();
        if ($container !== null) {
            $container->addNonceTags($cspNonces);
        }
    }

    /**
     * Add any custom/dynamic meta to the containers
     *
     * @param string|null $uri The URI of the route to add dynamic metadata for
     * @param int|null $siteId The siteId of the current site
     */
    public static function addDynamicMetaToContainers(string $uri = null, int $siteId = null)
    {
        Craft::beginProfile('DynamicMeta::addDynamicMetaToContainers', __METHOD__);
        $request = Craft::$app->getRequest();
        // Don't add dynamic meta to console requests, they have no concept of a URI or segments
        if (!$request->getIsConsoleRequest()) {
            $response = Craft::$app->getResponse();
            if ($response->statusCode < 400) {
                self::addMetaJsonLdBreadCrumbs($siteId);
                if (Seomatic::$settings->addHrefLang) {
                    self::addMetaLinkHrefLang($uri, $siteId);
                }
                self::addSameAsMeta();
                $metaSiteVars = Seomatic::$plugin->metaContainers->metaSiteVars;
                $jsonLd = Seomatic::$plugin->jsonLd->get('identity');
                if ($jsonLd !== null) {
                    self::addOpeningHours($jsonLd, $metaSiteVars->identity);
                    self::addContactPoints($jsonLd, $metaSiteVars->identity);
                }
                $jsonLd = Seomatic::$plugin->jsonLd->get('creator');
                if ($jsonLd !== null) {
                    self::addOpeningHours($jsonLd, $metaSiteVars->creator);
                    self::addContactPoints($jsonLd, $metaSiteVars->creator);
                }
                // Allow modules/plugins a chance to add dynamic meta
                $event = new AddDynamicMetaEvent([
                    'uri' => $uri,
                    'siteId' => $siteId,
                ]);
                Event::trigger(static::class, self::EVENT_ADD_DYNAMIC_META, $event);
            }
        }
        Craft::endProfile('DynamicMeta::addDynamicMetaToContainers', __METHOD__);
    }

    /**
     * Add breadcrumbs to the MetaJsonLdContainer
     *
     * @param int|null $siteId
     */
    public static function addMetaJsonLdBreadCrumbs(int $siteId = null)
    {
        Craft::beginProfile('DynamicMeta::addMetaJsonLdBreadCrumbs', __METHOD__);
        $position = 0;
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id
                ?? Craft::$app->getSites()->primarySite->id
                ?? 1;
        }
        $site = Craft::$app->getSites()->getSiteById($siteId);
        if ($site === null) {
            return;
        }
        $siteUrl = '/';
        try {
            $siteUrl = SiteHelper::siteEnabledWithUrls($siteId) ? $site->baseUrl : Craft::$app->getSites()->getPrimarySite()->baseUrl;
        } catch (SiteNotFoundException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        if (!empty(Seomatic::$settings->siteUrlOverride)) {
            try {
                $siteUrl = UrlHelper::getSiteUrlOverrideSetting($siteId);
            } catch (Throwable $e) {
                // That's okay
            }
        }
        /** @var BreadcrumbList $crumbs */
        $crumbs = Seomatic::$plugin->jsonLd->create([
            'type' => 'BreadcrumbList',
            'name' => 'Breadcrumbs',
            'description' => 'Breadcrumbs list',
        ], false);
        // Include the Homepage in the breadcrumbs, if includeHomepageInBreadcrumbs is true
        $element = null;
        if (Seomatic::$settings->includeHomepageInBreadcrumbs) {
            /** @var Element $element */
            $position++;
            $element = Craft::$app->getElements()->getElementByUri('__home__', $siteId, true);
            if ($element) {
                $uri = $element->uri === '__home__' ? '' : ($element->uri ?? '');
                try {
                    $id = UrlHelper::siteUrl($uri, null, null, $siteId);
                } catch (Exception $e) {
                    $id = $siteUrl;
                    Craft::error($e->getMessage(), __METHOD__);
                }
                $item = UrlHelper::stripQueryString($id);
                $item = UrlHelper::absoluteUrlWithProtocol($item);
                $listItem = MetaJsonLd::create('ListItem', [
                    'position' => $position,
                    'name' => $element->title,
                    'item' => $item,
                    '@id' => $id,
                ]);
                $crumbs->itemListElement[] = $listItem;
            } else {
                $item = UrlHelper::stripQueryString($siteUrl ?? '/');
                $item = UrlHelper::absoluteUrlWithProtocol($item);
                $crumbs->itemListElement[] = MetaJsonLd::create('ListItem', [
                    'position' => $position,
                    'name' => 'Homepage',
                    'item' => $item,
                    '@id' => $siteUrl,
                ]);
            }
        }
        // Build up the segments, and look for elements that match
        $uri = '';
        $segments = Craft::$app->getRequest()->getSegments();
        /** @var Element|null $lastElement */
        $lastElement = Seomatic::$matchedElement;
        if ($lastElement && $element) {
            if ($lastElement->uri !== '__home__' && $element->uri) {
                $path = $lastElement->uri;
                $segments = array_values(array_filter(explode('/', $path), function($segment) {
                    return $segment !== '';
                }));
            }
        }
        // Parse through the segments looking for elements that match
        foreach ($segments as $segment) {
            $uri .= $segment;
            /** @var Element|null $element */
            $element = Craft::$app->getElements()->getElementByUri($uri, $siteId, true);
            if ($element && $element->uri) {
                $position++;
                $uri = $element->uri === '__home__' ? '' : $element->uri;
                try {
                    $id = UrlHelper::siteUrl($uri, null, null, $siteId);
                } catch (Exception $e) {
                    $id = $siteUrl;
                    Craft::error($e->getMessage(), __METHOD__);
                }
                $item = UrlHelper::stripQueryString($id);
                $item = UrlHelper::absoluteUrlWithProtocol($item);
                $crumbs->itemListElement[] = MetaJsonLd::create('ListItem', [
                    'position' => $position,
                    'name' => $element->title,
                    'item' => $item,
                    '@id' => $id,
                ]);
            }
            $uri .= '/';
        }
        if (!empty($crumbs->itemListElement)) {
            Seomatic::$plugin->jsonLd->add($crumbs);
        }
        Craft::endProfile('DynamicMeta::addMetaJsonLdBreadCrumbs', __METHOD__);
    }

    /**
     * Add meta hreflang tags if there is more than one site
     *
     * @param string|null $uri
     * @param int|null $siteId
     */
    public static function addMetaLinkHrefLang(string $uri = null, int $siteId = null)
    {
        Craft::beginProfile('DynamicMeta::addMetaLinkHrefLang', __METHOD__);
        $siteLocalizedUrls = self::getLocalizedUrls($uri, $siteId);
        $currentPaginationUrl = null;
        if (Seomatic::$plugin->metaContainers->paginationPage !== '1') {
            $currentPaginationUrl = Seomatic::$seomaticVariable->meta->canonicalUrl ?? null;
        }
        if (!empty($siteLocalizedUrls)) {
            // Add the rel=alternate tag
            /** @var MetaLink $metaTag */
            $metaTag = Seomatic::$plugin->link->create([
                'rel' => 'alternate',
                'hreflang' => [],
                'href' => [],
            ]);
            // Add the alternate language link rel's
            if (count($siteLocalizedUrls) > 1) {
                foreach ($siteLocalizedUrls as $siteLocalizedUrl) {
                    $url = $siteLocalizedUrl['url'];
                    if ($siteLocalizedUrl['current']) {
                        $url = $currentPaginationUrl ?? $siteLocalizedUrl['url'];
                    }
                    $metaTag->hreflang[] = $siteLocalizedUrl['hreflangLanguage'];
                    $metaTag->href[] = $url;
                    // Add the x-default hreflang
                    if ($siteLocalizedUrl['primary'] && Seomatic::$settings->addXDefaultHrefLang) {
                        $metaTag->hreflang[] = 'x-default';
                        $metaTag->href[] = $siteLocalizedUrl['url'];
                    }
                }
                Seomatic::$plugin->link->add($metaTag);
            }
            // Add in the og:locale:alternate tags
            $ogLocaleAlternate = Seomatic::$plugin->tag->get('og:locale:alternate');
            if (count($siteLocalizedUrls) > 1 && $ogLocaleAlternate) {
                $ogContentArray = [];
                foreach ($siteLocalizedUrls as $siteLocalizedUrl) {
                    if (!in_array($siteLocalizedUrl['ogLanguage'], $ogContentArray, true) &&
                        Craft::$app->language !== $siteLocalizedUrl['language']) {
                        $ogContentArray[] = $siteLocalizedUrl['ogLanguage'];
                    }
                }
                $ogLocaleAlternate->content = $ogContentArray;
            }
        }
        Craft::endProfile('DynamicMeta::addMetaLinkHrefLang', __METHOD__);
    }

    /**
     * Return a list of localized URLs that are in the current site's group
     * The current URI is used if $uri is null. Similarly, the current site is
     * used if $siteId is null.
     * The resulting array of arrays has `id`, `language`, `ogLanguage`,
     * `hreflangLanguage`, and `url` as keys.
     *
     * @param string|null $uri
     * @param int|null $siteId
     *
     * @return array
     */
    public static function getLocalizedUrls(string $uri = null, int $siteId = null): array
    {
        Craft::beginProfile('DynamicMeta::getLocalizedUrls', __METHOD__);
        $localizedUrls = [];
        // No pagination params for URLs
        $urlParams = null;
        // Get the request URI
        if ($uri === null) {
            $requestUri = Craft::$app->getRequest()->pathInfo;
        } else {
            $requestUri = $uri;
        }
        // Get the site to use
        if ($siteId === null) {
            try {
                $thisSite = Craft::$app->getSites()->getCurrentSite();
            } catch (SiteNotFoundException $e) {
                $thisSite = null;
                Craft::error($e->getMessage(), __METHOD__);
            }
        } else {
            $thisSite = Craft::$app->getSites()->getSiteById($siteId);
        }
        // Bail if we can't get a site
        if ($thisSite === null) {
            return $localizedUrls;
        }
        if (Seomatic::$settings->siteGroupsSeparate) {
            // Get only the sites that are in the current site's group
            try {
                $siteGroup = $thisSite->getGroup();
            } catch (InvalidConfigException $e) {
                $siteGroup = null;
                Craft::error($e->getMessage(), __METHOD__);
            }
            // Bail if we can't get a site group
            if ($siteGroup === null) {
                return $localizedUrls;
            }
            $sites = $siteGroup->getSites();
        } else {
            $sites = Craft::$app->getSites()->getAllSites();
        }
        $elements = Craft::$app->getElements();
        foreach ($sites as $site) {
            $includeUrl = true;
            $matchedElement = $elements->getElementByUri($requestUri, $thisSite->id, true);
            if ($matchedElement) {
                $url = $elements->getElementUriForSite($matchedElement->getId(), $site->id);
                // See if they have disabled sitemaps or robots for this entry,
                // and if so, don't include it in the hreflang
                $element = null;
                if ($url) {
                    /** @var Element $element */
                    $element = $elements->getElementByUri($url, $site->id, false);
                }
                if ($element !== null) {
                    /** @var MetaBundle $metaBundle */
                    list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId, $typeId)
                        = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);
                    $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                        $sourceBundleType,
                        $sourceId,
                        $sourceSiteId
                    );
                    if ($metaBundle !== null) {
                        // If robots contains 'none' or 'noindex' don't include the URL
                        $robotsArray = explode(',', $metaBundle->metaGlobalVars->robots);
                        if (in_array('noindex', $robotsArray, true) || in_array('none', $robotsArray, true)) {
                            $includeUrl = false;
                        }
                    }
                    $fieldHandles = FieldHelper::fieldsOfTypeFromElement(
                        $element,
                        FieldHelper::SEO_SETTINGS_CLASS_KEY,
                        true
                    );
                    foreach ($fieldHandles as $fieldHandle) {
                        if (!empty($element->$fieldHandle)) {
                            /** @var MetaBundle $fieldMetaBundle */
                            $fieldMetaBundle = $element->$fieldHandle;
                            /** @var SeoSettings $seoSettingsField */
                            $seoSettingsField = Craft::$app->getFields()->getFieldByHandle($fieldHandle);
                            if ($seoSettingsField !== null) {
                                // If robots is set to 'none' don't include the URL
                                if ($seoSettingsField->generalTabEnabled
                                    && in_array('robots', $seoSettingsField->generalEnabledFields, false)
                                    && !Seomatic::$plugin->helper->isInherited($fieldMetaBundle->metaGlobalVars, 'robots')
                                ) {
                                    // If robots contains 'none' or 'noindex' don't include the URL
                                    $robotsArray = explode(',', $fieldMetaBundle->metaGlobalVars->robots);
                                    if (in_array('noindex', $robotsArray, true) || in_array('none', $robotsArray, true)) {
                                        $includeUrl = false;
                                    } else {
                                        // Otherwise, include the URL
                                        $includeUrl = true;
                                    }
                                }
                            }
                        }
                    }
                    // Never include the URL if the element isn't enabled for the site
                    if (isset($element->enabledForSite) && !(bool)$element->enabledForSite) {
                        $includeUrl = false;
                    }
                } else {
                    $includeUrl = false;
                }
                $url = ($url === '__home__') ? '' : $url;
            } else {
                try {
                    $url = SiteHelper::siteEnabledWithUrls($site->id) ? UrlHelper::siteUrl($requestUri, $urlParams, null, $site->id)
                        : Craft::$app->getSites()->getPrimarySite()->baseUrl;
                } catch (SiteNotFoundException $e) {
                    $url = '';
                    Craft::error($e->getMessage(), __METHOD__);
                } catch (Exception $e) {
                    $url = '';
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            $url = $url ?? '';
            if (!UrlHelper::isAbsoluteUrl($url)) {
                try {
                    $url = UrlHelper::siteUrl($url, $urlParams, null, $site->id);
                } catch (Exception $e) {
                    $url = '';
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            // Strip any query string params, and make sure we have an absolute URL with protocol
            if ($urlParams === null) {
                $url = UrlHelper::stripQueryString($url);
            }
            $url = UrlHelper::absoluteUrlWithProtocol($url);

            $url = self::sanitizeUrl($url);
            $language = $site->language;
            $ogLanguage = LocalizationHelper::normalizeOgLocaleLanguage($language);
            $hreflangLanguage = $language;
            $hreflangLanguage = strtolower($hreflangLanguage);
            $hreflangLanguage = str_replace('_', '-', $hreflangLanguage);
            $primary = Seomatic::$settings->xDefaultSite == 0 ? $site->primary : Seomatic::$settings->xDefaultSite == $site->id;
            if ($includeUrl) {
                $localizedUrls[] = [
                    'id' => $site->id,
                    'language' => $language,
                    'ogLanguage' => $ogLanguage,
                    'hreflangLanguage' => $hreflangLanguage,
                    'url' => $url,
                    'primary' => $primary,
                    'current' => $thisSite->id === $site->id,
                ];
            }
        }
        Craft::endProfile('DynamicMeta::getLocalizedUrls', __METHOD__);

        return $localizedUrls;
    }

    /**
     * Return a sanitized URL with the query string stripped
     *
     * @param string $url
     * @param bool $checkStatus
     *
     * @return string
     */
    public static function sanitizeUrl(string $url, bool $checkStatus = true, bool $stripQueryString = true): string
    {
        // Remove the query string
        if ($stripQueryString) {
            $url = UrlHelper::stripQueryString($url);
        }
        $url = UrlHelper::encodeUrlQueryParams(TextHelper::sanitizeUserInput($url));

        // If this is a >= 400 status code, set the canonical URL to nothing
        if ($checkStatus && !Craft::$app->getRequest()->getIsConsoleRequest() && Craft::$app->getResponse()->statusCode >= 400) {
            $url = '';
        }

        return $url;
    }

    /**
     * Add the Same As meta tags and JSON-LD
     */
    public static function addSameAsMeta()
    {
        Craft::beginProfile('DynamicMeta::addSameAsMeta', __METHOD__);
        $metaContainers = Seomatic::$plugin->metaContainers;
        $sameAsUrls = [];
        if (!empty($metaContainers->metaSiteVars->sameAsLinks)) {
            $sameAsUrls = ArrayHelper::getColumn($metaContainers->metaSiteVars->sameAsLinks, 'url', false);
            $sameAsUrls = array_values(array_filter($sameAsUrls));
        }
        // Facebook OpenGraph
        $ogSeeAlso = Seomatic::$plugin->tag->get('og:see_also');
        if ($ogSeeAlso) {
            $ogSeeAlso->content = $sameAsUrls;
        }
        // Site Identity JSON-LD
        $identity = Seomatic::$plugin->jsonLd->get('identity');
        /** @var Thing|null $identity */
        if ($identity !== null && property_exists($identity, 'sameAs')) {
            $identity->sameAs = $sameAsUrls;
        }
        Craft::endProfile('DynamicMeta::addSameAsMeta', __METHOD__);
    }

    /**
     * Add the OpeningHoursSpecific to the $jsonLd based on the Entity settings
     *
     * @param MetaJsonLd $jsonLd
     * @param ?Entity $entity
     */
    public static function addOpeningHours(MetaJsonLd $jsonLd, ?Entity $entity)
    {
        Craft::beginProfile('DynamicMeta::addOpeningHours', __METHOD__);
        if ($jsonLd instanceof LocalBusiness && $entity !== null) {
            /** @var LocalBusiness $jsonLd */
            $openingHours = [];
            $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            $times = $entity->localBusinessOpeningHours;
            $index = 0;
            foreach ($times as $hours) {
                $openTime = '';
                $closeTime = '';
                if (!empty($hours['open'])) {
                    /** @var DateTime $dateTime */
                    try {
                        $dateTime = DateTimeHelper::toDateTime($hours['open']['date'], false, false);
                    } catch (\Exception $e) {
                        $dateTime = false;
                    }
                    if ($dateTime !== false) {
                        $openTime = $dateTime->format('H:i:s');
                    }
                }
                if (!empty($hours['close'])) {
                    /** @var DateTime $dateTime */
                    try {
                        $dateTime = DateTimeHelper::toDateTime($hours['close']['date'], false, false);
                    } catch (\Exception $e) {
                        $dateTime = false;
                    }
                    if ($dateTime !== false) {
                        $closeTime = $dateTime->format('H:i:s');
                    }
                }
                if ($openTime && $closeTime) {
                    /** @var OpeningHoursSpecification $hours */
                    $hours = Seomatic::$plugin->jsonLd->create([
                        'type' => 'OpeningHoursSpecification',
                        'opens' => $openTime,
                        'closes' => $closeTime,
                        'dayOfWeek' => [$days[$index]],
                    ], false);
                    $openingHours[] = $hours;
                }
                $index++;
            }
            $jsonLd->openingHoursSpecification = $openingHours;
        }
        Craft::endProfile('DynamicMeta::addOpeningHours', __METHOD__);
    }

    /**
     * Add the ContactPoint to the $jsonLd based on the Entity settings
     *
     * @param MetaJsonLd $jsonLd
     * @param Entity|null $entity
     */
    public static function addContactPoints(MetaJsonLd $jsonLd, ?Entity $entity)
    {
        Craft::beginProfile('DynamicMeta::addContactPoints', __METHOD__);
        if ($jsonLd instanceof Organization && $entity !== null) {
            /** @var Organization $jsonLd */
            $contactPoints = [];
            if (is_array($entity->organizationContactPoints)) {
                foreach ($entity->organizationContactPoints as $contacts) {
                    /** @var ContactPoint $contact */
                    $contact = Seomatic::$plugin->jsonLd->create([
                        'type' => 'ContactPoint',
                        'telephone' => $contacts['telephone'],
                        'contactType' => $contacts['contactType'],
                    ], false);
                    $contactPoints[] = $contact;
                }
            }
            $jsonLd->contactPoint = $contactPoints;
        }
        Craft::endProfile('DynamicMeta::addContactPoints', __METHOD__);
    }

    /**
     * Normalize the array of opening hours passed in
     *
     * @param $value
     */
    public static function normalizeTimes(&$value)
    {
        if (is_string($value)) {
            $value = Json::decode($value);
        }
        $normalized = [];
        $times = ['open', 'close'];
        for ($day = 0; $day <= 6; $day++) {
            foreach ($times as $time) {
                if (isset($value[$day][$time])
                    && ($date = DateTimeHelper::toDateTime($value[$day][$time])) !== false
                ) {
                    $normalized[$day][$time] = (array)($date);
                } else {
                    $normalized[$day][$time] = null;
                }
            }
        }

        $value = $normalized;
    }
}
