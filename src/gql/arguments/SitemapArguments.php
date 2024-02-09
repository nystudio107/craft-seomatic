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

namespace nystudio107\seomatic\gql\arguments;

use craft\gql\base\Arguments;
use GraphQL\Type\Definition\Type;

/**
 * Class SitemapArguments
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.18
 */
class SitemapArguments extends Arguments
{
    /**
     * @inheritdoc
     */
    public static function getArguments(): array
    {
        return [
            'filename' => [
                'name' => 'filename',
                'type' => Type::string(),
                'description' => 'Optional - the sitemap filename.',
            ],
            'siteId' => [
                'name' => 'siteId',
                'type' => Type::int(),
                'description' => 'Optional - The site ID to list the sitemaps for.',
            ],
            'site' => [
                'name' => 'site',
                'type' => Type::string(),
                'description' => 'Optional - The site handle to list the sitemaps for.',
            ],
            'sourceBundleType' => [
                'name' => 'sourceBundleType',
                'type' => Type::string(),
                'description' => 'Optional - The source bundle type to get the sitemaps for.',
            ],
            'sourceBundleHandle' => [
                'name' => 'sourceBundleHandle',
                'type' => Type::string(),
                'description' => 'Optional - The source bundles handle to get the  sitemap for.',
            ],
        ];
    }
}
