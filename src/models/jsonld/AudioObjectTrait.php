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
 * Trait for AudioObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AudioObject
 */
trait AudioObjectTrait
{
    /**
     * The caption for this object. For downloadable machine formats (closed
     * caption, subtitles etc.) use MediaObject and indicate the
     * [[encodingFormat]].
     *
     * @var string|MediaObject|Text
     */
    public $caption;

    /**
     * Represents textual captioning from a [[MediaObject]], e.g. text of a
     * 'meme'.
     *
     * @var string|Text
     */
    public $embeddedTextCaption;

    /**
     * If this MediaObject is an AudioObject or VideoObject, the transcript of
     * that object.
     *
     * @var string|Text
     */
    public $transcript;
}
