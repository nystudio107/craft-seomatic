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

use nystudio107\seomatic\models\jsonld\Organization;

/**
 * NewsMediaOrganization - A News/Media organization such as a newspaper or TV
 * station.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/NewsMediaOrganization
 */
class NewsMediaOrganization extends Organization
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'NewsMediaOrganization';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/NewsMediaOrganization';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A News/Media organization such as a newspaper or TV station.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Organization';

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
        'actionableFeedbackPolicy',
        'correctionsPolicy',
        'diversityPolicy',
        'diversityStaffingReport',
        'ethicsPolicy',
        'masthead',
        'missionCoveragePrioritiesPolicy',
        'noBylinesPolicy',
        'ownershipFundingInfo',
        'unnamedSourcesPolicy',
        'verificationFactCheckingPolicy'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'actionableFeedbackPolicy' => ['CreativeWork', 'URL'],
        'correctionsPolicy' => ['CreativeWork', 'URL'],
        'diversityPolicy' => ['CreativeWork', 'URL'],
        'diversityStaffingReport' => ['Article', 'URL'],
        'ethicsPolicy' => ['CreativeWork', 'URL'],
        'masthead' => ['CreativeWork', 'URL'],
        'missionCoveragePrioritiesPolicy' => ['CreativeWork', 'URL'],
        'noBylinesPolicy' => ['CreativeWork', 'URL'],
        'ownershipFundingInfo' => ['AboutPage', 'CreativeWork', 'Text', 'URL'],
        'unnamedSourcesPolicy' => ['CreativeWork', 'URL'],
        'verificationFactCheckingPolicy' => ['CreativeWork', 'URL']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'actionableFeedbackPolicy' => 'For a NewsMediaOrganization or other news-related Organization, a statement about public engagement activities (for news media, the newsroom’s), including involving the public - digitally or otherwise -- in coverage decisions, reporting and activities after publication.',
        'correctionsPolicy' => 'For an Organization (e.g. NewsMediaOrganization), a statement describing (in news media, the newsroom’s) disclosure and correction policy for errors.',
        'diversityPolicy' => 'Statement on diversity policy by an Organization e.g. a NewsMediaOrganization. For a NewsMediaOrganization, a statement describing the newsroom’s diversity policy on both staffing and sources, typically providing staffing data.',
        'diversityStaffingReport' => 'For an Organization (often but not necessarily a NewsMediaOrganization), a report on staffing diversity issues. In a news context this might be for example ASNE or RTDNA (US) reports, or self-reported.',
        'ethicsPolicy' => 'Statement about ethics policy, e.g. of a NewsMediaOrganization regarding journalistic and publishing practices, or of a Restaurant, a page describing food source policies. In the case of a NewsMediaOrganization, an ethicsPolicy is typically a statement describing the personal, organizational, and corporate standards of behavior expected by the organization.',
        'masthead' => 'For a NewsMediaOrganization, a link to the masthead page or a page listing top editorial management.',
        'missionCoveragePrioritiesPolicy' => 'For a NewsMediaOrganization, a statement on coverage priorities, including any public agenda or stance on issues.',
        'noBylinesPolicy' => 'For a NewsMediaOrganization or other news-related Organization, a statement explaining when authors of articles are not named in bylines.',
        'ownershipFundingInfo' => 'For an Organization (often but not necessarily a NewsMediaOrganization), a description of organizational ownership structure; funding and grants. In a news/media setting, this is with particular reference to editorial independence. Note that the funder is also available and can be used to make basic funder information machine-readable.',
        'unnamedSourcesPolicy' => 'For an Organization (typically a NewsMediaOrganization), a statement about policy on use of unnamed sources and the decision process required.',
        'verificationFactCheckingPolicy' => 'Disclosure about verification and fact-checking processes for a NewsMediaOrganization or other fact-checking Organization.'
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
     * For a NewsMediaOrganization or other news-related Organization, a statement
     * about public engagement activities (for news media, the newsroom’s),
     * including involving the public - digitally or otherwise -- in coverage
     * decisions, reporting and activities after publication.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $actionableFeedbackPolicy;
    /**
     * For an Organization (e.g. NewsMediaOrganization), a statement describing
     * (in news media, the newsroom’s) disclosure and correction policy for
     * errors.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $correctionsPolicy;
    /**
     * Statement on diversity policy by an Organization e.g. a
     * NewsMediaOrganization. For a NewsMediaOrganization, a statement describing
     * the newsroom’s diversity policy on both staffing and sources, typically
     * providing staffing data.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $diversityPolicy;
    /**
     * For an Organization (often but not necessarily a NewsMediaOrganization), a
     * report on staffing diversity issues. In a news context this might be for
     * example ASNE or RTDNA (US) reports, or self-reported.
     *
     * @var mixed|Article|string [schema.org types: Article, URL]
     */
    public $diversityStaffingReport;
    /**
     * Statement about ethics policy, e.g. of a NewsMediaOrganization regarding
     * journalistic and publishing practices, or of a Restaurant, a page
     * describing food source policies. In the case of a NewsMediaOrganization, an
     * ethicsPolicy is typically a statement describing the personal,
     * organizational, and corporate standards of behavior expected by the
     * organization.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $ethicsPolicy;
    /**
     * For a NewsMediaOrganization, a link to the masthead page or a page listing
     * top editorial management.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $masthead;

    // Static Protected Properties
    // =========================================================================
    /**
     * For a NewsMediaOrganization, a statement on coverage priorities, including
     * any public agenda or stance on issues.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $missionCoveragePrioritiesPolicy;
    /**
     * For a NewsMediaOrganization or other news-related Organization, a statement
     * explaining when authors of articles are not named in bylines.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $noBylinesPolicy;
    /**
     * For an Organization (often but not necessarily a NewsMediaOrganization), a
     * description of organizational ownership structure; funding and grants. In a
     * news/media setting, this is with particular reference to editorial
     * independence. Note that the funder is also available and can be used to
     * make basic funder information machine-readable.
     *
     * @var mixed|AboutPage|CreativeWork|string|string [schema.org types: AboutPage, CreativeWork, Text, URL]
     */
    public $ownershipFundingInfo;
    /**
     * For an Organization (typically a NewsMediaOrganization), a statement about
     * policy on use of unnamed sources and the decision process required.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $unnamedSourcesPolicy;
    /**
     * Disclosure about verification and fact-checking processes for a
     * NewsMediaOrganization or other fact-checking Organization.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $verificationFactCheckingPolicy;

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
            [['actionableFeedbackPolicy', 'correctionsPolicy', 'diversityPolicy', 'diversityStaffingReport', 'ethicsPolicy', 'masthead', 'missionCoveragePrioritiesPolicy', 'noBylinesPolicy', 'ownershipFundingInfo', 'unnamedSourcesPolicy', 'verificationFactCheckingPolicy'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
