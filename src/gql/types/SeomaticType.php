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

use craft\gql\base\ObjectType;

use GraphQL\Type\Definition\ResolveInfo;

use nystudio107\seomatic\gql\interfaces\SeomaticInterface;

/**
 * Class SeomaticType
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.8
 */
class SeomaticType extends ObjectType
{
    /**
     * @inheritdoc
     */
    public function __construct(array $config)
    {
        $config['interfaces'] = [
            SeomaticInterface::getType(),
        ];

        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    protected function resolve(mixed $source, array $arguments, mixed $context, ResolveInfo $resolveInfo): mixed
    {
        $fieldName = SeomaticInterface::GRAPH_QL_FIELDS[$resolveInfo->fieldName];

        return $source[$fieldName];
    }
}
