<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for MedicalSign.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalSign
 */

trait MedicalSignTrait
{
    
    /**
     * A diagnostic test that can identify this sign.
     *
     * @var MedicalTest
     */
    public $identifyingTest;

    /**
     * A physical examination that can identify this sign.
     *
     * @var PhysicalExam
     */
    public $identifyingExam;

}
