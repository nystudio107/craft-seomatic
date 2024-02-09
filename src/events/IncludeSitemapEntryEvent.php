<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\events;

use craft\base\ElementInterface;
use nystudio107\seomatic\models\MetaBundle;
use yii\base\Event;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     4.0.37
 */
class IncludeSitemapEntryEvent extends Event
{
    // Properties
    // =========================================================================

    /**
     * @var ElementInterface The Craft element corresponding to the sitemap entry
     */
    public $element;

    /**
     * @var MetaBundle The SEOmatic MetaBundle corresponding to the sitemap entry
     */
    public $metaBundle;

    /**
     * @var bool Whether to include the sitemap entry.
     */
    public $include;
}
