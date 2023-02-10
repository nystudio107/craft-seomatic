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
 * Trait for MedicalGuideline.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalGuideline
 */
trait MedicalGuidelineTrait
{
    /**
     * Strength of evidence of the data used to formulate the guideline
     * (enumerated).
     *
     * @var MedicalEvidenceLevel
     */
    public $evidenceLevel;

    /**
     * The medical conditions, treatments, etc. that are the subject of the
     * guideline.
     *
     * @var MedicalEntity
     */
    public $guidelineSubject;

    /**
     * Date on which this guideline's recommendation was made.
     *
     * @var Date
     */
    public $guidelineDate;

    /**
     * Source of the data used to formulate the guidance, e.g. RCT, consensus
     * opinion, etc.
     *
     * @var string|Text
     */
    public $evidenceOrigin;
}
