<?php

namespace nystudio107\seomatic\migrations;

use craft\db\Migration;

/**
 * m190401_220828_longer_handles migration.
 */
class m190401_220828_longer_handles extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // https://github.com/yiisoft/yii2/issues/4492
        if ($this->db->getIsPgsql()) {
            $this->alterColumn(
                '{{%seomatic_metabundles}}',
                'sourceHandle',
                $this->string()
            );
            $this->alterColumn(
                '{{%seomatic_metabundles}}',
                'sourceHandle',
                "SET DEFAULT ''"
            );
        }
        if ($this->db->getIsMysql()) {
            $this->alterColumn(
                '{{%seomatic_metabundles}}',
                'sourceHandle',
                $this->string()->defaultValue('')
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m190401_220828_longer_handles cannot be reverted.\n";
        return false;
    }
}
