# Tracking Scripts

SEOmatic supports setting up common tracking scripts from the control panel.

These are included on front-end pages when the SEOmatic environment is set to `live` production. If `devMode` is enabled, the SEOmatic environment is automatically set to `local` development.

## Google Analytics Settings

![Screenshot of SEOmatic’s Google Analytics settings in the Tracking Scripts section, with an enabled switch and fields visible for Google Analytics Tracking ID, Automatically send Google Analytics PageView, Google Analytics IP Anonymization, Display Features, and Ecommerce](../resources/screenshots/seomatic-tracking-ga.png)

Google Analytics gives you the digital analytics tools you need to analyze data from all touchpoints in one place, for a deeper understanding of the customer experience. You can then share the insights that matter with your whole organization. [Learn More](https://www.google.com/analytics/analytics/#?modal_active=none)

If you’d like to include the Google Analytics script even when `devMode` is enabled, you can add this line to a template:

```twig
{% do seomatic.script.get('googleAnalytics').include(true) %}
```

## Google `gtag.js` Settings

![Screenshot of SEOmatic’s Google gtag.js settings in the Tracking Scripts section, with an enabled switch and fields visible for Google Analytics Tracking ID, AdWords Conversion ID, DoubleClick Floodlight ID, and Automatically send PageView](../resources/screenshots/seomatic-tracking-gtag.png)

The [global site tag (gtag.js)](https://developers.google.com/gtagjs/) is a JavaScript tagging framework and API that allows you to send event data to AdWords, DoubleClick, and Google Analytics. Instead of having to manage multiple tags for different products, you can use gtag.js and more easily benefit from the latest tracking features and integrations as they become available.

If you’d like to include the gtag.js script even when `devMode` is enabled, you can add this line to a template:

```twig
{% do seomatic.script.get('gtag').include(true) %}
```

## Google Tag Manager Settings

![Screenshot of SEOmatic’s Google Tag Manager settings in the Tracking Scripts section, with an enabled switch and fields visible for Google Tag Manager ID, DataLayer Variable Name, Google Tag Manager Script URL, and Google Tag Manager Script <noscript> URL](../resources/screenshots/seomatic-tracking-gtm.png)

[Google Tag Manager](https://support.google.com/tagmanager/answer/6102821?hl=en) is a tag management system that allows you to quickly and easily update tags and code snippets on your site. Once the Tag Manager snippet has been added to your site or mobile app, you can configure tags via Google’s web-based user interface without having to alter and deploy additional code.

You can set the `dataLayer` passed in to Google Tag Manager via Twig:

```twig
{% do seomatic.script.get('googleTagManager').dataLayer({
  'woof': 'bark'
}) %}
```

If you’d like to include the Google Tag Manager script even when `devMode` is enabled, you can add this line to a template:

```twig
{% do seomatic.script.get('googleTagManager').include(true) %}
```

## Facebook Pixel Settings

![Screenshot of SEOmatic’s Facebook Pixel settings in the Tracking Scripts section, with an enabled switch and fields visible for Facebook Pixel ID, Automatically send Facebook Pixel PageView, Facebook Pixel Script URL, and Facebook Pixel Script <noscript> URL](../resources/screenshots/seomatic-tracking-fb.png)

The [Facebook Pixel](https://www.facebook.com/business/help/651294705016616) is an analytics tool that helps you measure the effectiveness of your advertising. You can use the Facebook pixel to understand the actions people are taking on your site and reach audiences you care about.

If you’d like to include the Facebook Pixel script even when `devMode` is enabled, you can add this line to a template:

```twig
{% do seomatic.script.get('facebookPixel').include(true) %}
```

## LinkedIn Insight Settings

![Screenshot of SEOmatic’s LinkedIn Insight settings in the Tracking Scripts section, with an enabled switch and fields visible for LinkedIn Data Partner ID, LinkedIn Insight Script URL, LinkedIn Insight <noscript> URL, and Script Template](../resources/screenshots/seomatic-tracking-li.png)

The LinkedIn Insight Tag is a lightweight JavaScript tag that powers conversion tracking, retargeting, and web analytics for LinkedIn ad campaigns.

If you’d like to include the LinkedIn Insight script even when `devMode` is enabled, you can add this line to a template:

```twig
{% do seomatic.script.get('linkedInInsight').include(true) %}
```

## HubSpot Settings

![Screenshot of SEOmatic’s HubSpot settings in the Tracking Scripts section, with an enabled switch and fields visible for HubSpot ID, HubSpot Script URL, and Body Script Template](../resources/screenshots/seomatic-tracking-hs.png)

If you’re not hosting your entire site on HubSpot, or have pages on your site that are not hosted on HubSpot, you’ll need to install the HubSpot tracking code on your non-HubSpot pages to capture those analytics.

If you’d like to include the HubSpot script even when `devMode` is enabled, you can add this line to a template:

```twig
{% do seomatic.script.get('hubSpot').include(true) %}
```
