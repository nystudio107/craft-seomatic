<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
     * @var QuantitativeValue|Distance
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
     * The height of the item.
     *
     * @var Distance|QuantitativeValue
     */
    public $height;

    /**
     * A material used as a surface in some artwork, e.g. Canvas, Paper, Wood,
     * Board, etc.
     *
     * @var string|URL|Text
     */
    public $surface;

    /**
     * The individual who adds color to inked drawings.
     *
     * @var Person
     */
    public $colorist;

    /**
     * The individual who traces over the pencil drawings in ink after pencils are
     * complete.
     *
     * @var Person
     */
    public $inker;

    /**
     * e.g. Painting, Drawing, Sculpture, Print, Photograph, Assemblage, Collage,
     * etc.
     *
     * @var string|Text|URL
     */
    public $artform;

    /**
     * The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board,
     * etc.
     *
     * @var string|URL|Text
     */
    public $artworkSurface;

    /**
     * The number of copies when multiple copies of a piece of artwork are
     * produced - e.g. for a limited edition of 20 prints, 'artEdition' refers to
     * the total number of copies (in this example "20").
     *
     * @var int|string|Integer|Text
     */
    public $artEdition;

    /**
     * The depth of the item.
     *
     * @var Distance|QuantitativeValue
     */
    public $depth;

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

    /**
     * The material used. (e.g. Oil, Watercolour, Acrylic, Linoprint, Marble,
     * Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut,
     * Pencil, Mixed Media, etc.)
     *
     * @var string|URL|Text
     */
    public $artMedium;

}
