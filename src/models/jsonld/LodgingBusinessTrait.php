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
 * Trait for LodgingBusiness.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LodgingBusiness
 */
trait LodgingBusinessTrait
{
    /**
     * An amenity feature (e.g. a characteristic or service) of the Accommodation.
     * This generic property does not make a statement about whether the feature
     * is included in an offer for the main accommodation or available at extra
     * costs.
     *
     * @var array|LocationFeatureSpecification|LocationFeatureSpecification[]
     */
    public $amenityFeature;

    /**
     * The latest someone may check out of a lodging establishment.
     *
     * @var array|DateTime|DateTime[]|array|Time|Time[]
     */
    public $checkoutTime;

    /**
     * A language someone may use with or at the item, service or place. Please
     * use one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also [[inLanguage]].
     *
     * @var string|array|Language|Language[]|array|Text|Text[]
     */
    public $availableLanguage;

    /**
     * An intended audience, i.e. a group for whom something was created.
     *
     * @var array|Audience|Audience[]
     */
    public $audience;

    /**
     * The number of rooms (excluding bathrooms and closets) of the accommodation
     * or lodging business. Typical unit code(s): ROM for room or C62 for no unit.
     * The type of room can be put in the unitText property of the
     * QuantitativeValue.
     *
     * @var float|array|Number|Number[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $numberOfRooms;

    /**
     * The earliest someone may check into a lodging establishment.
     *
     * @var array|Time|Time[]|array|DateTime|DateTime[]
     */
    public $checkinTime;

    /**
     * Indicates whether pets are allowed to enter the accommodation or lodging
     * business. More detailed information can be put in a text value.
     *
     * @var bool|string|array|Boolean|Boolean[]|array|Text|Text[]
     */
    public $petsAllowed;

    /**
     * An official rating for a lodging business or food establishment, e.g. from
     * national associations or standards bodies. Use the author property to
     * indicate the rating organization, e.g. as an Organization with name such as
     * (e.g. HOTREC, DEHOGA, WHR, or Hotelstars).
     *
     * @var array|Rating|Rating[]
     */
    public $starRating;
}
