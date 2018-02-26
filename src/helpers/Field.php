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

use craft\base\Component;
use craft\base\Element;
use craft\base\Field as BaseField;
use craft\elements\MatrixBlock;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Field
{
    // Static Methods
    // =========================================================================

    /**
     * Return all of the fields in the $element of the type $fieldType class
     *
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
        /** @var  $field BaseField */
        foreach ($fields as $field) {
            if (($field instanceof $fieldType) || (is_subclass_of($field, $fieldType))) {
                $foundFields[] = $field->handle;
            }
        }

        return $foundFields;
    }

    /**
     * Return all of the fields in the $matrixBlock of the type $fieldType class
     *
     * @param MatrixBlock $matrixBlock
     * @param string      $fieldType
     *
     * @return array
     */
    public static function matrixFieldsOfType(MatrixBlock $matrixBlock, string $fieldType)
    {
        $foundFields = [];

        try {
            $matrixBlockTypeModel = $matrixBlock->getType();
        } catch (InvalidConfigException $e) {
            $matrixBlockTypeModel = null;
        }
        if ($matrixBlockTypeModel) {
            $fields = $matrixBlockTypeModel->getFields();
            /** @var  $field BaseField */
            foreach ($fields as $field) {
                if (($field instanceof $fieldType) || (is_subclass_of($field, $fieldType))) {
                    $foundFields[] = $field->handle;
                }
            }
        }

        return $foundFields;
    }
}
