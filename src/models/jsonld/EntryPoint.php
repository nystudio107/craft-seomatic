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
 * EntryPoint - An entry point, within some Web-based protocol.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/EntryPoint
 */
class EntryPoint extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'EntryPoint';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/EntryPoint';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An entry point, within some Web-based protocol.';

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
     * An application that can complete the request. Supersedes application.
     *
     * @var SoftwareApplication [schema.org types: SoftwareApplication]
     */
    public $actionApplication;

    /**
     * The high level platform(s) where the Action can be performed for the given
     * URL. To specify a specific application or operating system instance, use
     * actionApplication.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $actionPlatform;

    /**
     * The supported content type(s) for an EntryPoint response.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $contentType;

    /**
     * The supported encoding type(s) for an EntryPoint request.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $encodingType;

    /**
     * An HTTP method that specifies the appropriate HTTP method for a request to
     * an HTTP EntryPoint. Values are capitalized strings as used in HTTP.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $httpMethod;

    /**
     * An url template (RFC6570) that will be used to construct the target of the
     * execution of the action.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $urlTemplate;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'actionApplication',
        'actionPlatform',
        'contentType',
        'encodingType',
        'httpMethod',
        'urlTemplate'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'actionApplication' => ['SoftwareApplication'],
        'actionPlatform' => ['Text','URL'],
        'contentType' => ['Text'],
        'encodingType' => ['Text'],
        'httpMethod' => ['Text'],
        'urlTemplate' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'actionApplication' => 'An application that can complete the request. Supersedes application.',
        'actionPlatform' => 'The high level platform(s) where the Action can be performed for the given URL. To specify a specific application or operating system instance, use actionApplication.',
        'contentType' => 'The supported content type(s) for an EntryPoint response.',
        'encodingType' => 'The supported encoding type(s) for an EntryPoint request.',
        'httpMethod' => 'An HTTP method that specifies the appropriate HTTP method for a request to an HTTP EntryPoint. Values are capitalized strings as used in HTTP.',
        'urlTemplate' => 'An url template (RFC6570) that will be used to construct the target of the execution of the action.'
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
            [['actionApplication','actionPlatform','contentType','encodingType','httpMethod','urlTemplate'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
