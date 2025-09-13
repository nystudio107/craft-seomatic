<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\helpers;

use craft\fields\Matrix;
use craft\models\FieldLayout;
use craft\models\Section;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     5.1.12
 */
class EagerLoad
{
    /**
     * Build an eager loading map based on the field layouts from the $metaBundle's
     * "Section"
     *
     * @param MetaBundle $metaBundle
     * @return array
     */
    public static function sitemapEagerLoadMap($metaBundle): array
    {
        $eagerLoadMap = [];
        $transform = $metaBundle->metaSitemapVars->sitemapAssetTransform;
        if ($transform === 'null' || empty($transform)) {
            $transform = null;
        }
        $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundle->sourceBundleType);
        /** @var Section $section */
        $section = $seoElement::sourceModelFromHandle($metaBundle->sourceHandle);
        if (method_exists($section, 'getEntryTypes')) {
            $entryTypes = $section->getEntryTypes();
            foreach ($entryTypes as $entryType) {
                $layout = $entryType->getFieldLayout();
                $eagerLoadMap[] = self::assetFieldEagerLoadMap($layout, $transform);
                $eagerLoadMap[] = self::matrixFieldEagerLoadMap($layout, $transform);
            }
        }
        if (method_exists($section, 'getFieldLayout')) {
            $layout = $section->getFieldLayout();
            $eagerLoadMap[] = self::assetFieldEagerLoadMap($layout, $transform);
            $eagerLoadMap[] = self::matrixFieldEagerLoadMap($layout, $transform);
        }
        // Flatten the array
        return array_merge([], ...$eagerLoadMap);
    }

    /**
     * Return an array of field handles for eager loading .with() in Element queries
     *
     * @param FieldLayout $layout
     * @param ?string $transform
     * @return array
     */
    public static function assetFieldEagerLoadMap($layout, $transform): array
    {
        $fieldMap = [];
        $assetFields = FieldHelper::fieldsOfTypeFromLayout(FieldHelper::ASSET_FIELD_CLASS_KEY, $layout, true, null, null, false);
        foreach ($assetFields as $assetFieldHandle) {
            $fieldMap[] = empty($transform) ? $assetFieldHandle : [$assetFieldHandle, ['withTransforms' => $transform]];
        }

        return $fieldMap;
    }

    /**
     * Return an array of field handles for eager loading .with() in Element queries
     *
     * @param FieldLayout $layout
     * @param ?string $transform
     * @return array
     */
    public static function matrixFieldEagerLoadMap($layout, $transform): array
    {
        $fieldMap = [];
        $matrixFields = FieldHelper::fieldsOfTypeFromLayout(FieldHelper::BLOCK_FIELD_CLASS_KEY, $layout, true, null, null, false);
        foreach ($matrixFields as $matrixFieldHandle) {
            /** @var Matrix $matrixField */
            $matrixField = $layout->getFieldByHandle($matrixFieldHandle);
            $entryTypes = null;
            // For Matrix blocks
            if (method_exists($matrixField, 'getEntryTypes')) {
                $entryTypes = $matrixField->getEntryTypes();
            }
            // For other block types like Neo
            if (method_exists($matrixField, 'getBlockTypes')) {
                $entryTypes = $matrixField->getBlockTypes();
            }
            if ($entryTypes) {
                foreach ($entryTypes as $entryType) {
                    $matrixLayout = $entryType->getFieldLayout();
                    $assetFields = FieldHelper::fieldsOfTypeFromLayout(FieldHelper::ASSET_FIELD_CLASS_KEY, $matrixLayout, true, null, null, false);
                    foreach ($assetFields as $assetFieldHandle) {
                        $fieldMap[] = empty($transform) ? "$matrixFieldHandle.$assetFieldHandle" : ["$matrixFieldHandle.$assetFieldHandle", ['withTransforms' => $transform]];
                    }
                }
            }
        }

        return $fieldMap;
    }
}
