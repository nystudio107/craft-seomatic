<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\helpers;

use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\Entity;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\models\jsonld\ContactPoint;
use nystudio107\seomatic\models\jsonld\LocalBusiness;
use nystudio107\seomatic\models\jsonld\Organization;
use nystudio107\seomatic\models\jsonld\BreadcrumbList;
use nystudio107\seomatic\models\jsonld\Thing;
use nystudio107\seomatic\models\MetaJsonLd;


use Craft;
use craft\base\Element;
use craft\errors\SiteNotFoundException;
use craft\helpers\DateTimeHelper;
use craft\web\twig\variables\Paginate;

use yii\base\Exception;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class DynamicMeta
{
    // Constants
    // =========================================================================

    // Static Methods
    // =========================================================================

    /**
     * Paginate based on the passed in Paginate variable as returned from the
     * Twig {% paginate %} tag:
     * https://docs.craftcms.com/v3/templating/tags/paginate.html#the-pageInfo-variable
     *
     * @param Paginate $pageInfo
     */
    public static function paginate(Paginate $pageInfo)
    {
        if ($pageInfo !== null && $pageInfo->currentPage !== null) {
            // Let the meta containers know that this page is paginated
            Seomatic::$plugin->metaContainers->paginationPage = (string)$pageInfo->currentPage;
            // Set the current page
            $url = $pageInfo->getPageUrl($pageInfo->currentPage);
            if (!empty($url)) {
                Seomatic::$seomaticVariable->meta->canonicalUrl = $url;
            }
            // Set the previous URL
            $url = $pageInfo->getPrevUrl();
            if (!empty($url)) {
                $metaTag = Seomatic::$plugin->link->create([
                    'rel' => 'prev',
                    'href' => $url,
                ]);
            }
            // Set the next URL
            $url = $pageInfo->getNextUrl();
            if (!empty($url)) {
                $metaTag = Seomatic::$plugin->link->create([
                    'rel' => 'next',
                    'href' => $url,
                ]);
            }
        }
    }

    /**
     * Include any headers for this request
     */
    public static function includeHttpHeaders()
    {
        if (Seomatic::$settings->headersEnabled) {
            $response = Craft::$app->getResponse();
            // X-Robots-Tag header
            $robots = Seomatic::$seomaticVariable->tag->get('robots');
            if ($robots !== null && $robots->include) {
                $robotsArray = $robots->renderAttributes();
                $content = $robotsArray['content'] ?? $robots->content;
                if (!empty($content)) {
                    // The content property can be a string or an array
                    if (\is_array($content)) {
                        $headerValue = '';
                        foreach ($content as $contentVal) {
                            $headerValue .= ($contentVal.',');
                        }
                        $headerValue = rtrim($headerValue, ',');
                    } else {
                        $headerValue = $content;
                    }
                    $response->headers->add('X-Robots-Tag', $headerValue);
                }
            }
            // Link canonical header
            $canonical = Seomatic::$seomaticVariable->link->get('canonical');
            if ($canonical !== null && $canonical->include) {
                $canonicalArray = $canonical->renderAttributes();
                $href = $canonicalArray['href'] ?? $canonical->href;
                if (!empty($href)) {
                    // The href property can be a string or an array
                    if (\is_array($href)) {
                        $headerValue = '';
                        foreach ($href as $hrefVal) {
                            $headerValue .= ('<'.$hrefVal.'>'.',');
                        }
                        $headerValue = rtrim($headerValue, ',');
                    } else {
                        $headerValue = '<'.$href.'>';
                    }
                    $headerValue .= "; rel='canonical'";
                    $response->headers->add('Link', $headerValue);
                }
            }
            // Referrer-Policy header
            $referrer = Seomatic::$seomaticVariable->tag->get('referrer');
            if ($referrer !== null && $referrer->include) {
                $referrerArray = $referrer->renderAttributes();
                $content = $referrerArray['content'] ?? $referrer->content;
                if (!empty($content)) {
                    // The content property can be a string or an array
                    if (\is_array($content)) {
                        $headerValue = '';
                        foreach ($content as $contentVal) {
                            $headerValue .= ($contentVal.',');
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
     * Add any custom/dynamic meta to the containers
     *
     * @param string $uri
     * @param int    $siteId
     */
    public static function addDynamicMetaToContainers(string $uri = '', int $siteId = null)
    {
        Craft::beginProfile('DynamicMeta::addDynamicMetaToContainers', __METHOD__);
        $request = Craft::$app->getRequest();
        // Don't add dynamic meta to console requests, they have no concept of a URI or segments
        if (!$request->getIsConsoleRequest()) {
            $response = Craft::$app->getResponse();
            if ($response->statusCode < 400) {
                self::addMetaJsonLdBreadCrumbs($siteId);
                if (Seomatic::$settings->addHrefLang) {
                    self::addMetaLinkHrefLang();
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
            }
        }
        Craft::endProfile('DynamicMeta::addDynamicMetaToContainers', __METHOD__);
    }

    /**
     * Add the OpeningHoursSpecific to the $jsonLd based on the Entity settings
     *
     * @param MetaJsonLd $jsonLd
     * @param Entity     $entity
     */
    public static function addOpeningHours(MetaJsonLd $jsonLd, Entity $entity)
    {
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
                    /** @var \DateTime $dateTime */
                    $dateTime = DateTimeHelper::toDateTime($hours['open']['date'], false, false);
                    if ($dateTime !== false) {
                        $openTime = $dateTime->format('H:i:s');
                    }
                }
                if (!empty($hours['close'])) {
                    /** @var \DateTime $dateTime */
                    $dateTime = DateTimeHelper::toDateTime($hours['close']['date'], false, false);
                    if ($dateTime !== false) {
                        $closeTime = $dateTime->format('H:i:s');
                    }
                }
                if ($openTime && $closeTime) {
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
    }

    /**
     * Add the ContactPoint to the $jsonLd based on the Entity settings
     *
     * @param MetaJsonLd $jsonLd
     * @param Entity     $entity
     */
    public static function addContactPoints(MetaJsonLd $jsonLd, Entity $entity)
    {
        if ($jsonLd instanceof Organization && $entity !== null) {
            /** @var Organization $jsonLd */
            $contactPoints = [];
            if ($entity->organizationContactPoints !== null && \is_array($entity->organizationContactPoints)) {
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
    }

    /**
     * Add breadcrumbs to the MetaJsonLdContainer
     *
     * @param int|null $siteId
     */
    public static function addMetaJsonLdBreadCrumbs(int $siteId = null)
    {
        $position = 1;
        if ($siteId === null) {
            $siteId = Craft::$app->getSites()->currentSite->id
                ?? Craft::$app->getSites()->primarySite->id
                ?? 1;
        }
        $site = Craft::$app->getSites()->getSiteById($siteId);
        if ($site === null) {
            return;
        }
        try {
            $siteUrl = $site->hasUrls ? $site->baseUrl : Craft::$app->getSites()->getPrimarySite()->baseUrl;
        } catch (SiteNotFoundException $e) {
            $siteUrl = Craft::$app->getConfig()->general->siteUrl;
            Craft::error($e->getMessage(), __METHOD__);
        }
        /** @var  $crumbs BreadcrumbList */
        $crumbs = Seomatic::$plugin->jsonLd->create([
            'type' => 'BreadcrumbList',
            'name' => 'Breadcrumbs',
            'description' => 'Breadcrumbs list',
        ]);
        /** @var Element $element */
        $element = Craft::$app->getElements()->getElementByUri('__home__', $siteId);
        if ($element) {
            $uri = $element->uri === '__home__' ? '' : ($element->uri ?? '');
            try {
                $id = UrlHelper::siteUrl($uri, null, null, $siteId);
            } catch (Exception $e) {
                $id = $siteUrl;
                Craft::error($e->getMessage(), __METHOD__);
            }
            $listItem = MetaJsonLd::create('ListItem', [
                'position' => $position,
                'item' => [
                    '@id' => $id,
                    'name' => $element->title,
                ],
            ]);
            $crumbs->itemListElement[] = $listItem;
        } else {
            $crumbs->itemListElement[] = MetaJsonLd::create('ListItem', [
                'position' => $position,
                'item' => [
                    '@id' => $siteUrl,
                    'name' => 'Homepage',
                ],
            ]);
        }
        // Build up the segments, and look for elements that match
        $uri = '';
        $segments = Craft::$app->getRequest()->getSegments();
        /** @var  $lastElement Element */
        $lastElement = Seomatic::$matchedElement;
        if ($lastElement && $element) {
            if ($lastElement->uri !== '__home__' && $element->uri) {
                $path = parse_url($lastElement->url, PHP_URL_PATH);
                $path = trim($path, '/');
                $segments = explode('/', $path);
            }
        }
        // Parse through the segments looking for elements that match
        foreach ($segments as $segment) {
            $uri .= $segment;
            /** @var Element $element */
            $element = Craft::$app->getElements()->getElementByUri($uri, $siteId);
            if ($element && $element->uri) {
                $position++;
                $uri = $element->uri === '__home__' ? '' : $element->uri;
                try {
                    $id = UrlHelper::siteUrl($uri, null, null, $siteId);
                } catch (Exception $e) {
                    $id = $siteUrl;
                    Craft::error($e->getMessage(), __METHOD__);
                }
                $crumbs->itemListElement[] = MetaJsonLd::create('ListItem', [
                    'position' => $position,
                    'item' => [
                        '@id' => $id,
                        'name' => $element->title,
                    ],
                ]);
            }
            $uri .= '/';
        }

        Seomatic::$plugin->jsonLd->add($crumbs);
    }

    /**
     * Add meta hreflang tags if there is more than one site
     */
    public static function addMetaLinkHrefLang()
    {
        $siteLocalizedUrls = self::getLocalizedUrls();

        if (!empty($siteLocalizedUrls)) {
            // Add the x-default hreflang
            $siteLocalizedUrl = $siteLocalizedUrls[0];
            $metaTag = Seomatic::$plugin->link->create([
                'rel' => 'alternate',
                'hreflang' => ['x-default'],
                'href' => [$siteLocalizedUrl['url']],
            ]);
            // Add the alternate language link rel's
            if (\count($siteLocalizedUrls) > 1) {
                foreach ($siteLocalizedUrls as $siteLocalizedUrl) {
                    $metaTag->hreflang[] = $siteLocalizedUrl['hreflangLanguage'];
                    $metaTag->href[] = $siteLocalizedUrl['url'];
                }
                Seomatic::$plugin->link->add($metaTag);
            }
            // Add in the og:locale:alternate tags
            $ogLocaleAlternate = Seomatic::$plugin->tag->get('og:locale:alternate');
            if (\count($siteLocalizedUrls) > 1 && $ogLocaleAlternate) {
                $ogContentArray = [];
                foreach ($siteLocalizedUrls as $siteLocalizedUrl) {
                    if (!\in_array($siteLocalizedUrl['ogLanguage'], $ogContentArray, true)) {
                        $ogContentArray[] = $siteLocalizedUrl['ogLanguage'];
                    }
                }
                $ogLocaleAlternate->content = $ogContentArray;
            }
        }
    }

    /**
     * Add the Same As meta tags and JSON-LD
     */
    public static function addSameAsMeta()
    {
        $metaContainers = Seomatic::$plugin->metaContainers;
        $sameAsUrls = ArrayHelper::getColumn($metaContainers->metaSiteVars->sameAsLinks, 'url', false);
        $sameAsUrls = array_values(array_filter($sameAsUrls));
        // Facebook OpenGraph
        $ogSeeAlso = Seomatic::$plugin->tag->get('og:see_also');
        if ($ogSeeAlso) {
            $ogSeeAlso->content = $sameAsUrls;
        }
        // Site Identity JSON-LD
        $identity = Seomatic::$plugin->jsonLd->get('identity');
        /** @var Thing $identity */
        if ($identity !== null && property_exists($identity, 'sameAs')) {
            $identity->sameAs = $sameAsUrls;
        }
    }

    /**
     * Return a list of localized URLs that are in the current site's group
     * The current URI is used if $uri is null. Similarly, the current site is
     * used if $siteId is null.
     * The resulting array of arrays has `id`, `language`, `ogLanguage`,
     * `hreflangLanguage`, and `url` as keys.
     *
     * @param string|null $uri
     * @param int|null    $siteId
     *
     * @return array
     */
    public static function getLocalizedUrls(string $uri = null, int $siteId = null): array
    {
        $localizedUrls = [];
        // Set the pagination URL params, if they exist
        $urlParams = null;
        list($pageTrigger, $pageTriggerValue) = UrlHelper::pageTriggerValue();
        if ($pageTriggerValue !== null) {
            $urlParams = [];
            $urlParams[$pageTrigger] = $pageTriggerValue;
        }
        // Get the request URI
        if ($uri === null) {
            try {
                $requestUri = Craft::$app->getRequest()->getUrl();
            } catch (InvalidConfigException $e) {
                $requestUri = '';
                Craft::error($e->getMessage(), __METHOD__);
            }
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
            if (Seomatic::$matchedElement) {
                $url = $elements->getElementUriForSite(Seomatic::$matchedElement->getId(), $site->id);
                // See if they have disabled sitemaps or robots for this entry,
                // and if so, don't include it in the hreflang
                /** @var Element $element */
                $element = null;
                if ($url !== null) {
                    $element = $elements->getElementByUri($url, $site->id, true);
                }
                if ($element !== null) {
                    /** @var MetaBundle $metaBundle */
                    list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId)
                        = Seomatic::$plugin->metaBundles->getMetaSourceFromElement($element);
                    $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceId(
                        $sourceBundleType,
                        $sourceId,
                        $sourceSiteId
                    );
                    if ($metaBundle !== null) {
                        // If sitemaps are off for this entry, don't include the URL
                        if (!$metaBundle->metaSitemapVars->sitemapUrls) {
                            $includeUrl = false;
                        }
                        // If robots is set tp 'none' don't include the URL
                        if ($metaBundle->metaGlobalVars->robots === 'none') {
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
                            /** @var MetaBundle $metaBundle */
                            $fieldMetaBundle = $element->$fieldHandle;
                            if ($fieldMetaBundle !== null) {
                                // If sitemaps are off for this entry, don't include the URL
                                if (!$fieldMetaBundle->metaSitemapVars->sitemapUrls) {
                                    $includeUrl = false;
                                }
                                // If robots is set tp 'none' don't include the URL
                                if ($fieldMetaBundle->metaGlobalVars->robots === 'none') {
                                    $includeUrl = false;
                                }
                            }
                        }
                    }
                } else {
                    $includeUrl = false;
                }
                $url = ($url === '__home__') ? '' : $url;
            } else {
                try {
                    $url = $site->hasUrls ? UrlHelper::siteUrl($requestUri, $urlParams, null, $site->id)
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

            $url = $url ?? '';
            $language = $site->language;
            $ogLanguage = str_replace('-', '_', $language);
            $hreflangLanguage = $language;
            $hreflangLanguage = strtolower($hreflangLanguage);
            $hreflangLanguage = str_replace('_', '-', $hreflangLanguage);
            if ($includeUrl) {
                $localizedUrls[] = [
                    'id' => $site->id,
                    'language' => $language,
                    'ogLanguage' => $ogLanguage,
                    'hreflangLanguage' => $hreflangLanguage,
                    'url' => $url,
                ];
            }
        }

        return $localizedUrls;
    }

    /**
     * Normalize the array of opening hours passed in
     *
     * @param $value
     */
    public static function normalizeTimes(&$value)
    {
        if (\is_string($value)) {
            $value = Json::decode($value);
        }
        $normalized = [];
        $times = ['open', 'close'];
        for ($day = 0; $day <= 6; $day++) {
            foreach ($times as $time) {
                if (isset($value[$day][$time])
                    && ($date = DateTimeHelper::toDateTime($value[$day][$time])) !== false
                ) {
                    $normalized[$day][$time] = $date;
                } else {
                    $normalized[$day][$time] = null;
                }
            }
        }

        $value = $normalized;
    }
}
