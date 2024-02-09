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
use nystudio107\seomatic\services\FrontendTemplates;

/**
 * Class SeomaticFrontendTemplateType
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.19
 */
class SeomaticFrontendTemplateType extends EnumType
{
    /**
     * @var string
     */
    public $name = 'SeomaticFrontendTemplate';

    /**
     * @var string
     */
    public $description = 'SEOmatic frontend container type.';

    /**
     * @inheritdoc
     */
    public function __construct($config)
    {
        $config = array_merge($config, [
            'name' => self::getName(),
            'values' => [
                FrontendTemplates::HUMANS_TXT_HANDLE => [
                    'value' => FrontendTemplates::HUMANS_TXT_HANDLE,
                    'description' => 'The humans.txt file',
                ],
                FrontendTemplates::ROBOTS_TXT_HANDLE => [
                    'value' => FrontendTemplates::ROBOTS_TXT_HANDLE,
                    'description' => 'The robots.txt file',
                ],
                FrontendTemplates::ADS_TXT_HANDLE => [
                    'value' => FrontendTemplates::ADS_TXT_HANDLE,
                    'description' => 'The ads.txt file',
                ],
                FrontendTemplates::SECURITY_TXT_HANDLE => [
                    'value' => FrontendTemplates::SECURITY_TXT_HANDLE,
                    'description' => 'The security.txt file',
                ],
            ],
        ]);
        parent::__construct($config);
    }

    /**
     * Returns a singleton instance to ensure one type per schema.
     *
     * @return SeomaticFrontendTemplateType
     */
    public static function getType(): SeomaticFrontendTemplateType
    {
        return GqlEntityRegistry::getEntity(self::getName()) ?: GqlEntityRegistry::createEntity(self::getName(), new self([]));
    }

    /**
     *
     * @return string
     */
    public static function getName(): string
    {
        return 'SeomaticFrontendTemplate';
    }
}
