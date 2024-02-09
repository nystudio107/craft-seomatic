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

use craft\base\Element;
use craft\gql\base\Resolver;
use craft\helpers\Json;
use GraphQL\Type\Definition\ResolveInfo;

use nystudio107\seomatic\gql\interfaces\SeomaticInterface;
use nystudio107\seomatic\helpers\Container as ContainerHelper;
use nystudio107\seomatic\helpers\Gql as GqlHelper;

use nystudio107\seomatic\Seomatic;

/**
 * Class SeomaticResolver
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.8
 */
class SeomaticResolver extends Resolver
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritDoc
     */
    public static function resolve(mixed $source, array $arguments, mixed $context, ResolveInfo $resolveInfo): mixed
    {
        // If our source is an Element, extract the URI and siteId from it
        if ($source instanceof Element) {
            /** Element $source */
            $uri = $source->uri;
            $siteId = $source->siteId;
        } else {
            // Otherwise use the passed in arguments, or defaults
            $uri = $arguments['uri'] ?? '/';
            $siteId = GqlHelper::getSiteIdFromGqlArguments($arguments);
        }

        // Change the environment if we need to
        $environment = $arguments['environment'] ?? null;
        $oldEnvironment = Seomatic::$environment;
        if ($environment) {
            Seomatic::$environment = $environment;
        }
        $asArray = $arguments['asArray'] ?? false;
        $uri = trim($uri === '/' ? '__home__' : $uri, '/');

        $result = ContainerHelper::getContainerArrays(
            array_values(SeomaticInterface::GRAPH_QL_FIELDS),
            $uri,
            $siteId,
            $asArray
        );
        foreach ($result as $key => $value) {
            if (isset($value) && is_array($value)) {
                $result[$key] = Json::encode($value);
            }
        }
        if ($environment) {
            Seomatic::$environment = $oldEnvironment;
        }

        return $result;
    }
}
