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

use nystudio107\seomatic\fields\SeoSettings as SeoSettingsField;
use nystudio107\seomatic\fields\Seomatic_Meta as Seomatic_MetaField;
use nystudio107\seomatic\services\MetaBundles;

use Craft;
use craft\base\Element;
use craft\base\Field as BaseField;
use craft\base\Volume;
use craft\elements\User;
use craft\ckeditor\Field as CKEditorField;
use craft\elements\MatrixBlock;
use craft\fields\Assets as AssetsField;
use craft\fields\Matrix as MatrixField;
use craft\fields\PlainText as PlainTextField;
use craft\fields\Tags as TagsField;
use craft\models\FieldLayout;
use craft\redactor\Field as RedactorField;

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
    const BLOCK_FIELD_CLASS_KEY = 'block';
    const SEO_SETTINGS_CLASS_KEY = 'seo';
    const OLD_SEOMATIC_META_CLASS_KEY = 'Seomatic_Meta';

    const FIELD_CLASSES = [
        self::TEXT_FIELD_CLASS_KEY  => [
            CKEditorField::class,
            PlainTextField::class,
            MatrixField::class,
            RedactorField::class,
            TagsField::class,
        ],
        self::ASSET_FIELD_CLASS_KEY => [
            AssetsField::class,
        ],
        self::BLOCK_FIELD_CLASS_KEY => [
            MatrixField::class,
        ],
        self::SEO_SETTINGS_CLASS_KEY => [
            SeoSettingsField::class,
        ],
        self::OLD_SEOMATIC_META_CLASS_KEY => [
            Seomatic_MetaField::class,
        ],
    ];

    // Static Methods
    // =========================================================================

    /**
     * Return all of the fields from the $layout that are of the type
     * $fieldClassKey
     *
     * @param string      $fieldClassKey
     * @param FieldLayout $layout
     * @param bool        $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromLayout(
        string $fieldClassKey,
        FieldLayout $layout,
        bool $keysOnly = true
    ): array {
        $foundFields = [];
        if (!empty(self::FIELD_CLASSES[$fieldClassKey])) {
            $fieldClasses = self::FIELD_CLASSES[$fieldClassKey];
            $fields = $layout->getFields();
            /** @var  $field BaseField */
            foreach ($fields as $field) {
                /** @var array $fieldClasses */
                foreach ($fieldClasses as $fieldClass) {
                    if ($field instanceof $fieldClass) {
                        $foundFields[$field->handle] = $field->name;
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
     * Return all of the fields in the $element of the type $fieldClassKey
     *
     * @param Element $element
     * @param string  $fieldClassKey
     * @param bool    $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromElement(
        Element $element,
        string $fieldClassKey,
        bool $keysOnly = true
    ): array {
        $foundFields = [];
        $layout = $element->getFieldLayout();
        if ($layout !== null) {
            $foundFields = self::fieldsOfTypeFromLayout($fieldClassKey, $layout, $keysOnly);
        }

        return $foundFields;
    }

    /**
     * Return all of the fields from Users layout of the type $fieldClassKey
     *
     * @param string  $fieldClassKey
     * @param bool    $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromUsers(string $fieldClassKey, bool $keysOnly = true): array
    {
        $layout = Craft::$app->getFields()->getLayoutByType(User::class);

        return self::fieldsOfTypeFromLayout($fieldClassKey, $layout, $keysOnly);
    }

    /**
     * Return all of the fields from all Asset Volume layouts of the type
     * $fieldClassKey
     *
     * @param string $fieldClassKey
     * @param bool   $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromAssetVolumes(string $fieldClassKey, bool $keysOnly = true): array
    {
        $foundFields = [];
        $volumes = Craft::$app->getVolumes()->getAllVolumes();
        foreach ($volumes as $volume) {
            /** @var Volume $volume */
            try {
                $layout = $volume->getFieldLayout();
            } catch (InvalidConfigException $e) {
                $layout = null;
            }
            if ($layout) {
                $foundFields = array_merge(
                    $foundFields,
                    self::fieldsOfTypeFromLayout($fieldClassKey, $layout, $keysOnly)
                );
            }
        }

        return $foundFields;
    }

    /**
     * Return all of the fields from all Global Set layouts of the type
     * $fieldClassKey
     *
     * @param string $fieldClassKey
     * @param bool   $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromGlobals(string $fieldClassKey, bool $keysOnly = true): array
    {
        $foundFields = [];
        $globals = Craft::$app->getGlobals()->getAllSets();
        foreach ($globals as $global) {
            $layout = $global->getFieldLayout();
            if ($layout) {
                $fields = self::fieldsOfTypeFromLayout($fieldClassKey, $layout, $keysOnly);
                // Prefix the keys with the global set name
                $prefix = $global->handle;
                $fields = array_combine(
                    array_map(function ($key) use ($prefix) {
                        return $prefix.'.'.$key;
                    }, array_keys($fields)),
                    $fields
                );
                // Merge with any fields we've already found
                $foundFields = array_merge(
                    $foundFields,
                    $fields
                );
            }
        }

        return $foundFields;
    }

    /**
     * Return all of the fields from the $sourceBundleType in the $sourceHandle
     * of the type $fieldClassKey
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
    ): array {
        $foundFields = [];
        $layouts = [];
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
            $foundFields = array_merge(
                $foundFields,
                self::fieldsOfTypeFromLayout($fieldClassKey, $layout, $keysOnly)
            );
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
    public static function matrixFieldsOfType(MatrixBlock $matrixBlock, string $fieldType, bool $keysOnly = true): array
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
