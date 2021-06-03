<?php
namespace nystudio107\seomatic\helpers;

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
}
