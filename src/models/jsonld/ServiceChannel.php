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

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * ServiceChannel - A means for accessing a service, e.g. a government office
 * location, web site, or phone number.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/ServiceChannel
 */
class ServiceChannel extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ServiceChannel';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ServiceChannel';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A means for accessing a service, e.g. a government office location, web site, or phone number.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

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
     * A language someone may use with or at the item, service or place. Please
     * use one of the language codes from the IETF BCP 47 standard. See also
     * inLanguage
     *
     * @var mixed|Language|string [schema.org types: Language, Text]
     */
    public $availableLanguage;

    /**
     * Estimated processing time for the service using this channel.
     *
     * @var mixed|Duration [schema.org types: Duration]
     */
    public $processingTime;

    /**
     * The service provided by this channel.
     *
     * @var mixed|Service [schema.org types: Service]
     */
    public $providesService;

    /**
     * The location (e.g. civic structure, local business, etc.) where a person
     * can go to access the service.
     *
     * @var mixed|Place [schema.org types: Place]
     */
    public $serviceLocation;

    /**
     * The phone number to use to access the service.
     *
     * @var mixed|ContactPoint [schema.org types: ContactPoint]
     */
    public $servicePhone;

    /**
     * The address for accessing the service by mail.
     *
     * @var mixed|PostalAddress [schema.org types: PostalAddress]
     */
    public $servicePostalAddress;

    /**
     * The number to access the service by text message.
     *
     * @var mixed|ContactPoint [schema.org types: ContactPoint]
     */
    public $serviceSmsNumber;

    /**
     * The website to access the service.
     *
     * @var mixed|string [schema.org types: URL]
     */
    public $serviceUrl;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'availableLanguage',
        'processingTime',
        'providesService',
        'serviceLocation',
        'servicePhone',
        'servicePostalAddress',
        'serviceSmsNumber',
        'serviceUrl'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'availableLanguage' => ['Language','Text'],
        'processingTime' => ['Duration'],
        'providesService' => ['Service'],
        'serviceLocation' => ['Place'],
        'servicePhone' => ['ContactPoint'],
        'servicePostalAddress' => ['PostalAddress'],
        'serviceSmsNumber' => ['ContactPoint'],
        'serviceUrl' => ['URL']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'availableLanguage' => 'A language someone may use with or at the item, service or place. Please use one of the language codes from the IETF BCP 47 standard. See also inLanguage',
        'processingTime' => 'Estimated processing time for the service using this channel.',
        'providesService' => 'The service provided by this channel.',
        'serviceLocation' => 'The location (e.g. civic structure, local business, etc.) where a person can go to access the service.',
        'servicePhone' => 'The phone number to use to access the service.',
        'servicePostalAddress' => 'The address for accessing the service by mail.',
        'serviceSmsNumber' => 'The number to access the service by text message.',
        'serviceUrl' => 'The website to access the service.'
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
            [['availableLanguage','processingTime','providesService','serviceLocation','servicePhone','servicePostalAddress','serviceSmsNumber','serviceUrl'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
