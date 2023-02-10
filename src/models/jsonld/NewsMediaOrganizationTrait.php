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
 * Trait for NewsMediaOrganization.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/NewsMediaOrganization
 */
trait NewsMediaOrganizationTrait
{
    /**
     * For an [[Organization]] (often but not necessarily a
     * [[NewsMediaOrganization]]), a description of organizational ownership
     * structure; funding and grants. In a news/media setting, this is with
     * particular reference to editorial independence.   Note that the [[funder]]
     * is also available and can be used to make basic funder information
     * machine-readable.
     *
     * @var string|AboutPage|Text|CreativeWork|URL
     */
    public $ownershipFundingInfo;

    /**
     * For a [[NewsMediaOrganization]], a statement on coverage priorities,
     * including any public agenda or stance on issues.
     *
     * @var CreativeWork|URL
     */
    public $missionCoveragePrioritiesPolicy;

    /**
     * For a [[NewsMediaOrganization]] or other news-related [[Organization]], a
     * statement about public engagement activities (for news media, the
     * newsroom’s), including involving the public - digitally or otherwise --
     * in coverage decisions, reporting and activities after publication.
     *
     * @var CreativeWork|URL
     */
    public $actionableFeedbackPolicy;

    /**
     * For a [[NewsMediaOrganization]] or other news-related [[Organization]], a
     * statement explaining when authors of articles are not named in bylines.
     *
     * @var CreativeWork|URL
     */
    public $noBylinesPolicy;

    /**
     * For a [[NewsMediaOrganization]], a link to the masthead page or a page
     * listing top editorial management.
     *
     * @var URL|CreativeWork
     */
    public $masthead;

    /**
     * For an [[Organization]] (often but not necessarily a
     * [[NewsMediaOrganization]]), a report on staffing diversity issues. In a
     * news context this might be for example ASNE or RTDNA (US) reports, or
     * self-reported.
     *
     * @var Article|URL
     */
    public $diversityStaffingReport;

    /**
     * For an [[Organization]] (typically a [[NewsMediaOrganization]]), a
     * statement about policy on use of unnamed sources and the decision process
     * required.
     *
     * @var CreativeWork|URL
     */
    public $unnamedSourcesPolicy;

    /**
     * Statement on diversity policy by an [[Organization]] e.g. a
     * [[NewsMediaOrganization]]. For a [[NewsMediaOrganization]], a statement
     * describing the newsroom’s diversity policy on both staffing and sources,
     * typically providing staffing data.
     *
     * @var URL|CreativeWork
     */
    public $diversityPolicy;

    /**
     * Disclosure about verification and fact-checking processes for a
     * [[NewsMediaOrganization]] or other fact-checking [[Organization]].
     *
     * @var CreativeWork|URL
     */
    public $verificationFactCheckingPolicy;

    /**
     * Statement about ethics policy, e.g. of a [[NewsMediaOrganization]]
     * regarding journalistic and publishing practices, or of a [[Restaurant]], a
     * page describing food source policies. In the case of a
     * [[NewsMediaOrganization]], an ethicsPolicy is typically a statement
     * describing the personal, organizational, and corporate standards of
     * behavior expected by the organization.
     *
     * @var CreativeWork|URL
     */
    public $ethicsPolicy;

    /**
     * For an [[Organization]] (e.g. [[NewsMediaOrganization]]), a statement
     * describing (in news media, the newsroom’s) disclosure and correction
     * policy for errors.
     *
     * @var URL|CreativeWork
     */
    public $correctionsPolicy;
}
