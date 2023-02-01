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
 * Trait for DataFeedItem.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DataFeedItem
 */
trait DataFeedItemTrait
{
    /**
     * An entity represented by an entry in a list or data feed (e.g. an 'artist'
     * in a list of 'artists').
     *
     * @var Thing
     */
    public $item;

    /**
     * The date on which the CreativeWork was created or the item was added to a
     * DataFeed.
     *
     * @var DateTime|Date
     */
    public $dateCreated;

    /**
     * The datetime the item was removed from the DataFeed.
     *
     * @var Date|DateTime
     */
    public $dateDeleted;

    /**
     * The date on which the CreativeWork was most recently modified or when the
     * item's entry was modified within a DataFeed.
     *
     * @var DateTime|Date
     */
    public $dateModified;
}
