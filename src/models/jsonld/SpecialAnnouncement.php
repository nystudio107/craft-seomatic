<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * SpecialAnnouncement - A SpecialAnnouncement combines a simple date-stamped
 * textual information update with contextualized Web links and other
 * structured data. It represents an information update made by a
 * locally-oriented organization, for example schools, pharmacies, healthcare
 * providers, community groups, police, local government. For work in progress
 * guidelines on Coronavirus-related markup see this doc. The motivating
 * scenario for SpecialAnnouncement is the Coronavirus pandemic, and the
 * initial vocabulary is oriented to this urgent situation. Schema.org expect
 * to improve the markup iteratively as it is deployed and as feedback emerges
 * from use. In addition to our usual Github entry, feedback comments can also
 * be provided in this document. While this schema is designed to communicate
 * urgent crisis-related information, it is not the same as an emergency
 * warning technology like CAP, although there may be overlaps. The intent is
 * to cover the kinds of everyday practical information being posted to
 * existing websites during an emergency situation. Several kinds of
 * information can be provided: We encourage the provision of "name", "text",
 * "datePosted", "expires" (if appropriate), "category" and "url" as a simple
 * baseline. It is important to provide a value for "category" where possible,
 * most ideally as a well known URL from Wikipedia or Wikidata. In the case of
 * the 2019-2020 Coronavirus pandemic, this should be
 * "https://en.wikipedia.org/w/index.php?title=2019-20_coronavirus_pandemic"
 * or "https://www.wikidata.org/wiki/Q81068910". For many of the possible
 * properties, values can either be simple links or an inline description,
 * depending on whether a summary is available. For a link, provide just the
 * URL of the appropriate page as the property's value. For an inline
 * description, use a WebContent type, and provide the url as a property of
 * that, alongside at least a simple "text" summary of the page. It is
 * unlikely that a single SpecialAnnouncement will need all of the possible
 * properties simultaneously. We expect that in many cases the page referenced
 * might contain more specialized structured data, e.g. contact info,
 * openingHours, Event, FAQPage etc. By linking to those pages from a
 * SpecialAnnouncement you can help make it clearer that the events are
 * related to the situation (e.g. Coronavirus) indicated by the category
 * property of the SpecialAnnouncement. Many SpecialAnnouncements will relate
 * to particular regions and to identifiable local organizations. Use
 * spatialCoverage for the region, and announcementLocation to indicate
 * specific LocalBusinesses and CivicStructures. If the announcement affects
 * both a particular region and a specific location (for example, a library
 * closure that serves an entire region), use both spatialCoverage and
 * announcementLocation. The about property can be used to indicate entities
 * that are the focus of the announcement. We now recommend using about only
 * for representing non-location entities (e.g. a Course or a RadioStation).
 * For places, use announcementLocation and spatialCoverage. Consumers of this
 * markup should be aware that the initial design encouraged the use of /about
 * for locations too. The basic content of SpecialAnnouncement is similar to
 * that of an RSS or Atom feed. For publishers without such feeds, basic
 * feed-like information can be shared by posting SpecialAnnouncement updates
 * in a page, e.g. using JSON-LD. For sites with Atom/RSS functionality, you
 * can point to a feed with the webFeed property. This can be a simple URL, or
 * an inline DataFeed object, with encodingFormat providing media type
 * information e.g. "application/rss+xml" or "application/atom+xml".
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/SpecialAnnouncement
 */
