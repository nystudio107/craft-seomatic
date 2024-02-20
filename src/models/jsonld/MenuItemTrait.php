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
 * Trait for MenuItem.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MenuItem
 */
trait MenuItemTrait
{
    /**
     * Nutrition information about the recipe or menu item.
     *
     * @var array|NutritionInformation|NutritionInformation[]
     */
    public $nutrition;

    /**
     * Indicates a dietary restriction or guideline for which this recipe or menu
     * item is suitable, e.g. diabetic, halal etc.
     *
     * @var array|RestrictedDiet|RestrictedDiet[]
     */
    public $suitableForDiet;

    /**
     * Additional menu item(s) such as a side dish of salad or side order of fries
     * that can be added to this menu item. Additionally it can be a menu section
     * containing allowed add-on menu items for this menu item.
     *
     * @var array|MenuItem|MenuItem[]|array|MenuSection|MenuSection[]
     */
    public $menuAddOn;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event. Use [[businessFunction]] to indicate the kind of transaction
     * offered, i.e. sell, lease, etc. This property can also be used to describe
     * a [[Demand]]. While this property is listed as expected on a number of
     * common types, it can be used in others. In that case, using a second type,
     * such as Product or a subtype of Product, can clarify the nature of the
     * offer.
     *
     * @var array|Demand|Demand[]|array|Offer|Offer[]
     */
    public $offers;
}
