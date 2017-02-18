<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\migrations;

use Craft;
use craft\db\Connection;
use craft\db\Migration;
use craft\services\Config;

/**
 * Installation Migration
 *
 * @author    nystudio107
 * @package   SEOmatic
 * @since     2.0.0
 */
class Install extends Migration
{
    // Properties
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
        $this->driver = Craft::$app->getConfig()->get('driver', Config::CATEGORY_DB);
        $this->createTables();
        $this->createIndexes();
        $this->addForeignKeys();
        $this->insertDefaultData();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->driver = Craft::$app->getConfig()->get('driver', Config::CATEGORY_DB);
        $this->removeIndexes();
        $this->removeTables();
        return true;
    }

    // Protected Methods
    // =========================================================================

    /**
     * Creates the tables.
     *
     * @return void
     */
    protected function createTables()
    {
        $this->createTable('{{%seomatic_sitemaps}}', [
            'id' => $this->primaryKey(),
            'sitemapType' => $this->string(50)->notNull()->defaultValue(''),
            'sitemapHandle' => $this->string(255)->notNull()->defaultValue(''),
            'dateUpdated' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * Creates the indexes.
     *
     * @return void
     */
    protected function createIndexes()
    {
        $this->createIndex($this->db->getIndexName('{{%seomatic_sitemaps}}', 'sitemapHandle', true), '{{%seomatic_sitemaps}}', 'sitemapHandle', true);

        // Additional commands depending on the db driver
        switch ($this->driver) {
            case Connection::DRIVER_MYSQL:
                break;
            case Connection::DRIVER_PGSQL:
                break;
        }
    }

    /**
     * Adds the foreign keys.
     *
     * @return void
     */
    protected function addForeignKeys()
    {
    }

    /**
     * Populates the DB with the default data.
     *
     * @return void
     */
    protected function insertDefaultData()
    {
    }

    /**
     * Removes the tables.
     *
     * @return void
     */
    protected function removeTables()
    {
        $this->dropTable('{{%seomatic_sitemaps}}');
    }

    /**
     * Creates the indexes.
     *
     * @return void
     */
    protected function removeIndexes()
    {
        $this->dropIndex($this->db->getIndexName('{{%seomatic_sitemaps}}', 'sitemapHandle', true), '{{%seomatic_sitemaps}}');

    }

}
