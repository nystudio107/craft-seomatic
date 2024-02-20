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
 * Trait for ListItem.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ListItem
 */
trait ListItemTrait
{
    /**
     * A link to the ListItem that follows the current one.
     *
     * @var array|ListItem|ListItem[]
     */
    public $nextItem;

    /**
     * An entity represented by an entry in a list or data feed (e.g. an 'artist'
     * in a list of 'artists').
     *
     * @var array|Thing|Thing[]
     */
    public $item;

    /**
     * A link to the ListItem that precedes the current one.
     *
     * @var array|ListItem|ListItem[]
     */
    public $previousItem;

    /**
     * The position of an item in a series or sequence of items.
     *
     * @var int|string|array|Integer|Integer[]|array|Text|Text[]
     */
    public $position;
}
