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
 * Trait for Audiobook.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Audiobook
 */
trait AudiobookTrait
{
    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var array|Duration|Duration[]
     */
    public $duration;

    /**
     * A person who reads (performs) the audiobook.
     *
     * @var array|Person|Person[]
     */
    public $readBy;
}
