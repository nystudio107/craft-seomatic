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
 * schema.org version: v30.0
 * Trait for VisualArtwork.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/VisualArtwork
 */
trait VisualArtworkTrait
{
    /**
     * The number of copies when multiple copies of a piece of artwork are
     * produced - e.g. for a limited edition of 20 prints, 'artEdition' refers to
     * the total number of copies (in this example "20").
     *
     * @var int|string|array|Integer|Integer[]|array|Text|Text[]
     */
    public $artEdition;

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
     * The primary artist for a work         in a medium other than pencils or
     * digital line art--for example, if the         primary artwork is done in
     * watercolors or digital paints.
     *
     * @var array|Person|Person[]
     */
    public $artist;

    /**
     * The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board,
     * etc.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $artworkSurface;

    /**
     * The individual who adds color to inked drawings.
     *
     * @var array|Person|Person[]
     */
    public $colorist;

    /**
     * The depth of the item.
     *
     * @var array|Distance|Distance[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $depth;

    /**
     * The height of the item.
     *
     * @var array|Distance|Distance[]|array|QuantitativeValue|QuantitativeValue[]
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
     * The individual who adds lettering, including speech balloons and sound
     * effects, to artwork.
     *
     * @var array|Person|Person[]
     */
    public $letterer;

    /**
     * The individual who draws the primary narrative artwork.
     *
     * @var array|Person|Person[]
     */
    public $penciler;

    /**
     * A material used as a surface in some artwork, e.g. Canvas, Paper, Wood,
     * Board, etc.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $surface;

    /**
     * The weight of the product or person.
     *
     * @var array|Mass|Mass[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $weight;

    /**
     * The width of the item.
     *
     * @var array|Distance|Distance[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $width;
}
