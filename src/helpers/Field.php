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

use nystudio107\seomatic\services\MetaBundles;

use Craft;
use craft\base\Element;
use craft\base\Field as BaseField;
use craft\elements\MatrixBlock;
use craft\fields\Assets as AssetsField;
use craft\fields\Matrix as MatrixField;
use craft\fields\PlainText as PlainTextField;
use craft\redactor\Field as RedactorField;
use craft\ckeditor\Field as CKEditorField;

use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Field
{
    // Constants
    // =========================================================================

    const TEXT_FIELD_CLASS_KEY = 'text';
    const ASSET_FIELD_CLASS_KEY = 'asset';
    const FIELD_CLASSES = [
        self::TEXT_FIELD_CLASS_KEY  => [
            PlainTextField::class,
            MatrixField::class,
            RedactorField::class,
            CKEditorField::class,
        ],
        self::ASSET_FIELD_CLASS_KEY => [
            AssetsField::class,
        ],
    ];

    // Static Methods
    // =========================================================================

    /**
     * Return all of the fields in the $element of the type $fieldType class
     *
     * @param Element $element
     * @param string  $fieldType
     * @param bool    $keysOnly
     *
     * @return array
     */
    public static function fieldsOfType(Element $element, string $fieldType, bool $keysOnly = true)
    {
        $foundFields = [];

        $layout = $element->getFieldLayout();
        $fields = $layout->getFields();
        /** @var  $field BaseField */
        foreach ($fields as $field) {
            if ($field instanceof $fieldType) {
                $foundFields[$field->handle] = $field->name;
            }
        }

        // Return only the keys if asked
        if ($keysOnly) {
            $foundFields = array_keys($foundFields);
        }

        return $foundFields;
    }

    /**
     * Return all of the fields from the $sourceBundleType in the $sourceHandle
     * of the type $fieldType class
     *
     * @param string $sourceBundleType
     * @param string $sourceHandle
     * @param string $fieldClassKey
     * @param bool   $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromSource(
        string $sourceBundleType,
        string $sourceHandle,
        string $fieldClassKey,
        bool $keysOnly = true
    ) {
        $foundFields = [];
        $layouts = [];
        if (!empty(self::FIELD_CLASSES[$fieldClassKey])) {
            $fieldClasses = self::FIELD_CLASSES[$fieldClassKey];
            // Get the layouts
            switch ($sourceBundleType) {
                case MetaBundles::GLOBAL_META_BUNDLE:
                    break;

                case MetaBundles::SECTION_META_BUNDLE:
                    $entryTypes = Craft::$app->getSections()->getSectionByHandle($sourceHandle)->getEntryTypes();
                    foreach ($entryTypes as $entryType) {
                        $layouts[] = Craft::$app->getFields()->getLayoutById($entryType->fieldLayoutId);
                    }
                    break;

                case MetaBundles::CATEGORYGROUP_META_BUNDLE:
                    try {
                        $layoutId = Craft::$app->getCategories()->getGroupByHandle($sourceHandle)->getFieldLayoutId();
                    } catch (InvalidConfigException $e) {
                        $layoutId = null;
                    }
                    if ($layoutId) {
                        $layouts[] = Craft::$app->getFields()->getLayoutById($layoutId);
                    }
                    break;
                // @TODO: handle commerce products
            }
            // Iterate through the layouts looking for the fields of the type $fieldType
            foreach ($layouts as $layout) {
                $fields = $layout->getFields();
                /** @var  $field BaseField */
                foreach ($fields as $field) {
                    foreach ($fieldClasses as $fieldClassKey) {
                        if ($field instanceof $fieldClassKey) {
                            $foundFields[$field->handle] = $field->name;
                        }
                    }
                }
            }
        }

        // Return only the keys if asked
        if ($keysOnly) {
            $foundFields = array_keys($foundFields);
        }

        return $foundFields;
    }

    /**
     * Return all of the fields in the $matrixBlock of the type $fieldType class
     *
     * @param MatrixBlock $matrixBlock
     * @param string      $fieldType
     * @param bool        $keysOnly
     *
     * @return array
     */
    public static function matrixFieldsOfType(MatrixBlock $matrixBlock, string $fieldType, bool $keysOnly = true)
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
                if ($field instanceof $fieldType) {
                    $foundFields[$field->handle] = $field->name;
                }
            }
        }

        // Return only the keys if asked
        if ($keysOnly) {
            $foundFields = array_keys($foundFields);
        }

        return $foundFields;
    }
}
