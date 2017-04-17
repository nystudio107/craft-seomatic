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
use craft\elements\MatrixBlock;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Field extends Component
{
    // Static Methods
    // =========================================================================

    /**
     * @param Element $element
     * @param string  $fieldType
     *
     * @return array
     */
    public static function fieldsOfType(Element $element, string $fieldType)
    {
        $foundFields = [];

        $layout = $element->getFieldLayout();
        $fields = $layout->getFields();
        foreach ($fields as $field) {
            if (($field instanceof $fieldType) || (is_subclass_of($field, $fieldType))) {
                $foundFields[] = $field->handle;
            }
        }

        return $foundFields;
    }

    public static function matrixFieldsOfType(MatrixBlock $matrixBlock, string $fieldType)
    {
        $foundFields = [];

        $matrixBlockTypeModel = $matrixBlock->getType();
        $fields = $matrixBlockTypeModel->getFields();
        foreach ($fields as $field) {
            if (($field instanceof $fieldType) || (is_subclass_of($field, $fieldType))) {
                $foundFields[] = $field->handle;
            }
        }

        return $foundFields;
    }

}
