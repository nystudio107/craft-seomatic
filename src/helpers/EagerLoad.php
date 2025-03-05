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
use craft\models\Section;
use nystudio107\seomatic\helpers\Field as FieldHelper;
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
     * @param $metaBundle
     * @return array
     */
    public static function sitemapEagerLoadMap($metaBundle): array
    {
        $eagerLoadMap = [];
        $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundle->sourceBundleType);
        /** @var Section $section */
        $section = $seoElement::sourceModelFromHandle($metaBundle->sourceHandle);
        if (method_exists($section, 'getEntryTypes')) {
            $entryTypes = $section->getEntryTypes();
            foreach ($entryTypes as $entryType) {
                $layout = $entryType->getFieldLayout();
                $eagerLoadMap[] = self::assetFieldEagerLoadMap($layout);
                $eagerLoadMap[] = self::matrixFieldEagerLoadMap($layout);
            }
        }
        if (method_exists($section, 'getFieldLayout')) {
            $layout = $section->getFieldLayout();
            $eagerLoadMap[] = self::assetFieldEagerLoadMap($layout);
            $eagerLoadMap[] = self::matrixFieldEagerLoadMap($layout);
        }
        // Flatten the array
        return array_merge([], ...$eagerLoadMap);
    }

    /**
     * Return an array of field handles for eager loading .with() in Element queries
     *
     * @param $layout
     * @return array
     */
    public static function assetFieldEagerLoadMap($layout): array
    {
        return FieldHelper::fieldsOfTypeFromLayout(FieldHelper::ASSET_FIELD_CLASS_KEY, $layout);
    }

    /**
     * Return an array of field handles for eager loading .with() in Element queries
     *
     * @param $layout
     * @return array
     */
    public static function matrixFieldEagerLoadMap($layout): array
    {
        $fieldMap = [];
        $matrixFields = FieldHelper::fieldsOfTypeFromLayout(FieldHelper::BLOCK_FIELD_CLASS_KEY, $layout);
        foreach ($matrixFields as $matrixFieldHandle) {
            /** @var Matrix $matrixField */
            $matrixField = $layout->getFieldByHandle($matrixFieldHandle);
            $entryTypes = $matrixField->getEntryTypes();
            foreach ($entryTypes as $entryType) {
                $matrixLayout = $entryType->getFieldLayout();
                $assetFields = FieldHelper::fieldsOfTypeFromLayout(FieldHelper::ASSET_FIELD_CLASS_KEY, $matrixLayout);
                foreach ($assetFields as $assetFieldHandle) {
                    $fieldMap[] = "$matrixFieldHandle.$assetFieldHandle";
                }
            }
        }

        return $fieldMap;
    }
}
