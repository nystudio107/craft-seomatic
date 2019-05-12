<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2019 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\listeners;

use craft\base\Element;
use craft\elements\Entry;

use nystudio107\seomatic\helpers\Container as ContainerHelper;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\models\MetaTagContainer;

use markhuot\CraftQL\Events\AlterSchemaFields;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class GetCraftQLSchema
{
    // Constants
    // =========================================================================

    const CRAFT_QL_FIELDS = [
        'metaTitleContainer' => MetaTitleContainer::CONTAINER_TYPE,
        'metaTagContainer' => MetaTagContainer::CONTAINER_TYPE,
        'metaLinkContainer' => MetaLinkContainer::CONTAINER_TYPE,
        'metaScriptContainer' => MetaScriptContainer::CONTAINER_TYPE,
        'metaJsonLdContainer' => MetaJsonLdContainer::CONTAINER_TYPE,
    ];

    // Public Methods
    // =========================================================================

    /**
     * Add the `seomatic` root GraphQL field
     *
     * @param AlterSchemaFields $event
     */
    public static function handle(AlterSchemaFields $event)
    {
        // Create the root object
        $seomaticField = $event->schema->createObjectType('seomaticData');
        // Add in the CraftQL fields
        foreach (self::CRAFT_QL_FIELDS as $fieldHandle => $containerType) {
            $seomaticField
                ->addStringField($fieldHandle)
                ->resolve(function (Element $element) use ($containerType) {
                    // $root contains the data returned by the field below
                    $result = ContainerHelper::getContainerArrays(
                        [$containerType],
                        $element->uri,
                        $element->siteId,
                        false
                    );

                    return $result[$containerType];
                });
        }
        // Add the root
        $event->schema->addField('seomatic')
            ->arguments(function (\markhuot\CraftQL\Builders\Field $field) {
                $field->addIntArgument('siteId');
                $field->addStringArgument('uri')->nonNull();
            })
            ->type($seomaticField)
            ->resolve(function ($root, $args, $context, $info) {
                $uri = trim($args['uri'] === '/' ? '__home__' : $args['uri'], '/');

                // Return an entry that meets the passed in criteria.
                $criteria = Entry::find()
                    ->uri($uri);
                if (!empty($args['siteId'])) {
                    $criteria->siteId($args['siteId']);
                }

                return $criteria->one();
            });
    }
}
