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
 * Trait for PostalCodeRangeSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PostalCodeRangeSpecification
 */
trait PostalCodeRangeSpecificationTrait
{
    /**
     * Last postal code in the range (included). Needs to be after
     * [[postalCodeBegin]].
     *
     * @var string|array|Text|Text[]
     */
    public $postalCodeEnd;

    /**
     * First postal code in a range (included).
     *
     * @var string|array|Text|Text[]
     */
    public $postalCodeBegin;
}
