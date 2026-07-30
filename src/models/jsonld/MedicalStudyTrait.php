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
 * Trait for MedicalStudy.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalStudy
 */
trait MedicalStudyTrait
{
    /**
     * Specifying the health condition(s) of a patient, medical study, or other
     * target audience.
     *
     * @var array|MedicalCondition|MedicalCondition[]
     */
    public $healthCondition;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. E.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $sponsor;

    /**
     * The status of the study (enumerated).
     *
     * @var string|array|EventStatusType|EventStatusType[]|array|MedicalStudyStatus|MedicalStudyStatus[]|array|Text|Text[]
     */
    public $status;

    /**
     * The location in which the study is taking/took place.
     *
     * @var array|AdministrativeArea|AdministrativeArea[]
     */
    public $studyLocation;

    /**
     * A subject of the study, i.e. one of the medical conditions, therapies,
     * devices, drugs, etc. investigated by the study.
     *
     * @var array|MedicalEntity|MedicalEntity[]
     */
    public $studySubject;
}
