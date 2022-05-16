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
 * Trait for ContactPoint.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ContactPoint
 */

trait ContactPointTrait
{
    
    /**
     * The telephone number.
     *
     * @var string|Text
     */
    public $telephone;

    /**
     * The hours during which this service or contact is available.
     *
     * @var OpeningHoursSpecification
     */
    public $hoursAvailable;

    /**
     * Email address.
     *
     * @var string|Text
     */
    public $email;

    /**
     * An option available on this contact point (e.g. a toll-free number or
     * support for hearing-impaired callers).
     *
     * @var ContactPointOption
     */
    public $contactOption;

    /**
     * A language someone may use with or at the item, service or place. Please
     * use one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also [[inLanguage]]
     *
     * @var string|Text|Language
     */
    public $availableLanguage;

    /**
     * The geographic area where the service is provided.
     *
     * @var GeoShape|AdministrativeArea|Place
     */
    public $serviceArea;

    /**
     * The geographic area where a service or offered item is provided.
     *
     * @var string|AdministrativeArea|GeoShape|Text|Place
     */
    public $areaServed;

    /**
     * A person or organization can have different contact points, for different
     * purposes. For example, a sales contact point, a PR contact point and so on.
     * This property is used to specify the kind of contact point.
     *
     * @var string|Text
     */
    public $contactType;

    /**
     * The product or service this support contact point is related to (such as
     * product support for a particular product line). This can be a specific
     * product or product line (e.g. "iPhone") or a general category of products
     * or services (e.g. "smartphones").
     *
     * @var string|Text|Product
     */
    public $productSupported;

    /**
     * The fax number.
     *
     * @var string|Text
     */
    public $faxNumber;

}
