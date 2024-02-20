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
 * Trait for BroadcastChannel.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BroadcastChannel
 */
trait BroadcastChannelTrait
{
    /**
     * The CableOrSatelliteService offering the channel.
     *
     * @var array|CableOrSatelliteService|CableOrSatelliteService[]
     */
    public $inBroadcastLineup;

    /**
     * Genre of the creative work, broadcast channel or group.
     *
     * @var string|array|URL|URL[]|array|Text|Text[]
     */
    public $genre;

    /**
     * The type of service required to have access to the channel (e.g. Standard
     * or Premium).
     *
     * @var string|array|Text|Text[]
     */
    public $broadcastServiceTier;

    /**
     * The frequency used for over-the-air broadcasts. Numeric values or simple
     * ranges, e.g. 87-99. In addition a shortcut idiom is supported for
     * frequences of AM and FM radio channels, e.g. "87 FM".
     *
     * @var string|array|BroadcastFrequencySpecification|BroadcastFrequencySpecification[]|array|Text|Text[]
     */
    public $broadcastFrequency;

    /**
     * The unique address by which the BroadcastService can be identified in a
     * provider lineup. In US, this is typically a number.
     *
     * @var string|array|Text|Text[]
     */
    public $broadcastChannelId;

    /**
     * The BroadcastService offered on this channel.
     *
     * @var array|BroadcastService|BroadcastService[]
     */
    public $providesBroadcastService;
}
