<?php

namespace nystudio107\seomatic\migrations;

use Craft;
use craft\db\Migration;

use nystudio107\seomatic\seoelements\SeoEvent;
use Solspace\Calendar\Calendar as CalendarPlugin;

/**
 * m190518_030221_calendar_events migration.
 */
class m190518_030221_calendar_events extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // Get all of the Solspace Calendar CalendarModel's with URLs
        $requiredPlugin = SeoEvent::getRequiredPluginHandle();
        if ($requiredPlugin !== null && Craft::$app->getPlugins()->getPlugin($requiredPlugin)) {
            $calendar = CalendarPlugin::getInstance();
            if ($calendar !== null) {
                SeoEvent::createAllContentMetaBundles();
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m190518_030221_calendar_events cannot be reverted.\n";
        return false;
    }
}
