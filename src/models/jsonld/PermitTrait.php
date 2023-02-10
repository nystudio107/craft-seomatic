<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Permit.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Permit
 */
trait PermitTrait
{
    /**
     * The target audience for this permit.
     *
     * @var Audience
     */
    public $permitAudience;

    /**
     * The organization issuing the ticket or permit.
     *
     * @var Organization
     */
    public $issuedBy;

    /**
     * The date when the item is no longer valid.
     *
     * @var Date
     */
    public $validUntil;

    /**
     * The duration of validity of a permit or similar thing.
     *
     * @var Duration
     */
    public $validFor;

    /**
     * The geographic area where a permit or similar thing is valid.
     *
     * @var AdministrativeArea
     */
    public $validIn;

    /**
     * The date when the item becomes valid.
     *
     * @var Date|DateTime
     */
    public $validFrom;

    /**
     * The service through which the permit was granted.
     *
     * @var Service
     */
    public $issuedThrough;
}
