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
     * @var string The schema.org general type
     */
    public $siteType;

    /**
     * @var string The schema.org sub-type
     */
    public $siteSubType;

    /**
     * @var string The schema.org specific type
     */
    public $siteSpecificType;

    /**
     * @var string The computed most specific schema.org type
     */
    public $computedType = 'Organization';

    /**
     * @var string The name of the entity
     */
    public $genericName;

    /**
     * @var string An alternate or nickname for the entity
     */
    public $genericAlternateName;

    /**
     * @var string A description of the entity
     */
    public $genericDescription;

    /**
     * @var string A URL for the entity
     */
    public $genericUrl;

    /**
     * @var array URL for the entity image
     */
    public $genericImage;

    /**
     * @var int The width of the entity image
     */
    public $genericImageWidth;

    /**
     * @var int The height of the entity image
     */
    public $genericImageHeight;

    /**
     * @var array Asset ID array for the entity image
     */
    public $genericImageIds;

    /**
     * @var string The primary contact telephone number for the entity
     */
    public $genericTelephone;

    /**
     * @var string The primary contact email address for the entity
     */
    public $genericEmail;

    /**
     * @var string The street address of the entity, e.g.: 123 Main Street
     */
    public $genericStreetAddress;

    /**
     * @var string  locality of the entity, e.g.: Portchester
     */
    public $genericAddressLocality;

    /**
     * @var string The region of the entity, e.g.: New York or NY
     */
    public $genericAddressRegion;

    /**
     * @var string The postal code of the entity, e.g.: 14580
     */
    public $genericPostalCode;

    /**
     * @var string The country in which the entity is located, e.g.: US
     */
    public $genericAddressCountry;

    /**
     * @var string The latitude of the location of the entity, e.g.:
     *      -120.5436367
     */
    public $genericGeoLatitude;

    /**
     * @var string The longitude of the location of the entity, e.g.: 80.6033588
     */
    public $genericGeoLongitude;

    /**
     * @var string Only for entities of the type Person, the gender of the
     *      person
     */
    public $personGender;

    /**
     * @var string Only for entities of the type Person, the place where the
     *      person was born
     */
    public $personBirthPlace;

    /**
     * @var string Only for entities of the type Organization, the DUNS (Dunn &
     *      Bradstreet) number of the organization that owns the website
     */
    public $organizationDuns;

    /**
     * @var string Only for entities of the type Organization, the name of the
     *      founder of the organization
     */
    public $organizationFounder;

    /**
     * @var string Only for entities of the type Organization, the date the
     *      organization was founded in [ISO 8601 date format](http://schema.org/Date), e.g.: `2018-03-26`
     */
    public $organizationFoundingDate;

    /**
     * @var string Only for entities of the type Organization, the location
     *      where the organization was founded
     */
    public $organizationFoundingLocation;

    /**
     * @var array Only for entities of the type Organization, an array of
     *      contact points for the organization.
     *      [Learn More](https://developers.google.com/search/docs/guides/enhance-site#provide-business-contact-markup)
     */
    public $organizationContactPoints;

    /**
     * @var string Only for entities of the type Corporation, the exchange
     *      ticker symbol of the corporation
     */
    public $corporationTickerSymbol;

    /**
     * @var string Only for entities of the type LocalBusiness, the approximate
     *      price range of the goods or services offered by this local business
     */
    public $localBusinessPriceRange;

    /**
     * @var array Only for entities of the type LocalBusiness, an array of the
     *      opening hours for this local business
     *      [Learn More][https://developers.google.com/search/docs/data-types/local-business]
     */
    public $localBusinessOpeningHours;

    /**
     * @var string Only for entities of the type Food Establishment, the
     *      primary type of cuisine that the food establishment serves
     */
    public $restaurantServesCuisine;

    /**
     * @var string Only for entities of the type Food Establishment, a URL to
     *      the food establishment's menu
     */
    public $restaurantMenuUrl;

    /**
     * @var string Only for entities of the type Food Establishment, a URL to
     *      the food establishment's reservations page
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
    public function rules(): array
    {
        return [
            [
                [
                    'siteType',
                    'siteSubType',
                    'siteSpecificType',
                    'computedType',
                    'genericName',
                    'genericAlternateName',
                    'genericDescription',
                    'genericUrl',
                    'genericImage',
                    'genericTelephone',
                    'genericEmail',
                    'genericStreetAddress',
                    'genericAddressLocality',
                    'genericAddressRegion',
                    'genericPostalCode',
                    'genericAddressCountry',
                    'genericGeoLatitude',
                    'genericGeoLongitude',
                    'personGender',
                    'personBirthPlace',
                    'organizationDuns',
                    'organizationFounder',
                    'organizationFoundingDate',
                    'organizationFoundingLocation',
                    'corporationTickerSymbol',
                    'localBusinessPriceRange',
                    'restaurantServesCuisine',
                    'restaurantMenuUrl',
                    'restaurantReservationsUrl',
                ],
                'string',
            ],
            [
                [
                    'genericImageWidth',
                    'genericImageHeight',
                ],
                'integer',
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
                ArrayValidator::class,
            ],
        ];
    }
}
