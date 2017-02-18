<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\records;

use craft\db\ActiveRecord;

/**
 * Class Sitemaps record.
 *
 * @property integer    $id             ID
 * @property string     $sitemapType    Sitemap Type
 * @property string     $sitemapHandle  Sitemap Handle
 * @property DateTime   $dateUpdated    DateTime last updated
 *
 * @author    nystudio107
 * @package   SEOmatic
 * @since     2.0.0
 */
class Sitemaps extends ActiveRecord
{

    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    // Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%seomatic_sitemaps}}';
    }
}
