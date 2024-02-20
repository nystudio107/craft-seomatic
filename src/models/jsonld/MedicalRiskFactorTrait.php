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
 * Trait for MedicalRiskFactor.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalRiskFactor
 */
trait MedicalRiskFactorTrait
{
    /**
     * The condition, complication, etc. influenced by this factor.
     *
     * @var array|MedicalEntity|MedicalEntity[]
     */
    public $increasesRiskOf;
}
