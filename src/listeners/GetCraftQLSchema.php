<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2019 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\listeners;

use Craft;
use craft\helpers\Json;
use nystudio107\seomatic\helpers\Container as ContainerHelper;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\models\MetaTagContainer;

use craft\base\Element;

use markhuot\CraftQL\Events\AlterSchemaFields;
use markhuot\CraftQL\Builders\Field as FieldBuilder;

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
                ->resolve(function (array $data) use ($containerType) {
                    // $root contains the data returned by the field below
                    $result = ContainerHelper::getContainerArrays(
                        [$containerType],
                        $data['uri'],
                        $data['siteId'],
                        $data['asArray']
                    );
                    if (!empty($result[$containerType]) && is_array($result[$containerType])) {
                        $result[$containerType] = Json::encode($result[$containerType]);
                    }

                    return $result[$containerType];
                });
        }
        // Add the root
        $event->schema->addField('seomatic')
            ->arguments(function (FieldBuilder $field) {
                $field->addIntArgument('siteId');
                $field->addStringArgument('uri');
                $field->addBooleanArgument('asArray');
            })
            ->type($seomaticField)
            ->resolve(function ($root, $args, $context, $info) {
                // If our root is an Element, extract the URI and siteId from it
                if ($root instanceof Element) {
                    /** Element $root */
                    $uri = $root->uri;
                    $siteId = $root->siteId;
                } else {
                    // Otherwise use the passed in arguments, or defaults
                    $uri = $args['uri'] ?? '/';
                    $siteId = $args['siteId'] ?? null;
                }
                $asArray = $args['asArray'] ?? false;
                $uri = trim($uri === '/' ? '__home__' : $uri, '/');

                return [
                    'uri' => $uri,
                    'siteId' => $siteId,
                    'asArray' => $asArray,
                ];
            });
    }
}
