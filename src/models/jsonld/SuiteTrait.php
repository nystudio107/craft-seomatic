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
 * Trait for Suite.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Suite
 */
trait SuiteTrait
{
    /**
     * The type of bed or beds included in the accommodation. For the single case
     * of just one bed of a certain type, you use bed directly with a text.
     * If you want to indicate the quantity of a certain kind of bed, use an
     * instance of BedDetails. For more detailed information, use the
     * amenityFeature property.
     *
     * @var string|array|Text|Text[]|array|BedDetails|BedDetails[]|array|BedType|BedType[]
     */
    public $bed;

    /**
     * The allowed total occupancy for the accommodation in persons (including
     * infants etc). For individual accommodations, this is not necessarily the
     * legal maximum but defines the permitted usage as per the contractual
     * agreement (e.g. a double room used by a single person). Typical unit
     * code(s): C62 for person.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $occupancy;

    /**
     * The number of rooms (excluding bathrooms and closets) of the accommodation
     * or lodging business. Typical unit code(s): ROM for room or C62 for no unit.
     * The type of room can be put in the unitText property of the
     * QuantitativeValue.
     *
     * @var float|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfRooms;
}
