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
     * @param array    $array
     * @param callable $callback
     *
     * @return array
     */
    public static function arrayFilterRecursive(array $array, callable $callback): array
    {
        foreach ($array as $k => $v) {
            if (\is_array($v)) {
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
     * Used as a callback for array_filter to preserve any boolean values
     * that are in the array being filtered
     *
     * @param $value
     *
     * @return bool
     */
    public static function preserveBools($value): bool
    {
        return \is_bool($value) ? true : !empty($value);
    }

    /**
     * Used as a callback for array_filter to preserve any numeric values
     * that are in the array being filtered
     *
     * @param $value
     *
     * @return bool
     */
    public static function preserveNumerics($value): bool
    {
        return \is_numeric($value) ? true : !empty($value);
    }

    /**
     * @param $value
     * @param $key
     *
     * @return bool
     */
    public static function unsetEmptyChildren($value, $key): bool
    {
        if (\is_bool($value)) {
            return false;
        }

        return empty($value) ? true : false;
    }

    /**
     * @param $value
     * @param $key
     *
     * @return bool
     */
    public static function unsetNullChildren($value, $key): bool
    {
        return $value === null;
    }
}
