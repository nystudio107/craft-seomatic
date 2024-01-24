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

use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\services\Script as ScriptService;
use yii\web\View;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    MetaScriptContainer::CONTAINER_TYPE . ScriptService::GENERAL_HANDLE => [
        'name' => 'General',
        'description' => 'Script Tags',
        'handle' => ScriptService::GENERAL_HANDLE,
        'class' => (string)MetaScriptContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
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
                        'title' => 'Google Analytics Measurement/Tracking ID',
                        'instructions' => 'Only enter the ID, e.g.: `G-XXXXXXXXXX` or `UA-XXXXXX-XX`, not the entire script code. [Learn More](https://support.google.com/analytics/answer/1032385?hl=e)',
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
                        'value' => 'https://www.googletagmanager.com/gtag/js',
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
                        'value' => 'dataLayer',
                    ],
                    'googleTagManagerUrl' => [
                        'title' => 'Google Tag Manager Script URL',
                        'instructions' => 'The URL to the Google Tag Manager script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => 'https://www.googletagmanager.com/gtm.js',
                    ],

                    'googleTagManagerNoScriptUrl' => [
                        'title' => 'Google Tag Manager Script &lt;noscript&gt; URL',
                        'instructions' => 'The URL to the Google Tag Manager `&lt;noscript&gt;`. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => 'https://www.googletagmanager.com/ns.html',
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
                        'value' => 'https://connect.facebook.net/en_US/fbevents.js',
                    ],
                    'facebookPixelNoScriptUrl' => [
                        'title' => 'Facebook Pixel Script &lt;noscript&gt; URL',
                        'instructions' => 'The URL to the Facebook Pixel `&lt;noscript&gt;`. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => 'https://www.facebook.com/tr',
                    ],
                ],
            ],
            'linkedInInsight' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'LinkedIn Insight',
                'description' => 'The LinkedIn Insight Tag is a lightweight JavaScript tag that powers conversion tracking, retargeting, and web analytics for LinkedIn ad campaigns.',
                'templatePath' => '_frontend/scripts/linkedInInsightHead.twig',
                'bodyTemplatePath' => '_frontend/scripts/linkedInInsightBody.twig',
                'position' => View::POS_HEAD,
                'bodyPosition' => View::POS_END,
                'vars' => [
                    'dataPartnerId' => [
                        'title' => 'LinkedIn Data Partner ID',
                        'instructions' => 'Only enter the ID, e.g.: `XXXXXXXXXX`, not the entire script code. [Learn More](https://www.linkedin.com/help/lms/answer/65513/adding-the-linkedin-insight-tag-to-your-website?lang=en)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'linkedInInsightUrl' => [
                        'title' => 'LinkedIn Insight Script URL',
                        'instructions' => 'The URL to the LinkedIn Insight script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => 'https://snap.licdn.com/li.lms-analytics/insight.min.js',
                    ],
                    'linkedInInsightNoScriptUrl' => [
                        'title' => 'LinkedIn Insight &lt;noscript&gt; URL',
                        'instructions' => 'The URL to the LinkedIn Insight `&lt;noscript&gt;`. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => 'https://dc.ads.linkedin.com/collect/',
                    ],
                ],
            ],
            'hubSpot' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'HubSpot',
                'description' => 'If you\'re not hosting your entire website on HubSpot, or have pages on your website that are not hosted on HubSpot, you\'ll need to install the HubSpot tracking code on your non-HubSpot pages in order to capture those analytics.',
                'bodyTemplatePath' => '_frontend/scripts/hubSpotBody.twig',
                'bodyPosition' => View::POS_END,
                'vars' => [
                    'hubSpotId' => [
                        'title' => 'HubSpot ID',
                        'instructions' => 'Only enter the ID, e.g.: `XXXXXXXXXX`, not the entire script code. [Learn More](https://knowledge.hubspot.com/articles/kcs_article/reports/install-the-hubspot-tracking-code)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'hubSpotUrl' => [
                        'title' => 'HubSpot Script URL',
                        'instructions' => 'The URL to the HubSpot script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => '//js.hs-scripts.com/',
                    ],
                ],
            ],
            'pinterestTag' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'Pinterest Tag',
                'description' => 'The Pinterest tag allows you to track actions people take on your website after viewing your Promoted Pin. You can use this information to measure return on ad spend (RoAS) and create audiences to target on your Promoted Pins. [Learn More](https://help.pinterest.com/en/business/article/track-conversions-with-pinterest-tag)',
                'templatePath' => '_frontend/scripts/pinterestTagHead.twig',
                'bodyTemplatePath' => '_frontend/scripts/pinterestTagBody.twig',
                'position' => View::POS_HEAD,
                'bodyPosition' => View::POS_BEGIN,
                'vars' => [
                    'pinterestTagId' => [
                        'title' => 'Pinterest Tag ID',
                        'instructions' => 'Only enter the ID, e.g.: `XXXXXXXXXX`, not the entire script code. [Learn More](https://developers.pinterest.com/docs/ad-tools/conversion-tag/)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'sendPageView' => [
                        'title' => 'Automatically send Pinterest Tag PageView',
                        'instructions' => 'Controls whether the Pinterest Tag script automatically sends a PageView to when your pages are loaded.',
                        'type' => 'bool',
                        'value' => true,
                    ],
                    'pinterestTagUrl' => [
                        'title' => 'Pinterest Tag Script URL',
                        'instructions' => 'The URL to the Pinterest Tag script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => 'https://s.pinimg.com/ct/core.js',
                    ],
                    'pinterestTagNoScriptUrl' => [
                        'title' => 'Pinterest Tag Script &lt;noscript&gt; URL',
                        'instructions' => 'The URL to the Pinterest Tag `&lt;noscript&gt;`. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => 'https://ct.pinterest.com/v3/',
                    ],
                ],
            ],
            'fathom' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'Fathom',
                'description' => 'Fathom is a simple, light-weight, privacy-first alternative to Google Analytics. So, stop scrolling through pages of reports and collecting gobs of personal data about your visitors, both of which you probably don’t need. [Learn More](https://usefathom.com/)',
                'templatePath' => '_frontend/scripts/fathomAnalytics.twig',
                'position' => View::POS_HEAD,
                'vars' => [
                    'siteId' => [
                        'title' => 'Site ID',
                        'instructions' => 'Only enter the Site ID, not the entire script code. [Learn More](https://usefathom.com/support/tracking)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'honorDnt' => [
                        'title' => 'Honoring Do Not Track (DNT)',
                        'instructions' => 'By default we track every visitor to your website, regardless of them having DNT turned on or not. [Learn More](https://usefathom.com/support/tracking-advanced)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'disableAutoTracking' => [
                        'title' => 'Disable automatic tracking',
                        'instructions' => 'By default, we track a page view every time a visitor to your website loads a page with our script on it. [Learn More](https://usefathom.com/support/tracking-advanced)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'ignoreCanonicals' => [
                        'title' => 'Ignore canonicals',
                        'instructions' => 'If there’s a canonical URL in place, then by default we use it instead of the current URL. [Learn More](https://usefathom.com/support/tracking-advanced)',
                        'type' => 'bool',
                        'value' => false,
                    ],
                    'excludedDomains' => [
                        'title' => 'Excluded Domains',
                        'instructions' => 'You exclude one or several domains, so our tracker will track things on every domain, except the ones excluded. [Learn More](https://usefathom.com/support/tracking-advanced)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'includedDomains' => [
                        'title' => 'Included Domains',
                        'instructions' => 'If you want to go in the opposite direction and only track stats on a specific domain. [Learn More](https://usefathom.com/support/tracking-advanced)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'scriptUrl' => [
                        'title' => 'Fathom Script URL',
                        'instructions' => 'The URL to the Fathom tracking script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => 'https://cdn.usefathom.com/script.js',
                    ],
                ],
            ],
            'matomo' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'Matomo',
                'description' => 'Matomo is a Google Analytics alternative that protects your data and your customers\' privacy [Learn More](https://matomo.org/)',
                'templatePath' => '_frontend/scripts/matomoAnalytics.twig',
                'position' => View::POS_HEAD,
                'vars' => [
                    'siteId' => [
                        'title' => 'Site ID',
                        'instructions' => 'Only enter the Site ID, not the entire script code. [Learn More](https://developer.matomo.org/guides/tracking-javascript-guide)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'sendPageView' => [
                        'title' => 'Automatically send Matomo PageView',
                        'instructions' => 'Controls whether the Matomo script automatically sends a PageView when your pages are loaded. [Learn More](https://developer.matomo.org/api-reference/tracking-javascript)',
                        'type' => 'bool',
                        'value' => true,
                    ],
                    'enableLinkTracking' => [
                        'title' => 'Enable Link Tracking',
                        'instructions' => 'Install link tracking on all applicable link elements. [Learn More](https://developer.matomo.org/api-reference/tracking-javascript)',
                        'type' => 'bool',
                        'value' => true,
                    ],
                    'scriptUrl' => [
                        'title' => 'Matomo Script URL',
                        'instructions' => 'The URL to the Matomo tracking script. This will vary depending on whether you are using Matomo Cloud or Matomo On-Premise. [Learn More](https://developer.matomo.org/guides/tracking-javascript-guide)',
                        'type' => 'string',
                        'value' => '',
                    ],
                ],
            ],
            'plausible' => [
                'include' => false,
                'environment' => [
                    'staging' => [
                        'include' => false,
                    ],
                    'local' => [
                        'include' => false,
                    ],
                ],
                'name' => 'Plausible',
                'description' => 'Plausible is a lightweight and open-source website analytics tool. No cookies and fully compliant with GDPR, CCPA and PECR. [Learn More](https://plausible.io/)',
                'templatePath' => '_frontend/scripts/plausibleAnalytics.twig',
                'position' => View::POS_HEAD,
                'vars' => [
                    'siteDomain' => [
                        'title' => 'Site Domain',
                        'instructions' => 'Only enter the site domain, not the entire script code. [Learn More](https://plausible.io/docs/plausible-script)',
                        'type' => 'string',
                        'value' => '',
                    ],
                    'scriptUrl' => [
                        'title' => 'Plausible Script URL',
                        'instructions' => 'The URL to the Plausible tracking script. Normally this should not be changed, unless you locally cache it.',
                        'type' => 'string',
                        'value' => 'https://plausible.io/js/plausible.js',
                    ],
                ],
            ],
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
                'name' => 'Google Analytics (old)',
                'description' => 'Google Analytics gives you the digital analytics tools you need to analyze data from all touchpoints in one place, for a deeper understanding of the customer experience. You can then share the insights that matter with your whole organization. [Learn More](https://www.google.com/analytics/analytics/)',
                'templatePath' => '_frontend/scripts/googleAnalytics.twig',
                'position' => View::POS_HEAD,
                'deprecated' => true,
                'deprecationNotice' => 'Universal Analytics (which is what this script uses) is being [discontinued on July 1st, 2023](https://support.google.com/analytics/answer/11583528). You should use Google gtag.js or Google Tag Manager instead and transition to a new GA4 property.',
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
                        'value' => 'https://www.google-analytics.com/analytics.js',
                    ],
                ],
            ],
        ],
    ],
];
