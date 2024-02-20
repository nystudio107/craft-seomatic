<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for CompoundPriceSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CompoundPriceSpecification
 */
trait CompoundPriceSpecificationTrait
{
    /**
     * This property links to all [[UnitPriceSpecification]] nodes that apply in
     * parallel for the [[CompoundPriceSpecification]] node.
     *
     * @var array|UnitPriceSpecification|UnitPriceSpecification[]
     */
    public $priceComponent;

    /**
     * Defines the type of a price specified for an offered product, for example a
     * list price, a (temporary) sale price or a manufacturer suggested retail
     * price. If multiple prices are specified for an offer the [[priceType]]
     * property can be used to identify the type of each such specified price. The
     * value of priceType can be specified as a value from enumeration
     * PriceTypeEnumeration or as a free form text string for price types that are
     * not already predefined in PriceTypeEnumeration.
     *
     * @var string|array|PriceTypeEnumeration|PriceTypeEnumeration[]|array|Text|Text[]
     */
    public $priceType;
}
