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
        'name' => 'General',
        'description' => 'Script Tags',
        'handle' => ScriptService::GENERAL_HANDLE,
        'class' => (string)MetaScriptContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
            'googleAnalytics' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'Google Analytics',
                'description' => 'Google Analytics gives you the digital analytics tools you need to analyze data from all touchpoints in one place, for a deeper understanding of the customer experience. You can then share the insights that matter with your whole organization. [Learn More](https://www.google.com/analytics/analytics/)',
                'templatePath' => '_frontend/scripts/googleAnalytics.twig',
                'position' => View::POS_HEAD,
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
                        'instructions' => 'The display features plugin for analytics.js can be used to enable Advertising Features in Google Analytics, such as Remarketing, Demographics and Interest Reporting, and more. [Learn More](https://developers.google.com/analytics/devguides/collection/analyticsjs/display-features)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'ecommerce' => [
                        'title' => 'Ecommerce',
                        'instructions' => 'Ecommerce tracking allows you to measure the number of transactions and revenue that your website generates. [Learn More](https://developers.google.com/analytics/devguides/collection/analyticsjs/ecommerce)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'enhancedEcommerce' => [
                        'title' => 'Enhanced Ecommerce',
                        'instructions' => 'The enhanced ecommerce plug-in for analytics.js enables the measurement of user interactions with products on ecommerce websites across the user\'s shopping experience, including: product impressions, product clicks, viewing product details, adding a product to a shopping cart, initiating the checkout process, transactions, and refunds. [Learn More](https://developers.google.com/analytics/devguides/collection/analyticsjs/enhanced-ecommerce)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'enhancedLinkAttribution' => [
                        'title' => 'Enhanced Link Attribution',
                        'instructions' => 'Enhanced Link Attribution improves the accuracy of your In-Page Analytics report by automatically differentiating between multiple links to the same URL on a single page by using link element IDs. [Learn More](https://developers.google.com/analytics/devguides/collection/analyticsjs/enhanced-link-attribution)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'linker' => [
                        'title' => 'Linker',
                        'instructions' => 'The linker plugin simplifies the process of implementing cross-domain tracking as described in the Cross-domain Tracking guide for analytics.js. [Learn More](https://developers.google.com/analytics/devguides/collection/analyticsjs/linker)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'analyticsUrl' => [
                        'title' => 'Google Analytics Script URL',
                        'instructions' => 'The URL to the Google Analytics tracking script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => '//www.google-analytics.com/analytics.js',
                    ],
                ],
            ],
            'gtag' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'Google gtag.js',
                'description' => 'The global site tag (gtag.js) is a JavaScript tagging framework and API that allows you to send event data to AdWords, DoubleClick, and Google Analytics. Instead of having to manage multiple tags for different products, you can use gtag.js and more easily benefit from the latest tracking features and integrations as they become available. [Learn More](https://developers.google.com/gtagjs/)',
                'templatePath' => '_frontend/scripts/gtagHead.twig',
                'bodyTemplatePath' => '_frontend/scripts/gtagBody.twig',
                'position' => View::POS_HEAD,
                'bodyPosition' => View::POS_BEGIN,
                'vars' => [
                    'googleAnalyticsId' => [
                        'title' => 'Google Analytics Tracking ID',
                        'instructions' => 'Only enter the ID, e.g.: `UA-XXXXXX-XX`, not the entire script code. [Learn More](https://support.google.com/analytics/answer/1032385?hl=e)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'googleAdWordsId' => [
                        'title' => 'AdWords Conversion ID',
                        'instructions' => 'Only enter the ID, e.g.: `AW-XXXXXXXX`, not the entire script code. [Learn More](https://developers.google.com/adwords-remarketing-tag/)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'dcFloodlightId' => [
                        'title' => 'DoubleClick Floodlight ID',
                        'instructions' => 'Only enter the ID, e.g.: `DC-XXXXXXXX`, not the entire script code. [Learn More](https://support.google.com/dcm/partner/answer/7568534)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'sendPageView' => [
                        'title' => 'Automatically send PageView',
                        'instructions' => 'Controls whether the `gtag.js` script automatically sends a PageView to Google Analytics, AdWords, and DoubleClick Floodlight when your pages are loaded.',
                        'type' => 'bool',
                        'value' => true,
                    ],
                    'ipAnonymization' => [
                        'title' => 'Google Analytics IP Anonymization',
                        'instructions' => 'In some cases, you might need to anonymize the IP addresses of hits sent to Google Analytics. [Learn More](https://developers.google.com/analytics/devguides/collection/gtagjs/ip-anonymization)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'displayFeatures' => [
                        'title' => 'Google Analytics Display Features',
                        'instructions' => 'The display features plugin for gtag.js can be used to enable Advertising Features in Google Analytics, such as Remarketing, Demographics and Interest Reporting, and more. [Learn More](https://developers.google.com/analytics/devguides/collection/gtagjs/display-features)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'enhancedLinkAttribution' => [
                        'title' => 'Google Analytics Enhanced Link Attribution',
                        'instructions' => 'Enhanced link attribution improves click track reporting by automatically differentiating between multiple link clicks that have the same URL on a given page. [Learn More](https://developers.google.com/analytics/devguides/collection/gtagjs/enhanced-link-attribution)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'gtagScriptUrl' => [
                        'title' => 'Google gtag.js Script URL',
                        'instructions' => 'The URL to the Google gtag.js tracking script. Normally this should not be changed, unless you locally cache it. The JavaScript `dataLayer` will automatically be set to the `dataLayer` Twig template variable.',
                        'type' => 'string',
                        'value' => '//www.googletagmanager.com/gtag/js',
                    ],
                ],
            ],
            'googleTagManager' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'Google Tag Manager',
                'description' => 'Google Tag Manager is a tag management system that allows you to quickly and easily update tags and code snippets on your website. Once the Tag Manager snippet has been added to your website or mobile app, you can configure tags via a web-based user interface without having to alter and deploy additional code. [Learn More](https://support.google.com/tagmanager/answer/6102821?hl=en)',
                'templatePath' => '_frontend/scripts/googleTagManagerHead.twig',
                'bodyTemplatePath' => '_frontend/scripts/googleTagManagerBody.twig',
                'position' => View::POS_HEAD,
                'bodyPosition' => View::POS_BEGIN,
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
                        'value' => '//www.googletagmanager.com/gtm.js',
                    ],
                    'googleTagManagerNoScriptUrl' => [
                        'title' => 'Google Tag Manager Script &lt;noscript&gt; URL',
                        'instructions' => 'The URL to the Google Tag Manager `&lt;noscript&gt;`. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => '//www.googletagmanager.com/ns.html',
                    ],
                ],
            ],
            'facebookPixel' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'Facebook Pixel',
                'description' => 'The Facebook pixel is an analytics tool that helps you measure the effectiveness of your advertising. You can use the Facebook pixel to understand the actions people are taking on your website and reach audiences you care about. [Learn More](https://www.facebook.com/business/help/651294705016616)',
                'templatePath' => '_frontend/scripts/facebookPixelHead.twig',
                'bodyTemplatePath' => '_frontend/scripts/facebookPixelBody.twig',
                'position' => View::POS_HEAD,
                'bodyPosition' => View::POS_BEGIN,
                'vars' => [
                    'facebookPixelId' => [
                        'title' => 'Facebook Pixel ID',
                        'instructions' => 'Only enter the ID, e.g.: `XXXXXXXXXX`, not the entire script code. [Learn More](https://developers.facebook.com/docs/facebook-pixel/api-reference)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'sendPageView' => [
                        'title' => 'Automatically send Facebook Pixel PageView',
                        'instructions' => 'Controls whether the Facebook Pixel script automatically sends a PageView to Facebook Analytics when your pages are loaded.',
                        'type' => 'bool',
                        'value' => true,
                    ],
                    'facebookPixelUrl' => [
                        'title' => 'Facebook Pixel Script URL',
                        'instructions' => 'The URL to the Facebook Pixel script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => '//connect.facebook.net/en_US/fbevents.js',
                    ],
                    'facebookPixelNoScriptUrl' => [
                        'title' => 'Facebook Pixel Script &lt;noscript&gt; URL',
                        'instructions' => 'The URL to the Facebook Pixel `&lt;noscript&gt;`. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => '//www.facebook.com/tr',
                    ],
                ],
            ],
        ],
    ],
];
