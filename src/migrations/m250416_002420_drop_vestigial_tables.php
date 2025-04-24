<?php

namespace nystudio107\seomatic\migrations;

use craft\db\Migration;

/**
 * m250416_002420_drop_vestigial_tables migration.
 */
class m250416_002420_drop_vestigial_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
        // Craft 2.x vestigial seomatic_meta table
        $this->dropTableIfExists('{{%seomatic_meta}}');
        // Craft 2.x vestigial seomatic_settings table
        $this->dropTableIfExists('{{%seomatic_settings}}');

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m250416_002420_drop_vestigial_tables cannot be reverted.\n";
        return false;
    }
}
