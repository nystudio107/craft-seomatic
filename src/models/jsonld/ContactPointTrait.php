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
 * Trait for ContactPoint.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ContactPoint
 */
trait ContactPointTrait
{
    /**
     * The geographic area where a service or offered item is provided.
     *
     * @var string|array|AdministrativeArea|AdministrativeArea[]|array|GeoShape|GeoShape[]|array|Place|Place[]|array|Text|Text[]
     */
    public $areaServed;

    /**
     * A language someone may use with or at the item, service or place. Please
     * use one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also [[inLanguage]].
     *
     * @var string|array|Language|Language[]|array|Text|Text[]
     */
    public $availableLanguage;

    /**
     * An option available on this contact point (e.g. a toll-free number or
     * support for hearing-impaired callers).
     *
     * @var array|ContactPointOption|ContactPointOption[]
     */
    public $contactOption;

    /**
     * A person or organization can have different contact points, for different
     * purposes. For example, a sales contact point, a PR contact point and so on.
     * This property is used to specify the kind of contact point.
     *
     * @var string|array|Text|Text[]
     */
    public $contactType;

    /**
     * Email address.
     *
     * @var string|array|Text|Text[]
     */
    public $email;

    /**
     * The fax number.
     *
     * @var string|array|Text|Text[]
     */
    public $faxNumber;

    /**
     * The hours during which this service or contact is available.
     *
     * @var array|OpeningHoursSpecification|OpeningHoursSpecification[]
     */
    public $hoursAvailable;

    /**
     * The product or service this support contact point is related to (such as
     * product support for a particular product line). This can be a specific
     * product or product line (e.g. "iPhone") or a general category of products
     * or services (e.g. "smartphones").
     *
     * @var string|array|Product|Product[]|array|Text|Text[]
     */
    public $productSupported;

    /**
     * The geographic area where the service is provided.
     *
     * @var array|AdministrativeArea|AdministrativeArea[]|array|GeoShape|GeoShape[]|array|Place|Place[]
     */
    public $serviceArea;

    /**
     * The telephone number.
     *
     * @var string|array|Text|Text[]
     */
    public $telephone;
}
