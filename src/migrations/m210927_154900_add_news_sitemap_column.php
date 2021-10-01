<?php

namespace nystudio107\seomatic\migrations;

use Craft;
use craft\db\Migration;

/**
 * m210927_154900_add_news_sitemap_column migration.
 */
class m210927_154900_add_news_sitemap_column extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        if (!$this->db->columnExists('{{%seomatic_metabundles}}', 'metaNewsSitemapVars')) {
            $this->addColumn(
                '{{%seomatic_metabundles}}',
                'metaNewsSitemapVars',
                $this->text()->null()->after('metaSitemapVars')
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m210927_154900_add_news_sitemap_column cannot be reverted.\n";
        return false;
    }
}
