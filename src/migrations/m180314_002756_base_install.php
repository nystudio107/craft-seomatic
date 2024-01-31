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

/**
 * @author    nystudio107
 * @package   SEOmatic
 * @since     3.0.0
 */
class m180314_002756_base_install extends Install
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $result = parent::safeUp();
        // Do other content migrations here

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $result = parent::safeDown();
        // Do other content removal here

        return $result;
    }

    // Protected Methods
    // =========================================================================
}
