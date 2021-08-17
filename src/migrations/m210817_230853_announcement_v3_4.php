<?php

namespace nystudio107\seomatic\migrations;

use Craft;
use craft\db\Migration;

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
        Craft::$app->announcements->push(
            function($language) {
                return Craft::t('seomatic', 'SEOmatic - SEO Settings fields', [], $language);
            },
            function($language) {
                return Craft::t('seomatic', 'The [SEO Settings]({url}) fields in SEOmatic now feature **Override** light switches next to each setting, to improve the content authoring experience.', [
                    'url' => 'https://nystudio107.com/docs/seomatic/fields.html',
                ], $language);
            },
            'seomatic'
        );
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
