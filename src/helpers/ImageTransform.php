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
            'interlace' => 'line',
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
     * @param int|Asset $asset         the Asset or Asset ID
     * @param string    $transformName the name of the transform to apply
     * @param int|null  $siteId
     *
     * @return string URL to the transformed image
     */
    public static function socialTransform($asset, string $transformName, int $siteId = null): string
    {
        $url = '';
        $config = array_merge(
            self::$transforms['base'],
            self::$transforms[$transformName] ?? self::$transforms['base']
        );
        $transform = new AssetTransform($config);
        if (is_int($asset)) {
            // Get the asset
            $asset = Craft::$app->getAssets()->getAssetById($asset, $siteId);
        }
        if ($transform && $asset instanceof Asset) {
            // Generate a transformed image
            $assets = Craft::$app->getAssets();
            $url = $assets->getAssetUrl($asset, $transform, true);
        }

        return $url;
    }
}
