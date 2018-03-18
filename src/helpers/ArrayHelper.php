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

use yii\helpers\ReplaceArrayValue;
use yii\helpers\UnsetArrayValue;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class ArrayHelper extends \craft\helpers\ArrayHelper
{
    // Public Static Methods
    // =========================================================================

    /**
     * This is the same as Yii2's [[merge]] except that it ensures uniqueness of
     * non-associative array values
     *
     * Merges two or more arrays into one recursively.
     * If each array has an element with the same string key value, the latter
     * will overwrite the former (different from array_merge_recursive).
     * Recursive merging will be conducted if both arrays have an element of array
     * type and are having the same key.
     * For integer-keyed elements, the elements from the latter array will
     * be appended to the former array.
     * You can use [[UnsetArrayValue]] object to unset value from previous array or
     * [[ReplaceArrayValue]] to force replace former value instead of recursive merging.
     * @param array $a array to be merged to
     * @param array $b array to be merged from. You can specify additional
     * arrays via third argument, fourth argument etc.
     * @return array the merged array (the original arrays are not changed.)
     */
    public static function strictMerge($a, $b)
    {
        $args = func_get_args();
        $res = array_shift($args);
        while (!empty($args)) {
            foreach (array_shift($args) as $k => $v) {
                if ($v instanceof UnsetArrayValue) {
                    unset($res[$k]);
                } elseif ($v instanceof ReplaceArrayValue) {
                    $res[$k] = $v->value;
                } elseif (is_int($k)) {
                    if (array_key_exists($k, $res)) {
                        $res[] = $v;
                    } else {
                        $res[$k] = $v;
                    }
                } elseif (is_array($v) && isset($res[$k]) && is_array($res[$k])) {
                    $res[$k] = self::merge($res[$k], $v);
                } else {
                    $res[$k] = $v;
                }
            }
        }

        /**
         * If this is a sequential 0-based indexed array, strip out any non-unique
         * array values
         *
         * aaw -- 2018.03.18
         */
        if (array_keys($res) === range(0, count($res) - 1)) {
            $res = array_values(array_unique($res));
        }

        return $res;
    }

    /**
     * @param array    $array
     * @param callable $callback
     *
     * @return array
     */
    public static function arrayFilterRecursive(array $array, callable $callback)
    {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $array[$k] = self::arrayFilterRecursive($v, $callback);
            } else {
                if ($callback($v, $k)) {
                    unset($array[$k]);
                }
            }
        }

        return $array;
    }

    /**
     * @param $value
     * @param $key
     *
     * @return bool
     */
    public static function unsetEmptyChildren($value, $key)
    {
        if (is_bool($value)) {
            return false;
        } else {
            return empty($value) ? true : false;
        }
    }

    /**
     * @param $value
     * @param $key
     *
     * @return bool
     */
    public static function unsetNullChildren($value, $key)
    {
        return $value == null ? true : false;
    }
}
