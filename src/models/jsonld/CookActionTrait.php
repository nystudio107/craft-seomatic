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
 * Trait for CookAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CookAction
 */
trait CookActionTrait
{
    /**
     * A sub property of instrument. The recipe/instructions used to perform the
     * action.
     *
     * @var array|Recipe|Recipe[]
     */
    public $recipe;

    /**
     * A sub property of location. The specific food event where the action
     * occurred.
     *
     * @var array|FoodEvent|FoodEvent[]
     */
    public $foodEvent;

    /**
     * A sub property of location. The specific food establishment where the
     * action occurred.
     *
     * @var array|FoodEstablishment|FoodEstablishment[]|array|Place|Place[]
     */
    public $foodEstablishment;
}
