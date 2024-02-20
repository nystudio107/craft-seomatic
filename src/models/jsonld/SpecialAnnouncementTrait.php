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
 * Trait for SpecialAnnouncement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SpecialAnnouncement
 */
trait SpecialAnnouncementTrait
{
    /**
     * Guidelines about quarantine rules, e.g. in the context of a pandemic.
     *
     * @var array|WebContent|WebContent[]|array|URL|URL[]
     */
    public $quarantineGuidelines;

    /**
     * Information about public transport closures.
     *
     * @var array|URL|URL[]|array|WebContent|WebContent[]
     */
    public $publicTransportClosuresInfo;

    /**
     * Publication date of an online listing.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $datePosted;

    /**
     * Information about disease prevention.
     *
     * @var array|WebContent|WebContent[]|array|URL|URL[]
     */
    public $diseasePreventionInfo;

    /**
     * Information about travel bans, e.g. in the context of a pandemic.
     *
     * @var array|WebContent|WebContent[]|array|URL|URL[]
     */
    public $travelBans;

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
     * @var array|WebContent|WebContent[]|array|URL|URL[]
     */
    public $newsUpdatesAndGuidelines;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|CategoryCode|CategoryCode[]|array|PhysicalActivityCategory|PhysicalActivityCategory[]|array|Thing|Thing[]
     */
    public $category;

    /**
     * Information about school closures.
     *
     * @var array|WebContent|WebContent[]|array|URL|URL[]
     */
    public $schoolClosuresInfo;

    /**
     * The URL for a feed, e.g. associated with a podcast series, blog, or series
     * of date-stamped updates. This is usually RSS or Atom.
     *
     * @var array|DataFeed|DataFeed[]|array|URL|URL[]
     */
    public $webFeed;

    /**
     * Statistical information about the spread of a disease, either as
     * [[WebContent]], or   described directly as a [[Dataset]], or the specific
     * [[Observation]]s in the dataset. When a [[WebContent]] URL is   provided,
     * the page indicated might also contain more such markup.
     *
     * @var array|URL|URL[]|array|Dataset|Dataset[]|array|Observation|Observation[]|array|WebContent|WebContent[]
     */
    public $diseaseSpreadStatistics;

    /**
     * Information about getting tested (for a [[MedicalCondition]]), e.g. in the
     * context of a pandemic.
     *
     * @var array|WebContent|WebContent[]|array|URL|URL[]
     */
    public $gettingTestedInfo;
}
