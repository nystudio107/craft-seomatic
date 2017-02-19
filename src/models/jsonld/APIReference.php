<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\TechArticle;

/**
 * APIReference - Reference documentation for application programming
 * interfaces (APIs).
 *
 * Extends: TechArticle
 * @see    http://schema.org/APIReference
 */
class APIReference extends TechArticle
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'APIReference';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/APIReference';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Reference documentation for application programming interfaces (APIs).';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'TechArticle';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * Associated product/technology version. e.g., .NET Framework 4.5.
     *
     * @var string [schema.org types: Text]
     */
    public $assemblyVersion;

    /**
     * Library file name e.g., mscorlib.dll, system.web.dll. Supersedes assembly.
     *
     * @var string [schema.org types: Text]
     */
    public $executableLibraryName;

    /**
     * Indicates whether API is managed or unmanaged.
     *
     * @var string [schema.org types: Text]
     */
    public $programmingModel;

    /**
     * Type of app development: phone, Metro style, desktop, XBox, etc.
     *
     * @var string [schema.org types: Text]
     */
    public $targetPlatform;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'assemblyVersion',
            'executableLibraryName',
            'programmingModel',
            'targetPlatform',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'assemblyVersion' => ['Text'],
            'executableLibraryName' => ['Text'],
            'programmingModel' => ['Text'],
            'targetPlatform' => ['Text'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'assemblyVersion' => 'Associated product/technology version. e.g., .NET Framework 4.5.',
            'executableLibraryName' => 'Library file name e.g., mscorlib.dll, system.web.dll. Supersedes assembly.',
            'programmingModel' => 'Indicates whether API is managed or unmanaged.',
            'targetPlatform' => 'Type of app development: phone, Metro style, desktop, XBox, etc.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['assemblyVersion','executableLibraryName','programmingModel','targetPlatform',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
