<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\gql\arguments;

use GraphQL\Type\Definition\EnumType;
use nystudio107\seomatic\helpers\Environment;

use craft\gql\base\Arguments;
use GraphQL\Type\Definition\Type;

/**
 * Class SeomaticArguments
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.8
 */
class SeomaticArguments extends Arguments
{
    /**
     * @inheritdoc
     */
    public static function getArguments(): array
    {
        $environment = new EnumType([]);

        return [
            'uri' => [
                'name' => 'uri',
                'type' => Type::string(),
                'description' => 'The URI to resolve the SEOmatic metdata for.'
            ],
            'siteId' => [
                'name' => 'siteId',
                'type' => Type::int(),
                'description' => 'Optional - The site ID to resolve the SEOmatic metdata for.'
            ],
            'site' => [
                'name' => 'site',
                'type' => Type::string(),
                'description' => 'Optional - The site handle to resolve the SEOmatic metdata for.'
            ],
            'asArray' => [
                'name' => 'asArray',
                'type' => Type::boolean(),
                'description' => 'Whether the meta items should be returned as an array or as pre-rendered tag text.'
            ],
            'environment' => [
                'name' => 'environment',
                'type' => 'SeomaticEnvironment',
                'description' => 'Optional - The SEOmatic environment that should be used',
                'values' => [
                    'dev' => [
                        'value' => Environment::SEOMATIC_DEV_ENV,
                        'description' => 'Local Development environment, with debugging enabled and indexing disabled'
                    ],
                    'staging' => [
                        'value' => Environment::SEOMATIC_STAGING_ENV,
                        'description' => 'Staging environment, with indexing disabled'
                    ],
                    'production' => [
                        'value' => Environment::SEOMATIC_PRODUCTION_ENV,
                        'description' => 'Production environment, with indexing enabled'
                    ],
                ]
            ],
        ];
    }
}
