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
     * @var MedicalEntity
     */
    public $increasesRiskOf;
}
