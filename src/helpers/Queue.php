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

namespace nystudio107\seomatic\helpers;

use nystudio107\seomatic\Seomatic;

use Craft;
use craft\helpers\App;
use craft\queue\QueueInterface;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.16
 */
class Queue
{
    // Constants
    // =========================================================================

    // Static Methods
    // =========================================================================

    /**
     * Run the queue via CLI command
     *
     * @return void
     */
    public static function runConsole()
    {
        $queue = Craft::$app->getQueue();
        // Make sure the queue uses the Craft web interface
        if (!$queue instanceof QueueInterface) {
            return;
        }

        // Run the queue
        App::maxPowerCaptain();
        $queue->run();
    }
}
