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
 * Trait for ServiceChannel.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ServiceChannel
 */

trait ServiceChannelTrait
{
    
    /**
     * The service provided by this channel.
     *
     * @var Service
     */
    public $providesService;

    /**
     * The number to access the service by text message.
     *
     * @var ContactPoint
     */
    public $serviceSmsNumber;

    /**
     * The address for accessing the service by mail.
     *
     * @var PostalAddress
     */
    public $servicePostalAddress;

    /**
     * The website to access the service.
     *
     * @var URL
     */
    public $serviceUrl;

    /**
     * The phone number to use to access the service.
     *
     * @var ContactPoint
     */
    public $servicePhone;

    /**
     * A language someone may use with or at the item, service or place. Please
     * use one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also [[inLanguage]]
     *
     * @var string|Text|Language
     */
    public $availableLanguage;

    /**
     * Estimated processing time for the service using this channel.
     *
     * @var Duration
     */
    public $processingTime;

    /**
     * The location (e.g. civic structure, local business, etc.) where a person
     * can go to access the service.
     *
     * @var Place
     */
    public $serviceLocation;

}
