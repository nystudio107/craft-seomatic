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
 * Trait for ServiceChannel.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ServiceChannel
 */
trait ServiceChannelTrait
{
    /**
     * The website to access the service.
     *
     * @var array|URL|URL[]
     */
    public $serviceUrl;

    /**
     * The location (e.g. civic structure, local business, etc.) where a person
     * can go to access the service.
     *
     * @var array|Place|Place[]
     */
    public $serviceLocation;

    /**
     * The service provided by this channel.
     *
     * @var array|Service|Service[]
     */
    public $providesService;

    /**
     * A language someone may use with or at the item, service or place. Please
     * use one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also [[inLanguage]].
     *
     * @var string|array|Language|Language[]|array|Text|Text[]
     */
    public $availableLanguage;

    /**
     * The phone number to use to access the service.
     *
     * @var array|ContactPoint|ContactPoint[]
     */
    public $servicePhone;

    /**
     * The address for accessing the service by mail.
     *
     * @var array|PostalAddress|PostalAddress[]
     */
    public $servicePostalAddress;

    /**
     * The number to access the service by text message.
     *
     * @var array|ContactPoint|ContactPoint[]
     */
    public $serviceSmsNumber;

    /**
     * Estimated processing time for the service using this channel.
     *
     * @var array|Duration|Duration[]
     */
    public $processingTime;
}
