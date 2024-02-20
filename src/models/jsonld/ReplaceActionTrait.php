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
 * Trait for ReplaceAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ReplaceAction
 */
trait ReplaceActionTrait
{
    /**
     * A sub property of object. The object that replaces.
     *
     * @var array|Thing|Thing[]
     */
    public $replacer;

    /**
     * A sub property of object. The object that is being replaced.
     *
     * @var array|Thing|Thing[]
     */
    public $replacee;
}
