<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for SoftwareApplication.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SoftwareApplication
 */

trait SoftwareApplicationTrait
{
    
    /**
     * Countries for which the application is supported. You can also provide the
     * two-letter ISO 3166-1 alpha-2 country code.
     *
     * @var string|Text
     */
    public $countriesSupported;

    /**
     * URL at which the app may be installed, if different from the URL of the
     * item.
     *
     * @var URL
     */
    public $installUrl;

    /**
     * Operating systems supported (Windows 7, OSX 10.6, Android 1.6).
     *
     * @var string|Text
     */
    public $operatingSystem;

    /**
     * Minimum memory requirements.
     *
     * @var string|Text|URL
     */
    public $memoryRequirements;

    /**
     * Version of the software instance.
     *
     * @var string|Text
     */
    public $softwareVersion;

    /**
     * Storage requirements (free space required).
     *
     * @var string|URL|Text
     */
    public $storageRequirements;

    /**
     * Software application help.
     *
     * @var CreativeWork
     */
    public $softwareHelp;

    /**
     * Subcategory of the application, e.g. 'Arcade Game'.
     *
     * @var string|URL|Text
     */
    public $applicationSubCategory;

    /**
     * If the file can be downloaded, URL to download the binary.
     *
     * @var URL
     */
    public $downloadUrl;

    /**
     * Type of software application, e.g. 'Game, Multimedia'.
     *
     * @var string|Text|URL
     */
    public $applicationCategory;

    /**
     * Countries for which the application is not supported. You can also provide
     * the two-letter ISO 3166-1 alpha-2 country code.
     *
     * @var string|Text
     */
    public $countriesNotSupported;

    /**
     * Component dependency requirements for application. This includes runtime
     * environments and shared libraries that are not included in the application
     * distribution package, but required to run the application (Examples:
     * DirectX, Java or .NET runtime).
     *
     * @var string|URL|Text
     */
    public $softwareRequirements;

    /**
     * Additional content for a software application.
     *
     * @var SoftwareApplication
     */
    public $softwareAddOn;

    /**
     * The name of the application suite to which the application belongs (e.g.
     * Excel belongs to Office).
     *
     * @var string|Text
     */
    public $applicationSuite;

    /**
     * Component dependency requirements for application. This includes runtime
     * environments and shared libraries that are not included in the application
     * distribution package, but required to run the application (Examples:
     * DirectX, Java or .NET runtime).
     *
     * @var string|URL|Text
     */
    public $requirements;

    /**
     * Permission(s) required to run the app (for example, a mobile app may
     * require full internet access or may run only on wifi).
     *
     * @var string|Text
     */
    public $permissions;

    /**
     * Processor architecture required to run the application (e.g. IA64).
     *
     * @var string|Text
     */
    public $processorRequirements;

    /**
     * A link to a screenshot image of the app.
     *
     * @var ImageObject|URL
     */
    public $screenshot;

    /**
     * Features or modules provided by this application (and possibly required by
     * other applications).
     *
     * @var string|Text|URL
     */
    public $featureList;

    /**
     * Description of what changed in this version.
     *
     * @var string|URL|Text
     */
    public $releaseNotes;

    /**
     * Supporting data for a SoftwareApplication.
     *
     * @var DataFeed
     */
    public $supportingData;

    /**
     * Size of the application / package (e.g. 18MB). In the absence of a unit
     * (MB, KB etc.), KB will be assumed.
     *
     * @var string|Text
     */
    public $fileSize;

    /**
     * Device required to run the application. Used in cases where a specific
     * make/model is required to run the application.
     *
     * @var string|Text
     */
    public $device;

    /**
     * Device required to run the application. Used in cases where a specific
     * make/model is required to run the application.
     *
     * @var string|Text
     */
    public $availableOnDevice;

}
