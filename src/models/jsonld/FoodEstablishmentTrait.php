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
 * Trait for FoodEstablishment.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/FoodEstablishment
 */
trait FoodEstablishmentTrait
{
    /**
     * The cuisine of the restaurant.
     *
     * @var string|array|Text|Text[]
     */
    public $servesCuisine;

    /**
     * Indicates whether a FoodEstablishment accepts reservations. Values can be
     * Boolean, an URL at which reservations can be made or (for backwards
     * compatibility) the strings ```Yes``` or ```No```.
     *
     * @var string|bool|array|Text|Text[]|array|URL|URL[]|array|Boolean|Boolean[]
     */
    public $acceptsReservations;

    /**
     * Either the actual menu as a structured representation, as text, or a URL of
     * the menu.
     *
     * @var string|array|Menu|Menu[]|array|Text|Text[]|array|URL|URL[]
     */
    public $menu;

    /**
     * An official rating for a lodging business or food establishment, e.g. from
     * national associations or standards bodies. Use the author property to
     * indicate the rating organization, e.g. as an Organization with name such as
     * (e.g. HOTREC, DEHOGA, WHR, or Hotelstars).
     *
     * @var array|Rating|Rating[]
     */
    public $starRating;

    /**
     * Either the actual menu as a structured representation, as text, or a URL of
     * the menu.
     *
     * @var string|array|Menu|Menu[]|array|Text|Text[]|array|URL|URL[]
     */
    public $hasMenu;
}
