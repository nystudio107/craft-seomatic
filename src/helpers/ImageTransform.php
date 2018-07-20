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

    // Static Properties
    // =========================================================================

    static private $transforms = [
        'base' => [
            'format' => 'jpg',
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
     *
     * @return string URL to the transformed image
     */
    public static function socialTransform($asset, string $transformName = '', $siteId = null): string
    {
        $url = '';
        $transform = self::createSocialTransform($transformName);
        $asset = self::assetFromAssetOrId($asset, $siteId);
        if (($asset !== null) && ($asset instanceof Asset)) {
            // Generate a transformed image
            $assets = Craft::$app->getAssets();
            $url = $assets->getAssetUrl($asset, $transform, true);
            if ($url === null) {
                $url = '';
            }
        }

        return $url;
    }

    /**
     * @param int|Asset $asset         the Asset or Asset ID
     * @param string    $transformName the name of the transform to apply
     * @param int|null  $siteId
     *
     * @return string width of the transformed image
     */
    public static function socialTransformWidth($asset, string $transformName = '', $siteId = null): string
    {
        $width = '';
        $transform = self::createSocialTransform($transformName);
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
     *
     * @return string width of the transformed image
     */
    public static function socialTransformHeight($asset, string $transformName = '', $siteId = null): string
    {
        $height = '';
        $transform = self::createSocialTransform($transformName);
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
        return \is_int($asset) ? Craft::$app->getAssets()->getAssetById($asset, $siteId) : $asset;
    }

    /**
     * Create a transform from the passed in $transformName
     *
     * @param string    $transformName the name of the transform to apply
     *
     * @return AssetTransform|null
     */
    protected static function createSocialTransform(string $transformName = '')
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
