<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for RealEstateListing.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/RealEstateListing
 */
trait RealEstateListingTrait
{
    /**
     * Length of the lease for some [[Accommodation]], either particular to some
     * [[Offer]] or in some cases intrinsic to the property.
     *
     * @var QuantitativeValue|Duration
     */
    public $leaseLength;

    /**
     * Publication date of an online listing.
     *
     * @var DateTime|Date
     */
    public $datePosted;
}
