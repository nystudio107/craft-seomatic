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
 * Trait for MedicalCode.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalCode
 */
trait MedicalCodeTrait
{
    /**
     * A short textual code that uniquely identifies the value.
     *
     * @var string|array|Text|Text[]
     */
    public $codeValue;

    /**
     * The coding system, e.g. 'ICD-10'.
     *
     * @var string|array|Text|Text[]
     */
    public $codingSystem;
}
