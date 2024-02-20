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
 * Trait for MedicalProcedure.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalProcedure
 */
trait MedicalProcedureTrait
{
    /**
     * The type of procedure, for example Surgical, Noninvasive, or Percutaneous.
     *
     * @var array|MedicalProcedureType|MedicalProcedureType[]
     */
    public $procedureType;

    /**
     * Typical or recommended followup care after the procedure is performed.
     *
     * @var string|array|Text|Text[]
     */
    public $followup;

    /**
     * The status of the study (enumerated).
     *
     * @var string|array|MedicalStudyStatus|MedicalStudyStatus[]|array|EventStatusType|EventStatusType[]|array|Text|Text[]
     */
    public $status;

    /**
     * How the procedure is performed.
     *
     * @var string|array|Text|Text[]
     */
    public $howPerformed;

    /**
     * Location in the body of the anatomical structure.
     *
     * @var string|array|Text|Text[]
     */
    public $bodyLocation;

    /**
     * Typical preparation that a patient must undergo before having the procedure
     * performed.
     *
     * @var string|array|MedicalEntity|MedicalEntity[]|array|Text|Text[]
     */
    public $preparation;
}
