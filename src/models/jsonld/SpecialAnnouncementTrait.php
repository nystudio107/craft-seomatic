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
 * Trait for SpecialAnnouncement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SpecialAnnouncement
 */
trait SpecialAnnouncementTrait
{
    /**
     * Statistical information about the spread of a disease, either as
     * [[WebContent]], or   described directly as a [[Dataset]], or the specific
     * [[Observation]]s in the dataset. When a [[WebContent]] URL is   provided,
     * the page indicated might also contain more such markup.
     *
     * @var WebContent|Observation|Dataset|URL
     */
    public $diseaseSpreadStatistics;

    /**
     * Information about public transport closures.
     *
     * @var WebContent|URL
     */
    public $publicTransportClosuresInfo;

    /**
     * governmentBenefitsInfo provides information about government benefits
     * associated with a SpecialAnnouncement.
     *
     * @var GovernmentService
     */
    public $governmentBenefitsInfo;

    /**
     * Guidelines about quarantine rules, e.g. in the context of a pandemic.
     *
     * @var URL|WebContent
     */
    public $quarantineGuidelines;

    /**
     * Information about travel bans, e.g. in the context of a pandemic.
     *
     * @var URL|WebContent
     */
    public $travelBans;

    /**
     * The URL for a feed, e.g. associated with a podcast series, blog, or series
     * of date-stamped updates. This is usually RSS or Atom.
     *
     * @var DataFeed|URL
     */
    public $webFeed;

    /**
     * Information about disease prevention.
     *
     * @var WebContent|URL
     */
    public $diseasePreventionInfo;

    /**
     * Publication date of an online listing.
     *
     * @var DateTime|Date
     */
    public $datePosted;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var string|URL|CategoryCode|Text|Thing|PhysicalActivityCategory
     */
    public $category;

    /**
     * Indicates a specific [[CivicStructure]] or [[LocalBusiness]] associated
     * with the SpecialAnnouncement. For example, a specific testing facility or
     * business with special opening hours. For a larger geographic region like a
     * quarantine of an entire region, use [[spatialCoverage]].
     *
     * @var CivicStructure|LocalBusiness
     */
    public $announcementLocation;

    /**
     * Information about school closures.
     *
     * @var WebContent|URL
     */
    public $schoolClosuresInfo;

    /**
     * Indicates a page with news updates and guidelines. This could often be (but
     * is not required to be) the main page containing [[SpecialAnnouncement]]
     * markup on a site.
     *
     * @var WebContent|URL
     */
    public $newsUpdatesAndGuidelines;

    /**
     * Information about getting tested (for a [[MedicalCondition]]), e.g. in the
     * context of a pandemic.
     *
     * @var WebContent|URL
     */
    public $gettingTestedInfo;
}
