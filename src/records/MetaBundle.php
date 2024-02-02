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

use Craft;
use craft\db\ActiveRecord;
use craft\helpers\StringHelper;
use function is_string;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaBundle extends ActiveRecord
{
    // Public Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%seomatic_metabundles}}';
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert): bool
    {
        $result = parent::beforeSave($insert);

        if (!Craft::$app->getDb()->getSupportsMb4()) {
            foreach ($this->fields() as $attribute) {
                if (is_string($this->$attribute)) {
                    // Encode any 4-byte UTF-8 characters.
                    $this->$attribute = StringHelper::encodeMb4($this->$attribute);
                }
            }
        }

        return $result;
    }
}
