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
 * Trait for MedicalConditionStage.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalConditionStage
 */
trait MedicalConditionStageTrait
{
    /**
     * The substage, e.g. 'a' for Stage IIIa.
     *
     * @var string|array|Text|Text[]
     */
    public $subStageSuffix;

    /**
     * The stage represented as a number, e.g. 3.
     *
     * @var float|array|Number|Number[]
     */
    public $stageAsNumber;
}
