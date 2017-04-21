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

namespace nystudio107\seomatic\migrations;

use nystudio107\seomatic\Seomatic;

use Craft;
use craft\config\DbConfig;
use craft\db\Migration;

/**
 * @author    nystudio107
 * @package   SEOmatic
 * @since     3.0.0
 */
class Install extends Migration
{
    // Public Properties
    // =========================================================================

    /**
     * @var string The database driver to use
     */
    public $driver;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->driver = Craft::$app->getConfig()->getDb()->driver;
        if ($this->createTables()) {
            $this->createIndexes();
            $this->addForeignKeys();
            $this->insertDefaultData();
        }

        return true;
    }

   /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->driver = Craft::$app->getConfig()->getDb()->driver;
        $this->removeTables();

        return true;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @return bool
     */
    protected function createTables()
    {
        $tablesCreated = false;

        $tableSchema = Craft::$app->db->schema->getTableSchema('{{%seomatic_metabundles}}');
        if ($tableSchema === null) {
            $tablesCreated = true;
            $this->createTable(
                '{{%seomatic_metabundles}}',
                [
                    'id' => $this->primaryKey(),
                    'dateCreated' => $this->dateTime()->notNull(),
                    'dateUpdated' => $this->dateTime()->notNull(),
                    'uid' => $this->uid(),

                    'sourceElementType' => $this->string()->notNull()->defaultValue(''),
                    'sourceId' => $this->integer()->null(),
                    'sourceName' => $this->string()->notNull()->defaultValue(''),
                    'sourceHandle' => $this->string(64)->notNull()->defaultValue(''),
                    'sourceType' => $this->string(64)->notNull()->defaultValue(''),
                    'sourceTemplate' => $this->string(500)->notNull()->defaultValue(''),
                    'sourceSiteId' => $this->integer()->null(),
                    'sourceAltSiteSettings' => $this->text(),
                    'sourceDateUpdated' => $this->dateTime()->notNull(),

                    'sitemapUrls' => $this->boolean()->notNull(),
                    'sitemapAssets' => $this->boolean()->notNull(),
                    'sitemapFiles' => $this->boolean()->notNull(),
                    'sitemapAltLinks' => $this->boolean()->notNull(),
                    'sitemapChangeFreq' => $this->string(16)->notNull()->defaultValue(''),
                    'sitemapPriority' => $this->float()->notNull(),

                    'metaTagContainer' => $this->text(),
                    'metaLinkContainer' => $this->text(),
                    'metaScriptContainer' => $this->text(),
                    'metaJsonLdContainer' => $this->text(),
                    'redirectsContainer' => $this->text(),
                ]
            );
        }

        return $tablesCreated;
    }

    /**
     * @return void
     */
    protected function createIndexes()
    {
        $this->createIndex(
            $this->db->getIndexName(
                '{{%seomatic_metabundles}}',
                'sourceId',
                false
            ),
            '{{%seomatic_metabundles}}',
            'sourceId',
            false
        );
        $this->createIndex(
            $this->db->getIndexName(
                '{{%seomatic_metabundles}}',
                'sourceSiteId',
                false
            ),
            '{{%seomatic_metabundles}}',
            'sourceSiteId',
            false
        );
        $this->createIndex(
            $this->db->getIndexName(
                '{{%seomatic_metabundles}}',
                'sourceTemplate',
                false
            ),
            '{{%seomatic_metabundles}}',
            'sourceTemplate',
            false
        );
        // Additional commands depending on the db driver
        switch ($this->driver) {
            case DbConfig::DRIVER_MYSQL:
                break;
            case DbConfig::DRIVER_PGSQL:
                break;
        }
    }

    /**
     * @return void
     */
    protected function addForeignKeys()
    {
        $this->addForeignKey(
            $this->db->getForeignKeyName('{{%seomatic_metabundles}}', 'sourceId'),
            '{{%seomatic_metabundles}}',
            'sourceId',
            '{{%elements}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            $this->db->getForeignKeyName('{{%seomatic_metabundles}}', 'sourceSiteId'),
            '{{%seomatic_metabundles}}',
            'sourceSiteId',
            '{{%sites}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @return void
     */
    protected function insertDefaultData()
    {
    }

    /**
     * @return void
     */
    protected function removeTables()
    {
        $this->dropTableIfExists('{{%seomatic_metabundles}}');
    }
}
