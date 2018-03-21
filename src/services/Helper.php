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
use nystudio107\seomatic\helpers\ImageTransform as ImageTransformHelper;
use nystudio107\seomatic\helpers\Text as TextHelper;

use Craft;
use craft\base\Component;
use craft\elements\Asset;
use craft\elements\db\MatrixBlockQuery;
use craft\elements\db\TagQuery;
use craft\helpers\Template;
use craft\helpers\UrlHelper;

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
     * Allow setting the X-Robots-Tag and Link headers on static files as per:
     * https://moz.com/blog/how-to-advanced-relcanonical-http-headers
     *
     * @param        $url
     * @param string $robots
     * @param string $canonical
     * @param bool   $inline
     *
     * @return \Twig_Markup
     */
    public static function seoFileLink($url, $robots = 'all', $canonical = '', $inline = true)
    {
        return Template::raw(UrlHelper::actionUrl(
            'seomatic/file/seo-file-link',
            [
                'url' => $url,
                'robots' => $robots,
                'canonical' => $canonical,
                'inline' => $inline
            ]
        ));
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
    public static function extractTextFromField($field)
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
    public static function extractTextFromTags(TagQuery $tagQuery)
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
    public static function extractTextFromMatrix(MatrixBlockQuery $matrixQuery, $fieldHandle = '')
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
    public static function extractKeywords(string $text, $limit = 15, $useStopWords = true): string
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
    public static function extractSummary(string $text, $useStopWords = true): string
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
}
