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
 * Trait for VisualArtwork.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VisualArtwork
 */
trait VisualArtworkTrait
{
    /**
     * The individual who traces over the pencil drawings in ink after pencils are
     * complete.
     *
     * @var Person
     */
    public $inker;

    /**
     * The width of the item.
     *
     * @var Distance|QuantitativeValue
     */
    public $width;

    /**
     * The individual who adds lettering, including speech balloons and sound
     * effects, to artwork.
     *
     * @var Person
     */
    public $letterer;

    /**
     * The depth of the item.
     *
     * @var QuantitativeValue|Distance
     */
    public $depth;

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
     * The height of the item.
     *
     * @var QuantitativeValue|Distance
     */
    public $height;

    /**
     * The individual who adds color to inked drawings.
     *
     * @var Person
     */
    public $colorist;

    /**
     * The material used. (E.g. Oil, Watercolour, Acrylic, Linoprint, Marble,
     * Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut,
     * Pencil, Mixed Media, etc.)
     *
     * @var string|URL|Text
     */
    public $artMedium;

    /**
     * A material used as a surface in some artwork, e.g. Canvas, Paper, Wood,
     * Board, etc.
     *
     * @var string|Text|URL
     */
    public $surface;

    /**
     * e.g. Painting, Drawing, Sculpture, Print, Photograph, Assemblage, Collage,
     * etc.
     *
     * @var string|URL|Text
     */
    public $artform;

    /**
     * The number of copies when multiple copies of a piece of artwork are
     * produced - e.g. for a limited edition of 20 prints, 'artEdition' refers to
     * the total number of copies (in this example "20").
     *
     * @var int|string|Integer|Text
     */
    public $artEdition;

    /**
     * The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board,
     * etc.
     *
     * @var string|URL|Text
     */
    public $artworkSurface;
}
