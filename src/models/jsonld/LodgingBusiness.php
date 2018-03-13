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

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\LocalBusiness;

/**
 * LodgingBusiness - A lodging business, such as a motel, hotel, or inn.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/LodgingBusiness
 */
class LodgingBusiness extends LocalBusiness
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'LodgingBusiness';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/LodgingBusiness';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A lodging business, such as a motel, hotel, or inn.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'LocalBusiness';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * An amenity feature (e.g. a characteristic or service) of the Accommodation.
     * This generic property does not make a statement about whether the feature
     * is included in an offer for the main accommodation or available at extra
     * costs.
     *
     * @var LocationFeatureSpecification [schema.org types: LocationFeatureSpecification]
     */
    public $amenityFeature;

    /**
     * An intended audience, i.e. a group for whom something was created.
     * Supersedes serviceAudience.
     *
     * @var Audience [schema.org types: Audience]
     */
    public $audience;

    /**
     * A language someone may use with or at the item, service or place. Please
     * use one of the language codes from the IETF BCP 47 standard. See also
     * inLanguage
     *
     * @var mixed|Language|string [schema.org types: Language, Text]
     */
    public $availableLanguage;

    /**
     * The earliest someone may check into a lodging establishment.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $checkinTime;

    /**
     * The latest someone may check out of a lodging establishment.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $checkoutTime;

    /**
     * Indicates whether pets are allowed to enter the accommodation or lodging
     * business. More detailed information can be put in a text value.
     *
     * @var mixed|bool|string [schema.org types: Boolean, Text]
     */
    public $petsAllowed;

    /**
     * An official rating for a lodging business or food establishment, e.g. from
     * national associations or standards bodies. Use the author property to
     * indicate the rating organization, e.g. as an Organization with name such as
     * (e.g. HOTREC, DEHOGA, WHR, or Hotelstars).
     *
     * @var mixed|Rating [schema.org types: Rating]
     */
    public $starRating;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'amenityFeature',
        'audience',
        'availableLanguage',
        'checkinTime',
        'checkoutTime',
        'petsAllowed',
        'starRating'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'amenityFeature' => ['LocationFeatureSpecification'],
        'audience' => ['Audience'],
        'availableLanguage' => ['Language','Text'],
        'checkinTime' => ['DateTime'],
        'checkoutTime' => ['DateTime'],
        'petsAllowed' => ['Boolean','Text'],
        'starRating' => ['Rating']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'amenityFeature' => 'An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.',
        'audience' => 'An intended audience, i.e. a group for whom something was created. Supersedes serviceAudience.',
        'availableLanguage' => 'A language someone may use with or at the item, service or place. Please use one of the language codes from the IETF BCP 47 standard. See also inLanguage',
        'checkinTime' => 'The earliest someone may check into a lodging establishment.',
        'checkoutTime' => 'The latest someone may check out of a lodging establishment.',
        'petsAllowed' => 'Indicates whether pets are allowed to enter the accommodation or lodging business. More detailed information can be put in a text value.',
        'starRating' => 'An official rating for a lodging business or food establishment, e.g. from national associations or standards bodies. Use the author property to indicate the rating organization, e.g. as an Organization with name such as (e.g. HOTREC, DEHOGA, WHR, or Hotelstars).'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['amenityFeature','audience','availableLanguage','checkinTime','checkoutTime','petsAllowed','starRating'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
