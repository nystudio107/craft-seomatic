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
 * schema.org version: v30.0
 * Trait for BroadcastEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BroadcastEvent
 */
trait BroadcastEventTrait
{
    /**
     * The event being broadcast such as a sporting event or awards ceremony.
     *
     * @var array|Event|Event[]
     */
    public $broadcastOfEvent;

    /**
     * True if the broadcast is of a live event.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isLiveBroadcast;

    /**
     * Languages in which subtitles/captions are available, in [IETF BCP 47
     * standard format](http://tools.ietf.org/html/bcp47).
     *
     * @var string|array|Language|Language[]|array|Text|Text[]
     */
    public $subtitleLanguage;

    /**
     * The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD,
     * etc.).
     *
     * @var string|array|Text|Text[]
     */
    public $videoFormat;
}
