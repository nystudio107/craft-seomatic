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
 * Trait for HealthInsurancePlan.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HealthInsurancePlan
 */
trait HealthInsurancePlanTrait
{
    /**
     * The URL that goes directly to the summary of benefits and coverage for the
     * specific standard plan or plan variation.
     *
     * @var array|URL|URL[]
     */
    public $benefitsSummaryUrl;

    /**
     * A contact point for a person or organization.
     *
     * @var array|ContactPoint|ContactPoint[]
     */
    public $contactPoint;

    /**
     * TODO.
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanDrugOption;

    /**
     * The tier(s) of drugs offered by this formulary or insurance plan.
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanDrugTier;

    /**
     * The 14-character, HIOS-generated Plan ID number. (Plan IDs must be unique,
     * even across different markets.)
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanId;

    /**
     * The URL that goes directly to the plan brochure for the specific standard
     * plan or plan variation.
     *
     * @var array|URL|URL[]
     */
    public $healthPlanMarketingUrl;

    /**
     * Formularies covered by this plan.
     *
     * @var array|HealthPlanFormulary|HealthPlanFormulary[]
     */
    public $includesHealthPlanFormulary;

    /**
     * Networks covered by this plan.
     *
     * @var array|HealthPlanNetwork|HealthPlanNetwork[]
     */
    public $includesHealthPlanNetwork;

    /**
     * The standard for interpreting the Plan ID. The preferred is "HIOS". See the
     * Centers for Medicare & Medicaid Services for more details.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $usesHealthPlanIdStandard;
}
