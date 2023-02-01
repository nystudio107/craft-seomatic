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
 * Trait for Thesis.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Thesis
 */
trait ThesisTrait
{
    /**
     * Qualification, candidature, degree, application that Thesis supports.
     *
     * @var string|Text
     */
    public $inSupportOf;
}
