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
 * Trait for ScreeningEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ScreeningEvent
 */

trait ScreeningEventTrait
{
    
    /**
     * Languages in which subtitles/captions are available, in [IETF BCP 47
     * standard format](http://tools.ietf.org/html/bcp47).
     *
     * @var string|Language|Text
     */
    public $subtitleLanguage;

    /**
     * The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD,
     * etc.).
     *
     * @var string|Text
     */
    public $videoFormat;

    /**
     * The movie presented during this event.
     *
     * @var Movie
     */
    public $workPresented;

}
