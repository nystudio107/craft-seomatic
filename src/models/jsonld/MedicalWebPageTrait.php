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
 * Trait for MedicalWebPage.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalWebPage
 */

trait MedicalWebPageTrait
{
    
    /**
     * An aspect of medical practice that is considered on the page, such as
     * 'diagnosis', 'treatment', 'causes', 'prognosis', 'etiology',
     * 'epidemiology', etc.
     *
     * @var string|Text
     */
    public $aspect;

    /**
     * Medical audience for page.
     *
     * @var MedicalAudienceType|MedicalAudience
     */
    public $medicalAudience;

}
