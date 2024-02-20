<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for SoftwareApplication.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SoftwareApplication
 */
trait SoftwareApplicationTrait
{
    /**
     * Device required to run the application. Used in cases where a specific
     * make/model is required to run the application.
     *
     * @var string|array|Text|Text[]
     */
    public $availableOnDevice;

    /**
     * If the file can be downloaded, URL to download the binary.
     *
     * @var array|URL|URL[]
     */
    public $downloadUrl;

    /**
     * Additional content for a software application.
     *
     * @var array|SoftwareApplication|SoftwareApplication[]
     */
    public $softwareAddOn;

    /**
     * Countries for which the application is supported. You can also provide the
     * two-letter ISO 3166-1 alpha-2 country code.
     *
     * @var string|array|Text|Text[]
     */
    public $countriesSupported;

    /**
     * Component dependency requirements for application. This includes runtime
     * environments and shared libraries that are not included in the application
     * distribution package, but required to run the application (examples:
     * DirectX, Java or .NET runtime).
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $softwareRequirements;

    /**
     * Version of the software instance.
     *
     * @var string|array|Text|Text[]
     */
    public $softwareVersion;

    /**
     * Supporting data for a SoftwareApplication.
     *
     * @var array|DataFeed|DataFeed[]
     */
    public $supportingData;

    /**
     * Type of software application, e.g. 'Game, Multimedia'.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $applicationCategory;

    /**
     * Processor architecture required to run the application (e.g. IA64).
     *
     * @var string|array|Text|Text[]
     */
    public $processorRequirements;

    /**
     * Storage requirements (free space required).
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $storageRequirements;

    /**
     * Countries for which the application is not supported. You can also provide
     * the two-letter ISO 3166-1 alpha-2 country code.
     *
     * @var string|array|Text|Text[]
     */
    public $countriesNotSupported;

    /**
     * Software application help.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $softwareHelp;

    /**
     * Size of the application / package (e.g. 18MB). In the absence of a unit
     * (MB, KB etc.), KB will be assumed.
     *
     * @var string|array|Text|Text[]
     */
    public $fileSize;

    /**
     * The name of the application suite to which the application belongs (e.g.
     * Excel belongs to Office).
     *
     * @var string|array|Text|Text[]
     */
    public $applicationSuite;

    /**
     * Permission(s) required to run the app (for example, a mobile app may
     * require full internet access or may run only on wifi).
     *
     * @var string|array|Text|Text[]
     */
    public $permissions;

    /**
     * Minimum memory requirements.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $memoryRequirements;

    /**
     * Description of what changed in this version.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $releaseNotes;

    /**
     * Features or modules provided by this application (and possibly required by
     * other applications).
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $featureList;

    /**
     * Operating systems supported (Windows 7, OS X 10.6, Android 1.6).
     *
     * @var string|array|Text|Text[]
     */
    public $operatingSystem;

    /**
     * URL at which the app may be installed, if different from the URL of the
     * item.
     *
     * @var array|URL|URL[]
     */
    public $installUrl;

    /**
     * Device required to run the application. Used in cases where a specific
     * make/model is required to run the application.
     *
     * @var string|array|Text|Text[]
     */
    public $device;

    /**
     * A link to a screenshot image of the app.
     *
     * @var array|ImageObject|ImageObject[]|array|URL|URL[]
     */
    public $screenshot;

    /**
     * Component dependency requirements for application. This includes runtime
     * environments and shared libraries that are not included in the application
     * distribution package, but required to run the application (examples:
     * DirectX, Java or .NET runtime).
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $requirements;

    /**
     * Subcategory of the application, e.g. 'Arcade Game'.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $applicationSubCategory;
}
