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
 * Trait for ImageObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ImageObject
 */
trait ImageObjectTrait
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
     * Thumbnail image for an image or video.
     *
     * @var ImageObject
     */
    public $thumbnail;

    /**
     * exif data for this object.
     *
     * @var string|Text|PropertyValue
     */
    public $exifData;

    /**
     * Represents textual captioning from a [[MediaObject]], e.g. text of a
     * 'meme'.
     *
     * @var string|Text
     */
    public $embeddedTextCaption;

    /**
     * Indicates whether this image is representative of the content of the page.
     *
     * @var bool|Boolean
     */
    public $representativeOfPage;
}
