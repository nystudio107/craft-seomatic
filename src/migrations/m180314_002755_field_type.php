<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\migrations;

use craft\db\Migration;

use nystudio107\seomatic\fields\Seomatic_Meta as Seomatic_MetaField;

/**
 * @author    nystudio107
 * @package   SEOmatic
 * @since     3.0.0
 */
class m180314_002755_field_type extends Migration
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        echo "m180314_002755_field_type updating.\n";

        // Migrate the old Seomatic_Meta field
        $this->update('{{%fields}}', [
            'type' => Seomatic_MetaField::class,
        ], ['type' => 'Seomatic_Meta']);

        // Refresh the field memoization
        if (method_exists(\Craft::$app->getFields(), 'refreshFields')) {
            \Craft::$app->getFields()->refreshFields();
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180314_002755_field_type cannot be reverted.\n";

        return false;
    }

    // Protected Methods
    // =========================================================================
}
