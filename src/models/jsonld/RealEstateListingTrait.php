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
 * schema.org version: v30.0
 * Trait for RealEstateListing.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/RealEstateListing
 */
trait RealEstateListingTrait
{
    /**
     * Publication date of an online listing.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $datePosted;

    /**
     * Length of the lease for some [[Accommodation]], either particular to some
     * [[Offer]] or in some cases intrinsic to the property.
     *
     * @var array|Duration|Duration[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $leaseLength;
}
