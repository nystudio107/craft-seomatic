<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\helpers;

use Craft;
use craft\elements\Asset;
use craft\helpers\ArrayHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.5.21
 */
class AssetHelper
{
    /**
     * Return asset volume sources that can be accessed by the current user
     *
     * @return array
     */
    public static function getAssetInputSources(): array
    {
        $sources = [];
        foreach (Craft::$app->getElementIndexes()->getSources(Asset::class) as $source) {
            if (isset($source['key'])) {
                $sources[] = $source['key'];
            }
        }

        // Now enforce the showUnpermittedVolumes setting
        $assetsService = Craft::$app->getAssets();
        $userService = Craft::$app->getUser();
        return ArrayHelper::where($sources, function(string $source) use ($assetsService, $userService) {
            // If it's not a volume folder, let it through
            if (strpos($source, 'folder:') !== 0) {
                return true;
            }
            // Only show it if they have permission to view it
            $folder = $assetsService->getFolderByUid(explode(':', $source)[1]);
            $volume = $folder ? $folder->getVolume() : null;
            return $volume && $userService->checkPermission("viewVolume:{$volume->uid}");
        }, true, true, false);
    }
}
