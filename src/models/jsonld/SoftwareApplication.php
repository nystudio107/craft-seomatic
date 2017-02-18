<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * SoftwareApplication - A software application.
 * Extends: CreativeWork
 * @see    http://schema.org/SoftwareApplication
 */
class SoftwareApplication extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'SoftwareApplication';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/SoftwareApplication';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A software application.';

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
     * Type of software application, e.g. 'Game, Multimedia'.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $applicationCategory;

    /**
     * Subcategory of the application, e.g. 'Arcade Game'.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $applicationSubCategory;

    /**
     * The name of the application suite to which the application belongs (e.g.
     * Excel belongs to Office).
     * @var mixed string [schema.org types: Text]
     */
    public $applicationSuite;

    /**
     * Device required to run the application. Used in cases where a specific
     * make/model is required to run the application. Supersedes device.
     * @var mixed string [schema.org types: Text]
     */
    public $availableOnDevice;

    /**
     * Countries for which the application is not supported. You can also provide
     * the two-letter ISO 3166-1 alpha-2 country code.
     * @var mixed string [schema.org types: Text]
     */
    public $countriesNotSupported;

    /**
     * Countries for which the application is supported. You can also provide the
     * two-letter ISO 3166-1 alpha-2 country code.
     * @var mixed string [schema.org types: Text]
     */
    public $countriesSupported;

    /**
     * If the file can be downloaded, URL to download the binary.
     * @var mixed string [schema.org types: URL]
     */
    public $downloadUrl;

    /**
     * Features or modules provided by this application (and possibly required by
     * other applications).
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $featureList;

    /**
     * Size of the application / package (e.g. 18MB). In the absence of a unit
     * (MB, KB etc.), KB will be assumed.
     * @var mixed string [schema.org types: Text]
     */
    public $fileSize;

    /**
     * URL at which the app may be installed, if different from the URL of the
     * item.
     * @var mixed string [schema.org types: URL]
     */
    public $installUrl;

    /**
     * Minimum memory requirements.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $memoryRequirements;

    /**
     * Operating systems supported (Windows 7, OSX 10.6, Android 1.6).
     * @var mixed string [schema.org types: Text]
     */
    public $operatingSystem;

    /**
     * Permission(s) required to run the app (for example, a mobile app may
     * require full internet access or may run only on wifi).
     * @var mixed string [schema.org types: Text]
     */
    public $permissions;

    /**
     * Processor architecture required to run the application (e.g. IA64).
     * @var mixed string [schema.org types: Text]
     */
    public $processorRequirements;

    /**
     * Description of what changed in this version.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $releaseNotes;

    /**
     * A link to a screenshot image of the app.
     * @var mixed ImageObject, string [schema.org types: ImageObject, URL]
     */
    public $screenshot;

    /**
     * Additional content for a software application.
     * @var mixed SoftwareApplication [schema.org types: SoftwareApplication]
     */
    public $softwareAddOn;

    /**
     * Software application help.
     * @var mixed CreativeWork [schema.org types: CreativeWork]
     */
    public $softwareHelp;

    /**
     * Component dependency requirements for application. This includes runtime
     * environments and shared libraries that are not included in the application
     * distribution package, but required to run the application (Examples:
     * DirectX, Java or .NET runtime). Supersedes requirements.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $softwareRequirements;

    /**
     * Version of the software instance.
     * @var mixed string [schema.org types: Text]
     */
    public $softwareVersion;

    /**
     * Storage requirements (free space required).
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $storageRequirements;

    /**
     * Supporting data for a SoftwareApplication.
     * @var mixed DataFeed [schema.org types: DataFeed]
     */
    public $supportingData;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'applicationCategory',
                'applicationSubCategory',
                'applicationSuite',
                'availableOnDevice',
                'countriesNotSupported',
                'countriesSupported',
                'downloadUrl',
                'featureList',
                'fileSize',
                'installUrl',
                'memoryRequirements',
                'operatingSystem',
                'permissions',
                'processorRequirements',
                'releaseNotes',
                'screenshot',
                'softwareAddOn',
                'softwareHelp',
                'softwareRequirements',
                'softwareVersion',
                'storageRequirements',
                'supportingData',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'applicationCategory' => ['Text','URL'],
                'applicationSubCategory' => ['Text','URL'],
                'applicationSuite' => ['Text'],
                'availableOnDevice' => ['Text'],
                'countriesNotSupported' => ['Text'],
                'countriesSupported' => ['Text'],
                'downloadUrl' => ['URL'],
                'featureList' => ['Text','URL'],
                'fileSize' => ['Text'],
                'installUrl' => ['URL'],
                'memoryRequirements' => ['Text','URL'],
                'operatingSystem' => ['Text'],
                'permissions' => ['Text'],
                'processorRequirements' => ['Text'],
                'releaseNotes' => ['Text','URL'],
                'screenshot' => ['ImageObject','URL'],
                'softwareAddOn' => ['SoftwareApplication'],
                'softwareHelp' => ['CreativeWork'],
                'softwareRequirements' => ['Text','URL'],
                'softwareVersion' => ['Text'],
                'storageRequirements' => ['Text','URL'],
                'supportingData' => ['DataFeed'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'applicationCategory' => 'Type of software application, e.g. \'Game, Multimedia\'.',
                'applicationSubCategory' => 'Subcategory of the application, e.g. \'Arcade Game\'.',
                'applicationSuite' => 'The name of the application suite to which the application belongs (e.g. Excel belongs to Office).',
                'availableOnDevice' => 'Device required to run the application. Used in cases where a specific make/model is required to run the application. Supersedes device.',
                'countriesNotSupported' => 'Countries for which the application is not supported. You can also provide the two-letter ISO 3166-1 alpha-2 country code.',
                'countriesSupported' => 'Countries for which the application is supported. You can also provide the two-letter ISO 3166-1 alpha-2 country code.',
                'downloadUrl' => 'If the file can be downloaded, URL to download the binary.',
                'featureList' => 'Features or modules provided by this application (and possibly required by other applications).',
                'fileSize' => 'Size of the application / package (e.g. 18MB). In the absence of a unit (MB, KB etc.), KB will be assumed.',
                'installUrl' => 'URL at which the app may be installed, if different from the URL of the item.',
                'memoryRequirements' => 'Minimum memory requirements.',
                'operatingSystem' => 'Operating systems supported (Windows 7, OSX 10.6, Android 1.6).',
                'permissions' => 'Permission(s) required to run the app (for example, a mobile app may require full internet access or may run only on wifi).',
                'processorRequirements' => 'Processor architecture required to run the application (e.g. IA64).',
                'releaseNotes' => 'Description of what changed in this version.',
                'screenshot' => 'A link to a screenshot image of the app.',
                'softwareAddOn' => 'Additional content for a software application.',
                'softwareHelp' => 'Software application help.',
                'softwareRequirements' => 'Component dependency requirements for application. This includes runtime environments and shared libraries that are not included in the application distribution package, but required to run the application (Examples: DirectX, Java or .NET runtime). Supersedes requirements.',
                'softwareVersion' => 'Version of the software instance.',
                'storageRequirements' => 'Storage requirements (free space required).',
                'supportingData' => 'Supporting data for a SoftwareApplication.',
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
                [['applicationCategory','applicationSubCategory','applicationSuite','availableOnDevice','countriesNotSupported','countriesSupported','downloadUrl','featureList','fileSize','installUrl','memoryRequirements','operatingSystem','permissions','processorRequirements','releaseNotes','screenshot','softwareAddOn','softwareHelp','softwareRequirements','softwareVersion','storageRequirements','supportingData',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class SoftwareApplication*/
