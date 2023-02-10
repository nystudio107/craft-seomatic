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
 * Trait for MedicalWebPage.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalWebPage
 */
trait MedicalWebPageTrait
{
    /**
     * Medical audience for page.
     *
     * @var MedicalAudience|MedicalAudienceType
     */
    public $medicalAudience;

    /**
     * An aspect of medical practice that is considered on the page, such as
     * 'diagnosis', 'treatment', 'causes', 'prognosis', 'etiology',
     * 'epidemiology', etc.
     *
     * @var string|Text
     */
    public $aspect;
}
