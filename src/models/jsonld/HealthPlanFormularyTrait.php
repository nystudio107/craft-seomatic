<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for HealthPlanFormulary.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HealthPlanFormulary
 */
trait HealthPlanFormularyTrait
{
    /**
     * The costs to the patient for services under this network or formulary.
     *
     * @var bool|Boolean
     */
    public $healthPlanCostSharing;

    /**
     * Whether prescriptions can be delivered by mail.
     *
     * @var bool|Boolean
     */
    public $offersPrescriptionByMail;

    /**
     * The tier(s) of drugs offered by this formulary or insurance plan.
     *
     * @var string|Text
     */
    public $healthPlanDrugTier;
}
