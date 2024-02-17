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
use craft\errors\SiteNotFoundException;
use craft\helpers\UrlHelper as CraftUrlHelper;
use nystudio107\seomatic\Seomatic;
use Throwable;
use yii\base\Exception;
use function is_string;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class UrlHelper extends CraftUrlHelper
{
    // Public Static Properties
    // =========================================================================

    // Public Static Methods
    // =========================================================================

    /**
     * @inheritDoc
     */
    public static function siteUrl(string $path = '', $params = null, string $scheme = null, int $siteId = null): string
    {
        try {
            $siteUrl = self::getSiteUrlOverrideSetting($siteId);
        } catch (Throwable $e) {
            // That's okay
        }
        if (!empty($siteUrl)) {
            $siteUrl = MetaValue::parseString($siteUrl);
            // Extract out just the path part
            $parts = self::decomposeUrl($path);
            $path = $parts['path'] . $parts['suffix'];
            $url = self::mergeUrlWithPath($siteUrl, $path);
            // Handle trailing slashes properly for generated URLs
            $generalConfig = Craft::$app->getConfig()->getGeneral();
            if ($generalConfig->addTrailingSlashesToUrls && !preg_match('/\.[^\/]+$/', $url)) {
                $url = rtrim($url, '/') . '/';
            }
            if (!$generalConfig->addTrailingSlashesToUrls) {
                $url = rtrim($url, '/');
            }

            return DynamicMeta::sanitizeUrl(parent::urlWithParams($url, $params ?? []), false, false);
        }

        return DynamicMeta::sanitizeUrl(parent::siteUrl($path, $params, $scheme, $siteId), false, false);
    }

    /**
     * Merge the $url and $path together, combining any overlapping path segments
     *
     * @param string $url
     * @param string $path
     * @return string
     */
    public static function mergeUrlWithPath(string $url, string $path): string
    {
        $overlap = 0;
        $urlOffset = strlen($url);
        $pathLength = strlen($path);
        $pathOffset = 0;
        while ($urlOffset > 0 && $pathOffset < $pathLength) {
            $urlOffset--;
            $pathOffset++;
            if (str_starts_with($path, substr($url, $urlOffset, $pathOffset))) {
                $overlap = $pathOffset;
            }
        }

        return rtrim($url, '/') . '/' . ltrim(substr($path, $overlap), '/');
    }

    /**
     * Return the page trigger and the value of the page trigger (null if it doesn't exist)
     *
     * @return array
     */
    public static function pageTriggerValue(): array
    {
        $pageTrigger = Craft::$app->getConfig()->getGeneral()->pageTrigger;
        if (!is_string($pageTrigger) || $pageTrigger === '') {
            $pageTrigger = 'p';
        }
        // Is this query string-based pagination?
        if ($pageTrigger[0] === '?') {
            $pageTrigger = trim($pageTrigger, '?=');
        }
        // Avoid conflict with the path param
        $pathParam = Craft::$app->getConfig()->getGeneral()->pathParam;
        if ($pageTrigger === $pathParam) {
            $pageTrigger = $pathParam === 'p' ? 'pg' : 'p';
        }
        $pageTriggerValue = Craft::$app->getRequest()->getParam($pageTrigger);

        return [$pageTrigger, $pageTriggerValue];
    }

    /**
     * Return an absolute URL with protocol that curl will be happy with
     *
     * @param string $url
     *
     * @return string
     */
    public static function absoluteUrlWithProtocol($url): string
    {
        // Make this a full URL
        if (!self::isAbsoluteUrl($url)) {
            $protocol = 'http';
            if (isset($_SERVER['HTTPS']) && (strcasecmp($_SERVER['HTTPS'], 'on') === 0 || $_SERVER['HTTPS'] == 1)
                || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0
            ) {
                $protocol = 'https';
            }
            if (self::isProtocolRelativeUrl($url)) {
                try {
                    $url = self::urlWithScheme($url, $protocol);
                } catch (SiteNotFoundException $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
            } else {
                try {
                    $url = self::siteUrl($url, null, $protocol);
                    if (self::isProtocolRelativeUrl($url)) {
                        $url = self::urlWithScheme($url, $protocol);
                    }
                } catch (Exception $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
        }
        // Ensure that any spaces in the URL are encoded
        $url = str_replace(' ', '%20', $url);

        // Handle trailing slashes properly for generated URLs
        $generalConfig = Craft::$app->getConfig()->getGeneral();
        if ($generalConfig->addTrailingSlashesToUrls && !preg_match('/\.[^\/]+$/', $url)) {
            $url = rtrim($url, '/') . '/';
        }
        if (!$generalConfig->addTrailingSlashesToUrls) {
            $url = rtrim($url, '/');
        }

        return DynamicMeta::sanitizeUrl($url, false, false);
    }

    /**
     * urlencode() just the query parameters in the URL
     *
     * @param string $url
     * @return string
     */
    public static function encodeUrlQueryParams(string $url): string
    {
        $urlParts = parse_url($url);
        $encodedUrl = "";
        if (isset($urlParts['scheme'])) {
            $encodedUrl .= $urlParts['scheme'] . '://';
        }
        if (isset($urlParts['host'])) {
            $encodedUrl .= $urlParts['host'];
        }
        if (isset($urlParts['port'])) {
            $encodedUrl .= ':' . $urlParts['port'];
        }
        if (isset($urlParts['path'])) {
            $encodedUrl .= $urlParts['path'];
        }
        if (isset($urlParts['query'])) {
            $query = explode('&', $urlParts['query']);
            foreach ($query as $j => $value) {
                $value = explode('=', $value, 2);
                if (count($value) === 2) {
                    $query[$j] = urlencode($value[0]) . '=' . urlencode($value[1]);
                } else {
                    $query[$j] = urlencode($value[0]);
                }
            }
            $encodedUrl .= '?' . implode('&', $query);
        }
        if (isset($urlParts['fragment'])) {
            $encodedUrl .= '#' . $urlParts['fragment'];
        }

        return $encodedUrl;
    }

    /**
     * Return whether this URL has a sub-directory as part of it
     *
     * @param string $url
     * @return bool
     */
    public static function urlHasSubDir(string $url): bool
    {
        return !empty(parse_url(trim($url, '/'), PHP_URL_PATH));
    }

    /**
     * Return the siteUrlOverride setting, which can be a string or an array of site URLs
     * indexed by the site handle
     *
     * @param int|null $siteId
     * @return string
     * @throws Exception
     * @throws SiteNotFoundException
     */
    public static function getSiteUrlOverrideSetting(?int $siteId = null): string
    {
        // If the override is a string, just return it
        $siteUrlOverride = Seomatic::$settings->siteUrlOverride;
        if (is_string($siteUrlOverride)) {
            return $siteUrlOverride;
        }
        // If the override is an array, pluck the appropriate one by handle
        if (is_array($siteUrlOverride)) {
            $sites = Craft::$app->getSites();
            $site = $sites->getCurrentSite();
            if ($siteId !== null) {
                $site = $sites->getSiteById($siteId, true);
                if (!$site) {
                    throw new Exception('Invalid site ID: ' . $siteId);
                }
            }

            return $siteUrlOverride[$site->handle] ?? '';
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * Decompose a url into a prefix, path, and suffix
     *
     * @param $pathOrUrl
     *
     * @return array
     */
    protected static function decomposeUrl($pathOrUrl): array
    {
        $result = array();

        if (filter_var($pathOrUrl, FILTER_VALIDATE_URL)) {
            $url_parts = parse_url($pathOrUrl);
            $result['prefix'] = $url_parts['scheme'] . '://' . $url_parts['host'];
            $result['path'] = $url_parts['path'] ?? '';
            $result['suffix'] = '';
            $result['suffix'] .= empty($url_parts['query']) ? '' : '?' . $url_parts['query'];
            $result['suffix'] .= empty($url_parts['fragment']) ? '' : '#' . $url_parts['fragment'];
        } else {
            $result['prefix'] = '';
            $result['path'] = $pathOrUrl;
            $result['suffix'] = '';
        }

        return $result;
    }
}
