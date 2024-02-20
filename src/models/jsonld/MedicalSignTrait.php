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
 * Trait for MedicalSign.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalSign
 */
trait MedicalSignTrait
{
    /**
     * A physical examination that can identify this sign.
     *
     * @var array|PhysicalExam|PhysicalExam[]
     */
    public $identifyingExam;

    /**
     * A diagnostic test that can identify this sign.
     *
     * @var array|MedicalTest|MedicalTest[]
     */
    public $identifyingTest;
}
