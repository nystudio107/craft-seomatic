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

use yii\base\Event;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.1.0
 */
class IncludeContainerEvent extends Event
{
    // Properties
    // =========================================================================

    /**
     * @var bool Whether to include the container.
     */
    public $include;
}
