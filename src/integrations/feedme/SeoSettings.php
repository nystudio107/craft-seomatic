<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2020 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\integrations\feedme;

use nystudio107\seomatic\fields\SeoSettings as SeoSettingsField;

use Craft;

use craft\feedme\base\Field as FeedMeField;
use craft\feedme\base\FieldInterface as FeedMeFieldInterface;
use craft\feedme\helpers\DataHelper;

use Cake\Utility\Hash;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.0
 */
class SeoSettings extends FeedMeField implements FeedMeFieldInterface
{
    // Public Static Properties
    // =========================================================================

    public static $name = 'SEO Settings';
    public static $class = SeoSettingsField::class;

    // Public Methods
    // =========================================================================

    /**
     * @inheritDoc
     */
    public function getMappingTemplate()
    {
        return 'seomatic/_includes/integrations/feedme/seo-settings';
    }

    /**
     * @inheritDoc
     */
    public function parseField()
    {
        $preppedData = [];

        $fields = Hash::get($this->fieldInfo, 'fields');

        if (!$fields) {
            return null;
        }

        foreach ($fields as $subGroupHandle => $subGroup) {
            foreach ($subGroup as $subFieldHandle => $subFieldInfo) {
                $preppedData[$subGroupHandle][$subFieldHandle] = DataHelper::fetchValue($this->feedData, $subFieldInfo);
            }
        }

        // Protect against sending an empty array
        if (!$preppedData) {
            return null;
        }

        return $preppedData;
    }
}
