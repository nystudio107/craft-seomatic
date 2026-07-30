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
 * schema.org version: v30.0
 * Trait for DefinedTermSet.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DefinedTermSet
 */
trait DefinedTermSetTrait
{
    /**
     * The subject matter of an object.
     *
     * @var array|Thing|Thing[]
     */
    public $about;

    /**
     * A Defined Term contained in this term set.
     *
     * @var array|DefinedTerm|DefinedTerm[]
     */
    public $hasDefinedTerm;
}
