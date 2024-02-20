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
 * Trait for NewsMediaOrganization.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/NewsMediaOrganization
 */
trait NewsMediaOrganizationTrait
{
    /**
     * For a [[NewsMediaOrganization]], a statement on coverage priorities,
     * including any public agenda or stance on issues.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $missionCoveragePrioritiesPolicy;

    /**
     * Statement on diversity policy by an [[Organization]] e.g. a
     * [[NewsMediaOrganization]]. For a [[NewsMediaOrganization]], a statement
     * describing the newsroom’s diversity policy on both staffing and sources,
     * typically providing staffing data.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $diversityPolicy;

    /**
     * For an [[Organization]] (often but not necessarily a
     * [[NewsMediaOrganization]]), a description of organizational ownership
     * structure; funding and grants. In a news/media setting, this is with
     * particular reference to editorial independence.   Note that the [[funder]]
     * is also available and can be used to make basic funder information
     * machine-readable.
     *
     * @var string|array|AboutPage|AboutPage[]|array|Text|Text[]|array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $ownershipFundingInfo;

    /**
     * For an [[Organization]] (e.g. [[NewsMediaOrganization]]), a statement
     * describing (in news media, the newsroom’s) disclosure and correction
     * policy for errors.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $correctionsPolicy;

    /**
     * For a [[NewsMediaOrganization]] or other news-related [[Organization]], a
     * statement explaining when authors of articles are not named in bylines.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $noBylinesPolicy;

    /**
     * Statement about ethics policy, e.g. of a [[NewsMediaOrganization]]
     * regarding journalistic and publishing practices, or of a [[Restaurant]], a
     * page describing food source policies. In the case of a
     * [[NewsMediaOrganization]], an ethicsPolicy is typically a statement
     * describing the personal, organizational, and corporate standards of
     * behavior expected by the organization.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $ethicsPolicy;

    /**
     * For a [[NewsMediaOrganization]], a link to the masthead page or a page
     * listing top editorial management.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $masthead;

    /**
     * Disclosure about verification and fact-checking processes for a
     * [[NewsMediaOrganization]] or other fact-checking [[Organization]].
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $verificationFactCheckingPolicy;

    /**
     * For an [[Organization]] (typically a [[NewsMediaOrganization]]), a
     * statement about policy on use of unnamed sources and the decision process
     * required.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $unnamedSourcesPolicy;

    /**
     * For a [[NewsMediaOrganization]] or other news-related [[Organization]], a
     * statement about public engagement activities (for news media, the
     * newsroom’s), including involving the public - digitally or otherwise --
     * in coverage decisions, reporting and activities after publication.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $actionableFeedbackPolicy;

    /**
     * For an [[Organization]] (often but not necessarily a
     * [[NewsMediaOrganization]]), a report on staffing diversity issues. In a
     * news context this might be for example ASNE or RTDNA (US) reports, or
     * self-reported.
     *
     * @var array|Article|Article[]|array|URL|URL[]
     */
    public $diversityStaffingReport;
}
