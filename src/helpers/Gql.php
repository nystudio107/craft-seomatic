<?php

namespace nystudio107\seomatic\helpers;

use Craft;
use craft\helpers\Gql as GqlHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.43
 */
class Gql extends GqlHelper
{
    // Public Methods
    // =========================================================================

    public static function canQuerySeo(): bool
    {
        $allowedEntities = self::extractAllowedEntitiesFromSchema();

        return isset($allowedEntities['seomatic']);
    }

    public static function getSiteIdFromGqlArguments(array $arguments)
    {
        $siteId = $arguments['siteId'] ?? null;

        if (!empty($arguments['site'])) {
            $site = Craft::$app->getSites()->getSiteByHandle($arguments['site']);
            $siteId = $site->id ?? $siteId;
        }

        if (empty($siteId)) {
            $siteId = Craft::$app->getSites()->getCurrentSite()->id;
        }

        return $siteId;
    }
}
