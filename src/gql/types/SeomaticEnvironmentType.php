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

namespace nystudio107\seomatic\gql\types;

use GraphQL\Type\Definition\EnumType;

/**
 * Class SeomaticType
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.8
 */
class SeomaticEnvironmentType extends EnumType
{
    /**
     * @inheritdoc
     */
    public function __construct(array $config)
    {
        $config['interfaces'] = [
            SeomaticEnvironmentType::getType(),
        ];

        parent::__construct($config);
    }

    /**
     *
     * @return string
     */
    public static function getName(): string
    {
        return 'SeomaticEnvironment';
    }
}
