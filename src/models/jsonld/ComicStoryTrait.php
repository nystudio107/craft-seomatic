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
 * Trait for ComicStory.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ComicStory
 */
trait ComicStoryTrait
{
    /**
     * The individual who traces over the pencil drawings in ink after pencils are
     * complete.
     *
     * @var array|Person|Person[]
     */
    public $inker;

    /**
     * The individual who draws the primary narrative artwork.
     *
     * @var array|Person|Person[]
     */
    public $penciler;

    /**
     * The individual who adds lettering, including speech balloons and sound
     * effects, to artwork.
     *
     * @var array|Person|Person[]
     */
    public $letterer;

    /**
     * The primary artist for a work         in a medium other than pencils or
     * digital line art--for example, if the         primary artwork is done in
     * watercolors or digital paints.
     *
     * @var array|Person|Person[]
     */
    public $artist;

    /**
     * The individual who adds color to inked drawings.
     *
     * @var array|Person|Person[]
     */
    public $colorist;
}
