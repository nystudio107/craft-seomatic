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

namespace nystudio107\seomatic\helpers;

use Craft;
use craft\base\Component;
use craft\base\Element;
use craft\fields\Assets;
use craft\models\FieldLayout;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Field extends Component
{
    // Static Methods
    // =========================================================================

    public static function assetFields(Element $element)
    {
        $assetFields = [];

        /** @var  $layout FieldLayout */
        $layout = $element->getFieldLayout();
        $fields = $layout->getFields();
        foreach ($fields as $field) {
            if (($field instanceof Assets) || (is_subclass_of($field, Assets::class))) {
                $assetFields[] = $field->handle;
            }
        }

        return $assetFields;
    }
}
