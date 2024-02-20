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
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Duration|Duration[]
     */
    public $leaseLength;
}
