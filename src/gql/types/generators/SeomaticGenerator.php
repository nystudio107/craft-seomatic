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

namespace nystudio107\seomatic\gql\types\generators;

use craft\gql\base\GeneratorInterface;
use craft\gql\GqlEntityRegistry;
use craft\gql\TypeLoader;

use nystudio107\seomatic\gql\arguments\SeomaticArguments;
use nystudio107\seomatic\gql\interfaces\SeomaticInterface;
use nystudio107\seomatic\gql\types\SeomaticType;

/**
 * Class SeomaticGenerator
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.8
 */
class SeomaticGenerator implements GeneratorInterface
{
    /**
     * @inheritdoc
     */
    public static function generateTypes(mixed $context = null): array
    {
        $gqlTypes = [];
        $seomaticFields = SeomaticInterface::getFieldDefinitions();
        $seomaticArgs = SeomaticArguments::getArguments();
        $typeName = self::getName();
        $seomaticType = GqlEntityRegistry::getEntity($typeName)
            ?: GqlEntityRegistry::createEntity($typeName, new SeomaticType([
                'name' => $typeName,
                'args' => function() use ($seomaticArgs) {
                    return $seomaticArgs;
                },
                'fields' => function() use ($seomaticFields) {
                    return $seomaticFields;
                },
                'description' => 'This entity has all the SEOmatic fields',
            ]));

        $gqlTypes[$typeName] = $seomaticType;
        TypeLoader::registerType($typeName, function() use ($seomaticType) {
            return $seomaticType;
        });

        return $gqlTypes;
    }

    /**
     * @inheritdoc
     */
    public static function getName($context = null): string
    {
        return 'SeomaticType';
    }
}
