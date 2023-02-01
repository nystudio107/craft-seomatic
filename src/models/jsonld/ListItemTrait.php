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
 * Trait for ListItem.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ListItem
 */
trait ListItemTrait
{
    /**
     * An entity represented by an entry in a list or data feed (e.g. an 'artist'
     * in a list of 'artists').
     *
     * @var Thing
     */
    public $item;

    /**
     * A link to the ListItem that follows the current one.
     *
     * @var ListItem
     */
    public $nextItem;

    /**
     * A link to the ListItem that precedes the current one.
     *
     * @var ListItem
     */
    public $previousItem;

    /**
     * The position of an item in a series or sequence of items.
     *
     * @var string|int|Text|Integer
     */
    public $position;
}
