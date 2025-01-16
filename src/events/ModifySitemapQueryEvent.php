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

use craft\elements\db\ElementQueryInterface;
use nystudio107\seomatic\models\MetaBundle;
use yii\base\Event;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     5.1.10
 */
class ModifySitemapQueryEvent extends Event
{
    // Properties
    // =========================================================================

    /**
     * @var ElementQueryInterface The element query that will be used to generate a sitemap
     */
    public $query;

    /**
     * @var MetaBundle The SEOmatic MetaBundle corresponding to the sitemap entry
     */
    public $metaBundle;
}
