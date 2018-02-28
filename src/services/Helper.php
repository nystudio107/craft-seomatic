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

use craft\elements\Asset;
use craft\base\Component;

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
