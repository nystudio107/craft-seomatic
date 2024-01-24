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

namespace nystudio107\seomatic\records;

use craft\db\ActiveRecord;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class FrontendTemplate extends ActiveRecord
{
    // Public Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%seomatic_frontendtemplates}}';
    }
}
