<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for DefinedTerm.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DefinedTerm
 */
trait DefinedTermTrait
{
    /**
     * A [[DefinedTermSet]] that contains this term.
     *
     * @var DefinedTermSet|URL
     */
    public $inDefinedTermSet;

    /**
     * A code that identifies this [[DefinedTerm]] within a [[DefinedTermSet]]
     *
     * @var string|Text
     */
    public $termCode;
}
