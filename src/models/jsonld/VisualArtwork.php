<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * VisualArtwork - A work of art that is primarily visual in character.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/VisualArtwork
 */
class VisualArtwork extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'VisualArtwork';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/VisualArtwork';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A work of art that is primarily visual in character.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The number of copies when multiple copies of a piece of artwork are
     * produced - e.g. for a limited edition of 20 prints, 'artEdition' refers to
     * the total number of copies (in this example "20").
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $artEdition;

    /**
     * The material used. (e.g. Oil, Watercolour, Acrylic, Linoprint, Marble,
     * Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut,
     * Pencil, Mixed Media, etc.)
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $artMedium;

    /**
     * e.g. Painting, Drawing, Sculpture, Print, Photograph, Assemblage, Collage,
     * etc.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $artform;

    /**
     * The primary artist for a work in a medium other than pencils or digital
     * line art--for example, if the primary artwork is done in watercolors or
     * digital paints.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $artist;

    /**
     * The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board,
     * etc. Supersedes surface.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $artworkSurface;

    /**
     * The individual who adds color to inked drawings.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $colorist;

    /**
     * The depth of the item.
     *
     * @var mixed|Distance|QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $depth;

    /**
     * The height of the item.
     *
     * @var mixed|Distance|QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $height;

    /**
     * The individual who traces over the pencil drawings in ink after pencils are
     * complete.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $inker;

    /**
     * The individual who adds lettering, including speech balloons and sound
     * effects, to artwork.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $letterer;

    /**
     * The individual who draws the primary narrative artwork.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $penciler;

    /**
     * The width of the item.
     *
     * @var mixed|Distance|QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $width;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'artEdition',
        'artMedium',
        'artform',
        'artist',
        'artworkSurface',
        'colorist',
        'depth',
        'height',
        'inker',
        'letterer',
        'penciler',
        'width'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'artEdition' => ['Integer','Text'],
        'artMedium' => ['Text','URL'],
        'artform' => ['Text','URL'],
        'artist' => ['Person'],
        'artworkSurface' => ['Text','URL'],
        'colorist' => ['Person'],
        'depth' => ['Distance','QuantitativeValue'],
        'height' => ['Distance','QuantitativeValue'],
        'inker' => ['Person'],
        'letterer' => ['Person'],
        'penciler' => ['Person'],
        'width' => ['Distance','QuantitativeValue']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'artEdition' => 'The number of copies when multiple copies of a piece of artwork are produced - e.g. for a limited edition of 20 prints, \'artEdition\' refers to the total number of copies (in this example "20").',
        'artMedium' => 'The material used. (e.g. Oil, Watercolour, Acrylic, Linoprint, Marble, Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut, Pencil, Mixed Media, etc.)',
        'artform' => 'e.g. Painting, Drawing, Sculpture, Print, Photograph, Assemblage, Collage, etc.',
        'artist' => 'The primary artist for a work in a medium other than pencils or digital line art--for example, if the primary artwork is done in watercolors or digital paints.',
        'artworkSurface' => 'The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board, etc. Supersedes surface.',
        'colorist' => 'The individual who adds color to inked drawings.',
        'depth' => 'The depth of the item.',
        'height' => 'The height of the item.',
        'inker' => 'The individual who traces over the pencil drawings in ink after pencils are complete.',
        'letterer' => 'The individual who adds lettering, including speech balloons and sound effects, to artwork.',
        'penciler' => 'The individual who draws the primary narrative artwork.',
        'width' => 'The width of the item.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['artEdition','artMedium','artform','artist','artworkSurface','colorist','depth','height','inker','letterer','penciler','width'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
