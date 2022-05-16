<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for DeliveryChargeSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DeliveryChargeSpecification
 */

trait DeliveryChargeSpecificationTrait
{
    
    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is not valid, e.g. a region where the transaction is
     * not allowed.  See also [[eligibleRegion]].       
     *
     * @var string|Place|Text|GeoShape
     */
    public $ineligibleRegion;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is valid.  See also [[ineligibleRegion]].     
     *
     * @var string|GeoShape|Text|Place
     */
    public $eligibleRegion;

    /**
     * The geographic area where a service or offered item is provided.
     *
     * @var string|AdministrativeArea|GeoShape|Text|Place
     */
    public $areaServed;

    /**
     * The delivery method(s) to which the delivery charge or payment charge
     * specification applies.
     *
     * @var DeliveryMethod
     */
    public $appliesToDeliveryMethod;

}
