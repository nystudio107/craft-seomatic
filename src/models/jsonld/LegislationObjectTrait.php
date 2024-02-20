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
 * Trait for LegislationObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LegislationObject
 */
trait LegislationObjectTrait
{
    /**
     * The legal value of this legislation file. The same legislation can be
     * written in multiple files with different legal values. Typically a
     * digitally signed PDF have a "stronger" legal value than the HTML file of
     * the same act.
     *
     * @var array|LegalValueLevel|LegalValueLevel[]
     */
    public $legislationLegalValue;
}
