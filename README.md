[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/?branch=develop)[![Code Coverage](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/coverage.png?b=develop)](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/?branch=develop)[![Build Status](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/build.png?b=develop)](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/build-status/develop)[![Code Intelligence Status](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/code-intelligence.svg?b=develop)](https://scrutinizer-ci.com/code-intelligence)

# SEOmatic plugin for Craft CMS 3.x

A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible

## This plugin is in development; don't use it yet

No, really.

## Requirements

This plugin requires Craft CMS 3.0.0-RC12 or later.

## Installation

To install SEOmatic, follow these steps:

1. Install with Composer via `composer require nystudio107/craft-seomatic`
2. Install plugin in the Craft Control Panel under Settings > Plugins

SEOmatic works on Craft 3.x.

## SEOmatic Beta Notes

SEOmatic for Craft CMS 3 is currently in beta. Please report any issues you find to the [SEOmatic Issues](https://github.com/nystudio107/craft-seomatic/issues) page.

The following are still works in progress:

* **Dashboard** - the Dashboard page doesn't show anything interesting at the moment
* **Content Analytics** - the Content Analytics sidebar doesn't show anything interesting yet
* **Documentation** - the documentation needs to be more fully fleshed out
* **Field** - there is no SEOmatic Field anymore; it's not necessary given the new architecture. Depending on demand, it may be brought back.

## SEOmatic Overview

-Insert text here-

## Configuring SEOmatic

As soon as you install SEOmatic, it automatically will render meta data on your web pages, and create sitemaps for all of your Sections and Category Groups that have public URLs. You don't need to add any template code for this to happen.

Still, it needs to be configured for it to be truly useful.

**Global SEO** is where you set all of the default site-wide settings.

**Content SEO** is where you can configure each Section and Category Group that has public URLs.

Best practices for modern SEO are for the meta information to _reflect your content_, so you should set up the fields that SEOmatic _pulls_ the **SEO Title**, **SEO Description**, and **SEO Image** from.

By default, the Twitter and Facebook settings will mirror what you set in the **General** section, but you can customize them to your heart's content.

## Using SEOmatic

### Twig Templating

SEOmatic makes a global `seomatic` variable available in your Twig templates that allows you to work with the SEOmatic variables and functions.

#### SEOmatic Variables

All of the SEOmatic variables can be accessed as you would any normal Twig variable:

```
{{ seomatic.meta.seoTitle }}
```
or
```
{% set title = seomatic.meta.seoTitle %}
```

They can also be changed by passing in a value with the Twig `{% do %}` syntax:

```
{% do seomatic.meta.seoTitle("Some Title") %}
```
or
```
{% do seomatic.meta.seoDescription("This is my description. There are many like it, but this one is mine.") %}
```

You can also set multiple variables at once:

```
{% do seomatic.meta.attributes({
  "seoTitle": "Some Title",
  "seoDescription": "This is my description. There are many like it, but this one is mine."
  })
%}
```

You can set SEOmatic variables anywhere in your templates, even in sub-templates you `include` from other templates. This works because SEOmatic dynamically injects the meta tags, scripts, links, and JSON-LD into your page after the template is done rendering.

SEOmatic variables can also reference other SEOmatic variables using single-bracket syntax:

 ```
 {% do seomatic.meta.seoDescription("{seomatic.meta.seoTitle}") %}
 ```

You can also reference `entry` or `category` Craft variables, if they are present in your template:

 ```
 {% do seomatic.meta.seoTitle("{entry.title}") %}
 ```
or
```
 {% do seomatic.meta.seoTitle("{category.title}") %}
```

#### Meta Variables: `seomatic.meta`

The `seomatic.meta` variable contains all of the meta variables that control the SEO that will be rendered on the site. They are pre-populated from your settings and content in the AdminCP, but you can change them as you see fit.

##### General Variables:

* **`seomatic.meta.seoTitle`** - the title that is used for the `<title>` tag
* **`seomatic.meta.siteNamePosition`** - controls where the `seomatic.site.siteName` appears relative to the `seomatic.meta.seoTitle` in the `<title>` tag. Valid values are `before`, `after`, or `none`.
* **`seomatic.meta.seoDescription`** - the description that is used for the `<meta name="description">` tag
* **`seomatic.meta.seoKeywords`** - the keywords that are used for the `<meta name="keywords">` tag. Note that this tag is _ignored_ by Google
* **`seomatic.meta.seoImage`** - the image URL that is used for SEO image
* **`seomatic.meta.seoImageDescription`** - a textual description of the SEO image
* **`seomatic.meta.canonicalUrl`** - the URL used for the `<link rel="canonical">` tag. By default, this is set to `{{ craft.app.request.pathInfo }}` or `{entry.url}`/`{category.url}`, but you can change it as you see fit
* **`seomatic.meta.robots`** - the setting used for the `<meta name="robots">` tag that controls how bots should index your website. This variable is also used to set the `X-Robots-Tag` HTTP header. [Learn More](https://developers.google.com/search/reference/robots_meta_tag)

##### Facebook OpenGraph Variables:

* **`seomatic.meta.ogType`** - the value used for the `<meta property="og:type">` tag, such as `website` or `article`
* **`seomatic.meta.ogTitle`** - the value used for the `<meta property="og:title">` tag. This defaults to `{seomatic.meta.seoTitle}`
* **`seomatic.meta.ogSiteNamePosition`** - controls where the `seomatic.site.siteName` appears relative to the `seomatic.meta.ogTitle` in the `<meta property="og:title">` tag. Valid values are `before`, `after`, or `none`.
* **`seomatic.meta.ogDescription`** - the value used for the `<meta property="og:description">` tag. This defaults to `{seomatic.meta.seoDescription}`
* **`seomatic.meta.ogImage`** - the value used for the `<meta property="og:image">` tag. This defaults to `{seomatic.meta.seoImage}`
* **`seomatic.meta.ogImageDescription`** - the value used for the `<meta property="og:image:alt">` tag. This defaults to `{seomatic.meta.seoImageDescription}`

##### Twitter Variables:

* **`seomatic.meta.twitterCard`** - the value used for the `<meta name="twitter:card">` tag, such as `summary` or `summary_large_image`
* **`seomatic.meta.twitterCreator`** - the value used for the `<meta name="twitter:creator">` tag. This defaults to `{seomatic.site.twitterHandle}`
* **`seomatic.meta.twitterTitle`** - the value used for the `<meta name="twitter:title">` tag. This defaults to `{seomatic.meta.seoTitle}`
* **`seomatic.meta.twitterSiteNamePosition` - controls where the `seomatic.site.siteName` appears relative to the `seomatic.meta.twitterTitle` in the `<meta name="twitter:title">` tag. Valid values are `before`, `after`, or `none`.
* **`seomatic.meta.twitterDescription`** - the value used for the `<meta name="twitter:description">` tag. This defaults to `{seomatic.meta.seoDescription}`
* **`seomatic.meta.twitterImage`** - the value used for the `<meta name="twitter:image">` tag. This defaults to `{seomatic.meta.seoImage}`
* **`seomatic.meta.twitterImageDescription`** - the value used for the `<meta name="twitter:image:alt">` tag. This defaults to `{seomatic.meta.seoImageDescription}`


#### Site Variables `seomatic.site`

The `seomatic.site` variable has site-wide settings that are available on a per-site basis for multi-site setups.

* **`seomatic.site.siteName`** - The name of the website
* **`seomatic.site.twitterHandle`** - The site Twitter handle
* **`seomatic.site.facebookProfileId`** - The site Facebook profile ID
* **`seomatic.site.facebookAppId`** - The site Facebook app ID
* **`seomatic.site.googleSiteVerification`** - The Google Site Verification code
* **`seomatic.site.bingSiteVerification`** - The Bing Site Verification code
* **`seomatic.site.pinterestSiteVerification`** - The Pinterest Site Verification code
* **`seomatic.site.sameAsLinks`** - Array of links for Same As... sites, indexed by the handle. So for example you could access the site Facebook URL via `{{ seomatic.site.sameAsLinks["facebook"]["url"] }}`. These links are used to generate the `<meta property="og:same_as">` tags, and are also used in the `sameAs` property in the `mainEntityOfPage` JSON-LD.

#### Config Variables `seomatic.config`

The `seomatic.config` variables are the global plugin configuration variables set in the `config.php` file. You can copy the `config.php` file to the Craft `config/` directory as `seomatic.php` to change them in a multi-environment friendly way.

* **`seomatic.config.pluginName`** - The public-facing name of the plugin
* **`seomatic.config.renderEnabled`** - Should SEOmatic render metadata?
* **`seomatic.config.environment`** - The server environment, either `live`, `staging`, or `local`
* **`seomatic.config.displayPreviewSidebar`** - Should SEOmatic display the SEO Preview sidebar?
* **`seomatic.config.displayAnalysisSidebar`** - Should SEOmatic display the SEO Analysis sidebar?
* **`seomatic.config.devModeTitlePrefix`** - If `devMode` is on, prefix the `<title>` with this string
* **`seomatic.config.separatorChar`** - The separator character to use for the `<title>` tag
* **`seomatic.config.maxTitleLength`** - The max number of characters in the `<title>` tag
* **`seomatic.config.maxDescriptionLength`** - The max number of characters in the `<meta name="description">` tag

#### Helper Functions `seomatic.helper`

* **`seomatic.helper.loadMetadataForUri(URI, SITE_ID)**` - Load the appropriate meta containers for the given `URI` and optional `SITE_ID`
* **`seomatic.helper.sitemapIndexForSiteId(SITE_ID)**` - Get the URL to the `SITE_ID`s sitemap index
* **`seomatic.helper.extractTextFromField(FIELD)**` - Extract plain text from a PlainText, Redactor, CKEdtior, Tags, or Matrix field
* **`seomatic.helper.extractKeywords(TEXT, LIMIT)**` - Extract up to `LIMIT` most important keywords from `TEXT`
* **`seomatic.helper.extractSummary(TEXT)**` - Extract the most important 3 sentences from `TEXT`
* **`seomatic.helper.socialTransform(ASSET, TRANSFORMNAME)**` - Transform the `ASSET` (either an Asset or an Asset ID) for social media sites in `TRANSFORMNAME`; valid values are `base`, `facebook`, `twitter-summary`, and `twitter-large`


#### SEOmatic Tags & Containers

All of the SEOmatic tags, links, scripts, title, and JSON-LD are meta objects that have their values set from the `seomatic.meta` variables.

These meta objects know what properties they should have, and can self-validate. If `devMode` is on, you can check the Yii2 Debug Toolbar's Log to see any validation warnings or errors with your tags.

All of SEOmatic's meta objects are stored in containers, and they can be accessed and manipulated directly. You can even dynamically create new tags via Twig at template render time.

All of the meta object (tags, scripts, links, title, and JSON-LD) have the same API to make it easy to use.

##### Meta Object `.get()`
```
{% set descriptionTag = seomatic.tag.get("description") %}
```
...will return the `<meta name="description">` meta object to you in `descriptionTag`.

##### Meta Object Properties

You can access meta object properties just like you can any Twig variable:

```
{{ descriptionTag.content }}
```
or
```
{% set myContent = seomatic.meta.seoTitle %}
```

They can also be changed by passing in a value with the Twig `{% do %}` syntax:


```
{% do descriptionTag.content("Some description") %}
```

All meta objects also have an `include` property that determines whether or not they should be included on your web page:

```
{% do descriptionTag.include(false) %}
```

You could also chain this together in a single line:
```
{% do seomatic.tag.get("description").include(false) %}
```

And you can set multiple attributes at once:

```
{% do seomatic.tag.get("description").attributes({
  "content": "Some Description",
  "include": false
  })
%}
```

##### Meta Object `.create()`

To create a new meta object, you pass in a key:value array of the attributes to use when creating it:

```
{% set linkTag = seomatic.link.create({
  "rel": "canonical",
  "content": "https://nystudio107.com"
  })
%}
```

By default, newly created meta objects are added to the appropriate meta container, so they will be rendered on the page. Should you wish to create a meta object but _not_ have it added to a container, you can pass in an optional `false` parameter:

```
{% set linkTag = seomatic.link.create({
  "rel": "canonical",
  "content": "https://nystudio107.com"
  }, false)
%}
```

##### Meta Object Validation

All meta objects can self-validate:
```
{% set myJsonLd = seomatic.jsonLd.create({
    'type': 'Article',
    'name': 'Some Blog',
    'url': 'woopsie',
}) %}

{% if myJsonLd.validate() %}
    <p>Valid!</p>
{% else %}
    <ul>
        {% for param,errors in myJsonLd.errors %}
            <li>
                {{ param ~ " " }}
                <ul>
                    {% for error in errors %}
                        <li>
                            {{ error ~ " " }}
                        </li>
                    {% endfor %}
                </ul>
            </li>
        {% endfor %}
    </ul>
{% endif %}
```

This will output:

* url
  * Must be one of these types: URL

Which tells you that the `url` parameter is invalid.  The default validation just ensures that all of the properties are correct.

You can also set the _scenario_ to display properties that Google requires/recommends:

```
{% set myJsonLd = seomatic.jsonLd.create({
    'type': 'Article',
    'name': 'Some Blog',
    'url': 'woopsie',
}) %}

{% do myJsonLd.setScenario('google') %}

{% if myJsonLd.validate() %}
    <p>Valid!</p>
{% else %}
    <ul>
        {% for param,errors in myJsonLd.errors %}
            <li>
                {{ param ~ " " }}
                <ul>
                    {% for error in errors %}
                        <li>
                            {{ error ~ " " }}
                        </li>
                    {% endfor %}
                </ul>
            </li>
        {% endfor %}
    </ul>
{% endif %}
```

This will output:

* url
  * Must be one of these types: URL
* image
  * This property is recommended by Google.
* author
  * This property is required by Google.
* datePublished
  * This property is required by Google.
* headline
  * This property is required by Google.
* publisher
  * This property is required by Google.
* mainEntityOfPage
  * This property is recommended by Google.
* dateModified
  * This property is recommended by Google.

If the website has `devMode` on, all of the meta objects are automatically validated as they are rendered, with the results displayed in the Yii Debug Toolbar. The Yii Debug Toolbar can be enabled in your account settings page.

#### JSON-LD Meta Object Functions `seomatic.jsonLd`

* **`seomatic.jsonLd.get(META_HANDLE)`** Returns the JSON-LD meta object of the handle `META_HANDLE` or `null` if it is not found
* **`seomatic.jsonLd.create()`** Creates a JSON-LD meta object from an array of key/value properties. The `type` can be any of the [Schema.org](http://schema.org/docs/full.html) types.
* **`seomatic.jsonLd.add(META_OBJECT)`** Adds the `META_OBJECT` to the JSON-LD container to be rendered
* **`seomatic.jsonLd.render()`** Renders all of the JSON-LD meta objects to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.jsonLd.container()`** Returns the container that holds an array of all of the JSON-LD meta objects

##### JSON-LD Meta Object Examples:

Create a new [Article](http://schema.org/Article) JSON-LD meta object:
```
{% set myJsonLd = seomatic.jsonLd.create({
    'type': 'Article',
    'name': 'Some Blog',
    'url': 'https://nystudio107.com/blog',
}) %}
```

#### Link Meta Object Functions `seomatic.link`

* **`seomatic.link.get(META_HANDLE)`** Returns the Link meta object of the handle `META_HANDLE` or `null` if it is not found
* **`seomatic.link.create(CONFIG_ARRAY)`** Creates a Link meta object from an array of key/value properties
* **`seomatic.link.add(META_OBJECT)`** Adds the `META_OBJECT` to the Link container to be rendered
* **`seomatic.link.render()`** Renders all of the Link meta objects to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.link.container()`** Returns the container that holds an array of all of the Link meta objects

##### Link Meta Object Examples:

Change the `<link rel="canonical">`:
```
{% do seomatic.link.get("canonical").href("https://nystudio107.com") %}
```

Note that you can achieve the same result with:
```
{% do seomatic.meta.canonicalUrl("https://nystudio107.com") %}
```

...since the `canonicalUrl` populates the `<link rel="canonical">` Link meta object

#### Script Meta Object Functions `seomatic.script`

* **`seomatic.script.get(META_HANDLE)`** Returns the Script meta object of the handle `META_HANDLE` or `null` if it is not found 
* **`seomatic.script.create()`** Creates a Script meta object from an array of key/value properties
* **`seomatic.script.add(META_OBJECT)`** Adds the `META_OBJECT` to the Script container to be rendered
* **`seomatic.script.render()`** Renders all of the Script meta objects to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.script.container()`** Returns the container that holds an array of all of the Script meta objects

##### Script Meta Object Examples:

Don't include the Google Analytics script on the page:
```
{% do seomatic.script.get("googleAnalytics").include(false) %}
```

#### Tag Meta Object Functions `seomatic.tag`

* **`seomatic.tag.get(META_HANDLE)`** Returns the Tag meta object of the handle `META_HANDLE` or `null` if it is not found
* **`seomatic.tag.create()`** Creates a Tag meta object from an array of key/value properties
* **`seomatic.tag.add(META_OBJECT)`** Adds the `META_OBJECT` to the Tag container to be rendered
* **`seomatic.tag.render()`** Renders all of the Tag meta objects to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.tag.container()`** Returns the container that holds an array of all of the Tag meta objects

##### Tag Meta Object Examples:

Change the `<meta name="twitter:title">`:

```
{% do seomatic.tag.get("twitter:title").content("Hello, world") %}
```

Note that you can achieve the same result with:
```
{% do seomatic.meta.twitterTitle("Hello, world") %}
```

...since the `twitterTitle` populates the `<meta name="twitter:title">` Tag meta object

#### Title Meta Object Functions `seomatic.title`

* **`seomatic.title.get(META_HANDLE)`** Returns the Title meta object of the handle `META_HANDLE` or `null` if it is not found
* **`seomatic.title.create()`** Creates a Title meta object from an array of key/value properties
* **`seomatic.title.add(META_OBJECT)`** Adds the `META_OBJECT` to the Title container to be rendered
* **`seomatic.title.render()`** Renders Title meta object to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.title.container()`** Returns the container that holds an array with the Title meta object in it

##### Tag Meta Object Examples:

Change the `<title>`:

```
{% do seomatic.title.get("title").content("My page title") %}
```

Note that you can achieve the same result with:
```
{% do seomatic.meta.seoTitle("My page title") %}
```

...since the `seoTitle` populates the `<title">` Title meta object

## SEOmatic Meta Object Roadmap

Some things to do, and ideas for potential features:

* Release it

## SEOmatic Changelog

### 3.0.0-beta.1 -- 2018.03.13

* Initial beta release

Brought to you by [nystudio107](https://nystudio107.com/)
