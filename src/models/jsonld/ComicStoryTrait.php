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
     * @var Person
     */
    public $inker;

    /**
     * The individual who adds lettering, including speech balloons and sound
     * effects, to artwork.
     *
     * @var Person
     */
    public $letterer;

    /**
     * The individual who draws the primary narrative artwork.
     *
     * @var Person
     */
    public $penciler;

    /**
     * The primary artist for a work         in a medium other than pencils or
     * digital line art--for example, if the         primary artwork is done in
     * watercolors or digital paints.
     *
     * @var Person
     */
    public $artist;

    /**
     * The individual who adds color to inked drawings.
     *
     * @var Person
     */
    public $colorist;
}
