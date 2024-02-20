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
 * Trait for VisualArtwork.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VisualArtwork
 */
trait VisualArtworkTrait
{
    /**
     * The width of the item.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Distance|Distance[]
     */
    public $width;

    /**
     * The height of the item.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Distance|Distance[]
     */
    public $height;

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
     * The material used. (E.g. Oil, Watercolour, Acrylic, Linoprint, Marble,
     * Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut,
     * Pencil, Mixed Media, etc.)
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $artMedium;

    /**
     * e.g. Painting, Drawing, Sculpture, Print, Photograph, Assemblage, Collage,
     * etc.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $artform;

    /**
     * The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board,
     * etc.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $artworkSurface;

    /**
     * A material used as a surface in some artwork, e.g. Canvas, Paper, Wood,
     * Board, etc.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $surface;

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

    /**
     * The number of copies when multiple copies of a piece of artwork are
     * produced - e.g. for a limited edition of 20 prints, 'artEdition' refers to
     * the total number of copies (in this example "20").
     *
     * @var string|int|array|Text|Text[]|array|Integer|Integer[]
     */
    public $artEdition;

    /**
     * The depth of the item.
     *
     * @var array|QuantitativeValue|QuantitativeValue[]|array|Distance|Distance[]
     */
    public $depth;
}
