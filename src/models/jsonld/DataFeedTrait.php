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
 * Trait for DataFeed.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DataFeed
 */
trait DataFeedTrait
{
    /**
     * An item within a data feed. Data feeds may have many elements.
     *
     * @var string|array|DataFeedItem|DataFeedItem[]|array|Text|Text[]|array|Thing|Thing[]
     */
    public $dataFeedElement;
}
