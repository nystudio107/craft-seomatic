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
use nystudio107\seomatic\gql\types\SeomaticFrontendTemplateType;

/**
 * Class SitemapArguments
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.19
 */
class FrontendContainerArguments extends Arguments
{
    /**
     * @inheritdoc
     */
    public static function getArguments(): array
    {
        return [
            'siteId' => [
                'name' => 'siteId',
                'type' => Type::int(),
                'description' => 'The site ID to fetch frontend containers for.',
            ],
            'site' => [
                'name' => 'site',
                'type' => Type::string(),
                'description' => 'The site handle to fetch frontend containers for.',
            ],
            'type' => [
                'name' => 'type',
                'type' => SeomaticFrontendTemplateType::getType(),
                'description' => 'The frontend container type.',
            ],
        ];
    }
}
