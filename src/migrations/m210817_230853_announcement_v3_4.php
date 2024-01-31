<?php

namespace nystudio107\seomatic\migrations;

use Craft;
use craft\db\Migration;
use craft\i18n\Translation;

/**
 * m210817_230853_announcement_v3_4 migration.
 */
class m210817_230853_announcement_v3_4 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        if (version_compare(Craft::$app->getVersion(), '3.7', '>=')) {
            Craft::$app->announcements->push(
                Translation::prep('seomatic', 'SEO Settings fields', []),
                Translation::prep('seomatic', 'The [SEO Settings]({url}) fields now feature **Override** lightswitches next to each setting, letting you explicitly override SEO settings on a per-entry basis.', [
                    'url' => 'https://nystudio107.com/docs/seomatic/fields.html',
                ]),
                'seomatic'
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m210817_230853_announcement_v3_4 cannot be reverted.\n";
        return false;
    }
}
