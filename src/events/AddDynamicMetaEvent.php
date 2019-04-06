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

namespace nystudio107\seomatic\events;

use yii\base\Event;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.1.48
 */
class AddDynamicMetaEvent extends Event
{
    // Properties
    // =========================================================================

    /**
     * @var string|null $uri     The URI of the route to add dynamic metadata for
     */
    public $uri;

    /**
     * @var int|null    $siteId  The siteId of the current site
     */
    public $siteId;
}
