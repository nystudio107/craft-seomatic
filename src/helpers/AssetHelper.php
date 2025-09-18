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
use craft\fs\Temp;
use craft\helpers\ArrayHelper;
use craft\services\ElementSources;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     5.1.18
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
        foreach (Craft::$app->getElementSources()->getSources(Asset::class) as $source) {
            if ($source['type'] !== ElementSources::TYPE_HEADING) {
                $sources[] = $source['key'];
            }
        }

        $userService = Craft::$app->getUser();
        $volumesService = Craft::$app->getVolumes();
        return ArrayHelper::where($sources, function(string $source) use ($volumesService, $userService) {
            // If it’s not a volume folder, let it through
            if (!str_starts_with($source, 'volume:')) {
                return true;
            }
            // Only show it if they have permission to view it, or if it's the temp volume
            $volumeUid = explode(':', $source)[1];
            if ($userService->checkPermission("viewAssets:$volumeUid")) {
                return true;
            }
            $volume = $volumesService->getVolumeByUid($volumeUid);
            return $volume?->getFs() instanceof Temp;
        }, true, true, false);
    }
}
