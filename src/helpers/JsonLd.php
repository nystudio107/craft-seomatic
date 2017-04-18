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

use Craft;
use craft\helpers\Json;
use craft\helpers\ArrayHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class JsonLd extends Json
{
    // Static Properties
    // =========================================================================

    protected static $recursionLevel;

    // Static Methods
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
        $result = parent::encode($value, $options);

        return $result;
    }

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


    // Private Methods
    // =========================================================================

    /**
     * Normalize the JSON-LD array recursively to remove empty values, change
     * 'type' to '@type' and have it be the first item in the array
     *
     * @param $array
     * @param $depth
     */
    protected static function normalizeJsonLdArray(&$array, $depth)
    {
        $array = array_filter($array);
        ArrayHelper::rename($array, 'context', '@context');
        ArrayHelper::rename($array, 'type', '@type');
        ksort($array);
    }

    /**
     * Replace key values without reordering the array or converting numeric
     * keys to associative keys (which unset() does)
     *
     * @param $array
     * @param $oldKey
     * @param $newKey
     *
     * @return array
     */
    protected static function changeKey($array, $oldKey, $newKey)
    {
        if (!array_key_exists($oldKey, $array)) {
            return $array;
        }
        $keys = array_keys($array);
        $keys[array_search($oldKey, $keys)] = $newKey;

        return array_combine($keys, $array);
    }
}
