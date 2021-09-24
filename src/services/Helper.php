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

use Craft;
use craft\base\Component;
use craft\elements\Asset;
use craft\elements\db\MatrixBlockQuery;
use craft\elements\db\TagQuery;
use craft\helpers\Template;
use craft\web\twig\variables\Paginate;
use nystudio107\seomatic\base\InheritableSettingsModel;
use nystudio107\seomatic\helpers\DynamicMeta as DynamicMetaHelper;
use nystudio107\seomatic\helpers\ImageTransform as ImageTransformHelper;
use nystudio107\seomatic\helpers\Schema as SchemaHelper;
use nystudio107\seomatic\helpers\Text as TextHelper;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use yii\base\Exception;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Helper extends Component
{
    // Constants
    // =========================================================================

    const TWITTER_TRANSFORM_MAP = [
            'summary' => 'twitter-summary',
            'summary_large_image' => 'twitter-large',
            'app' => 'twitter-large',
            'player' => 'twitter-large',
        ];

    // Public Methods
    // =========================================================================

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
        return TextHelper::sanitizeUserInput($str);
    }

    /**
     * Return the appropriate Twitter Transform based on the current $metaGlobalVars->twitterCard
     *
     * @return string
     */
    public static function twitterTransform(): string
    {
        $transform = 'twitter-summary';
        $metaGlobalVars = Seomatic::$plugin->metaContainers->metaGlobalVars;
        if ($metaGlobalVars) {
            $transform = self::TWITTER_TRANSFORM_MAP[$metaGlobalVars->twitterCard] ?? $transform;
        }

        return $transform;
    }

    /**
     * Return the proper content for the `query-input` JSON-LD property
     *
     * @return string
     */
    public static function siteLinksQueryInput(): string
    {
        $result = '';

        $metaSiteVars = Seomatic::$plugin->metaContainers->metaSiteVars;
        if ($metaSiteVars && !empty($metaSiteVars->siteLinksQueryInput)) {
            $result = 'required name='.$metaSiteVars->siteLinksQueryInput;
        }

        return $result;
    }

    /**
     * Return whether this is a preview request of any kind
     *
     * @return bool
     */
    public static function isPreview(): bool
    {
        $isPreview = false;
        $request = Craft::$app->getRequest();
        if (Seomatic::$craft32) {
            $isPreview = $request->getIsPreview();
        }
        $isLivePreview = $request->getIsLivePreview();

        return ($isPreview || $isLivePreview);
    }

    /**
     * Return the Same As Links info as an array or null
     *
     * @param string $handle
     * @return array|null
     */
    public static function sameAsByHandle(string $handle) {
        $result = null;

        $sameAs = Seomatic::$plugin->metaContainers->metaSiteVars->sameAsLinks;
        if (!empty($sameAs) && !empty($handle)) {
            foreach ($sameAs as $sameAsInfo) {
                if (!empty($sameAsInfo) && is_array($sameAsInfo) && !empty($sameAsInfo['handle'])) {
                    if ($sameAsInfo['handle'] === $handle) {
                        return $sameAsInfo;
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Return the canonical URL for the request, with the query string stripped
     *
     * @return string
     */
    public static function safeCanonicalUrl(): string
    {
        $url = '';
        try {
            $url = Craft::$app->getRequest()->getPathInfo();
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }

        return DynamicMetaHelper::sanitizeUrl(UrlHelper::absoluteUrlWithProtocol($url));
    }

    /**
     * Return the site URL for a given URL. This gives SEOmatic a chance to override it
     *
     * @param string $path
     * @param array|string|null $params
     * @param string|null $scheme
     * @param int|null $siteId
     * @return string
     * @throws Exception if|null $siteId is invalid
     */
    public static function siteUrl(string $path = '', $params = null, string $scheme = null, int $siteId = null): string
    {
        return UrlHelper::siteUrl($path);
    }

    /**
     * Paginate based on the passed in Paginate variable as returned from the
     * Twig {% paginate %} tag:
     * https://docs.craftcms.com/v3/templating/tags/paginate.html#the-pageInfo-variable
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
     * The resulting array of arrays has `id`, `language`, `ogLanguage`,
     * `hreflangLanguage`, and `url` as keys.
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
     * @return \Twig\Markup
     * @throws \yii\base\Exception
     */
    public static function seoFileLink($url, $robots = '', $canonical = '', $inline = true): \Twig\Markup
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
     * Return a sitemap for each site in the same site group
     *
     * @return string
     */
    public static function sitemapIndex(): string
    {
        return Seomatic::$plugin->sitemaps->sitemapIndex();
    }

    /**
     * Return a sitemap for each site in the same site group
     *
     * @deprecated use sitemapIndex() instead
     * @return string
     */
    public static function siteGroupSitemaps(): string
    {
        return Seomatic::$plugin->sitemaps->sitemapIndex();
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
     * Return a period-delimited schema.org path from the $settings
     *
     * @param $settings
     *
     * @return string
     */
    public static function getEntityPath($settings): string
    {
        return SchemaHelper::getEntityPath($settings);
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

    /**
     * Transform the $asset for social media sites in $transformName and
     * optional $siteId
     *
     * @param int|Asset $asset         the Asset or Asset ID
     * @param string    $transformName the name of the transform to apply
     * @param int|null  $siteId
     * @param string    $transformMode
     *
     * @return string URL to the transformed image
     */
    public function socialTransform($asset, $transformName = '', $siteId = null, $transformMode = null): string
    {
        return ImageTransformHelper::socialTransform($asset, $transformName, $siteId, $transformMode);
    }

    /**
     * Get the width of the transformed social image for $transformName and
     * optional $siteId
     *
     * @param int|Asset $asset         the Asset or Asset ID
     * @param string    $transformName the name of the transform to apply
     * @param int|null  $siteId
     * @param string    $transformMode
     *
     * @return string URL to the transformed image
     */
    public function socialTransformWidth(
        $asset,
        $transformName = '',
        $siteId = null,
        $transformMode = null
    ): string {
        return ImageTransformHelper::socialTransformWidth($asset, $transformName, $siteId, $transformMode);
    }

    /**
     * Get the height of the transformed social image for $transformName and
     * optional $siteId
     *
     * @param int|Asset $asset         the Asset or Asset ID
     * @param string    $transformName the name of the transform to apply
     * @param int|null  $siteId
     * @param string    $transformMode
     *
     * @return string URL to the transformed image
     */
    public function socialTransformHeight(
        $asset,
        $transformName = '',
        $siteId = null,
        $transformMode = null
    ): string {
        return ImageTransformHelper::socialTransformHeight($asset, $transformName, $siteId, $transformMode);
    }

    /**
     * Return whether we are running Craft 3.1 or later
     *
     * @return bool
     */
    public function craft31(): bool
    {
        return Seomatic::$craft31;
    }

    /**
     * Return whether we are running Craft 3.2 or later
     *
     * @return bool
     */
    public function craft32(): bool
    {
        return Seomatic::$craft32;
    }

    /**
     * Return whether we are running Craft 3.3 or later
     *
     * @return bool
     */
    public function craft33(): bool
    {
        return Seomatic::$craft33;
    }

    /**
     * Given a list of meta bundles in order of descending distance, return the bundle that has inheritable value.
     *
     * @param array $inheritedValues
     * @param string $settingName
     * @param string $collectionName The name off the collection to search
     * @return MetaBundle|null
     * @since 3.4.0
     */
    public function findInheritableBundle(array $inheritedValues, string $settingName, string $collectionName = "metaGlobalVars")
    {
        if (in_array($collectionName, ['metaGlobalVars', 'metaSitemapVars'], true)) {
            foreach ($inheritedValues as $bundle) {
                /** @var $bundle MetaBundle */
                if (isset($bundle->{$collectionName}[$settingName])) {
                    if (is_bool($bundle->{$collectionName}[$settingName]) || !empty($bundle->{$collectionName}[$settingName])) {
                        return $bundle;
                    }
                }
            }
        }

        return null;
    }

    /**
     * Return true if a setting is inherited.
     *
     * @param InheritableSettingsModel $settingCollection
     * @param $settingName
     * @return bool
     * @since 3.4.0
     */
    public function isInherited(InheritableSettingsModel $settingCollection, $settingName)
    {
        $explicitInherit = array_key_exists($settingName, (array)$settingCollection->inherited);
        $explicitOverride = array_key_exists($settingName, (array)$settingCollection->overrides);

        if ($explicitInherit || $explicitOverride) {
            return $explicitInherit && !$explicitOverride;
        }

        return empty($settingCollection->{$settingName});
    }
}
