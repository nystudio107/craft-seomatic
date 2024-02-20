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
 * Trait for HowToSection.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HowToSection
 */
trait HowToSectionTrait
{
    /**
     * A single step item (as HowToStep, text, document, video, etc.) or a
     * HowToSection (originally misnamed 'steps'; 'step' is preferred).
     *
     * @var string|array|Text|Text[]|array|CreativeWork|CreativeWork[]|array|ItemList|ItemList[]
     */
    public $steps;
}