class SpecialAnnouncement extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'SpecialAnnouncement';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/SpecialAnnouncement';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A SpecialAnnouncement combines a simple date-stamped textual information update with contextualized Web links and other structured data. It represents an information update made by a locally-oriented organization, for example schools, pharmacies, healthcare providers, community groups, police, local government. For work in progress guidelines on Coronavirus-related markup see this doc. The motivating scenario for SpecialAnnouncement is the Coronavirus pandemic, and the initial vocabulary is oriented to this urgent situation. Schema.org expect to improve the markup iteratively as it is deployed and as feedback emerges from use. In addition to our usual Github entry, feedback comments can also be provided in this document. While this schema is designed to communicate urgent crisis-related information, it is not the same as an emergency warning technology like CAP, although there may be overlaps. The intent is to cover the kinds of everyday practical information being posted to existing websites during an emergency situation. Several kinds of information can be provided: We encourage the provision of "name", "text", "datePosted", "expires" (if appropriate), "category" and "url" as a simple baseline. It is important to provide a value for "category" where possible, most ideally as a well known URL from Wikipedia or Wikidata. In the case of the 2019-2020 Coronavirus pandemic, this should be "https://en.wikipedia.org/w/index.php?title=2019-20_coronavirus_pandemic" or "https://www.wikidata.org/wiki/Q81068910". For many of the possible properties, values can either be simple links or an inline description, depending on whether a summary is available. For a link, provide just the URL of the appropriate page as the property\'s value. For an inline description, use a WebContent type, and provide the url as a property of that, alongside at least a simple "text" summary of the page. It is unlikely that a single SpecialAnnouncement will need all of the possible properties simultaneously. We expect that in many cases the page referenced might contain more specialized structured data, e.g. contact info, openingHours, Event, FAQPage etc. By linking to those pages from a SpecialAnnouncement you can help make it clearer that the events are related to the situation (e.g. Coronavirus) indicated by the category property of the SpecialAnnouncement. Many SpecialAnnouncements will relate to particular regions and to identifiable local organizations. Use spatialCoverage for the region, and announcementLocation to indicate specific LocalBusinesses and CivicStructures. If the announcement affects both a particular region and a specific location (for example, a library closure that serves an entire region), use both spatialCoverage and announcementLocation. The about property can be used to indicate entities that are the focus of the announcement. We now recommend using about only for representing non-location entities (e.g. a Course or a RadioStation). For places, use announcementLocation and spatialCoverage. Consumers of this markup should be aware that the initial design encouraged the use of /about for locations too. The basic content of SpecialAnnouncement is similar to that of an RSS or Atom feed. For publishers without such feeds, basic feed-like information can be shared by posting SpecialAnnouncement updates in a page, e.g. using JSON-LD. For sites with Atom/RSS functionality, you can point to a feed with the webFeed property. This can be a simple URL, or an inline DataFeed object, with encodingFormat providing media type information e.g. "application/rss+xml" or "application/atom+xml".';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================
    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'announcementLocation',
        'category',
        'datePosted',
        'diseasePreventionInfo',
        'diseaseSpreadStatistics',
        'gettingTestedInfo',
        'newsUpdatesAndGuidelines',
        'publicTransportClosuresInfo',
        'quarantineGuidelines',
        'schoolClosuresInfo',
        'travelBans',
        'webFeed'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'announcementLocation' => ['CivicStructure', 'LocalBusiness'],
        'category' => ['PhysicalActivityCategory', 'Text', 'Thing'],
        'datePosted' => ['Date', 'DateTime'],
        'diseasePreventionInfo' => ['URL', 'WebContent'],
        'diseaseSpreadStatistics' => ['Dataset', 'Observation', 'URL', 'WebContent'],
        'gettingTestedInfo' => ['URL', 'WebContent'],
        'newsUpdatesAndGuidelines' => ['URL', 'WebContent'],
        'publicTransportClosuresInfo' => ['URL', 'WebContent'],
        'quarantineGuidelines' => ['URL', 'WebContent'],
        'schoolClosuresInfo' => ['URL', 'WebContent'],
        'travelBans' => ['URL', 'WebContent'],
        'webFeed' => ['DataFeed', 'URL']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'announcementLocation' => 'Indicates a specific CivicStructure or LocalBusiness associated with the SpecialAnnouncement. For example, a specific testing facility or business with special opening hours. For a larger geographic region like a quarantine of an entire region, use spatialCoverage.',
        'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
        'datePosted' => 'Publication date of an online listing.',
        'diseasePreventionInfo' => 'Information about disease prevention.',
        'diseaseSpreadStatistics' => 'Statistical information about the spread of a disease, either as WebContent, or described directly as a Dataset, or the specific Observations in the dataset. When a WebContent URL is provided, the page indicated might also contain more such markup.',
        'gettingTestedInfo' => 'Information about getting tested (for a MedicalCondition), e.g. in the context of a pandemic.',
        'newsUpdatesAndGuidelines' => 'Indicates a page with news updates and guidelines. This could often be (but is not required to be) the main page containing SpecialAnnouncement markup on a site.',
        'publicTransportClosuresInfo' => 'Information about public transport closures.',
        'quarantineGuidelines' => 'Guidelines about quarantine rules, e.g. in the context of a pandemic.',
        'schoolClosuresInfo' => 'Information about school closures.',
        'travelBans' => 'Information about travel bans, e.g. in the context of a pandemic.',
        'webFeed' => 'The URL for a feed, e.g. associated with a podcast series, blog, or series of date-stamped updates. This is usually RSS or Atom.'
    ];
    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];
    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];
    /**
     * Indicates a specific CivicStructure or LocalBusiness associated with the
     * SpecialAnnouncement. For example, a specific testing facility or business
     * with special opening hours. For a larger geographic region like a
     * quarantine of an entire region, use spatialCoverage.
     *
     * @var mixed|CivicStructure|LocalBusiness [schema.org types: CivicStructure, LocalBusiness]
     */
    public $announcementLocation;
    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var mixed|PhysicalActivityCategory|string|Thing [schema.org types: PhysicalActivityCategory, Text, Thing]
     */
    public $category;
    /**
     * Publication date of an online listing.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $datePosted;
    /**
     * Information about disease prevention.
     *
     * @var mixed|string|WebContent [schema.org types: URL, WebContent]
     */
    public $diseasePreventionInfo;
    /**
     * Statistical information about the spread of a disease, either as
     * WebContent, or described directly as a Dataset, or the specific
     * Observations in the dataset. When a WebContent URL is provided, the page
     * indicated might also contain more such markup.
     *
     * @var mixed|Dataset|Observation|string|WebContent [schema.org types: Dataset, Observation, URL, WebContent]
     */
    public $diseaseSpreadStatistics;
    /**
     * Information about getting tested (for a MedicalCondition), e.g. in the
     * context of a pandemic.
     *
     * @var mixed|string|WebContent [schema.org types: URL, WebContent]
     */
    public $gettingTestedInfo;
    /**
     * Indicates a page with news updates and guidelines. This could often be (but
     * is not required to be) the main page containing SpecialAnnouncement markup
     * on a site.
     *
     * @var mixed|string|WebContent [schema.org types: URL, WebContent]
     */
    public $newsUpdatesAndGuidelines;

    // Static Protected Properties
    // =========================================================================
    /**
     * Information about public transport closures.
     *
     * @var mixed|string|WebContent [schema.org types: URL, WebContent]
     */
    public $publicTransportClosuresInfo;
    /**
     * Guidelines about quarantine rules, e.g. in the context of a pandemic.
     *
     * @var mixed|string|WebContent [schema.org types: URL, WebContent]
     */
    public $quarantineGuidelines;
    /**
     * Information about school closures.
     *
     * @var mixed|string|WebContent [schema.org types: URL, WebContent]
     */
    public $schoolClosuresInfo;
    /**
     * Information about travel bans, e.g. in the context of a pandemic.
     *
     * @var mixed|string|WebContent [schema.org types: URL, WebContent]
     */
    public $travelBans;
    /**
     * The URL for a feed, e.g. associated with a podcast series, blog, or series
     * of date-stamped updates. This is usually RSS or Atom.
     *
     * @var mixed|DataFeed|string [schema.org types: DataFeed, URL]
     */
    public $webFeed;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['announcementLocation', 'category', 'datePosted', 'diseasePreventionInfo', 'diseaseSpreadStatistics', 'gettingTestedInfo', 'newsUpdatesAndGuidelines', 'publicTransportClosuresInfo', 'quarantineGuidelines', 'schoolClosuresInfo', 'travelBans', 'webFeed'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
