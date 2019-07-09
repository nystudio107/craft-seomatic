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
use nystudio107\seomatic\helpers\Environment as EnvironmentHelper;

use Craft;
use craft\elements\Asset;
use craft\models\AssetTransform;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class ImageTransform
{
    // Constants
    // =========================================================================

    const SOCIAL_TRANSFORM_QUALITY = 82;

    const ALLOWED_SOCIAL_MIME_TYPES = [
        'image/jpeg',
        'image/png',
    ];

    const DEFAULT_SOCIAL_FORMAT = 'jpg';

    // Static Properties
    // =========================================================================

    static private $transforms = [
        'base' => [
            'format' => null,
            'quality' => self::SOCIAL_TRANSFORM_QUALITY,
            'width' => 1200,
            'height' => 630,
            'mode' => 'crop',
        ],
        'facebook' => [
            'width' => 1200,
            'height' => 630,
        ],
        'twitter-summary' => [
            'width' => 800,
            'height' => 800,
        ],
        'twitter-large' => [
            'width' => 800,
            'height' => 418,
        ],
        'schema-logo' => [
            'format' => 'png',
            'width' => 600,
            'height' => 60,
            'mode' => 'fit',
        ],
    ];

    // Static Methods
    // =========================================================================

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
    public static function socialTransform(
        $asset,
        $transformName = '',
        $siteId = null,
        $transformMode = null
    ): string {
        $url = '';
        $transform = self::createSocialTransform($transformName);
        // Let them override the mode
        if ($transform !== null) {
            $transform->mode = $transformMode ?? $transform->mode;
        }
        $asset = self::assetFromAssetOrId($asset, $siteId);
        if (($asset !== null) && ($asset instanceof Asset)) {
            // Make sure the format is an allowed format, otherwise explicitly change it
            $mimeType = $asset->getMimeType();
            if (!\in_array($mimeType, self::ALLOWED_SOCIAL_MIME_TYPES, false)) {
                $transform->format = self::DEFAULT_SOCIAL_FORMAT;
            }
            // Generate a transformed image
            $assets = Craft::$app->getAssets();
            // If we're not in local dev, tell it to generate the transform immediately so that
            // urls like `actions/assets/generate-transform` don't get cached
            $generateNow = Seomatic::$environment === EnvironmentHelper::SEOMATIC_DEV_ENV ? null : true;
            $url = $assets->getAssetUrl($asset, $transform, $generateNow);
            if ($url === null) {
                $url = '';
            }
            // If we have a url, add an `mtime` param to cache bust
            if (!empty($url) && empty(parse_url($url, PHP_URL_QUERY))) {
                $url = UrlHelper::url($url, [
                    'mtime' => $asset->dateModified->getTimestamp(),
                ]);
            }
        }

        return $url;
    }

    /**
     * @param int|Asset $asset         the Asset or Asset ID
     * @param string    $transformName the name of the transform to apply
     * @param int|null  $siteId
     * @param string    $transformMode
     *
     * @return string width of the transformed image
     */
    public static function socialTransformWidth(
        $asset,
        $transformName = '',
        $siteId = null,
        $transformMode = null
    ): string {
        $width = '';
        $transform = self::createSocialTransform($transformName);
        // Let them override the mode
        if ($transform !== null) {
            $transform->mode = $transformMode ?? $transform->mode;
        }
        $asset = self::assetFromAssetOrId($asset, $siteId);
        if (($asset !== null) && ($asset instanceof Asset)) {
            $width = (string)$asset->getWidth($transform);
            if ($width === null) {
                $width = '';
            }
        }

        return $width;
    }

    /**
     * @param int|Asset $asset         the Asset or Asset ID
     * @param string    $transformName the name of the transform to apply
     * @param int|null  $siteId
     * @param string    $transformMode
     *
     * @return string width of the transformed image
     */
    public static function socialTransformHeight(
        $asset,
        $transformName = '',
        $siteId = null,
        $transformMode = null
    ): string {
        $height = '';
        $transform = self::createSocialTransform($transformName);
        // Let them override the mode
        if ($transform !== null) {
            $transform->mode = $transformMode ?? $transform->mode;
        }
        $asset = self::assetFromAssetOrId($asset, $siteId);
        if (($asset !== null) && ($asset instanceof Asset)) {
            $height = (string)$asset->getHeight($transform);
            if ($height === null) {
                $height = '';
            }
        }

        return $height;
    }

    /**
     * Return an array of Asset elements from an array of element IDs
     *
     * @param array|string $assetIds
     * @param int|null     $siteId
     *
     * @return array
     */
    public static function assetElementsFromIds($assetIds, $siteId = null): array
    {
        $elements = Craft::$app->getElements();
        $assets = [];
        if (!empty($assetIds)) {
            if (\is_array($assetIds)) {
                foreach ($assetIds as $assetId) {
                    $assets[] = $elements->getElementById($assetId, Asset::class, $siteId);
                }
            } else {
                $assetId = $assetIds;
                $assets[] = $elements->getElementById($assetId, Asset::class, $siteId);
            }
        }

        return $assets;
    }

    // Protected Static Methods
    // =========================================================================

    /**
     * Return an asset from either an id or an asset
     *
     * @param int|Asset $asset         the Asset or Asset ID
     * @param int|null  $siteId
     *
     * @return Asset|null
     */
    protected static function assetFromAssetOrId($asset, $siteId = null)
    {
        if (empty($asset)) {
            return null;
        }
        return ($asset instanceof Asset) ? $asset : Craft::$app->getAssets()->getAssetById($asset, $siteId);
    }

    /**
     * Create a transform from the passed in $transformName
     *
     * @param string    $transformName the name of the transform to apply
     *
     * @return AssetTransform|null
     */
    protected static function createSocialTransform($transformName = 'base')
    {
        $transform = null;
        if (!empty($transformName)) {
            $config = array_merge(
                self::$transforms['base'],
                self::$transforms[$transformName] ?? self::$transforms['base']
            );
            $transform = new AssetTransform($config);
        }

        return $transform;
    }
}
