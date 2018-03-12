<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use craft\validators\ArrayValidator;
use nystudio107\seomatic\base\FluentModel;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Entity extends FluentModel
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $siteType;

    /**
     * @var string
     */
    public $siteSubType;

    /**
     * @var string
     */
    public $siteSpecificType;

    /**
     * @var string
     */
    public $genericName;

    /**
     * @var string
     */
    public $genericAlternateName;

    /**
     * @var string
     */
    public $genericDescription;

    /**
     * @var string
     */
    public $genericUrl;

    /**
     * @var array
     */
    public $genericImageIds;

    /**
     * @var string
     */
    public $genericTelephone;

    /**
     * @var string
     */
    public $genericEmail;

    /**
     * @var string
     */
    public $genericStreetAddress;

    /**
     * @var string
     */
    public $genericAddressLocality;

    /**
     * @var string
     */
    public $genericAddressRegion;

    /**
     * @var string
     */
    public $genericPostalCode;

    /**
     * @var string
     */
    public $genericAddressCountry;

    /**
     * @var string
     */
    public $genericGeoLatitude;

    /**
     * @var string
     */
    public $genericGeoLongitude;

    /**
     * @var string
     */
    public $personGender;

    /**
     * @var string
     */
    public $personBirthPlace;

    /**
     * @var string
     */
    public $organizationDuns;

    /**
     * @var string
     */
    public $organizationFounder;

    /**
     * @var string
     */
    public $organizationFoundingDate;

    /**
     * @var string
     */
    public $organizationFoundingLocation;

    /**
     * @var array
     */
    public $organizationContactPoints;

    /**
     * @var string
     */
    public $corporationTickerSymbol;

    /**
     * @var string
     */
    public $localBusinessPriceRange;

    /**
     * @var array
     */
    public $localBusinessOpeningHours;

    /**
     * @var string
     */
    public $restaurantServesCuisine;

    /**
     * @var string
     */
    public $restaurantMenuUrl;

    /**
     * @var string
     */
    public $restaurantReservationsUrl;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'siteType',
                    'siteSubType',
                    'siteSpecificType',
                    'genericName',
                    'genericAlternateName',
                    'genericDescription',
                    'genericUrl',
                    'genericTelephone',
                    'genericEmail',
                    'genericStreetAddress',
                    'genericAddressLocality',
                    'genericAddressRegion',
                    'genericPostalCode',
                    'genericGeoLatitude',
                    'genericGeoLongitude',
                    'personGender',
                    'personBirthPlace',
                    'organizationDuns',
                    'organizationFounder',
                    'organizationFoundingDate',
                    'corporationTickerSymbol',
                    'localBusinessPriceRange',
                    'restaurantServesCuisine',
                    'restaurantMenuUrl',
                    'restaurantReservationsUrl',
                ],
                'string'
            ],
            [
                [
                    'genericImageIds',
                ],
                'each', 'rule' => ['integer'],
            ],
            [
                [
                    'organizationContactPoints',
                    'localBusinessOpeningHours',
                ],
                ArrayValidator::class
            ],
        ];
    }
}
