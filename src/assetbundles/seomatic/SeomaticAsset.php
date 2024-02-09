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

namespace nystudio107\seomatic\assetbundles\seomatic;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;
use craft\web\assets\vue\VueAsset;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SeomaticAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        $this->sourcePath = '@nystudio107/seomatic/web/assets/dist';

        $this->depends = [
            CpAsset::class,
            VueAsset::class,
        ];

        $this->js = [
        ];

        $this->css = [
        ];

        parent::init();
    }
}
