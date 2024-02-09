<?php

namespace nystudio107\seomatic\migrations;

use craft\db\Migration;

/**
 * m200419_203444_add_type_id migration.
 */
class m200419_203444_add_type_id extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // Add in the siteId columns
        if (!$this->db->columnExists('{{%seomatic_metabundles}}', 'typeId')) {
            $this->addColumn(
                '{{%seomatic_metabundles}}',
                'typeId',
                $this->integer()->null()->after('sourceType')->defaultValue(null)
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m200419_203444_add_type_id cannot be reverted.\n";
        return false;
    }
}
