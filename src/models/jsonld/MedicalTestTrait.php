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
 * Trait for MedicalTest.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalTest
 */
trait MedicalTestTrait
{
    /**
     * Drugs that affect the test's results.
     *
     * @var array|Drug|Drug[]
     */
    public $affectedBy;

    /**
     * Range of acceptable values for a typical patient, when applicable.
     *
     * @var string|array|MedicalEnumeration|MedicalEnumeration[]|array|Text|Text[]
     */
    public $normalRange;

    /**
     * A sign detected by the test.
     *
     * @var array|MedicalSign|MedicalSign[]
     */
    public $signDetected;

    /**
     * A condition the test is used to diagnose.
     *
     * @var array|MedicalCondition|MedicalCondition[]
     */
    public $usedToDiagnose;

    /**
     * Device used to perform the test.
     *
     * @var array|MedicalDevice|MedicalDevice[]
     */
    public $usesDevice;
}
