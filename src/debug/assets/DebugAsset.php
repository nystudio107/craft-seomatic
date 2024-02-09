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

namespace nystudio107\seomatic\debug\assets;

use yii\web\AssetBundle;

class DebugAsset extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public $sourcePath = '@nystudio107/seomatic/debug/assets';
    /**
     * {@inheritdoc}
     */
    public $css = [
        'css/main.css',
    ];
    /**
     * {@inheritdoc}
     */
    public $js = [
        'js/main.js',
    ];
}
