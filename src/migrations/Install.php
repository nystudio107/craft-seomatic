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
use nystudio107\seomatic\fields\Seomatic_Meta as Seomatic_MetaField;

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
            // Refresh the db schema caches
            Craft::$app->db->schema->refresh();
            $this->insertDefaultData();
            $this->migrateData();
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
            // seomatic_metabundles table
            $this->createTable(
                '{{%seomatic_metabundles}}',
                [
                    'id'          => $this->primaryKey(),
                    'dateCreated' => $this->dateTime()->notNull(),
                    'dateUpdated' => $this->dateTime()->notNull(),
                    'uid'         => $this->uid(),

                    'bundleVersion'              => $this->string()->notNull()->defaultValue(''),
                    'sourceBundleType'           => $this->string()->notNull()->defaultValue(''),
                    'sourceId'                   => $this->integer()->null(),
                    'sourceName'                 => $this->string()->notNull()->defaultValue(''),
                    'sourceHandle'               => $this->string(64)->notNull()->defaultValue(''),
                    'sourceType'                 => $this->string(64)->notNull()->defaultValue(''),
                    'sourceTemplate'             => $this->string(500)->defaultValue(''),
                    'sourceSiteId'               => $this->integer()->null(),
                    'sourceAltSiteSettings'      => $this->text(),
                    'sourceDateUpdated'          => $this->dateTime()->notNull(),
                    'metaGlobalVars'             => $this->text(),
                    'metaSiteVars'               => $this->text(),
                    'metaSitemapVars'            => $this->text(),
                    'metaContainers'             => $this->text(),
                    'redirectsContainer'         => $this->text(),
                    'frontendTemplatesContainer' => $this->text(),
                    'metaBundleSettings'         => $this->text(),
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
        // seomatic_metabundles table
        $this->createIndex(
            $this->db->getIndexName(
                '{{%seomatic_metabundles}}',
                'sourceBundleType',
                false
            ),
            '{{%seomatic_metabundles}}',
            'sourceBundleType',
            false
        );
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
                'sourceHandle',
                false
            ),
            '{{%seomatic_metabundles}}',
            'sourceHandle',
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
        // Insert our default data
        Seomatic::$plugin->metaBundles->createGlobalMetaBundles();
        Seomatic::$plugin->metaBundles->createContentMetaBundles();
    }

    /**
     * @return void
     */
    protected function migrateData()
    {
        // Migrate the old Seomatic_Meta field
        $this->update('{{%fields}}', [
            'type' => Seomatic_MetaField::class
        ], ['type' => 'Seomatic_Meta']);
    }

    /**
     * @return void
     */
    protected function removeTables()
    {
        // seomatic_metabundles table
        $this->dropTableIfExists('{{%seomatic_metabundles}}');
        // seomatic_frontendtemplates table (deprecated)
        $this->dropTableIfExists('{{%seomatic_frontendtemplates}}');
    }
}
