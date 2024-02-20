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
 * Trait for AudioObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AudioObject
 */
trait AudioObjectTrait
{
    /**
     * Represents textual captioning from a [[MediaObject]], e.g. text of a
     * 'meme'.
     *
     * @var string|array|Text|Text[]
     */
    public $embeddedTextCaption;

    /**
     * The caption for this object. For downloadable machine formats (closed
     * caption, subtitles etc.) use MediaObject and indicate the
     * [[encodingFormat]].
     *
     * @var string|array|Text|Text[]|array|MediaObject|MediaObject[]
     */
    public $caption;

    /**
     * If this MediaObject is an AudioObject or VideoObject, the transcript of
     * that object.
     *
     * @var string|array|Text|Text[]
     */
    public $transcript;
}
