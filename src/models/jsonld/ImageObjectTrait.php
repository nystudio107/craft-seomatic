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
 * Trait for ImageObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ImageObject
 */
trait ImageObjectTrait
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
     * Indicates whether this image is representative of the content of the page.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $representativeOfPage;

    /**
     * exif data for this object.
     *
     * @var string|array|PropertyValue|PropertyValue[]|array|Text|Text[]
     */
    public $exifData;
}
