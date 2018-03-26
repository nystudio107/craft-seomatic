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

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\jsonld\BreadcrumbList;
use nystudio107\seomatic\models\jsonld\Thing;
use nystudio107\seomatic\models\MetaJsonLd;

use Craft;
use craft\base\Element;
use craft\errors\SiteNotFoundException;
use craft\helpers\UrlHelper;

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
     * Include any headers for this request
     */
    public static function includeHttpHeaders()
    {
        $response = Craft::$app->getResponse();
        // X-Robots-Tag header
        $robots = Seomatic::$seomaticVariable->tag->get('robots');
        if (!empty($robots)) {
            $robotsArray = $robots->renderAttributes();
            $content = $robotsArray['content'] ?? $robots->content;
            if (!empty($content)) {
                // The content property can be a string or an array
                if (is_array($content)) {
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
        if (!empty($canonical)) {
            $canonicalArray = $canonical->renderAttributes();
            $href = $canonicalArray['href'] ?? $canonical->href;
            if (!empty($href)) {
                // The href property can be a string or an array
                if (is_array($href)) {
                    $headerValue = '';
                    foreach ($href as $hrefVal) {
                        $headerValue .= ('<'.$hrefVal.'>'.',');
                    }
                    $headerValue = rtrim($headerValue, ',');
                } else {
                    $headerValue = '<'.$href.'>';
                }
                $headerValue .= '; rel="canonical"';
                $response->headers->add('Link', $headerValue);
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
        $request = Craft::$app->getRequest();
        // Don't add dynamic meta to console requests, they have no concept of a URI or segments
        if (!$request->getIsConsoleRequest()) {
            self::addMetaJsonLdBreadCrumbs($siteId);
            self::addMetaLinkHrefLang();
            self::addSameAsMeta();
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
        try {
            $siteUrl = $site->hasUrls ? $site->baseUrl : Craft::$app->getSites()->getPrimarySite()->baseUrl;
        } catch (SiteNotFoundException $e) {
            $siteUrl = Craft::$app->getConfig()->general->siteUrl;
            Craft::error($e->getMessage(), __METHOD__);
        }
        /** @var  $crumbs BreadcrumbList */
        $crumbs = Seomatic::$plugin->jsonLd->create([
            'type'        => 'BreadcrumbList',
            'name'        => 'Breadcrumbs',
            'description' => 'Breadcrumbs list',
        ]);
        /** @var Element $element */
        $element = Craft::$app->getElements()->getElementByUri("__home__", $siteId);
        if ($element) {
            $uri = $element->uri == '__home__' ? '' : ($element->uri ?? '');
            try {
                $id = UrlHelper::siteUrl($uri, null, null, $siteId);
            } catch (Exception $e) {
                $id = $siteUrl;
                Craft::error($e->getMessage(), __METHOD__);
            }
            $listItem = MetaJsonLd::create("ListItem", [
                'position' => $position,
                'item'     => [
                    '@id'  => $id,
                    'name' => $element->title,
                ],
            ]);
            $crumbs->itemListElement[] = $listItem;
        } else {
            $crumbs->itemListElement[] = MetaJsonLd::create("ListItem", [
                'position' => $position,
                'item'     => [
                    '@id'  => $siteUrl,
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
            if ($lastElement->uri != "__home__" && $element->uri) {
                $path = parse_url($lastElement->url, PHP_URL_PATH);
                $path = trim($path, "/");
                $segments = explode("/", $path);
            }
        }
        // Parse through the segments looking for elements that match
        foreach ($segments as $segment) {
            $uri .= $segment;
            /** @var Element $element */
            $element = Craft::$app->getElements()->getElementByUri($uri, $siteId);
            if ($element && $element->uri) {
                $position++;
                $uri = $element->uri == '__home__' ? '' : $element->uri;
                try {
                    $id = UrlHelper::siteUrl($uri, null, null, $siteId);
                } catch (Exception $e) {
                    $id = $siteUrl;
                    Craft::error($e->getMessage(), __METHOD__);
                }
                $crumbs->itemListElement[] = MetaJsonLd::create("ListItem", [
                    'position' => $position,
                    'item'     => [
                        '@id'  => $id,
                        'name' => $element->title,
                    ],
                ]);
            }
            $uri .= "/";
        }

        Seomatic::$plugin->jsonLd->add($crumbs);
    }

    /**
     * Add meta hreflang tags if there is more than one site
     */
    public static function addMetaLinkHrefLang()
    {
        $siteLocalizedUrls = self::getLocalizedUrls();

        // Add the x-default hreflang
        $siteLocalizedUrl = $siteLocalizedUrls[0];
        $metaTag = Seomatic::$plugin->link->create([
            'rel'      => 'alternate',
            'hreflang' => 'x-default',
            'href'     => $siteLocalizedUrl['url'],
        ]);
        Seomatic::$plugin->link->add($metaTag);
        // Add the alternate language link rel's
        if (count($siteLocalizedUrls) > 1) {
            foreach ($siteLocalizedUrls as $siteLocalizedUrl) {
                $metaTag = Seomatic::$plugin->link->create([
                    'rel'      => 'alternate',
                    'hreflang' => $siteLocalizedUrl['hreflangLanguage'],
                    'href'     => $siteLocalizedUrl['url'],
                ]);
                Seomatic::$plugin->link->add($metaTag);
            }
        }
        // Add in the og:locale:alternate tags
        $ogLocaleAlternate = Seomatic::$plugin->tag->get('og:locale:alternate');
        if (count($siteLocalizedUrls) > 1 && $ogLocaleAlternate) {
            $ogContentArray = [];
            foreach ($siteLocalizedUrls as $siteLocalizedUrl) {
                $ogContentArray[] = $siteLocalizedUrl['language'];
            }
            $ogLocaleAlternate->content = $ogContentArray;
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
        if ($identity) {
            /** @var Thing $identity */
            if (property_exists($identity, 'sameAs')) {
                $identity->sameAs = $sameAsUrls;
            }
        }
    }

    /**
     * Return a list of localized URLs that are in the current site's group
     * The current URI is used if $uri is null. Similarly, the current site is
     * used if $siteId is null.
     * The resulting array of arrays has `id`, `language`, `hreflangLanguage`,
     * and `url` as keys.
     *
     * @param string|null $uri
     * @param int|null    $siteId
     *
     * @return array
     */
    public static function getLocalizedUrls(string $uri = null, int $siteId = null)
    {
        $localizedUrls = [];
        // Get the request URI
        if ($uri == null) {
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
        if ($siteId == null) {
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
        if ($thisSite == null) {
            return $localizedUrls;
        }
        // Get only the sites that are in the current site's group
        try {
            $siteGroup = $thisSite->getGroup();
        } catch (InvalidConfigException $e) {
            $siteGroup = null;
            Craft::error($e->getMessage(), __METHOD__);
        }
        // Bail if we can't get a site group
        if ($siteGroup == null) {
            return $localizedUrls;
        }
        $sites = $siteGroup->getSites();
        $elements = Craft::$app->getElements();
        foreach ($sites as $site) {
            if (Seomatic::$matchedElement) {
                $url = $elements->getElementUriForSite(Seomatic::$matchedElement->getId(), $site->id);
                $url = ($url === '__home__') ? '' : $url;
            } else {
                try {
                    $url = $site->hasUrls ? UrlHelper::siteUrl($requestUri, null, null, $site->id)
                        : Craft::$app->getSites()->getPrimarySite()->baseUrl;
                } catch (SiteNotFoundException $e) {
                    $url = '';
                    Craft::error($e->getMessage(), __METHOD__);
                } catch (Exception $e) {
                    $url = '';
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            $url = ($url === null) ? '' : $url;
            if (!UrlHelper::isAbsoluteUrl($url)) {
                try {
                    $url = UrlHelper::siteUrl($url, null, null, $site->id);
                } catch (Exception $e) {
                    $url = '';
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            $url = ($url === null) ? '' : $url;
            $language = $site->language;
            $hreflangLanguage = $site->language;
            $hreflangLanguage = strtolower($hreflangLanguage);
            $hreflangLanguage = str_replace('_', '-', $hreflangLanguage);
            $localizedUrls[] = [
                'id'               => $site->id,
                'language'         => $language,
                'hreflangLanguage' => $hreflangLanguage,
                'url'              => $url,
            ];
        }

        return $localizedUrls;
    }
}
