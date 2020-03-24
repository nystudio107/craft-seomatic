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

use Craft;
use craft\errors\SiteNotFoundException;
use craft\helpers\UrlHelper as CraftUrlHelper;

use yii\base\Exception;

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
        $siteUrl = Seomatic::$settings->siteUrlOverride;
        if (!empty($siteUrl)) {
            $siteUrl = MetaValue::parseString($siteUrl);
            return rtrim($siteUrl, '/').'/'.ltrim($path, '/');
        }

        return parent::siteUrl($path, $params, $scheme, $siteId);
    }

    /**
     * Return the page trigger and the value of the page trigger (null if it doesn't exist)
     *
     * @return array
     */
    public static function pageTriggerValue(): array
    {
        $pageTrigger = Craft::$app->getConfig()->getGeneral()->pageTrigger;
        if (!\is_string($pageTrigger) || $pageTrigger === '') {
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

        return $url;
    }
}
