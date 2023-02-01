<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for SoftwareApplication.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SoftwareApplication
 */
trait SoftwareApplicationTrait
{
    /**
     * A link to a screenshot image of the app.
     *
     * @var URL|ImageObject
     */
    public $screenshot;

    /**
     * Permission(s) required to run the app (for example, a mobile app may
     * require full internet access or may run only on wifi).
     *
     * @var string|Text
     */
    public $permissions;

    /**
     * Component dependency requirements for application. This includes runtime
     * environments and shared libraries that are not included in the application
     * distribution package, but required to run the application (examples:
     * DirectX, Java or .NET runtime).
     *
     * @var string|Text|URL
     */
    public $requirements;

    /**
     * Storage requirements (free space required).
     *
     * @var string|URL|Text
     */
    public $storageRequirements;

    /**
     * Component dependency requirements for application. This includes runtime
     * environments and shared libraries that are not included in the application
     * distribution package, but required to run the application (examples:
     * DirectX, Java or .NET runtime).
     *
     * @var string|Text|URL
     */
    public $softwareRequirements;

    /**
     * Type of software application, e.g. 'Game, Multimedia'.
     *
     * @var string|URL|Text
     */
    public $applicationCategory;

    /**
     * Device required to run the application. Used in cases where a specific
     * make/model is required to run the application.
     *
     * @var string|Text
     */
    public $device;

    /**
     * Size of the application / package (e.g. 18MB). In the absence of a unit
     * (MB, KB etc.), KB will be assumed.
     *
     * @var string|Text
     */
    public $fileSize;

    /**
     * Countries for which the application is not supported. You can also provide
     * the two-letter ISO 3166-1 alpha-2 country code.
     *
     * @var string|Text
     */
    public $countriesNotSupported;

    /**
     * Operating systems supported (Windows 7, OS X 10.6, Android 1.6).
     *
     * @var string|Text
     */
    public $operatingSystem;

    /**
     * Features or modules provided by this application (and possibly required by
     * other applications).
     *
     * @var string|URL|Text
     */
    public $featureList;

    /**
     * The name of the application suite to which the application belongs (e.g.
     * Excel belongs to Office).
     *
     * @var string|Text
     */
    public $applicationSuite;

    /**
     * Subcategory of the application, e.g. 'Arcade Game'.
     *
     * @var string|URL|Text
     */
    public $applicationSubCategory;

    /**
     * Description of what changed in this version.
     *
     * @var string|Text|URL
     */
    public $releaseNotes;

    /**
     * Software application help.
     *
     * @var CreativeWork
     */
    public $softwareHelp;

    /**
     * Supporting data for a SoftwareApplication.
     *
     * @var DataFeed
     */
    public $supportingData;

    /**
     * Countries for which the application is supported. You can also provide the
     * two-letter ISO 3166-1 alpha-2 country code.
     *
     * @var string|Text
     */
    public $countriesSupported;

    /**
     * Device required to run the application. Used in cases where a specific
     * make/model is required to run the application.
     *
     * @var string|Text
     */
    public $availableOnDevice;

    /**
     * Version of the software instance.
     *
     * @var string|Text
     */
    public $softwareVersion;

    /**
     * URL at which the app may be installed, if different from the URL of the
     * item.
     *
     * @var URL
     */
    public $installUrl;

    /**
     * Minimum memory requirements.
     *
     * @var string|Text|URL
     */
    public $memoryRequirements;

    /**
     * Processor architecture required to run the application (e.g. IA64).
     *
     * @var string|Text
     */
    public $processorRequirements;

    /**
     * Additional content for a software application.
     *
     * @var SoftwareApplication
     */
    public $softwareAddOn;

    /**
     * If the file can be downloaded, URL to download the binary.
     *
     * @var URL
     */
    public $downloadUrl;
}
