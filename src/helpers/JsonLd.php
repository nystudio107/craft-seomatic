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
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

use craft\helpers\Json;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class JsonLd extends Json
{
    // Constants
    // =========================================================================

    const IGNORE_ATTRIBUTES = [
        '@context',
        'include',
        'key',
    ];

    // Static Properties
    // =========================================================================

    protected static $recursionLevel;

    // Public Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function encode(
        $value,
        $options =
        JSON_UNESCAPED_UNICODE
        | JSON_UNESCAPED_SLASHES
    ) {
        // If `devMode` is enabled, make the JSON-LD human-readable
        if (Seomatic::$devMode) {
            $options |= JSON_PRETTY_PRINT;
        }
        self::$recursionLevel = 0;

        return parent::encode($value, $options);
    }

    // Protected Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected static function processData($data, &$expressions, $expPrefix)
    {
        self::$recursionLevel++;
        $result = parent::processData($data, $expressions, $expPrefix);
        self::$recursionLevel--;
        static::normalizeJsonLdArray($result, self::$recursionLevel);

        return $result;
    }

    /**
     * Normalize the JSON-LD array recursively to remove empty values,
     * prefixing 'id', 'context', and 'type' with '@', and have 'type' be the
     * first item in the array
     *
     * @param array $array
     * @param int   $depth
     */
    protected static function normalizeJsonLdArray(array &$array, int $depth)
    {
        $array = array_filter($array);
        $array = self::changeKey($array, 'id', '@id');
        $array = self::changeKey($array, 'context', '@context');
        $array = self::changeKey($array, 'type', '@type');
        if ($depth > 1) {
            foreach (self::IGNORE_ATTRIBUTES as $attribute) {
                unset($array[$attribute]);
            }
        }
        MetaValueHelper::parseArray($array);
        ksort($array);
        // If we have only one item in the array, return an empty array
        if (\count($array) <= 1) {
            $array = [];
        }
    }

    /**
     * Replace key values without reordering the array or converting numeric
     * keys to associative keys (which unset() does)
     *
     * @param array  $array
     * @param string $oldKey
     * @param string $newKey
     *
     * @return array
     */
    protected static function changeKey(array $array, string $oldKey, string $newKey): array
    {
        if (!array_key_exists($oldKey, $array)) {
            return $array;
        }
        $keys = array_keys($array);
        $keys[array_search($oldKey, $keys, true)] = $newKey;

        return array_combine($keys, $array);
    }
}
