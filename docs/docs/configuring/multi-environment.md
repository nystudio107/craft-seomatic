# Multi-Environment Config Settings

SEOmatic does different things depending on the SEOmatic environment it is running in. This is a separate setting from your Craft environment, because you can name those anything you like.

SEOmatic needs some way to map what you call your local, staging, and production environments to a normalized representation.

In `local` dev and `staging` environments, the following things change:

1. `<meta name="robots">` tags are rendered with `none` to prevent Google indexing.
2. The `robots.txt` page is rendered to disallow all indexing.
3. No scripts are loaded on the page, to prevent errant data being sent to endpoints.
4. Because the `<meta name="robots">` tag is set to `none`, the `<link rel="canonical">` is not rendered.

You can override all of these things as you see fit, but they are automatically changed in this manner to help protect you from having pages indexed or sending data from environments where you should not.

If you’re using a multi-environment config, you can map your environment settings using SEOmatic’s `config.php` something like this:

```php
<?php 
return [
    // The public-facing name of the plugin
    'pluginName' => 'SEOmatic',

    // Should SEOmatic render metadata?
    'renderEnabled' => true,

    // Should SEOmatic render frontend sitemaps?
    'sitemapsEnabled' => true,

    // Should sitemaps be regenerated automatically?
    'regenerateSitemapsAutomatically' => true,

    // Should sitemaps be submitted to search engines automatically whenever there are changes?
    'submitSitemaps' => true,

    // Should SEOmatic add to the http response headers?
    'headersEnabled' => true,

    // The server environment, either `live`, `staging`, or `local`
    'environment' => 'live',

    // Should SEOmatic display the SEO Preview sidebar?
    'displayPreviewSidebar' => true,

    // Should SEOmatic add a Social Media Preview Target?
    'socialMediaPreviewTarget' => true,

    // The social media platforms that should be displayed in the SEO Preview sidebar
    'sidebarDisplayPreviewTypes' => [
        'google',
        'twitter',
        'facebook'
    ],

    // Should SEOmatic display the SEO Analysis sidebar?
    'displayAnalysisSidebar' => true,

    // If `devMode` is on, prefix the <title> with this string
    'devModeTitlePrefix' => '&#x1f6a7; ',

     //  Prefix the control panel <title> with this string
    'cpTitlePrefix' => '&#x2699; ',

    // If `devMode` is on, prefix the control panel <title> with this string
    'devModeCpTitlePrefix' => '&#x1f6a7;&#x2699; ',

    // The separator character to use for the `<title>` tag
    'separatorChar' => '|',

    // The max number of characters in the `<title>` tag
    'maxTitleLength' => 70,

    // The max number of characters in the `<meta name="description">` tag
    'maxDescriptionLength' => 155,

    // Site Groups define logically separate sites
    'siteGroupsSeparate' => true,

    // Whether to dynamically include the hreflang tags
    'addHrefLang' => true,

    // Whether to dynamically include the `x-default` hreflang tags
    'addXDefaultHrefLang' => true,

    // Whether to dynamically include hreflang tags on paginated pages
    'addPaginatedHreflang' => true,

    // Should the Canonical URL be automatically lower-cased?
    'lowercaseCanonicalUrl' => true,

    // Should the meta generator tag and X-Powered-By header be included?
    'generatorEnabled' => true,

    // SEOmatic uses the Craft `siteUrl` to generate the external URLs.  If you
    // are using it in a non-standard environment, such as a headless GraphQL or
    // ElementAPI server, you can override what it uses for the `siteUrl` below.
    'siteUrlOverride' => '',

    // The duration of the SEOmatic meta cache in seconds. Null means always cached until explicitly broken
    // If devMode is on, caches last 30 seconds.
    'metaCacheDuration' => null,

    // Determines whether the meta container endpoint should be enabled for anonymous front end access
    'enableMetaContainerEndpoint' => false,

    // Determines whether the JSON-LD endpoint should be enabled for anonymous front end access
    'enableJsonLdEndpoint' => false,

    // SeoElementInterface[] The default SeoElement type classes
    'defaultSeoElementTypes' => [
    ],
];
```

Copy the `config.php` to your Craft `config/` directory as `seomatic.php` and you can configure the settings in a multi-environment friendly way. See the [Craft Environments](https://craftcms.com/docs/5.x/configure.html#config-files) page for details, and **N.B.:**

> The `'*'` key is required here so Craft knows to treat it as a multi-environment key, but the other keys are up to you

This is how you can make your multi-environment nomenclature to SEOmatic’s. This works exactly like Craft’s [multi-environment config](https://craftcms.com/docs/5.x/configure.html#multi-environment-configs) files such as `general.php` and `db.php`. See [SEOmatic’s `config.php`](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/config.php) for details.
