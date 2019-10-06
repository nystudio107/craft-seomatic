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

namespace nystudio107\seomatic\gql\resolvers;

use craft\base\Element;
use craft\gql\base\Resolver;
use craft\helpers\Gql as GqlHelper;

use craft\helpers\UrlHelper;
use GraphQL\Type\Definition\ResolveInfo;
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
    /**
     * @inheritDoc
     */
    public static function resolve($source, array $arguments, $context, ResolveInfo $resolveInfo)
    {
    }
}
