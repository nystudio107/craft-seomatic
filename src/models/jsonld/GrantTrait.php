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
 * Trait for Grant.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Grant
 */
trait GrantTrait
{
    /**
     * Indicates something directly or indirectly funded or sponsored through a
     * [[Grant]]. See also [[ownershipFundingInfo]].
     *
     * @var array|BioChemEntity|BioChemEntity[]|array|CreativeWork|CreativeWork[]|array|Event|Event[]|array|MedicalEntity|MedicalEntity[]|array|Organization|Organization[]|array|Person|Person[]|array|Product|Product[]
     */
    public $fundedItem;

    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $funder;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. E.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $sponsor;
}
