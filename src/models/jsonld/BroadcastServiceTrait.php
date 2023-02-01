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
 * Trait for BroadcastService.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BroadcastService
 */
trait BroadcastServiceTrait
{
    /**
     * A broadcast channel of a broadcast service.
     *
     * @var BroadcastChannel
     */
    public $hasBroadcastChannel;

    /**
     * A broadcast service to which the broadcast service may belong to such as
     * regional variations of a national channel.
     *
     * @var BroadcastService
     */
    public $parentService;

    /**
     * The media network(s) whose content is broadcast on this station.
     *
     * @var Organization
     */
    public $broadcastAffiliateOf;

    /**
     * The organization owning or operating the broadcast service.
     *
     * @var Organization
     */
    public $broadcaster;

    /**
     * The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD,
     * etc.).
     *
     * @var string|Text
     */
    public $videoFormat;

    /**
     * The timezone in [ISO 8601 format](http://en.wikipedia.org/wiki/ISO_8601)
     * for which the service bases its broadcasts.
     *
     * @var string|Text
     */
    public $broadcastTimezone;

    /**
     * The name displayed in the channel guide. For many US affiliates, it is the
     * network name.
     *
     * @var string|Text
     */
    public $broadcastDisplayName;

    /**
     * The frequency used for over-the-air broadcasts. Numeric values or simple
     * ranges, e.g. 87-99. In addition a shortcut idiom is supported for
     * frequences of AM and FM radio channels, e.g. "87 FM".
     *
     * @var string|Text|BroadcastFrequencySpecification
     */
    public $broadcastFrequency;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also
     * [[availableLanguage]].
     *
     * @var string|Text|Language
     */
    public $inLanguage;

    /**
     * The area within which users can expect to reach the broadcast service.
     *
     * @var Place
     */
    public $area;

    /**
     * A [callsign](https://en.wikipedia.org/wiki/Call_sign), as used in
     * broadcasting and radio communications to identify people, radio and TV
     * stations, or vehicles.
     *
     * @var string|Text
     */
    public $callSign;
}
