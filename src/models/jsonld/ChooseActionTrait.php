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
 * Trait for ChooseAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ChooseAction
 */
trait ChooseActionTrait
{
    /**
     * A sub property of object. The options subject to this action.
     *
     * @var string|array|Text|Text[]|array|Thing|Thing[]
     */
    public $actionOption;

    /**
     * A sub property of object. The options subject to this action.
     *
     * @var string|array|Text|Text[]|array|Thing|Thing[]
     */
    public $option;
}
