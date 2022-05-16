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
 * Trait for BroadcastChannel.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BroadcastChannel
 */

trait BroadcastChannelTrait
{
    
    /**
     * Genre of the creative work, broadcast channel or group.
     *
     * @var string|URL|Text
     */
    public $genre;

    /**
     * The frequency used for over-the-air broadcasts. Numeric values or simple
     * ranges e.g. 87-99. In addition a shortcut idiom is supported for frequences
     * of AM and FM radio channels, e.g. "87 FM".
     *
     * @var string|BroadcastFrequencySpecification|Text
     */
    public $broadcastFrequency;

    /**
     * The BroadcastService offered on this channel.
     *
     * @var BroadcastService
     */
    public $providesBroadcastService;

    /**
     * The unique address by which the BroadcastService can be identified in a
     * provider lineup. In US, this is typically a number.
     *
     * @var string|Text
     */
    public $broadcastChannelId;

    /**
     * The CableOrSatelliteService offering the channel.
     *
     * @var CableOrSatelliteService
     */
    public $inBroadcastLineup;

    /**
     * The type of service required to have access to the channel (e.g. Standard
     * or Premium).
     *
     * @var string|Text
     */
    public $broadcastServiceTier;

}
