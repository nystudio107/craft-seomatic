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
 * Trait for UpdateAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/UpdateAction
 */
trait UpdateActionTrait
{
    /**
     * A sub property of object. The collection target of the action.
     *
     * @var array|Thing|Thing[]
     */
    public $collection;

    /**
     * A sub property of object. The collection target of the action.
     *
     * @var array|Thing|Thing[]
     */
    public $targetCollection;
}
