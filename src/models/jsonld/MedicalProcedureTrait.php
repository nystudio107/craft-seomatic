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
 * Trait for MedicalProcedure.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalProcedure
 */
trait MedicalProcedureTrait
{
    /**
     * Location in the body of the anatomical structure.
     *
     * @var string|array|Text|Text[]
     */
    public $bodyLocation;

    /**
     * Typical or recommended followup care after the procedure is performed.
     *
     * @var string|array|Text|Text[]
     */
    public $followup;

    /**
     * How the procedure is performed.
     *
     * @var string|array|Text|Text[]
     */
    public $howPerformed;

    /**
     * Typical preparation that a patient must undergo before having the procedure
     * performed.
     *
     * @var string|array|MedicalEntity|MedicalEntity[]|array|Text|Text[]
     */
    public $preparation;

    /**
     * The type of procedure, for example Surgical, Noninvasive, or Percutaneous.
     *
     * @var array|MedicalProcedureType|MedicalProcedureType[]
     */
    public $procedureType;

    /**
     * The status of the study (enumerated).
     *
     * @var string|array|EventStatusType|EventStatusType[]|array|MedicalStudyStatus|MedicalStudyStatus[]|array|Text|Text[]
     */
    public $status;
}
