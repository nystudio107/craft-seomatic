<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\gql\queries;

use craft\gql\base\Query;
use nystudio107\seomatic\gql\arguments\SeomaticArguments;
use nystudio107\seomatic\gql\interfaces\SeomaticInterface;
use nystudio107\seomatic\gql\resolvers\SeomaticResolver;

use nystudio107\seomatic\helpers\Gql as GqlHelper;

/**
 * Class SeomaticQuery
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.8
 */
class SeomaticQuery extends Query
{
    /**
     * @inheritdoc
     */
    public static function getQueries(bool $checkToken = true): array
    {
        if ($checkToken && !GqlHelper::canQuerySeo()) {
            return [];
        }

        return [
            'seomatic' => [
                'type' => SeomaticInterface::getType(),
                'args' => SeomaticArguments::getArguments(),
                'resolve' => SeomaticResolver::class . '::resolve',
                'description' => 'This query is used to query for SEOmatic meta data.',
            ],
        ];
    }
}
