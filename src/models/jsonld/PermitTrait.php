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
 * Trait for Permit.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Permit
 */

trait PermitTrait
{
    
    /**
     * The duration of validity of a permit or similar thing.
     *
     * @var Duration
     */
    public $validFor;

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
     * The date when the item becomes valid.
     *
     * @var DateTime|Date
     */
    public $validFrom;

    /**
     * The service through with the permit was granted.
     *
     * @var Service
     */
    public $issuedThrough;

    /**
     * The geographic area where a permit or similar thing is valid.
     *
     * @var AdministrativeArea
     */
    public $validIn;

    /**
     * The target audience for this permit.
     *
     * @var Audience
     */
    public $permitAudience;

}
