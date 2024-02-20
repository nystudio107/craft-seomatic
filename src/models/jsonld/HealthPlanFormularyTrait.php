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
 * Trait for HealthPlanFormulary.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HealthPlanFormulary
 */
trait HealthPlanFormularyTrait
{
    /**
     * Whether prescriptions can be delivered by mail.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $offersPrescriptionByMail;

    /**
     * The costs to the patient for services under this network or formulary.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $healthPlanCostSharing;

    /**
     * The tier(s) of drugs offered by this formulary or insurance plan.
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanDrugTier;
}
