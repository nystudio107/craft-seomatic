<?php

namespace nystudio107\seomatic\migrations;

use craft\db\Migration;

/**
 * m180502_202319_remove_field_metabundles migration.
 */
class m180502_202319_remove_field_metabundles extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->delete('{{%seomatic_metabundles}}', ['sourceBundleType' => 'field']);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180502_202319_remove_field_metabundles cannot be reverted.\n";
        return false;
    }
}
