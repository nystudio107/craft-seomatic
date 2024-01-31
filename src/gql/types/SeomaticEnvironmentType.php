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

namespace nystudio107\seomatic\gql\types;

use craft\gql\GqlEntityRegistry;

use GraphQL\Type\Definition\EnumType;

use nystudio107\seomatic\helpers\Environment;

/**
 * Class SeomaticEnvironmentType
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.8
 */
class SeomaticEnvironmentType extends EnumType
{
    /**
     * @var string
     */
    public $name = 'SeomaticEnvironment';

    /**
     * @var string
     */
    public $description = 'SEOmatic environment.';

    /**
     * @inheritdoc
     */
    public function __construct($config)
    {
        $config = array_merge($config, [
            'name' => self::getName(),
            'description' => 'Optional - The SEOmatic environment that should be used',
            'values' => [
                Environment::SEOMATIC_DEV_ENV => [
                    'value' => Environment::SEOMATIC_DEV_ENV,
                    'description' => 'Local Development environment, with debugging enabled and indexing disabled',
                ],
                Environment::SEOMATIC_STAGING_ENV => [
                    'value' => Environment::SEOMATIC_STAGING_ENV,
                    'description' => 'Staging environment, with indexing disabled',
                ],
                Environment::SEOMATIC_PRODUCTION_ENV => [
                    'value' => Environment::SEOMATIC_PRODUCTION_ENV,
                    'description' => 'Live production environment, with indexing enabled',
                ],
            ],
        ]);
        parent::__construct($config);
    }

    /**
     * Returns a singleton instance to ensure one type per schema.
     *
     * @return SeomaticEnvironmentType
     */
    public static function getType(): SeomaticEnvironmentType
    {
        return GqlEntityRegistry::getEntity(self::getName()) ?: GqlEntityRegistry::createEntity(self::getName(), new self([]));
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
