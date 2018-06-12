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

namespace nystudio107\seomatic\services;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\helpers\DynamicMeta as DynamicMetaHelper;
use nystudio107\seomatic\helpers\ImageTransform as ImageTransformHelper;
use nystudio107\seomatic\helpers\Schema as SchemaHelper;
use nystudio107\seomatic\helpers\Text as TextHelper;

use craft\base\Component;
use craft\elements\Asset;
use craft\elements\db\MatrixBlockQuery;
use craft\elements\db\TagQuery;
use craft\helpers\Template;
use craft\helpers\UrlHelper;
use craft\web\twig\variables\Paginate;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Helper extends Component
{
    // Constants
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * Paginate based on the passed in Paginate variable as returned from the
     * Twig {% paginate %} tag: https://docs.craftcms.com/v3/templating/tags/paginate.html#the-pageInfo-variable
     *
     * @param Paginate $pageInfo
     */
    public static function paginate(Paginate $pageInfo)
    {
        DynamicMetaHelper::paginate($pageInfo);
    }

    /**
     * Truncates the string to a given length. If $substring is provided, and
     * truncating occurs, the string is further truncated so that the substring
     * may be appended without exceeding the desired length.
     *
     * @param  string $string    The string to truncate
     * @param  int    $length    Desired length of the truncated string
     * @param  string $substring The substring to append if it can fit
     *
     * @return string with the resulting $str after truncating
     */
    public static function truncate($string, $length, $substring = '…'): string
    {
        return TextHelper::truncate($string, $length, $substring);
    }

    /**
     * Truncates the string to a given length, while ensuring that it does not
     * split words. If $substring is provided, and truncating occurs, the
     * string is further truncated so that the substring may be appended without
     * exceeding the desired length.
     *
     * @param  string $string    The string to truncate
     * @param  int    $length    Desired length of the truncated string
     * @param  string $substring The substring to append if it can fit
     *
     * @return string with the resulting $str after truncating
     */
    public static function truncateOnWord($string, $length, $substring = '…'): string
    {
        return TextHelper::truncateOnWord($string, $length, $substring);
    }

    /**
     * Return a list of localized URLs that are in the current site's group
     * The current URI is used if $uri is null. Similarly, the current site is
     * used if $siteId is null.
     * The resulting array of arrays has `id`, `language`, `hreflangLanguage`,
     * and `url` as keys.
     *
     * @param string|null $uri
     * @param int|null    $siteId
     *
     * @return array
     */
    public static function getLocalizedUrls(string $uri = null, int $siteId = null): array
    {
        return DynamicMetaHelper::getLocalizedUrls($uri, $siteId);
    }

    /**
     * Allow setting the X-Robots-Tag and Link headers on static files as per:
     * https://moz.com/blog/how-to-advanced-relcanonical-http-headers
     *
     * @param        $url
     * @param string $robots
     * @param string $canonical
     * @param bool   $inline
     *
     * @return \Twig_Markup
     * @throws \yii\base\Exception
     */
    public static function seoFileLink($url, $robots = '', $canonical = '', $inline = true): \Twig_Markup
    {
        // Get the file name
        $path = parse_url($url, PHP_URL_PATH);
        $fileName = pathinfo($path, PATHINFO_BASENAME);
        // Set some defaults
        $robots = empty($robots) ? 'all' : $robots;
        $canonical = empty($canonical) ? $url : $canonical;
        $inlineStr = $inline === true ? '1' : '0';
        // Compose the base64 encoded URL
        $seoFileLink = 'seomatic/seo-file-link/'
            .base64_encode($url)
            .'/'
            .base64_encode($robots)
            .'/'
            .base64_encode($canonical)
            .'/'
            .$inlineStr
            .'/'
            .$fileName;
        return Template::raw(UrlHelper::siteUrl($seoFileLink));
    }

    /**
     * Load the appropriate meta containers for the given $uri and optional
     * $siteId
     *
     * @param string   $uri
     * @param int|null $siteId
     */
    public static function loadMetadataForUri(string $uri = '', int $siteId = null)
    {
        Seomatic::$plugin->metaContainers->loadMetaContainers($uri, $siteId);
    }

    /**
     * Get the URL to the $siteId's sitemap index
     *
     * @param int|null $siteId
     *
     * @return string
     */
    public static function sitemapIndexForSiteId(int $siteId = null): string
    {
        return Seomatic::$plugin->sitemaps->sitemapIndexUrlForSiteId($siteId);
    }

    /**
     * @param string   $sourceType
     * @param string   $sourceHandle
     * @param int|null $siteId
     *
     * @return string
     */
    public static function sitemapUrlForBundle(string $sourceType, string $sourceHandle, int $siteId = null): string
    {
        return Seomatic::$plugin->sitemaps->sitemapUrlForBundle($sourceType, $sourceHandle, $siteId);
    }

    /**
     * Extract plain old text from a field
     *
     * @param $field
     *
     * @return string
     */
    public static function extractTextFromField($field = null): string
    {
        return TextHelper::extractTextFromField($field);
    }

    /**
     * Extract concatenated text from all of the tags in the $tagElement and
     * return as a comma-delimited string
     *
     * @param TagQuery $tagQuery
     *
     * @return string
     */
    public static function extractTextFromTags($tagQuery = null): string
    {
        return TextHelper::extractTextFromTags($tagQuery);
    }

    /**
     * Extract text from all of the blocks in a matrix field, concatenating it
     * together.
     *
     * @param MatrixBlockQuery $matrixQuery
     * @param string           $fieldHandle
     *
     * @return string
     */
    public static function extractTextFromMatrix($matrixQuery = null, $fieldHandle = ''): string
    {
        return TextHelper::extractTextFromMatrix($matrixQuery, $fieldHandle);
    }

    /**
     * Return the most important keywords extracted from the text as a comma-
     * delimited string
     *
     * @param string $text
     * @param int    $limit
     * @param bool   $useStopWords
     *
     * @return string
     */
    public static function extractKeywords($text = '', $limit = 15, $useStopWords = true): string
    {
        return TextHelper::extractKeywords($text, $limit, $useStopWords);
    }

    /**
     * Extract a summary consisting of the 3 most important sentences from the
     * text
     *
     * @param string $text
     * @param bool   $useStopWords
     *
     * @return string
     */
    public static function extractSummary($text = '', $useStopWords = true): string
    {
        return TextHelper::extractSummary($text, $useStopWords);
    }

    /**
     * Transform the $asset for social media sites in $transformName and
     * optional $siteId
     *
     * @param int|Asset $asset         the Asset or Asset ID
     * @param string    $transformName the name of the transform to apply
     * @param int|null  $siteId
     *
     * @return string URL to the transformed image
     */
    public function socialTransform($asset, string $transformName, int $siteId = null): string
    {
        return ImageTransformHelper::socialTransform($asset, $transformName, $siteId);
    }

    /**
     * Return a flattened, indented menu of the given $path
     *
     * @param string $path
     *
     * @return array
     */
    public static function getTypeMenu($path): array
    {
        return SchemaHelper::getTypeMenu($path);
    }

    /**
     * Return a single menu of schemas starting at $path
     *
     * @param string $path
     *
     * @return array
     */
    public static function getSingleTypeMenu($path): array
    {
        return SchemaHelper::getSingleTypeMenu($path);
    }
}
