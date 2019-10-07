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
        return [
            'uri' => [
                'name' => 'uri',
                'type' => Type::string(),
                'description' => 'The URI to resolve the SEOmatic metdata for.'
            ],
            'siteId' => [
                'name' => 'siteId',
                'type' => Type::int(),
                'description' => 'The siteId to resolve the SEOmatic metdata for.'
            ],
            'asArray' => [
                'name' => 'asArray',
                'type' => Type::boolean(),
                'description' => 'Whether the meta items should be returned as an array or as pre-rendered tag text.'
            ],
        ];
    }
}
