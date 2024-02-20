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
 * Trait for MedicalGuideline.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalGuideline
 */
trait MedicalGuidelineTrait
{
    /**
     * Date on which this guideline's recommendation was made.
     *
     * @var array|Date|Date[]
     */
    public $guidelineDate;

    /**
     * Strength of evidence of the data used to formulate the guideline
     * (enumerated).
     *
     * @var array|MedicalEvidenceLevel|MedicalEvidenceLevel[]
     */
    public $evidenceLevel;

    /**
     * The medical conditions, treatments, etc. that are the subject of the
     * guideline.
     *
     * @var array|MedicalEntity|MedicalEntity[]
     */
    public $guidelineSubject;

    /**
     * Source of the data used to formulate the guidance, e.g. RCT, consensus
     * opinion, etc.
     *
     * @var string|array|Text|Text[]
     */
    public $evidenceOrigin;
}
