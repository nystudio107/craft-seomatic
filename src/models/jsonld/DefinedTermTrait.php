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
 * Trait for DefinedTerm.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DefinedTerm
 */
trait DefinedTermTrait
{
    /**
     * A code that identifies this [[DefinedTerm]] within a [[DefinedTermSet]].
     *
     * @var string|array|Text|Text[]
     */
    public $termCode;

    /**
     * A [[DefinedTermSet]] that contains this term.
     *
     * @var array|URL|URL[]|array|DefinedTermSet|DefinedTermSet[]
     */
    public $inDefinedTermSet;
}
