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
                'name' => 'Google Analytics',
                'description' => 'Collect, configure, and analyze your data to reach the right audience.',
                'templatePath'   => '_frontend/scripts/googleAnalytics.twig',
                'position'   => View::POS_HEAD,
                'vars' => [
                    'trackingId' => [
                        'title' => 'Google Analytics Tracking ID',
                        'instructions' => 'Only enter the ID, e.g.: `UA-XXXXXX-XX`, not the entire script code. [Learn More](https://support.google.com/analytics/answer/1032385?hl=e)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'sendPageView' => [
                        'title' => 'Automatically send Google Analytics PageView',
                        'instructions' => 'Controls whether the Google Analytics script automatically sends a PageView to Google Analytics when your pages are loaded.',
                        'type' => 'bool',
                        'value' => true,
                    ],
                    'ipAnonymization' => [
                        'title' => 'Google Analytics IP Anonymization',
                        'instructions' => 'When a customer of Analytics requests IP address anonymization, Analytics anonymizes the address as soon as technically feasible at the earliest possible stage of the collection network.',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'displayFeatures' => [
                        'title' => 'Display Features',
                        'instructions' => 'Display Features',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'ecommerce' => [
                        'title' => 'Ecommerce',
                        'instructions' => 'Ecommerce',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'enhancedEcommerce' => [
                        'title' => 'Enhanced Ecommerce',
                        'instructions' => 'Enhanced Ecommerce',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'enhancedLinkAttribution' => [
                        'title' => 'Enhanced Link Attribution',
                        'instructions' => 'Enhanced Link Attribution',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'linker' => [
                        'title' => 'Linker',
                        'instructions' => 'Linker',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'analyticsUrl' => [
                        'title' => 'Google Analytics Script URL',
                        'instructions' => 'The URL to the Google Analytics tracking script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' =>'//www.google-analytics.com/analytics.js',
                    ],
                ]
            ],
        ],
    ],
];
