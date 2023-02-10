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
     * @var Drug
     */
    public $affectedBy;

    /**
     * Range of acceptable values for a typical patient, when applicable.
     *
     * @var string|Text|MedicalEnumeration
     */
    public $normalRange;

    /**
     * A sign detected by the test.
     *
     * @var MedicalSign
     */
    public $signDetected;

    /**
     * A condition the test is used to diagnose.
     *
     * @var MedicalCondition
     */
    public $usedToDiagnose;

    /**
     * Device used to perform the test.
     *
     * @var MedicalDevice
     */
    public $usesDevice;
}
