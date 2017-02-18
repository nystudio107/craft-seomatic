<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * VisualArtwork - A work of art that is primarily visual in character.
 * Extends: CreativeWork
 * @see    http://schema.org/VisualArtwork
 */
class VisualArtwork extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'VisualArtwork';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/VisualArtwork';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A work of art that is primarily visual in character.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreativeWork';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * The number of copies when multiple copies of a piece of artwork are
     * produced - e.g. for a limited edition of 20 prints, 'artEdition' refers to
     * the total number of copies (in this example "20").
     * @var mixed int, string [schema.org types: Integer, Text]
     */
    public $artEdition;

    /**
     * The material used. (e.g. Oil, Watercolour, Acrylic, Linoprint, Marble,
     * Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut,
     * Pencil, Mixed Media, etc.) Supersedes material.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $artMedium;

    /**
     * e.g. Painting, Drawing, Sculpture, Print, Photograph, Assemblage, Collage,
     * etc.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $artform;

    /**
     * The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board,
     * etc. Supersedes surface.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $artworkSurface;

    /**
     * The depth of the item.
     * @var mixed Distance, QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $depth;

    /**
     * The height of the item.
     * @var mixed Distance, QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $height;

    /**
     * The width of the item.
     * @var mixed Distance, QuantitativeValue [schema.org types: Distance, QuantitativeValue]
     */
    public $width;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'artEdition',
                'artMedium',
                'artform',
                'artworkSurface',
                'depth',
                'height',
                'width',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'artEdition' => ['Integer','Text'],
                'artMedium' => ['Text','URL'],
                'artform' => ['Text','URL'],
                'artworkSurface' => ['Text','URL'],
                'depth' => ['Distance','QuantitativeValue'],
                'height' => ['Distance','QuantitativeValue'],
                'width' => ['Distance','QuantitativeValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'artEdition' => 'The number of copies when multiple copies of a piece of artwork are produced - e.g. for a limited edition of 20 prints, \'artEdition\' refers to the total number of copies (in this example "20").',
                'artMedium' => 'The material used. (e.g. Oil, Watercolour, Acrylic, Linoprint, Marble, Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut, Pencil, Mixed Media, etc.) Supersedes material.',
                'artform' => 'e.g. Painting, Drawing, Sculpture, Print, Photograph, Assemblage, Collage, etc.',
                'artworkSurface' => 'The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board, etc. Supersedes surface.',
                'depth' => 'The depth of the item.',
                'height' => 'The height of the item.',
                'width' => 'The width of the item.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['artEdition','artMedium','artform','artworkSurface','depth','height','width',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class VisualArtwork*/
