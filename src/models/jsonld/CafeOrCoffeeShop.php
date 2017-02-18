<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\FoodEstablishment;

/**
 * CafeOrCoffeeShop - A cafe or coffee shop.
 * Extends: FoodEstablishment
 * @see    http://schema.org/CafeOrCoffeeShop
 */
class CafeOrCoffeeShop extends FoodEstablishment
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'CafeOrCoffeeShop';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/CafeOrCoffeeShop';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A cafe or coffee shop.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'FoodEstablishment';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * Indicates whether a FoodEstablishment accepts reservations. Values can be
     * Boolean, an URL at which reservations can be made or (for backwards
     * compatibility) the strings Yes or No.
     * @var mixed bool, string, string [schema.org types: Boolean, Text, URL]
     */
    public $acceptsReservations;

    /**
     * Either the actual menu or a URL of the menu.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $menu;

    /**
     * The cuisine of the restaurant.
     * @var mixed string [schema.org types: Text]
     */
    public $servesCuisine;

    /**
     * An official rating for a lodging business or food establishment, e.g. from
     * national associations or standards bodies. Use the author property to
     * indicate the rating organization, e.g. as an Organization with name such as
     * (e.g. HOTREC, DEHOGA, WHR, or Hotelstars).
     * @var mixed Rating [schema.org types: Rating]
     */
    public $starRating;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'acceptsReservations',
                'menu',
                'servesCuisine',
                'starRating',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'acceptsReservations' => ['Boolean','Text','URL'],
                'menu' => ['Text','URL'],
                'servesCuisine' => ['Text'],
                'starRating' => ['Rating'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'acceptsReservations' => 'Indicates whether a FoodEstablishment accepts reservations. Values can be Boolean, an URL at which reservations can be made or (for backwards compatibility) the strings Yes or No.',
                'menu' => 'Either the actual menu or a URL of the menu.',
                'servesCuisine' => 'The cuisine of the restaurant.',
                'starRating' => 'An official rating for a lodging business or food establishment, e.g. from national associations or standards bodies. Use the author property to indicate the rating organization, e.g. as an Organization with name such as (e.g. HOTREC, DEHOGA, WHR, or Hotelstars).',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['acceptsReservations','menu','servesCuisine','starRating',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class CafeOrCoffeeShop*/
