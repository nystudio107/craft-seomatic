<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for AggregateOffer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AggregateOffer
 */

trait AggregateOfferTrait
{
    
    /**
     * The highest price of all offers available.  Usage guidelines:  * Use values
     * from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039))
     * rather than superficially similiar Unicode symbols. * Use '.' (Unicode
     * 'FULL STOP' (U+002E)) rather than ',' to indicate a decimal point. Avoid
     * using these symbols as a readability separator.
     *
     * @var string|float|Text|Number
     */
    public $highPrice;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event. Use [[businessFunction]] to indicate the kind of transaction
     * offered, i.e. sell, lease, etc. This property can also be used to describe
     * a [[Demand]]. While this property is listed as expected on a number of
     * common types, it can be used in others. In that case, using a second type,
     * such as Product or a subtype of Product, can clarify the nature of the
     * offer.       
     *
     * @var Offer|Demand
     */
    public $offers;

    /**
     * The lowest price of all offers available.  Usage guidelines:  * Use values
     * from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039))
     * rather than superficially similiar Unicode symbols. * Use '.' (Unicode
     * 'FULL STOP' (U+002E)) rather than ',' to indicate a decimal point. Avoid
     * using these symbols as a readability separator.
     *
     * @var string|float|Text|Number
     */
    public $lowPrice;

    /**
     * The number of offers for the product.
     *
     * @var int|Integer
     */
    public $offerCount;

}
