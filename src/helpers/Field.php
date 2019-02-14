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

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\fields\SeoSettings as SeoSettingsField;
use nystudio107\seomatic\fields\Seomatic_Meta as Seomatic_MetaField;
use nystudio107\seomatic\services\MetaBundles;

use Craft;
use craft\base\Element;
use craft\base\Field as BaseField;
use craft\base\Volume;
use craft\elements\User;
use craft\ckeditor\Field as CKEditorField;
use craft\elements\Category;
use craft\elements\Entry;
use craft\elements\MatrixBlock;
use craft\fields\Assets as AssetsField;
use craft\fields\Matrix as MatrixField;
use craft\fields\PlainText as PlainTextField;
use craft\fields\Tags as TagsField;
use craft\models\FieldLayout;
use craft\redactor\Field as RedactorField;

use craft\commerce\Plugin as CommercePlugin;
use craft\commerce\elements\Product;

use benf\neo\Field as NeoField;
use benf\neo\elements\Block as NeoBlock;

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
            NeoField::class,
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
            // Cache me if you can
            $memoKey = $fieldClassKey.$layout->id.($keysOnly ? 'keys' : 'nokeys');
            if (!empty(self::$fieldsOfTypeFromLayoutCache[$memoKey])) {
                return self::$fieldsOfTypeFromLayoutCache[$memoKey];
            }
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
                $section = Craft::$app->getSections()->getSectionByHandle($sourceHandle);
                if ($section) {
                    $entryTypes = $section->getEntryTypes();
                    foreach ($entryTypes as $entryType) {
                        if ($entryType->fieldLayoutId) {
                            $layouts[] = Craft::$app->getFields()->getLayoutById($entryType->fieldLayoutId);
                        }
                    }
                }
                break;

            case MetaBundles::CATEGORYGROUP_META_BUNDLE:
                $layoutId = null;
                try {
                    $category = Craft::$app->getCategories()->getGroupByHandle($sourceHandle);
                    if ($category) {
                        $layoutId = $category->getFieldLayoutId();
                    }
                } catch (InvalidConfigException $e) {
                    $layoutId = null;
                }
                if ($layoutId) {
                    $layouts[] = Craft::$app->getFields()->getLayoutById($layoutId);
                }
                break;
            case MetaBundles::PRODUCT_META_BUNDLE:
                if (Seomatic::$commerceInstalled) {
                    $commerce = CommercePlugin::getInstance();
                    if ($commerce !== null) {
                        $layoutId = null;
                        try {
                            $product = $commerce->productTypes->getProductTypeByHandle($sourceHandle);
                            if ($product) {
                                $layoutId = $product->getFieldLayoutId();
                            }
                        } catch (InvalidConfigException $e) {
                            $layoutId = null;
                        }
                        if ($layoutId) {
                            $layouts[] = Craft::$app->getFields()->getLayoutById($layoutId);
                        }
                    }
                }
                break;
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
            // Cache me if you can
            $memoKey = $fieldType.$matrixBlock->id.($keysOnly ? 'keys' : 'nokeys');
            if (!empty(self::$matrixFieldsOfTypeCache[$memoKey])) {
                return self::$matrixFieldsOfTypeCache[$memoKey];
            }
            $fields = $matrixBlockTypeModel->getFields();
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
            // Cache for future use
            self::$matrixFieldsOfTypeCache[$memoKey] = $foundFields;
        }

        return $foundFields;
    }


    /**
     * Return all of the fields in the $neoBlock of the type $fieldType class
     *
     * @param NeoBlock $neoBlock
     * @param string   $fieldType
     * @param bool     $keysOnly
     *
     * @return array
     */
    public static function neoFieldsOfType(NeoBlock $neoBlock, string $fieldType, bool $keysOnly = true): array
    {
        $foundFields = [];

        try {
            $neoBlockTypeModel = $neoBlock->getType();
        } catch (InvalidConfigException $e) {
            $neoBlockTypeModel = null;
        }
        if ($neoBlockTypeModel) {
            // Cache me if you can
            $memoKey = $fieldType.$neoBlock->id.($keysOnly ? 'keys' : 'nokeys');
            if (!empty(self::$neoFieldsOfTypeCache[$memoKey])) {
                return self::$neoFieldsOfTypeCache[$memoKey];
            }
            $fields = $neoBlockTypeModel->getFields();
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
            // Cache for future use
            self::$neoFieldsOfTypeCache[$memoKey] = $foundFields;
        }

        return $foundFields;
    }

    /**
     * Get the root class of a passed in Element
     *
     * @param Element $element
     *
     * @return string
     */
    public static function getElementRootClass(Element $element): string
    {
        // By default, just use the class name
        $className = \get_class($element);
        // Handle sub-classes of specific types we know about
        if ($element instanceof Entry) {
            $className = Entry::class;
        }
        if ($element instanceof Category) {
            $className = Category::class;
        }
        if ($element instanceof Product) {
            $className = Product::class;
        }

        return $className;
    }
}
