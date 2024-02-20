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
 * Trait for LinkRole.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LinkRole
 */
trait LinkRoleTrait
{
    /**
     * Indicates the relationship type of a Web link.
     *
     * @var string|array|Text|Text[]
     */
    public $linkRelationship;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also
     * [[availableLanguage]].
     *
     * @var string|array|Text|Text[]|array|Language|Language[]
     */
    public $inLanguage;
}
