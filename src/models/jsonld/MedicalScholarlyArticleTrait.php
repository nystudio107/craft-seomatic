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
 * Trait for MedicalScholarlyArticle.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalScholarlyArticle
 */
trait MedicalScholarlyArticleTrait
{
    /**
     * The type of the medical article, taken from the US NLM MeSH publication
     * type catalog. See also [MeSH
     * documentation](http://www.nlm.nih.gov/mesh/pubtypes.html).
     *
     * @var string|array|Text|Text[]
     */
    public $publicationType;
}
