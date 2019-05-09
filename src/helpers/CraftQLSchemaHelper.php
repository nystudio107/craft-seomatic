<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2019 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\helpers;

use Craft;
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
class CraftQLSchemaHelper
{
    // Constants
    // =========================================================================

    const CACHE_KEY = 'seomatic_metacontroller_';

    // Public Methods
    // =========================================================================

    public static function handle(AlterSchemaFields $event)
    {
        // Create the root object
        $seomaticField = $event->schema->createObjectType('seomaticData');
        // Add metaTitleContainer
        $seomaticField->addStringField('metaTitleContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = ContainerHelper::getContainerArrays(
                [MetaTitleContainer::CONTAINER_TYPE],
                $element->uri,
                $element->siteId,
                false
            );

            return $result[MetaTitleContainer::CONTAINER_TYPE];
        });
        // Add metaTagContainer
        $seomaticField->addStringField('metaTagContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = ContainerHelper::getContainerArrays(
                [MetaTagContainer::CONTAINER_TYPE],
                $element->uri,
                $element->siteId,
                false
            );

            return $result[MetaTagContainer::CONTAINER_TYPE];
        });
        // Add metaLinkContainer
        $seomaticField->addStringField('metaLinkContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = ContainerHelper::getContainerArrays(
                [MetaLinkContainer::CONTAINER_TYPE],
                $element->uri,
                $element->siteId,
                false
            );

            return $result[MetaLinkContainer::CONTAINER_TYPE];
        });
        // Add metaScriptContainer
        $seomaticField->addStringField('metaScriptContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = ContainerHelper::getContainerArrays(
                [MetaScriptContainer::CONTAINER_TYPE],
                $element->uri,
                $element->siteId,
                false
            );
            Craft::dd($result);

            return $result[MetaScriptContainer::CONTAINER_TYPE];
        });
        // Add metaJsonLdContainer
        $seomaticField->addStringField('metaJsonLdContainer')->resolve(function (Element $element) {
            // $root contains the data returned by the field below
            $result = ContainerHelper::getContainerArrays(
                [MetaJsonLdContainer::CONTAINER_TYPE],
                $element->uri,
                $element->siteId,
                false
            );

            return $result[MetaJsonLdContainer::CONTAINER_TYPE];
        });

        $event->schema->addField('seomatic')
            ->arguments(function (\markhuot\CraftQL\Builders\Field $field) {
                $field->addIntArgument('siteId');
                $field->addStringArgument('uri')->nonNull();
            })
            ->type($seomaticField)
            ->resolve(function ($root, $args, $context, $info) {
                // Return an entry that meets the passed in criteria.
                $criteria = Entry::find()
                    ->uri($args['uri']);
                if (!empty($args['siteId'])) {
                    $criteria->siteId($args['siteId']);
                }

                return $criteria->one();
            });
    }
}
