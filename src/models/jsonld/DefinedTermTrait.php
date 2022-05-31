<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for DefinedTerm.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DefinedTerm
 */

trait DefinedTermTrait
{
    
    /**
     * A code that identifies this [[DefinedTerm]] within a [[DefinedTermSet]]
     *
     * @var string|Text
     */
    public $termCode;

    /**
     * A [[DefinedTermSet]] that contains this term.
     *
     * @var URL|DefinedTermSet
     */
    public $inDefinedTermSet;

}
