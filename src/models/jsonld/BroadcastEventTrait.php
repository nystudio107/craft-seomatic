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
 * Trait for BroadcastEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BroadcastEvent
 */
trait BroadcastEventTrait
{
    /**
     * Languages in which subtitles/captions are available, in [IETF BCP 47
     * standard format](http://tools.ietf.org/html/bcp47).
     *
     * @var string|Language|Text
     */
    public $subtitleLanguage;

    /**
     * The event being broadcast such as a sporting event or awards ceremony.
     *
     * @var Event
     */
    public $broadcastOfEvent;

    /**
     * The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD,
     * etc.).
     *
     * @var string|Text
     */
    public $videoFormat;

    /**
     * True if the broadcast is of a live event.
     *
     * @var bool|Boolean
     */
    public $isLiveBroadcast;
}
