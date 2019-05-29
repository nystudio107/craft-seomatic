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
 * PropertyValueSpecification - A Property value specification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/PropertyValueSpecification
 */
class PropertyValueSpecification extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'PropertyValueSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/PropertyValueSpecification';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A Property value specification.';

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
     * The default value of the input. For properties that expect a literal, the
     * default is a literal value, for properties that expect an object, it's an
     * ID reference to one of the current values.
     *
     * @var mixed|string|Thing [schema.org types: Text, Thing]
     */
    public $defaultValue;

    /**
     * The upper value of some characteristic or property.
     *
     * @var mixed|float [schema.org types: Number]
     */
    public $maxValue;

    /**
     * The lower value of some characteristic or property.
     *
     * @var mixed|float [schema.org types: Number]
     */
    public $minValue;

    /**
     * Whether multiple values are allowed for the property. Default is false.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $multipleValues;

    /**
     * Whether or not a property is mutable. Default is false. Specifying this for
     * a property that also has a value makes it act similar to a "hidden" input
     * in an HTML form.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $readonlyValue;

    /**
     * The stepValue attribute indicates the granularity that is expected (and
     * required) of the value in a PropertyValueSpecification.
     *
     * @var mixed|float [schema.org types: Number]
     */
    public $stepValue;

    /**
     * Specifies the allowed range for number of characters in a literal value.
     *
     * @var mixed|float [schema.org types: Number]
     */
    public $valueMaxLength;

    /**
     * Specifies the minimum allowed range for number of characters in a literal
     * value.
     *
     * @var mixed|float [schema.org types: Number]
     */
    public $valueMinLength;

    /**
     * Indicates the name of the PropertyValueSpecification to be used in URL
     * templates and form encoding in a manner analogous to HTML's input@name.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $valueName;

    /**
     * Specifies a regular expression for testing literal values according to the
     * HTML spec.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $valuePattern;

    /**
     * Whether the property must be filled in to complete the action. Default is
     * false.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $valueRequired;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'defaultValue',
        'maxValue',
        'minValue',
        'multipleValues',
        'readonlyValue',
        'stepValue',
        'valueMaxLength',
        'valueMinLength',
        'valueName',
        'valuePattern',
        'valueRequired'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'defaultValue' => ['Text','Thing'],
        'maxValue' => ['Number'],
        'minValue' => ['Number'],
        'multipleValues' => ['Boolean'],
        'readonlyValue' => ['Boolean'],
        'stepValue' => ['Number'],
        'valueMaxLength' => ['Number'],
        'valueMinLength' => ['Number'],
        'valueName' => ['Text'],
        'valuePattern' => ['Text'],
        'valueRequired' => ['Boolean']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'defaultValue' => 'The default value of the input. For properties that expect a literal, the default is a literal value, for properties that expect an object, it\'s an ID reference to one of the current values.',
        'maxValue' => 'The upper value of some characteristic or property.',
        'minValue' => 'The lower value of some characteristic or property.',
        'multipleValues' => 'Whether multiple values are allowed for the property. Default is false.',
        'readonlyValue' => 'Whether or not a property is mutable. Default is false. Specifying this for a property that also has a value makes it act similar to a "hidden" input in an HTML form.',
        'stepValue' => 'The stepValue attribute indicates the granularity that is expected (and required) of the value in a PropertyValueSpecification.',
        'valueMaxLength' => 'Specifies the allowed range for number of characters in a literal value.',
        'valueMinLength' => 'Specifies the minimum allowed range for number of characters in a literal value.',
        'valueName' => 'Indicates the name of the PropertyValueSpecification to be used in URL templates and form encoding in a manner analogous to HTML\'s input@name.',
        'valuePattern' => 'Specifies a regular expression for testing literal values according to the HTML spec.',
        'valueRequired' => 'Whether the property must be filled in to complete the action. Default is false.'
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
            [['defaultValue','maxValue','minValue','multipleValues','readonlyValue','stepValue','valueMaxLength','valueMinLength','valueName','valuePattern','valueRequired'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
