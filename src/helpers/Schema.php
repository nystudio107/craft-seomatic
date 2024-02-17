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

use Craft;
use craft\helpers\Json as JsonHelper;
use Exception;
use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\Seomatic;
use ReflectionClass;
use ReflectionException;
use yii\caching\TagDependency;
use yii\helpers\Markdown;
use function get_class;
use function is_array;
use function is_string;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Schema
{
    // Constants
    // =========================================================================

    public const SCHEMA_PATH_DELIMITER = '.';
    public const MENU_INDENT_STEP = 4;

    public const SCHEMA_TYPES = [
        'siteSpecificType',
        'siteSubType',
        'siteType',
    ];

    public const GLOBAL_SCHEMA_CACHE_TAG = 'seomatic_schema';
    public const SCHEMA_CACHE_TAG = 'seomatic_schema_';

    public const CACHE_KEY = 'seomatic_schema_';

    // Static Methods
    // =========================================================================

    /**
     * Invalidate all of the schema caches
     */
    public static function invalidateCaches(): void
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, self::GLOBAL_SCHEMA_CACHE_TAG);
        Craft::info(
            'All schema caches cleared',
            __METHOD__
        );
    }

    /**
     * Return the most specific schema.org type possible from the $settings
     *
     * @param $settings
     *
     * @param bool $allowEmpty
     * @return string
     */
    public static function getSpecificEntityType($settings, bool $allowEmpty = false): string
    {
        if (!empty($settings)) {
            // Go from most specific type to least specific type
            foreach (self::SCHEMA_TYPES as $schemaType) {
                if (!empty($settings[$schemaType]) && ($settings[$schemaType] !== 'none')) {
                    return $settings[$schemaType];
                }
            }
        }

        return $allowEmpty ? '' : 'WebPage';
    }

    /**
     * Return a period-delimited schema.org path from the $settings
     *
     * @param $settings
     *
     * @return string
     */
    public static function getEntityPath($settings): string
    {
        $result = '';
        if (!empty($settings)) {
            // Go from most specific type to least specific type
            foreach (self::SCHEMA_TYPES as $schemaType) {
                if (!empty($settings[$schemaType]) && ($settings[$schemaType] !== 'none')) {
                    $result = $settings[$schemaType] . self::SCHEMA_PATH_DELIMITER . $result;
                }
            }
        }

        return rtrim($result, self::SCHEMA_PATH_DELIMITER);
    }

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

        // Get the static properties
        try {
            $classRef = new ReflectionClass(get_class($jsonLdType));
        } catch (ReflectionException $e) {
            $classRef = null;
        }
        if ($classRef) {
            $result = $classRef->getStaticProperties();
            if (isset($result['schemaTypeDescription'])) {
                $description = $result['schemaTypeDescription'];
                $description = preg_replace("`\[\[([A-z]*)\]\]`", '[$1](https://schema.org/$1)', $description);
                $description = Markdown::process((string)$description);
                $description = str_replace(['<p>', '</p>', '\n'], ['', '', ' '], $description);
                $result['schemaTypeDescription'] = $description;
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
            $className = 'nystudio107\\seomatic\\models\\jsonld\\' . $schemaType;
            if (class_exists($className)) {
                $classRef = new ReflectionClass($className);
                $staticProps = $classRef->getStaticProperties();

                foreach ($staticProps as $key => $value) {
                    if ($key[0] === '_') {
                        $newKey = ltrim($key, '_');
                        $staticProps[$newKey] = $value;
                        unset($staticProps[$key]);
                    }
                }
                $result[$schemaType] = $staticProps;
                $schemaType = $staticProps['schemaTypeExtends'];
                if ($schemaType === 'JsonLdType') {
                    $schemaType = null;
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
    public static function getTypeMenu($path = ''): array
    {
        try {
            $schemaTypes = self::getSchemaArray($path);
        } catch (Exception $e) {
            Craft::error($e->getMessage(), __METHOD__);
            return [];
        }

        return self::flattenSchemaArray($schemaTypes, 0);
    }

    /**
     * Return a single menu of schemas starting at $path
     *
     * @param string $path
     *
     * @return array
     */
    public static function getSingleTypeMenu($path = ''): array
    {
        $result = [];
        try {
            $schemaTypes = self::getSchemaArray($path);
        } catch (Exception $e) {
            Craft::error($e->getMessage(), __METHOD__);
            return [];
        }
        foreach ($schemaTypes as $key => $value) {
            $result[$key] = $key;
        }

        return $result;
    }

    /**
     * @return array
     */
    public static function getTypeTree(): array
    {
        try {
            $schemaTypes = self::getSchemaTree();
        } catch (Exception $e) {
            Craft::error($e->getMessage(), __METHOD__);
            return [];
        }
        $schemaTypes = self::pruneSchemaTree($schemaTypes, '');

        // Ignore the top level "Thing" base schema
        return $schemaTypes['children'] ?? [];
    }

    /**
     * Return a hierarchical array of schema types, starting at $path. The $path
     * is specified as SchemaType.SubSchemaType using SCHEMA_PATH_DELIMITER as
     * the delimiter.
     *
     * @param string $path
     *
     * @return array
     * @throws Exception
     */
    public static function getSchemaArray($path = ''): array
    {
        $dependency = new TagDependency([
            'tags' => [
                self::GLOBAL_SCHEMA_CACHE_TAG,
                self::SCHEMA_CACHE_TAG . 'schemaArray',
            ],
        ]);
        $cache = Craft::$app->getCache();
        $typesArray = $cache->getOrSet(
            self::CACHE_KEY . 'schemaArray',
            function() use ($path) {
                Craft::info(
                    'schemaArray cache miss' . $path,
                    __METHOD__
                );
                $filePath = Craft::getAlias('@nystudio107/seomatic/resources/schema/tree.jsonld');
                $schemaTypes = JsonHelper::decode(@file_get_contents($filePath));
                if (empty($schemaTypes)) {
                    throw new Exception(Craft::t('seomatic', 'Schema tree file not found'));
                }
                $schemaTypes = self::makeSchemaAssociative($schemaTypes);
                $schemaTypes = self::orphanChildren($schemaTypes);

                return $schemaTypes;
            },
            Seomatic::$cacheDuration,
            $dependency
        );
        // Get just the appropriate sub-array
        if (!empty($path)) {
            $keys = explode(self::SCHEMA_PATH_DELIMITER, $path);
            foreach ($keys as $key) {
                if (!empty($typesArray[$key])) {
                    $typesArray = $typesArray[$key];
                }
            }
        }
        if (!is_array($typesArray)) {
            $typesArray = [];
        }

        return $typesArray;
    }

    /**
     * Return the schema layer, and Google Rich Snippet info
     *
     * @param string $schemaName
     * @return array
     * @throws Exception
     */
    public static function getTypeMetaInfo($schemaName): array
    {
        $metaInfo = [
            'schemaPending' => false,
            'schemaRichSnippetUrls' => [],
        ];
        $schemaTree = self::getSchemaTree();
        $schemaArray = self::pluckSchemaArray($schemaTree, $schemaName);
        if (!empty($schemaArray)) {
            $googleRichSnippetTypes = self::getGoogleRichSnippets();
            $metaInfo['schemaPending'] = $schemaArray['pending'] ?? false;
            $metaInfo['schemaRichSnippetUrls'] = $googleRichSnippetTypes[$schemaArray['name']] ?? [];
        }

        return $metaInfo;
    }

    /**
     * @return array
     * @throws Exception
     */
    public static function getSchemaTree()
    {
        $dependency = new TagDependency([
            'tags' => [
                self::GLOBAL_SCHEMA_CACHE_TAG,
                self::SCHEMA_CACHE_TAG . 'schemaTree',
            ],
        ]);
        $cache = Craft::$app->getCache();
        $typesArray = $cache->getOrSet(
            self::CACHE_KEY . 'schemaTree',
            function() {
                Craft::info(
                    'schemaArray cache miss',
                    __METHOD__
                );
                $filePath = Craft::getAlias('@nystudio107/seomatic/resources/schema/tree.jsonld');
                $schemaTree = JsonHelper::decode(@file_get_contents($filePath));
                if (empty($schemaTree)) {
                    throw new Exception(Craft::t('seomatic', 'Schema tree file not found'));
                }

                return $schemaTree;
            },
            Seomatic::$cacheDuration,
            $dependency
        );
        if (!is_array($typesArray)) {
            $typesArray = [];
        }

        return $typesArray;
    }

    /**
     * Traverse the schema tree and pluck a single type array from it
     *
     * @param $schemaTree
     * @param $schemaName
     * @return array
     */
    protected static function pluckSchemaArray($schemaTree, $schemaName): array
    {
        if (!empty($schemaTree['children']) && is_array($schemaTree['children'])) {
            foreach ($schemaTree['children'] as $key => $value) {
                if (!empty($value['name']) && $value['name'] === $schemaName) {
                    unset($value['children']);
                    return $value;
                }
                if (!empty($value['children'])) {
                    $result = self::pluckSchemaArray($value, $schemaName);
                    if (!empty($result)) {
                        unset($result['children']);
                        return $result;
                    }
                }
            }
        }

        return [];
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
            $indent = html_entity_decode(str_repeat('&nbsp;', $indentLevel));
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
     * Reduce everything in the $schemaTypes array to a simple hierarchical
     * array as 'SchemaType' => 'SchemaType' if it has no children, and if it
     * has children, as 'SchemaType' = [] with an array of sub-types
     *
     * @param array $typesArray
     *
     * @return array
     */
    protected static function orphanChildren(array $typesArray): array
    {
        $result = [];

        if (!empty($typesArray['children']) && is_array($typesArray['children'])) {
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
     * as 'SchemaType' => [] rather than the way the tree.jsonld file has it
     * stored as a non-associative array
     *
     * @param array $typesArray
     *
     * @return array
     */
    protected static function makeSchemaAssociative(array $typesArray): array
    {
        $result = [];

        foreach ($typesArray as $key => $value) {
            if (isset($value['name'])) {
                $key = $value['name'];
            }
            if (is_array($value)) {
                $value = self::makeSchemaAssociative($value);
            }
            if (isset($value['layer']) && is_string($value['layer'])) {
                if ($value['layer'] === 'core' || $value['layer'] === 'pending') {
                    $result[$key] = $value;
                }
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * Prune the schema tree by removing everything but `label`, `id`, and `children`
     * in preparation for use by the treeselect component. Also make the id a namespaced
     * path to the schema, with the first two higher level schema types, and then the
     * third final type (skipping any in between)
     *
     * @param array $typesArray
     * @param string $path
     * @return array
     */
    protected static function pruneSchemaTree(array $typesArray, string $path): array
    {
        $result = [];

        // Don't include any "attic" (deprecated) schemas
        if (isset($typesArray['attic']) && $typesArray['attic']) {
            return [];
        }
        if (isset($typesArray['name']) && is_string($typesArray['name'])) {
            $children = [];
            $name = $typesArray['name'];
            // Construct a path-based $id, excluding the top-level `Thing` schema
            $id = $name === 'Thing' ? '' : $path . self::SCHEMA_PATH_DELIMITER . $name;
            $id = ltrim($id, self::SCHEMA_PATH_DELIMITER);
            // Make sure we have at most 3 specifiers in the schema path
            $parts = explode(self::SCHEMA_PATH_DELIMITER, $id);
            if (count($parts) > 3) {
                $id = implode(self::SCHEMA_PATH_DELIMITER, [
                    $parts[0],
                    $parts[1],
                    end($parts),
                ]);
            }
            if (!empty($typesArray['children'])) {
                foreach ($typesArray['children'] as $child) {
                    $childResult = self::pruneSchemaTree($child, $id);
                    if (!empty($childResult)) {
                        $children[] = $childResult;
                    }
                }
                if (!empty($children)) {
                    $result['children'] = $children;
                }
            }
            // Check to see if this is a Google Rich Snippet schema
            $googleRichSnippetTypes = self::getGoogleRichSnippets();
            $schemaPath = explode(self::SCHEMA_PATH_DELIMITER, $id);
            // Use only the specific (last) type for now, rather than the complete path of types
            $schemaPath = [end($schemaPath)];
            if ((bool)array_intersect($schemaPath, array_keys($googleRichSnippetTypes))) {
                $name .= ' (' . Craft::t('seomatic', 'Google rich result') . ')';
            }
            // Mark it as pending, if applicable
            if (isset($typesArray['pending']) && $typesArray['pending']) {
                $name .= ' (' . Craft::t('seomatic', 'pending') . ')';
            }
            $result['label'] = $name;
            $result['id'] = $id;
        }

        return $result;
    }

    /**
     * Get the Google Rich Snippets types & URLs
     *
     * @return array
     */
    protected static function getGoogleRichSnippets(): array
    {
        $dependency = new TagDependency([
            'tags' => [
                self::GLOBAL_SCHEMA_CACHE_TAG,
                self::SCHEMA_CACHE_TAG . 'googleRichSnippets',
            ],
        ]);
        $cache = Craft::$app->getCache();
        return $cache->getOrSet(
            self::CACHE_KEY . 'googleRichSnippets',
            function() {
                Craft::info(
                    'googleRichSnippets cache miss',
                    __METHOD__
                );
                $filePath = Craft::getAlias('@nystudio107/seomatic/resources/schema/google-rich-snippets.json');
                $googleRichSnippetTypes = JsonHelper::decode(@file_get_contents($filePath));
                if (empty($googleRichSnippetTypes)) {
                    throw new Exception(Craft::t('seomatic', 'Google rich snippets file not found'));
                }

                return $googleRichSnippetTypes;
            },
            Seomatic::$cacheDuration,
            $dependency
        );
    }
}
