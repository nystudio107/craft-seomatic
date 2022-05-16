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
 * Trait for HealthInsurancePlan.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HealthInsurancePlan
 */

trait HealthInsurancePlanTrait
{
    
    /**
     * Formularies covered by this plan.
     *
     * @var HealthPlanFormulary
     */
    public $includesHealthPlanFormulary;

    /**
     * The URL that goes directly to the summary of benefits and coverage for the
     * specific standard plan or plan variation.
     *
     * @var URL
     */
    public $benefitsSummaryUrl;

    /**
     * TODO.
     *
     * @var string|Text
     */
    public $healthPlanDrugOption;

    /**
     * The tier(s) of drugs offered by this formulary or insurance plan.
     *
     * @var string|Text
     */
    public $healthPlanDrugTier;

    /**
     * The 14-character, HIOS-generated Plan ID number. (Plan IDs must be unique,
     * even across different markets.)
     *
     * @var string|Text
     */
    public $healthPlanId;

    /**
     * A contact point for a person or organization.
     *
     * @var ContactPoint
     */
    public $contactPoint;

    /**
     * The standard for interpreting thePlan ID. The preferred is "HIOS". See the
     * Centers for Medicare & Medicaid Services for more details.
     *
     * @var string|URL|Text
     */
    public $usesHealthPlanIdStandard;

    /**
     * Networks covered by this plan.
     *
     * @var HealthPlanNetwork
     */
    public $includesHealthPlanNetwork;

    /**
     * The URL that goes directly to the plan brochure for the specific standard
     * plan or plan variation.
     *
     * @var URL
     */
    public $healthPlanMarketingUrl;

}
