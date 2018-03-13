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

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * SoftwareSourceCode - Computer programming source code. Example: Full
 * (compile ready) solutions, code snippet samples, scripts, templates.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/SoftwareSourceCode
 */
class SoftwareSourceCode extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'SoftwareSourceCode';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/SoftwareSourceCode';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Computer programming source code. Example: Full (compile ready) solutions, code snippet samples, scripts, templates.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
     * Link to the repository where the un-compiled, human readable code and
     * related code is located (SVN, github, CodePlex).
     *
     * @var string [schema.org types: URL]
     */
    public $codeRepository;

    /**
     * What type of code sample: full (compile ready) solution, code snippet,
     * inline code, scripts, template. Supersedes sampleType.
     *
     * @var string [schema.org types: Text]
     */
    public $codeSampleType;

    /**
     * The computer programming language.
     *
     * @var mixed|ComputerLanguage|string [schema.org types: ComputerLanguage, Text]
     */
    public $programmingLanguage;

    /**
     * Runtime platform or script interpreter dependencies (Example - Java v1,
     * Python2.3, .Net Framework 3.0). Supersedes runtime.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $runtimePlatform;

    /**
     * Target Operating System / Product to which the code applies. If applies to
     * several versions, just the product name can be used.
     *
     * @var mixed|SoftwareApplication [schema.org types: SoftwareApplication]
     */
    public $targetProduct;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'codeRepository',
        'codeSampleType',
        'programmingLanguage',
        'runtimePlatform',
        'targetProduct'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'codeRepository' => ['URL'],
        'codeSampleType' => ['Text'],
        'programmingLanguage' => ['ComputerLanguage','Text'],
        'runtimePlatform' => ['Text'],
        'targetProduct' => ['SoftwareApplication']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'codeRepository' => 'Link to the repository where the un-compiled, human readable code and related code is located (SVN, github, CodePlex).',
        'codeSampleType' => 'What type of code sample: full (compile ready) solution, code snippet, inline code, scripts, template. Supersedes sampleType.',
        'programmingLanguage' => 'The computer programming language.',
        'runtimePlatform' => 'Runtime platform or script interpreter dependencies (Example - Java v1, Python2.3, .Net Framework 3.0). Supersedes runtime.',
        'targetProduct' => 'Target Operating System / Product to which the code applies. If applies to several versions, just the product name can be used.'
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
            [['codeRepository','codeSampleType','programmingLanguage','runtimePlatform','targetProduct'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
