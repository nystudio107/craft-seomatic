<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
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
     * @var MedicalCondition
     */
    public $healthCondition;

    /**
     * The status of the study (enumerated).
     *
     * @var string|Text|EventStatusType|MedicalStudyStatus
     */
    public $status;

    /**
     * A subject of the study, i.e. one of the medical conditions, therapies,
     * devices, drugs, etc. investigated by the study.
     *
     * @var MedicalEntity
     */
    public $studySubject;

    /**
     * The location in which the study is taking/took place.
     *
     * @var AdministrativeArea
     */
    public $studyLocation;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var Organization|Person
     */
    public $sponsor;

}
