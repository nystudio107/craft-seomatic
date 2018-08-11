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

use yii\base\InvalidArgumentException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Json extends \yii\helpers\Json
{
    // Public Methods
    // =========================================================================

    /**
     * Decodes the given JSON string into a PHP data structure, only if the string is valid JSON.
     *
     * @param string $str The string to be decoded, if it's valid JSON.
     * @param bool $asArray Whether to return objects in terms of associative arrays.
     * @return mixed The PHP data, or the given string if it wasn’t valid JSON.
     */
    public static function decodeIfJson(string $str, bool $asArray = true)
    {
        try {
            return static::decode($str, $asArray);
        } catch (InvalidArgumentException $e) {
            // Wasn't JSON
            return $str;
        }
    }

    /**
     * Decodes the given JSON string into a PHP data structure.
     * @param string $json the JSON string to be decoded
     * @param bool $asArray whether to return objects in terms of associative arrays.
     * @return mixed the PHP data
     * @throws InvalidArgumentException if there is any decoding error
     */
    public static function decode($json, $asArray = true)
    {
        if (\is_array($json)) {
            throw new InvalidArgumentException('Invalid JSON data.');
        } elseif ($json === null || $json === '') {
            return null;
        }
        $decode = json_decode((string) $json, $asArray, 512, JSON_BIGINT_AS_STRING);
        static::handleJsonError(json_last_error());

        return $decode;
    }
}
