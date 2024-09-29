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

namespace nystudio107\seomatic\gql\resolvers;

use GraphQL\Type\Definition\ResolveInfo;
use nystudio107\seomatic\helpers\Container as ContainerHelper;
use nystudio107\seomatic\helpers\Gql as GqlHelper;
use nystudio107\seomatic\helpers\Json;
use nystudio107\seomatic\models\FrontendTemplateContainer;

/**
 * Class FrontendContainerResolver
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.19
 */
class FrontendContainerResolver
{
    // Public Methods
    // =========================================================================

    /**
     * Get the frontend container files separately
     */
    public static function getContainerFiles($source, array $arguments, $context, ResolveInfo $resolveInfo)
    {
        $siteId = GqlHelper::getSiteIdFromGqlArguments($arguments);
        $typeMap = [
            'robots' => 'robots.txt',
            'humans' => 'humans.txt',
            'ads' => 'ads.txt',
            'security' => 'security.txt',
        ];

        $containerData = ContainerHelper::getContainerArrays([FrontendTemplateContainer::CONTAINER_TYPE], '', $siteId);
        $decodedData = Json::decodeIfJson(reset($containerData));
        $containerItems = [];

        foreach ($decodedData as $decodedItem) {
            $containerItems[key($decodedItem)] = current($decodedItem);
        }

        if (!empty($arguments['type'])) {
            $containerItems = [
                $arguments['type'] => $containerItems[$arguments['type']] ?? [],
            ];
        }

        array_walk($containerItems, function(&$contents, $type) use ($typeMap) {
            $contents = [
                'filename' => $typeMap[$type],
                'contents' => $contents,
            ];
        });


        return $containerItems;
    }
}
