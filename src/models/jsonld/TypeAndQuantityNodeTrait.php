<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for TypeAndQuantityNode.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TypeAndQuantityNode
 */
trait TypeAndQuantityNodeTrait
{
    /**
     * The quantity of the goods included in the offer.
     *
     * @var float|Number
     */
    public $amountOfThisGood;

    /**
     * The business function (e.g. sell, lease, repair, dispose) of the offer or
     * component of a bundle (TypeAndQuantityNode). The default is
     * http://purl.org/goodrelations/v1#Sell.
     *
     * @var BusinessFunction
     */
    public $businessFunction;

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3
     * characters) or a URL. Other codes than the UN/CEFACT Common Code may be
     * used with a prefix followed by a colon.
     *
     * @var string|Text|URL
     */
    public $unitCode;

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot
     * provide a standard unit code for <a href='unitCode'>unitCode</a>.
     *
     * @var string|Text
     */
    public $unitText;

    /**
     * The product that this structured value is referring to.
     *
     * @var Product|Service
     */
    public $typeOfGood;
}
