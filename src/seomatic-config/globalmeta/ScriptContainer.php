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

use nystudio107\seomatic\helpers\Dependency;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\services\Script as ScriptService;

use yii\web\View;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    MetaScriptContainer::CONTAINER_TYPE.ScriptService::GENERAL_HANDLE => [
        'name'         => 'General',
        'description'  => 'Script Tags',
        'handle'       => ScriptService::GENERAL_HANDLE,
        'class'        => (string)MetaScriptContainer::class,
        'include'      => true,
        'dependencies' => [
        ],
        'data'         => [
            'googleAnalytics' => [
                'include' => false,
                'templatePath'   => '_frontend/scripts/googleAnalytics.twig',
                'position'   => View::POS_HEAD,
                'vars' => [
                    'analyticsUrl' => '//www.google-analytics.com/analytics.js',
                    'trackingId' => '',
                    'sendPageView' => true,
                    'ipAnonymization' => false,
                    'displayFeatures' => false,
                    'ecommerce' => false,
                    'enhancedEcommerce' => false,
                    'enhancedLinkAttribution' => false,
                    'linker' => false,
                ],
            ],
        ],
    ],
];
