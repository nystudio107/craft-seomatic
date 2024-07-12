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

namespace nystudio107\seomatic\helpers;

use benf\neo\elements\Block as NeoBlock;
use benf\neo\Field as NeoField;
use besteadfast\preparsefield\fields\PreparseFieldType;
use Craft;
use craft\base\Element;
use craft\base\Field as BaseField;
use craft\ckeditor\Field as CKEditorField;
use craft\elements\Entry;
use craft\elements\User;
use craft\fields\Assets as AssetsField;
use craft\fields\Matrix as MatrixField;
use craft\fields\PlainText as PlainTextField;
use craft\fields\Tags as TagsField;
use craft\models\FieldLayout;
use craft\models\Volume;
use craft\redactor\Field as RedactorField;
use nystudio107\seomatic\fields\Seomatic_Meta as Seomatic_MetaField;
use nystudio107\seomatic\fields\SeoSettings as SeoSettingsField;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\MetaBundles;
use verbb\doxter\fields\Doxter as DoxterField;
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

    public const TEXT_FIELD_CLASS_KEY = 'text';
    public const ASSET_FIELD_CLASS_KEY = 'asset';
    public const BLOCK_FIELD_CLASS_KEY = 'block';
    public const SEO_SETTINGS_CLASS_KEY = 'seo';
    public const OLD_SEOMATIC_META_CLASS_KEY = 'Seomatic_Meta';

    public const FIELD_CLASSES = [
        self::TEXT_FIELD_CLASS_KEY => [
            CKEditorField::class,
            PlainTextField::class,
            MatrixField::class,
            RedactorField::class,
            TagsField::class,
            NeoField::class,
            PreparseFieldType::class,
            DoxterField::class,
        ],
        self::ASSET_FIELD_CLASS_KEY => [
            AssetsField::class,
        ],
        self::BLOCK_FIELD_CLASS_KEY => [
            MatrixField::class,
            NeoField::class,
        ],
        self::SEO_SETTINGS_CLASS_KEY => [
            SeoSettingsField::class,
        ],
        self::OLD_SEOMATIC_META_CLASS_KEY => [
            Seomatic_MetaField::class,
        ],
    ];

    // Static Properties
    // =========================================================================

    /**
     * @var array Memoization cache
     */
    public static $fieldsOfTypeFromLayoutCache = [];

    /**
     * @var array Memoization cache
     */
    public static $matrixFieldsOfTypeCache = [];

    /**
     * @var array Memoization cache
     */
    public static $neoFieldsOfTypeCache = [];

    // Static Methods
    // =========================================================================

    /**
     * Return all of the fields from the $layout that are of the type
     * $fieldClassKey
     *
     * @param string $fieldClassKey
     * @param FieldLayout $layout
     * @param bool $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromLayout(
        string      $fieldClassKey,
        FieldLayout $layout,
        bool        $keysOnly = true,
    ): array {
        $foundFields = [];
        if (!empty(self::FIELD_CLASSES[$fieldClassKey])) {
            // Cache me if you can
            $memoKey = $fieldClassKey . $layout->id . ($keysOnly ? 'keys' : 'nokeys');
            if (!empty(self::$fieldsOfTypeFromLayoutCache[$memoKey])) {
                return self::$fieldsOfTypeFromLayoutCache[$memoKey];
            }
            $fieldClasses = self::FIELD_CLASSES[$fieldClassKey];
            $fieldElements = $layout->getCustomFieldElements();
            foreach ($fieldElements as $fieldElement) {
                $field = $fieldElement->getField();
                /** @var array $fieldClasses */
                foreach ($fieldClasses as $fieldClass) {
                    if ($field instanceof $fieldClass) {
                        $foundFields[$field->handle] = $fieldElement->label() ?? $field->name;
                    }
                }
            }
            // Return only the keys if asked
            if ($keysOnly) {
                $foundFields = array_keys($foundFields);
            }
            // Cache for future use
            self::$fieldsOfTypeFromLayoutCache[$memoKey] = $foundFields;
        }

        return $foundFields;
    }

    /**
     * Return all of the fields in the $element of the type $fieldClassKey
     *
     * @param Element $element
     * @param string $fieldClassKey
     * @param bool $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromElement(
        Element $element,
        string  $fieldClassKey,
        bool    $keysOnly = true,
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
     * @param string $fieldClassKey
     * @param bool $keysOnly
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
     * @param bool $keysOnly
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
                /** @noinspection SlowArrayOperationsInLoopInspection */
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
     * @param bool $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromGlobals(string $fieldClassKey, bool $keysOnly = true): array
    {
        $foundFields = [];
        $globals = Craft::$app->getGlobals()->getAllSets();
        foreach ($globals as $global) {
            /** @var FieldLayout|null $layout */
            $layout = $global->getFieldLayout();
            if ($layout) {
                $fields = self::fieldsOfTypeFromLayout($fieldClassKey, $layout, $keysOnly);
                // Prefix the keys with the global set name
                $prefix = $global->handle;
                $fields = array_combine(
                    array_map(function($key) use ($prefix) {
                        return $prefix . '.' . $key;
                    }, array_keys($fields)),
                    $fields
                );
                // Merge with any fields we've already found
                /** @noinspection SlowArrayOperationsInLoopInspection */
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
     * @param bool $keysOnly
     *
     * @return array
     */
    public static function fieldsOfTypeFromSource(
        string $sourceBundleType,
        string $sourceHandle,
        string $fieldClassKey,
        bool   $keysOnly = true,
    ): array {
        $foundFields = [];
        $layouts = [];
        // Get the layouts
        if ($sourceBundleType !== MetaBundles::GLOBAL_META_BUNDLE) {
            $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
            if ($seoElement !== null) {
                $layouts = $seoElement::fieldLayouts($sourceHandle);
            }
        }
        // Iterate through the layouts looking for the fields of the type $fieldType
        foreach ($layouts as $layout) {
            /** @noinspection SlowArrayOperationsInLoopInspection */
            $foundFields = array_merge(
                $foundFields,
                self::fieldsOfTypeFromLayout($fieldClassKey, $layout, $keysOnly)
            );
        }

        return $foundFields;
    }

    /**
     * Return all of the fields in the $matrixEntry of the type $fieldType class
     *
     * @param Entry $matrixEntry
     * @param string $fieldType
     * @param bool $keysOnly
     *
     * @return array
     */
    public static function matrixFieldsOfType(Entry $matrixEntry, string $fieldType, bool $keysOnly = true): array
    {
        $foundFields = [];

        try {
            $matrixEntryTypeModel = $matrixEntry->getType();
        } catch (InvalidConfigException $e) {
            $matrixEntryTypeModel = null;
        }
        if ($matrixEntryTypeModel) {
            // Cache me if you can
            $memoKey = $fieldType . $matrixEntry->id . ($keysOnly ? 'keys' : 'nokeys');
            if (!empty(self::$matrixFieldsOfTypeCache[$memoKey])) {
                return self::$matrixFieldsOfTypeCache[$memoKey];
            }
            $fields = $matrixEntryTypeModel->getCustomFields();
            /** @var BaseField $field */
            foreach ($fields as $field) {
                if ($field instanceof $fieldType) {
                    $foundFields[$field->handle] = $field->name;
                }
            }
            // Return only the keys if asked
            if ($keysOnly) {
                $foundFields = array_keys($foundFields);
            }
            // Cache for future use
            self::$matrixFieldsOfTypeCache[$memoKey] = $foundFields;
        }

        return $foundFields;
    }


    /**
     * Return all of the fields in the $neoBlock of the type $fieldType class
     *
     * @param NeoBlock $neoBlock
     * @param string $fieldType
     * @param bool $keysOnly
     *
     * @return array
     */
    public static function neoFieldsOfType(NeoBlock $neoBlock, string $fieldType, bool $keysOnly = true): array
    {
        $foundFields = [];

        $layout = $neoBlock->getFieldLayout();
        if ($layout) {
            // Cache me if you can
            $memoKey = $fieldType . $neoBlock->id . ($keysOnly ? 'keys' : 'nokeys');
            if (!empty(self::$neoFieldsOfTypeCache[$memoKey])) {
                return self::$neoFieldsOfTypeCache[$memoKey];
            }
            $fieldElements = $layout->getCustomFieldElements();
            foreach ($fieldElements as $fieldElement) {
                $field = $fieldElement->getField();
                if ($field instanceof $fieldType) {
                    $foundFields[$field->handle] = $field->name;
                }
            }
            // Return only the keys if asked
            if ($keysOnly) {
                $foundFields = array_keys($foundFields);
            }
            // Cache for future use
            self::$neoFieldsOfTypeCache[$memoKey] = $foundFields;
        }

        return $foundFields;
    }
}
