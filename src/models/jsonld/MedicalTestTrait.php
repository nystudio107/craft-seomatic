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
 * Trait for MedicalTest.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalTest
 */
trait MedicalTestTrait
{
    /**
     * A sign detected by the test.
     *
     * @var array|MedicalSign|MedicalSign[]
     */
    public $signDetected;

    /**
     * Range of acceptable values for a typical patient, when applicable.
     *
     * @var string|array|MedicalEnumeration|MedicalEnumeration[]|array|Text|Text[]
     */
    public $normalRange;

    /**
     * Device used to perform the test.
     *
     * @var array|MedicalDevice|MedicalDevice[]
     */
    public $usesDevice;

    /**
     * A condition the test is used to diagnose.
     *
     * @var array|MedicalCondition|MedicalCondition[]
     */
    public $usedToDiagnose;

    /**
     * Drugs that affect the test's results.
     *
     * @var array|Drug|Drug[]
     */
    public $affectedBy;
}
