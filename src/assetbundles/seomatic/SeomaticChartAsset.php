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

namespace nystudio107\seomatic\assetbundles\seomatic;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;
use craft\web\assets\d3\D3Asset;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SeomaticChartAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = '@nystudio107/seomatic/assetbundles/seomatic/dist';

        $this->depends = [
            CpAsset::class,
            D3Asset::class,
            SeomaticAsset::class,
        ];

        $this->js = [
            'js/seomatic-chart.js',
        ];

        $this->css = [
            'css/seomatic-chart.css',
        ];

        parent::init();
    }
}
