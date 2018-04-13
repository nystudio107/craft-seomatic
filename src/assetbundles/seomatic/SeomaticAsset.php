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
    public function init()
    {
        $this->sourcePath = '@nystudio107/seomatic/assetbundles/seomatic/dist';

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/vendor.js',
            'js/seomatic.js',
        ];

        $this->css = [
            'css/seomatic.css',
        ];

        parent::init();
    }
}
