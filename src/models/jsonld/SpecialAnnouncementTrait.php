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
 * Trait for SpecialAnnouncement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SpecialAnnouncement
 */
trait SpecialAnnouncementTrait
{
    /**
     * Indicates a specific [[CivicStructure]] or [[LocalBusiness]] associated
     * with the SpecialAnnouncement. For example, a specific testing facility or
     * business with special opening hours. For a larger geographic region like a
     * quarantine of an entire region, use [[spatialCoverage]].
     *
     * @var array|CivicStructure|CivicStructure[]|array|LocalBusiness|LocalBusiness[]
     */
    public $announcementLocation;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|array|CategoryCode|CategoryCode[]|array|PhysicalActivityCategory|PhysicalActivityCategory[]|array|Text|Text[]|array|Thing|Thing[]|array|URL|URL[]
     */
    public $category;

    /**
     * Publication date of an online listing.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $datePosted;

    /**
     * Information about disease prevention.
     *
     * @var array|URL|URL[]|array|WebContent|WebContent[]
     */
    public $diseasePreventionInfo;

    /**
     * Statistical information about the spread of a disease, either as
     * [[WebContent]], or   described directly as a [[Dataset]], or the specific
     * [[Observation]]s in the dataset. When a [[WebContent]] URL is   provided,
     * the page indicated might also contain more such markup.
     *
     * @var array|Dataset|Dataset[]|array|Observation|Observation[]|array|URL|URL[]|array|WebContent|WebContent[]
     */
    public $diseaseSpreadStatistics;

    /**
     * Information about getting tested (for a [[MedicalCondition]]), e.g. in the
     * context of a pandemic.
     *
     * @var array|URL|URL[]|array|WebContent|WebContent[]
     */
    public $gettingTestedInfo;

    /**
     * governmentBenefitsInfo provides information about government benefits
     * associated with a SpecialAnnouncement.
     *
     * @var array|GovernmentService|GovernmentService[]
     */
    public $governmentBenefitsInfo;

    /**
     * Indicates a page with news updates and guidelines. This could often be (but
     * is not required to be) the main page containing [[SpecialAnnouncement]]
     * markup on a site.
     *
     * @var array|URL|URL[]|array|WebContent|WebContent[]
     */
    public $newsUpdatesAndGuidelines;

    /**
     * Information about public transport closures.
     *
     * @var array|URL|URL[]|array|WebContent|WebContent[]
     */
    public $publicTransportClosuresInfo;

    /**
     * Guidelines about quarantine rules, e.g. in the context of a pandemic.
     *
     * @var array|URL|URL[]|array|WebContent|WebContent[]
     */
    public $quarantineGuidelines;

    /**
     * Information about school closures.
     *
     * @var array|URL|URL[]|array|WebContent|WebContent[]
     */
    public $schoolClosuresInfo;

    /**
     * Information about travel bans, e.g. in the context of a pandemic.
     *
     * @var array|URL|URL[]|array|WebContent|WebContent[]
     */
    public $travelBans;

    /**
     * The URL for a feed, e.g. associated with a podcast series, blog, or series
     * of date-stamped updates. This is usually RSS or Atom.
     *
     * @var array|DataFeed|DataFeed[]|array|URL|URL[]
     */
    public $webFeed;
}
