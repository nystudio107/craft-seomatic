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

use nystudio107\seomatic\models\MetaJsonLd;

use Craft;
use craft\helpers\Json as JsonHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Schema
{
    // Constants
    // =========================================================================

    const SCHEMA_PATH_DELIMITER = '.';
    const MENU_INDENT_STEP = 4;

    // Static Properties
    // =========================================================================

    protected static $schemaTypes = [];

    // Static Methods
    // =========================================================================

    /**
     * Get the fully composed schema type
     *
     * @param $schemaType
     *
     * @return array
     */
    public static function getSchemaType(string $schemaType): array
    {
        $result = [];
        $jsonLdType = MetaJsonLd::create($schemaType);

        if ($jsonLdType) {
            // Get the static properties
            try {
                $classRef = new \ReflectionClass(get_class($jsonLdType));
            } catch (\ReflectionException $e) {
                $classRef = null;
            }
            if ($classRef) {
                $result = $classRef->getStaticProperties();
            }
        }

        return $result;
    }

    /**
     * Get the decomposed schema type
     *
     * @param string $schemaType
     *
     * @return array
     */
    public static function getDecomposedSchemaType(string $schemaType): array
    {
        $result = [];
        while ($schemaType) {
            $className = 'nystudio107\\seomatic\\models\\jsonld\\'.$schemaType;
            if (class_exists($className)) {
                try {
                    $classRef = new \ReflectionClass($className);
                } catch (\ReflectionException $e) {
                    $classRef = null;
                }
                if ($classRef) {
                    $staticProps = $classRef->getStaticProperties();

                    foreach ($staticProps as $key => $value) {
                        if ($key[0] == '_') {
                            $newKey = ltrim($key, '_');
                            $staticProps[$newKey] = $value;
                            unset($staticProps[$key]);
                        }
                    }
                    $result[$schemaType] = $staticProps;
                    $schemaType = $staticProps['schemaTypeExtends'];
                    if ($schemaType == "JsonLdType") {
                        $schemaType = null;
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Return a flattened, indented menu of the given $path
     *
     * @param string $path
     *
     * @return array
     */
    public static function getSchemaMenu($path = ''): array
    {
        $schemaTypes = self::getSchemaArray($path);

        return self::flattenSchemaArray($schemaTypes, 0);
    }

    /**
     * Return a single menu of schemas starting at $path
     *
     * @param string $path
     *
     * @return array
     */
    public static function getSingleSchemaMenu($path = ''): array
    {
        $result = [];
        $schemaTypes = self::getSchemaArray($path);
        foreach ($schemaTypes as $key => $value) {
            $result[$key] = $key;
        }

        return $result;
    }

    /**
     * Return a hierarchical array of schema types, starting at $path. The $path
     * is specified as SchemaType.SubSchemaType using SCHEMA_PATH_DELIMITER as
     * the delimiter.
     *
     * @param string $path
     *
     * @return array
     */
    public static function getSchemaArray($path = ''): array
    {
        if (empty(self::$schemaTypes)) {
            $filePath = Craft::getAlias('@nystudio107/seomatic/resources/schema/tree.jsonld');
            self::$schemaTypes = JsonHelper::decode(@file_get_contents($filePath));
            self::$schemaTypes = self::makeSchemaAssociative(self::$schemaTypes);
            self::$schemaTypes = self::orphanChildren(self::$schemaTypes);
        }
        // Get just the appropriate sub-array
        $typesArray = self::$schemaTypes;
        if (!empty($path)) {
            $keys = explode(self::SCHEMA_PATH_DELIMITER, $path);
            foreach ($keys as $key) {
                $typesArray = $typesArray[$key];
            }
        }

        return $typesArray;
    }

    /**
     * @param array $typesArray
     * @param       $indentLevel
     *
     * @return array
     */
    protected static function flattenSchemaArray(array $typesArray, int $indentLevel): array
    {
        $result = [];
        foreach ($typesArray as $key => $value) {
            $indent = str_repeat('&nbsp;', $indentLevel);
            if (is_array($value)) {
                $result[$key] = $indent . $key;
                $value = self::flattenSchemaArray($value, $indentLevel + self::MENU_INDENT_STEP);
                $result = array_merge($result, $value);
            } else {
                $result[$key] = $indent . $value;
            }
        }

        return $result;
    }

    /**
     * Reduce everything in the $schemaTypes array to a simple hierarchical array
     * as "SchemaType" => "SchemaType" if it has no children, and if it has
     * children, as "SchemaType" = [] with an array of sub-types
     *
     * @param array $typesArray
     *
     * @return array
     */
    protected static function orphanChildren(array $typesArray): array
    {
        $result = [];

        if (!empty($typesArray['children'])) {
            foreach ($typesArray['children'] as $key => $value) {
                $key = '';
                if (!empty($value['name'])) {
                    $key = $value['name'];
                }
                if (!empty($value['children'])) {
                    $value = self::orphanChildren($value);
                } else {
                    $value = $key;
                }
                if (!empty($key)) {
                    $result[$key] = $value;
                }
            }
        }

        return $result;
    }

    /**
     * Return a new array that has each type returned as an associative array
     * as "SchemaType" => [] rather than the way the tree.jsonld file has it
     * stored as a non-associative array
     *
     * @param array $typesArray
     *
     * @return array
     */
    protected static function makeSchemaAssociative(array $typesArray)
    {
        $result = [];

        foreach ($typesArray as $key => $value) {
            if (isset($value['name'])) {
                $key = $value['name'];
            }
            if (is_array($value)) {
                $value = self::makeSchemaAssociative($value);
            }
            if (isset($value['layer'])) {
                if ($value['layer'] == 'core') {
                    $result[$key] = $value;
                }
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}
