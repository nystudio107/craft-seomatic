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

namespace nystudio107\seomatic\gql\interfaces;

use craft\gql\base\InterfaceType as BaseInterfaceType;
use craft\gql\GqlEntityRegistry;
use GraphQL\Type\Definition\InterfaceType;
use GraphQL\Type\Definition\Type;
use nystudio107\seomatic\gql\arguments\FrontendContainerArguments;
use nystudio107\seomatic\gql\arguments\SitemapArguments;

use nystudio107\seomatic\gql\arguments\SitemapIndexArguments;
use nystudio107\seomatic\gql\resolvers\FrontendContainerResolver;
use nystudio107\seomatic\gql\resolvers\SitemapResolver;
use nystudio107\seomatic\gql\types\FileContentsType;
use nystudio107\seomatic\gql\types\generators\SeomaticGenerator;
use nystudio107\seomatic\models\FrontendTemplateContainer;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;

use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaSiteVars;

use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaTitleContainer;

/**
 * Class SeomaticInterface
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.8
 */
class SeomaticInterface extends BaseInterfaceType
{
    // Constants
    // =========================================================================

    public const GRAPH_QL_FIELDS = [
        'metaTitleContainer' => MetaTitleContainer::CONTAINER_TYPE,
        'metaTagContainer' => MetaTagContainer::CONTAINER_TYPE,
        'metaLinkContainer' => MetaLinkContainer::CONTAINER_TYPE,
        'metaScriptContainer' => MetaScriptContainer::CONTAINER_TYPE,
        'metaJsonLdContainer' => MetaJsonLdContainer::CONTAINER_TYPE,
        'metaSiteVarsContainer' => MetaSiteVars::CONTAINER_TYPE,
        'frontendTemplateContainer' => FrontendTemplateContainer::CONTAINER_TYPE,
    ];

    public const DEPRECATED_GRAPH_QL_FIELDS = [
        'frontendTemplateContainer' => 'This query is deprecated and will be removed in the future. You should use `frontendTemplates` instead.',
    ];

    /**
     * @inheritdoc
     */
    public static function getTypeGenerator(): string
    {
        return SeomaticGenerator::class;
    }

    /**
     * @inheritdoc
     */
    public static function getType($fields = null): Type
    {
        if ($type = GqlEntityRegistry::getEntity(self::class)) {
            return $type;
        }

        $type = GqlEntityRegistry::createEntity(self::class, new InterfaceType([
            'name' => static::getName(),
            'fields' => self::class . '::getFieldDefinitions',
            'description' => 'This is the interface implemented by SEOmatic.',
            'resolveType' => function(array $value) {
                return GqlEntityRegistry::getEntity(SeomaticGenerator::getName());
            },
        ]));
        SeomaticGenerator::generateTypes();

        return $type;
    }

    /**
     * @inheritdoc
     */
    public static function getName(): string
    {
        return 'SeomaticInterface';
    }

    /**
     * @inheritdoc
     */
    public static function getFieldDefinitions(): array
    {
        $fields = [];
        foreach (self::GRAPH_QL_FIELDS as $key => $value) {
            $fields[$key] = [
                'name' => $key,
                'type' => Type::string(),
                'description' => 'The ' . $value . ' SEOmatic container.',
            ];
            if (isset(self::DEPRECATED_GRAPH_QL_FIELDS[$key])) {
                $fields[$key]['deprecationReason'] = self::DEPRECATED_GRAPH_QL_FIELDS[$key];
            }
        }

        $fields['sitemaps'] = [
            'name' => 'sitemaps',
            'args' => SitemapArguments::getArguments(),
            'type' => Type::listOf(FileContentsType::getType()),
            'resolve' => SitemapResolver::class . '::getSitemaps',
        ];

        $fields['sitemapIndexes'] = [
            'name' => 'sitemapIndexes',
            'args' => SitemapIndexArguments::getArguments(),
            'type' => Type::listOf(FileContentsType::getType()),
            'resolve' => SitemapResolver::class . '::getSitemapIndexes',
        ];

        $fields['sitemapStyles'] = [
            'name' => 'sitemapStyles',
            'type' => FileContentsType::getType(),
            'resolve' => SitemapResolver::class . '::getSitemapStyles',
        ];

        $fields['frontendTemplates'] = [
            'name' => 'frontendTemplates',
            'args' => FrontendContainerArguments::getArguments(),
            'type' => Type::listOf(FileContentsType::getType()),
            'resolve' => FrontendContainerResolver::class . '::getContainerFiles',
        ];

        return $fields;
    }
}
