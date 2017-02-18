<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * SoftwareSourceCode - Computer programming source code. Example: Full
 * (compile ready) solutions, code snippet samples, scripts, templates.
 * Extends: CreativeWork
 * @see    http://schema.org/SoftwareSourceCode
 */
class SoftwareSourceCode extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'SoftwareSourceCode';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/SoftwareSourceCode';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Computer programming source code. Example: Full (compile ready) solutions, code snippet samples, scripts, templates.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreativeWork';

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
     * Link to the repository where the un-compiled, human readable code and
     * related code is located (SVN, github, CodePlex).
     * @var string [schema.org types: URL]
     */
    public $codeRepository;

    /**
     * What type of code sample: full (compile ready) solution, code snippet,
     * inline code, scripts, template. Supersedes sampleType.
     * @var string [schema.org types: Text]
     */
    public $codeSampleType;

    /**
     * The computer programming language.
     * @var mixed ComputerLanguage, string [schema.org types: ComputerLanguage, Text]
     */
    public $programmingLanguage;

    /**
     * Runtime platform or script interpreter dependencies (Example - Java v1,
     * Python2.3, .Net Framework 3.0). Supersedes runtime.
     * @var mixed string [schema.org types: Text]
     */
    public $runtimePlatform;

    /**
     * Target Operating System / Product to which the code applies. If applies to
     * several versions, just the product name can be used.
     * @var mixed SoftwareApplication [schema.org types: SoftwareApplication]
     */
    public $targetProduct;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'codeRepository',
                'codeSampleType',
                'programmingLanguage',
                'runtimePlatform',
                'targetProduct',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'codeRepository' => ['URL'],
                'codeSampleType' => ['Text'],
                'programmingLanguage' => ['ComputerLanguage','Text'],
                'runtimePlatform' => ['Text'],
                'targetProduct' => ['SoftwareApplication'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'codeRepository' => 'Link to the repository where the un-compiled, human readable code and related code is located (SVN, github, CodePlex).',
                'codeSampleType' => 'What type of code sample: full (compile ready) solution, code snippet, inline code, scripts, template. Supersedes sampleType.',
                'programmingLanguage' => 'The computer programming language.',
                'runtimePlatform' => 'Runtime platform or script interpreter dependencies (Example - Java v1, Python2.3, .Net Framework 3.0). Supersedes runtime.',
                'targetProduct' => 'Target Operating System / Product to which the code applies. If applies to several versions, just the product name can be used.',
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
                [['codeRepository','codeSampleType','programmingLanguage','runtimePlatform','targetProduct',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class SoftwareSourceCode*/
