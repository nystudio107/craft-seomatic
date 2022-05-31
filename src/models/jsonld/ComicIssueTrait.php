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
 * Trait for ComicIssue.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ComicIssue
 */

trait ComicIssueTrait
{
    
    /**
     * The individual who adds lettering, including speech balloons and sound
     * effects, to artwork.
     *
     * @var Person
     */
    public $letterer;

    /**
     * The individual who adds color to inked drawings.
     *
     * @var Person
     */
    public $colorist;

    /**
     * A description of the variant cover     	for the issue, if the issue is a
     * variant printing. For example, "Bryan Hitch     	Variant Cover" or "2nd
     * Printing Variant".
     *
     * @var string|Text
     */
    public $variantCover;

    /**
     * The individual who traces over the pencil drawings in ink after pencils are
     * complete.
     *
     * @var Person
     */
    public $inker;

    /**
     * The individual who draws the primary narrative artwork.
     *
     * @var Person
     */
    public $penciler;

    /**
     * The primary artist for a work     	in a medium other than pencils or
     * digital line art--for example, if the     	primary artwork is done in
     * watercolors or digital paints.
     *
     * @var Person
     */
    public $artist;

}
