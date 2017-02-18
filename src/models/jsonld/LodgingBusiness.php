<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\LocalBusiness;

/**
 * LodgingBusiness - A lodging business, such as a motel, hotel, or inn.
 * Extends: LocalBusiness
 * @see    http://schema.org/LodgingBusiness
 */
class LodgingBusiness extends LocalBusiness
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'LodgingBusiness';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/LodgingBusiness';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A lodging business, such as a motel, hotel, or inn.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'LocalBusiness';

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
     * An amenity feature (e.g. a characteristic or service) of the Accommodation.
     * This generic property does not make a statement about whether the feature
     * is included in an offer for the main accommodation or available at extra
     * costs.
     * @var LocationFeatureSpecification [schema.org types: LocationFeatureSpecification]
     */
    public $amenityFeature;

    /**
     * An intended audience, i.e. a group for whom something was created.
     * Supersedes serviceAudience.
     * @var Audience [schema.org types: Audience]
     */
    public $audience;

    /**
     * A language someone may use with the item. Please use one of the language
     * codes from the IETF BCP 47 standard. See also inLanguage
     * @var mixed Language, string [schema.org types: Language, Text]
     */
    public $availableLanguage;

    /**
     * The earliest someone may check into a lodging establishment.
     * @var mixed DateTime [schema.org types: DateTime]
     */
    public $checkinTime;

    /**
     * The latest someone may check out of a lodging establishment.
     * @var mixed DateTime [schema.org types: DateTime]
     */
    public $checkoutTime;

    /**
     * Indicates whether pets are allowed to enter the accommodation or lodging
     * business. More detailed information can be put in a text value.
     * @var mixed bool, string [schema.org types: Boolean, Text]
     */
    public $petsAllowed;

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
                'amenityFeature',
                'audience',
                'availableLanguage',
                'checkinTime',
                'checkoutTime',
                'petsAllowed',
                'starRating',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'amenityFeature' => ['LocationFeatureSpecification'],
                'audience' => ['Audience'],
                'availableLanguage' => ['Language','Text'],
                'checkinTime' => ['DateTime'],
                'checkoutTime' => ['DateTime'],
                'petsAllowed' => ['Boolean','Text'],
                'starRating' => ['Rating'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'amenityFeature' => 'An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.',
                'audience' => 'An intended audience, i.e. a group for whom something was created. Supersedes serviceAudience.',
                'availableLanguage' => 'A language someone may use with the item. Please use one of the language codes from the IETF BCP 47 standard. See also inLanguage',
                'checkinTime' => 'The earliest someone may check into a lodging establishment.',
                'checkoutTime' => 'The latest someone may check out of a lodging establishment.',
                'petsAllowed' => 'Indicates whether pets are allowed to enter the accommodation or lodging business. More detailed information can be put in a text value.',
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
                [['amenityFeature','audience','availableLanguage','checkinTime','checkoutTime','petsAllowed','starRating',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class LodgingBusiness*/
