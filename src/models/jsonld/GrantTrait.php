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
 * Trait for Grant.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Grant
 */

trait GrantTrait
{
    
    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var Organization|Person
     */
    public $funder;

    /**
     * Indicates something directly or indirectly funded or sponsored through a
     * [[Grant]]. See also [[ownershipFundingInfo]].
     *
     * @var Product|Person|BioChemEntity|Event|MedicalEntity|CreativeWork|Organization
     */
    public $fundedItem;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var Organization|Person
     */
    public $sponsor;

}
