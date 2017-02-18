<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Book - A book.
 * Extends: CreativeWork
 * @see    http://schema.org/Book
 */
class Book extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Book';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Book';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A book.';

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
     * The edition of the book.
     * @var string [schema.org types: Text]
     */
    public $bookEdition;

    /**
     * The format of the book.
     * @var BookFormatType [schema.org types: BookFormatType]
     */
    public $bookFormat;

    /**
     * The illustrator of the book.
     * @var Person [schema.org types: Person]
     */
    public $illustrator;

    /**
     * The ISBN of the book.
     * @var string [schema.org types: Text]
     */
    public $isbn;

    /**
     * The number of pages in the book.
     * @var int [schema.org types: Integer]
     */
    public $numberOfPages;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'bookEdition',
                'bookFormat',
                'illustrator',
                'isbn',
                'numberOfPages',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'bookEdition' => ['Text'],
                'bookFormat' => ['BookFormatType'],
                'illustrator' => ['Person'],
                'isbn' => ['Text'],
                'numberOfPages' => ['Integer'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'bookEdition' => 'The edition of the book.',
                'bookFormat' => 'The format of the book.',
                'illustrator' => 'The illustrator of the book.',
                'isbn' => 'The ISBN of the book.',
                'numberOfPages' => 'The number of pages in the book.',
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
                [['bookEdition','bookFormat','illustrator','isbn','numberOfPages',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Book*/
