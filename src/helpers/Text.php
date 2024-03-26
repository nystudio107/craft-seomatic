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

use benf\neo\elements\Block as NeoBlock;
use benf\neo\elements\db\BlockQuery as NeoBlockQuery;
use craft\elements\db\EntryQuery;
use craft\elements\db\TagQuery;
use craft\elements\Entry;
use craft\elements\Tag;
use craft\helpers\HtmlPurifier;
use Illuminate\Support\Collection;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\Seomatic;
use PhpScience\TextRank\TextRankFacade;
use PhpScience\TextRank\Tool\StopWords\StopWordsAbstract;
use Stringy\Stringy;
use verbb\doxter\Doxter;
use verbb\doxter\fields\data\DoxterData;
use yii\base\InvalidConfigException;
use function array_slice;
use function function_exists;
use function is_array;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Text
{
    // Constants
    // =========================================================================

    public const LANGUAGE_MAP = [
        'en' => 'English',
        'fr' => 'French',
        'de' => 'German',
        'it' => 'Italian',
        'no' => 'Norwegian',
        'es' => 'Spanish',
    ];

    // Public Static Methods
    // =========================================================================

    /**
     * Truncates the string to a given length. If $substring is provided, and
     * truncating occurs, the string is further truncated so that the substring
     * may be appended without exceeding the desired length.
     *
     * @param string $string The string to truncate
     * @param int $length Desired length of the truncated string
     * @param string $substring The substring to append if it can fit
     *
     * @return string with the resulting $str after truncating
     */
    public static function truncate($string, $length, $substring = '…'): string
    {
        $result = $string;

        if (!empty($string)) {
            $string = HtmlPurifier::process($string, ['HTML.Allowed' => '']);
            $string = html_entity_decode($string, ENT_NOQUOTES, 'UTF-8');
            $result = (string)Stringy::create($string)->truncate($length, $substring);
        }

        return $result;
    }

    /**
     * Truncates the string to a given length, while ensuring that it does not
     * split words. If $substring is provided, and truncating occurs, the
     * string is further truncated so that the substring may be appended without
     * exceeding the desired length.
     *
     * @param string $string The string to truncate
     * @param int $length Desired length of the truncated string
     * @param string $substring The substring to append if it can fit
     *
     * @return string with the resulting $str after truncating
     */
    public static function truncateOnWord($string, $length, $substring = '…'): string
    {
        $result = $string;

        if (!empty($string)) {
            $string = HtmlPurifier::process($string, ['HTML.Allowed' => '']);
            $string = html_entity_decode($string, ENT_NOQUOTES, 'UTF-8');
            $result = (string)Stringy::create($string)->safeTruncate($length, $substring);
        }

        return $result;
    }

    /**
     * Extract plain old text from a field
     *
     * @param $field
     *
     * @return string
     */
    public static function extractTextFromField($field): string
    {
        if (empty($field)) {
            return '';
        }
        if ($field instanceof EntryQuery
            || (self::isArrayLike($field) && $field[0] instanceof Entry)) {
            $result = self::extractTextFromMatrix($field);
        } elseif ($field instanceof NeoBlockQuery
            || (self::isArrayLike($field) && $field[0] instanceof NeoBlock)) {
            $result = self::extractTextFromNeo($field);
        } elseif ($field instanceof TagQuery
            || (self::isArrayLike($field) && $field[0] instanceof Tag)) {
            $result = self::extractTextFromTags($field);
        } elseif ($field instanceof DoxterData) {
            $result = self::smartStripTags(Doxter::$plugin->getService()->parseMarkdown($field->getRaw()));
        } else {
            if (self::isArrayLike($field)) {
                $result = self::smartStripTags((string)$field[0]);
            } else {
                $result = self::smartStripTags((string)$field);
            }
        }

        //return $result;
        return self::sanitizeUserInput($result);
    }

    /**
     * Extract concatenated text from all of the tags in the $tagElement and
     * return as a comma-delimited string
     *
     * @param TagQuery|Tag[]|array $tags
     *
     * @return string
     */
    public static function extractTextFromTags($tags): string
    {
        if (empty($tags)) {
            return '';
        }
        $result = '';
        // Iterate through all of the matrix blocks
        if ($tags instanceof TagQuery) {
            $tags = $tags->all();
        }
        foreach ($tags as $tag) {
            $result .= $tag->title . ', ';
        }
        $result = rtrim($result, ', ');

        return $result;
    }

    /**
     * Extract text from all of the blocks in a matrix field, concatenating it
     * together.
     *
     * @param EntryQuery|Entry[]|array $blocks
     * @param string $fieldHandle
     *
     * @return string
     */
    public static function extractTextFromMatrix($blocks, $fieldHandle = ''): string
    {
        if (empty($blocks)) {
            return '';
        }
        $result = '';
        // Iterate through all of the matrix blocks
        if ($blocks instanceof EntryQuery) {
            $blocks = $blocks->all();
        }
        foreach ($blocks as $block) {
            try {
                $matrixEntryTypeModel = $block->getType();
            } catch (InvalidConfigException $e) {
                $matrixEntryTypeModel = null;
            }
            // Find any text fields inside of the matrix block
            if ($matrixEntryTypeModel) {
                $fieldClasses = FieldHelper::FIELD_CLASSES[FieldHelper::TEXT_FIELD_CLASS_KEY];
                $fields = $matrixEntryTypeModel->getCustomFields();

                foreach ($fields as $field) {
                    /** @var array $fieldClasses */
                    foreach ($fieldClasses as $fieldClassKey) {
                        if ($field instanceof $fieldClassKey) {
                            if ($field->handle === $fieldHandle || empty($fieldHandle)) {
                                $result .= self::extractTextFromField($block[$field->handle]) . ' ';
                            }
                        }
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Extract text from all of the blocks in a Neo field, concatenating it
     * together.
     *
     * @param NeoBlockQuery|NeoBlock[]|array $blocks
     * @param string $fieldHandle
     *
     * @return string
     */
    public static function extractTextFromNeo($blocks, $fieldHandle = ''): string
    {
        if (empty($blocks)) {
            return '';
        }
        $result = '';
        // Iterate through all of the matrix blocks
        if ($blocks instanceof NeoBlockQuery) {
            $blocks = $blocks->all();
        }
        foreach ($blocks as $block) {
            $layout = $block->getFieldLayout();
            // Find any text fields inside of the neo block
            if ($layout) {
                $fieldClasses = FieldHelper::FIELD_CLASSES[FieldHelper::TEXT_FIELD_CLASS_KEY];
                $fieldElements = $layout->getCustomFieldElements();
                foreach ($fieldElements as $fieldElement) {
                    $field = $fieldElement->getField();
                    /** @var array $fieldClasses */
                    foreach ($fieldClasses as $fieldClassKey) {
                        if ($field instanceof $fieldClassKey) {
                            if ($field->handle === $fieldHandle || empty($fieldHandle)) {
                                $result .= self::extractTextFromField($block[$field->handle]) . ' ';
                            }
                        }
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Return the most important keywords extracted from the text as a comma-
     * delimited string
     *
     * @param string $text
     * @param int $limit
     * @param bool $useStopWords
     *
     * @return string
     */
    public static function extractKeywords($text, $limit = 15, $useStopWords = true): string
    {
        if (empty($text)) {
            return '';
        }
        $api = new TextRankFacade();
        // Set the stop words that should be ignored
        if ($useStopWords) {
            $language = strtolower(substr(Seomatic::$language, 0, 2));
            $stopWords = self::stopWordsForLanguage($language);
            if ($stopWords !== null) {
                $api->setStopWords($stopWords);
            }
        }
        // Array of the most important keywords:
        $keywords = $api->getOnlyKeyWords(self::cleanupText($text));

        // If it's empty, just return the text
        if (empty($keywords)) {
            return $text;
        }

        $result = implode(', ', array_slice(array_keys($keywords), 0, $limit));

        return self::sanitizeUserInput($result);
    }

    /**
     * Extract a summary consisting of the 3 most important sentences from the
     * text
     *
     * @param string $text
     * @param bool $useStopWords
     *
     * @return string
     */
    public static function extractSummary($text, $useStopWords = true): string
    {
        if (empty($text)) {
            return '';
        }
        $api = new TextRankFacade();
        // Set the stop words that should be ignored
        if ($useStopWords) {
            $language = strtolower(substr(Seomatic::$language, 0, 2));
            $stopWords = self::stopWordsForLanguage($language);
            if ($stopWords !== null) {
                $api->setStopWords($stopWords);
            }
        }
        // Array of the most important keywords:
        $sentences = $api->getHighlights(self::cleanupText($text));

        // If it's empty, just return the text
        if (empty($sentences)) {
            return $text;
        }

        $result = implode(' ', $sentences);

        return self::sanitizeUserInput($result);
    }


    /**
     * Sanitize user input by decoding any HTML Entities, URL decoding the text,
     * then removing any newlines, stripping tags, stripping Twig tags, and changing
     * single {}'s into ()'s
     *
     * @param $str
     * @return string
     */
    public static function sanitizeUserInput($str): string
    {
        // Do some general cleanup
        $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
        $str = rawurldecode($str);
        // Remove any linebreaks
        $str = (string)preg_replace("/\r|\n/", "", $str);
        $str = HtmlPurifier::process($str, ['HTML.Allowed' => '']);
        $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
        // Remove any embedded Twig code
        $str = preg_replace('/{{.*?}}/', '', $str);
        $str = preg_replace('/{%.*?%}/', '', $str);
        // Change single brackets to parenthesis
        $str = preg_replace('/{/', '(', $str);
        $str = preg_replace('/}/', ')', $str);
        if (empty($str)) {
            $str = '';
        }

        return $str;
    }

    /**
     * Strip HTML tags, but replace them with a space rather than just eliminating them
     *
     * @param $str
     * @return string
     */
    public static function smartStripTags($str)
    {
        $str = str_replace('<', ' <', $str);
        $str = HtmlPurifier::process($str, ['HTML.Allowed' => '']);
        $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
        $str = str_replace('  ', ' ', $str);

        return $str;
    }

    /**
     * Clean up the passed in text by converting it to UTF-8, stripping tags,
     * removing whitespace, and decoding HTML entities
     *
     * @param string $text
     *
     * @return string
     */
    public static function cleanupText($text): string
    {
        if (empty($text)) {
            return '';
        }
        // Convert to UTF-8
        if (function_exists('iconv')) {
            $text = iconv(mb_detect_encoding($text, mb_detect_order(), true), 'UTF-8//IGNORE', $text);
        } else {
            ini_set('mbstring.substitute_character', 'none');
            $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');
        }
        // Strip HTML tags
        $text = HtmlPurifier::process($text, ['HTML.Allowed' => '']);
        $text = html_entity_decode($text, ENT_NOQUOTES, 'UTF-8');
        // Remove excess whitespace
        $text = preg_replace('/\s{2,}/u', ' ', $text);
        // Decode any HTML entities
        $text = html_entity_decode($text);

        return $text;
    }

    /**
     * Is $var an array or array-like object?
     *
     * @param $var
     * @return bool
     */
    public static function isArrayLike($var): bool
    {
        return is_array($var) || ($var instanceof Collection);
    }

    // Protected Static Methods
    // =========================================================================

    /**
     * @param string $language
     *
     * @return null|StopWordsAbstract
     */
    protected static function stopWordsForLanguage(string $language)
    {
        $stopWords = null;
        if (!empty(self::LANGUAGE_MAP[$language])) {
            $language = self::LANGUAGE_MAP[$language];
        } else {
            $language = 'English';
        }

        $className = 'PhpScience\\TextRank\\Tool\\StopWords\\' . ucfirst($language);
        if (class_exists($className)) {
            $stopWords = new $className();
        }

        return $stopWords;
    }
}
