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
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local'   => [
                        'include' => false,
                    ],
                ],
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
            'googleTagManager' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local'   => [
                        'include' => false,
                    ],
                ],
                'name' => 'Google Tag Manager',
                'description' => 'Google Tag Manager is a tag management system that allows you to quickly and easily update tags and code snippets on your website. Once the Tag Manager snippet has been added to your website or mobile app, you can configure tags via a web-based user interface without having to alter and deploy additional code. [Learn more](https://support.google.com/tagmanager/answer/6102821?hl=en)',
                'templatePath'   => '_frontend/scripts/googleTagManagerHead.twig',
                'bodyTemplatePath'   => '_frontend/scripts/googleTagManagerBody.twig',
                'position'   => View::POS_HEAD,
                'vars' => [
                    'googleTagManagerId' => [
                        'title' => 'Google Tag Manager ID',
                        'instructions' => 'Only enter the ID, e.g.: `GTM-XXXXXX`, not the entire script code. [Learn More](https://developers.google.com/tag-manager/quickstart)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'dataLayerVariableName' => [
                        'title' => 'DataLayer Variable Name',
                        'instructions' => 'The name to use for the JavaScript DataLayer variable. The value of this variable will be set to the `dataLayer` Twig template variable.',
                        'type' => 'string',
                        'value' => 'dl',
                    ],
                    'googleTagManagerUrl' => [
                        'title' => 'Google Tag Manager Script URL',
                        'instructions' => 'The URL to the Google Tag Manager script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' =>'//www.googletagmanager.com/gtm.js',
                    ],
                    'googleTagManagerNoScriptUrl' => [
                        'title' => 'Google Tag Manager Script &lt;noscript&gt; URL',
                        'instructions' => 'The URL to the Google Tag Manager `&lt;noscript&gt;`. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' =>'//www.googletagmanager.com/ns.html',
                    ],
                ]
            ],
        ],
    ],
];
