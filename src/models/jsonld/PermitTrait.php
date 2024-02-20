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
 * Trait for Permit.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Permit
 */
trait PermitTrait
{
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
     * The date when the item is no longer valid.
     *
     * @var array|Date|Date[]
     */
    public $validUntil;

    /**
     * The target audience for this permit.
     *
     * @var array|Audience|Audience[]
     */
    public $permitAudience;

    /**
     * The duration of validity of a permit or similar thing.
     *
     * @var array|Duration|Duration[]
     */
    public $validFor;

    /**
     * The service through which the permit was granted.
     *
     * @var array|Service|Service[]
     */
    public $issuedThrough;
}
