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

use nystudio107\seomatic\fields\Seomatic_Meta as Seomatic_MetaField;

use craft\db\Migration;

/**
 * @author    nystudio107
 * @package   SEOmatic
 * @since     3.0.0
 */
class m180403_002756_field_type extends Migration
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        echo "m180403_002756_field_type updating.\n";

        // Migrate the old Seomatic_Meta field
        $this->update('{{%fields}}', [
            'type' => Seomatic_MetaField::class
        ], ['type' => 'Seomatic_Meta']);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180403_002756_field_type cannot be reverted.\n";

        return false;
    }

    // Protected Methods
    // =========================================================================

}
