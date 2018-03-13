<?php

namespace nystudio107\seomatic\migrations;

use Craft;
use craft\db\Migration;

/**
 * m180209_195021_add_bundle_meta_settings migration.
 */
class m180209_195021_add_bundle_meta_settings extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // Add the metaBundleSettings column
        $this->addColumn(
            '{{%seomatic_metabundles}}',
            'metaBundleSettings',
            $this->text()->after('frontendTemplatesContainer')
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180209_195021_add_bundle_meta_settings cannot be reverted.\n";
        return false;
    }
}
