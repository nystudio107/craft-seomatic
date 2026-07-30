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
 * Trait for Book.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Book
 */
trait BookTrait
{
    /**
     * Indicates whether the book is an abridged edition.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $abridged;

    /**
     * The edition of the book.
     *
     * @var string|array|Text|Text[]
     */
    public $bookEdition;

    /**
     * The format of the book.
     *
     * @var array|BookFormatType|BookFormatType[]
     */
    public $bookFormat;

    /**
     * The illustrator of the book.
     *
     * @var array|Person|Person[]
     */
    public $illustrator;

    /**
     * The ISBN of the book.
     *
     * @var string|array|Text|Text[]
     */
    public $isbn;

    /**
     * The number of pages in the book.
     *
     * @var int|array|Integer|Integer[]
     */
    public $numberOfPages;
}
