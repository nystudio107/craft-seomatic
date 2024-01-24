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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.21
 */
class SiteHelper
{
    // Public Static Properties
    // =========================================================================

    // Public Static Methods
    // =========================================================================

    /**
     * Return whether the passed in siteId is a site that is enabled, and also hasUrls
     *
     * @param $siteId
     * @return bool
     */
    public static function siteEnabledWithUrls($siteId): bool
    {
        $result = false;
        $site = Craft::$app->getSites()->getSiteById($siteId, false);
        if ($site) {
            $result = $site->hasUrls;
        }

        return $result;
    }
}
