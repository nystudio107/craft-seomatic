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
 * Trait for Certification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Certification
 */
trait CertificationTrait
{
    /**
     * Identifier of a certification instance (as registered with an independent
     * certification body). Typically this identifier can be used to consult and
     * verify the certification instance. See also
     * [gs1:certificationIdentification](https://www.gs1.org/voc/certificationIdentification).
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $certificationIdentification;

    /**
     * A measurement of an item, For example, the inseam of pants, the wheel size
     * of a bicycle, the gauge of a screw, or the carbon footprint measured for
     * certification by an authority. Usually an exact measurement, but can also
     * be a range of measurements for adjustable products, for example belts and
     * ski bindings.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $hasMeasurement;

    /**
     * An associated logo.
     *
     * @var array|URL|URL[]|array|ImageObject|ImageObject[]
     */
    public $logo;

    /**
     * Indicates the current status of a certification: active or inactive. See
     * also
     * [gs1:certificationStatus](https://www.gs1.org/voc/certificationStatus).
     *
     * @var array|CertificationStatusEnumeration|CertificationStatusEnumeration[]
     */
    public $certificationStatus;

    /**
     * Date when a certification was last audited. See also
     * [gs1:certificationAuditDate](https://www.gs1.org/voc/certificationAuditDate).
     *
     * @var array|DateTime|DateTime[]|array|Date|Date[]
     */
    public $auditDate;

    /**
     * The organization issuing the item, for example a [[Permit]], [[Ticket]], or
     * [[Certification]].
     *
     * @var array|Organization|Organization[]
     */
    public $issuedBy;

    /**
     * The geographic area where the item is valid. Applies for example to a
     * [[Permit]], a [[Certification]], or an
     * [[EducationalOccupationalCredential]].
     *
     * @var array|AdministrativeArea|AdministrativeArea[]
     */
    public $validIn;

    /**
     * The date when the item becomes valid.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $validFrom;

    /**
     * The subject matter of the content.
     *
     * @var array|Thing|Thing[]
     */
    public $about;

    /**
     * Date of first publication or broadcast. For example the date a
     * [[CreativeWork]] was broadcast or a [[Certification]] was issued.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $datePublished;

    /**
     * Date the content expires and is no longer useful or available. For example
     * a [[VideoObject]] or [[NewsArticle]] whose availability or relevance is
     * time-limited, a [[ClaimReview]] fact check whose publisher wants to
     * indicate that it may no longer be relevant (or helpful to highlight) after
     * some date, or a [[Certification]] the validity has expired.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $expires;
}
