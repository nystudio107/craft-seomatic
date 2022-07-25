---
title: Using SEOmatic
description: Using SEOmatic documentation for the SEOmatic plugin. The SEOmatic plugin facilitates modern SEO best practices & implementation for Craft CMS 3.
---
# Using SEOmatic

## SEOmatic’s ??? Empty Coalesce operator

SEOmatic adds the `???` operator to Twig that will return the first thing that is defined, not null, and not empty. This allows you to safely "cascade" empty text/image values.

This can be used both in Twig templates, and in any of SEOmatic’s fields, which are parsed as Twig templates as well.

This is particularly useful for SEO fields (both text & images), where you’re dealing with a number of fallback/default values that may or may not exist, and may or may not be empty.

The `???` Empty Coalescing operator is similar to the `??` [null coalescing operator](https://nystudio107.com/blog/handling-errors-gracefully-in-craft-cms#coalescing-the-night-away), but also ignores empty strings (`""`) and empty arrays (`[]`) as well.

The problem is that to [code defensively](https://nystudio107.com/blog/handling-errors-gracefully-in-craft-cms#defensive-coding-in-twig), you want to make sure that all of these things are defined, not null, and also have a value. So you end up with something like:

```twig
{% if entry is defined and entry.description is defined and entry.description | length %}
    {% set description = entry.description %}
{% elseif category is defined and category.description is defined and category.description | length %}
    {% set description = category.description %}
{% else %}
    {% set description = global.description %}
{% endif %}
```

This gets quite verbose and quite tiresome quickly. There are other ways you can do something similar, such as using using the `?:` [ternary operator](https://twig.symfony.com/doc/2.x/templates.html#other-operators) and the [default filter](https://twig.symfony.com/doc/2.x/filters/default.html), but this too gets a bit unwieldy.

You can use the [null coalescing operator](https://nystudio107.com/blog/handling-errors-gracefully-in-craft-cms#coalescing-the-night-away), which picks the first thing that is defined and not null:

```twig
{% set description = entry.description ?? category.description ?? global.description %}
```

But the problem here is it’ll _just_ pick the first thing that is defined and not `null`. So if `entry.description` is an empty string, it’ll use that, which is rarely what you want.

Enter the Empty Coalescing operator, and it becomes:

```twig
{% set description = entry.description ??? category.description ??? global.description %}
```

Now the first thing that is defined, not null, _and_ not empty will be what `description` is set to.

Nice. Simple. Readable. And most importantly, likely the result you’re expecting.

The examples presented here use the `???` operator for SEOmatic functions, but you can use them for anything you like.

We’ve submitted a [pull request](https://github.com/twigphp/Twig/pull/2787) in the hopes of making this part of Twig core. This functionality is also available separately in the [Empty Coalesce](https://nystudio107.com/plugins/empty-coalesce) plugin.

## Twig Templating

SEOmatic can work fully without any Twig templating code at all. However, it provides a robust API that you can tap into from your Twig templates should you desire to do so.

SEOmatic makes a global `seomatic` variable available in your Twig templates that allows you to work with the SEOmatic variables and functions.

## A Word About `{% cache %}` Tags

If you use Craft’s built-in `{% cache %}` tags, ensure that you don’t have any of SEOmatic’s tags (listed below) inside of them. The reason is that SEOmatic dynamically generates the tags on each request, using its own caching system for performance reasons.

When you surround any Twig code in a `{% cache %}` tag, that code will only ever be executed once. On subsequent runs, the HTML result of what was inside of the `{% cache %}` tag is just returned, and the Twig code inside of it is never executed.

For more information on how the `{% cache %}` tag works, see the [The Craft {% cache %} Tag In-Depth](https://nystudio107.com/blog/the-craft-cache-tag-in-depth) article.

## SEOmatic Variables

All of the SEOmatic variables can be accessed as you would any normal Twig variable:

```twig
{{ seomatic.meta.seoTitle }}
```
Or
```twig
{% set title = seomatic.meta.seoTitle %}
```

They can also be changed by passing in a value with the Twig `{% do %}` syntax:

```twig
{% do seomatic.meta.seoTitle("Some Title") %}
```
Or
```twig
{% do seomatic.meta.seoDescription("This is my description. There are many like it, but this one is mine.") %}
```

You can also set multiple variables at once using array syntax:

```twig
{% do seomatic.meta.setAttributes({
  "seoTitle": "Some Title",
  "seoDescription": "This is my description. There are many like it, but this one is mine."
  })
%}
```

Or you can chain them together:

```twig
{% do seomatic.meta
  .seoTitle("Some Title")
  .seoDescription("This is my description. There are many like it, but this one is mine.")
%}
```

These do the same thing, so use whichever you prefer.

You can set SEOmatic variables anywhere in your templates, even in sub-templates you `include` from other templates. This works because SEOmatic dynamically injects the meta tags, scripts, links, and JSON-LD into your page after the template is done rendering.

SEOmatic variables can also reference other SEOmatic variables using single-bracket syntax:

 ```twig
 {% do seomatic.meta.seoDescription("{seomatic.meta.seoTitle}") %}
 ```

You can also reference `entry`, `category`, or `product` Craft variables, if they are present in your template:

 ```twig
 {% do seomatic.meta.seoTitle("{entry.title}") %}
 ```
Or
```twig
 {% do seomatic.meta.seoTitle("{category.title}") %}
```

But most of the time, you’ll want to just set them like you would regular variables:

 ```twig
 {% do seomatic.meta.seoTitle(entry.title) %}
 ```
Or
```twig
 {% do seomatic.meta.seoTitle(category.title) %}
```
...so that there is no additional Twig parsing that needs to be done.

SEOmatic variables are also parsed for aliases, and in Craft 3.1, for [environment variables](https://docs.craftcms.com/v3/config/environments.html#control-panel-settings) as well.

There may be occasions where you want to output the final parsed value of an SEOmatic variable on the frontend. You can do that via `seomatic.meta.parsedValue()`. For example:

```twig
{{ seomatic.meta.parsedValue('seoDescription') }}
```

This will output the final parsed value of the `seomatic.meta.seoDescription` variable.

This parsing is done automatically by SEOmatic just before the meta information is added to your page.

## Meta Variables: `seomatic.meta`

The `seomatic.meta` variable contains all of the meta variables that control the SEO that will be rendered on the site. They are pre-populated from your settings and content in the Control Panel, but you can change them as you see fit.

### General Variables:

* **`seomatic.meta.mainEntityOfPage`** - the [schema.org](http://schema.org/docs/full.html) type that represents the main entity of the page
* **`seomatic.meta.seoTitle`** - the title that is used for the `<title>` tag
* **`seomatic.meta.siteNamePosition`** - controls where the `seomatic.site.siteName` appears relative to the `seomatic.meta.seoTitle` in the `<title>` tag. Valid values are `before`, `after`, or `none`.
* **`seomatic.meta.seoDescription`** - the description that is used for the `<meta name="description">` tag
* **`seomatic.meta.seoKeywords`** - the keywords that are used for the `<meta name="keywords">` tag. Note that this tag is _ignored_ by Google
* **`seomatic.meta.seoImage`** - the image URL that is used for SEO image
* **`seomatic.meta.seoImageWidth`** - the width of the SEO image
* **`seomatic.meta.seoImageHeight`** - the height of the SEO image
* **`seomatic.meta.seoImageDescription`** - a textual description of the SEO image
* **`seomatic.meta.canonicalUrl`** - the URL used for the `<link rel="canonical">` tag. By default, this is set to `{seomatic.helper.safeCanonicalUrl()}` or `{entry.url}`/`{category.url}`/`{product.url}`, but you can change it as you see fit. This variable is also used to set the `link rel="canonical"` HTTP header.
* **`seomatic.meta.robots`** - the setting used for the `<meta name="robots">` tag that controls how bots should index your site. This variable is also used to set the `X-Robots-Tag` HTTP header. [Learn More](https://developers.google.com/search/reference/robots_meta_tag)

### Facebook OpenGraph Variables:

* **`seomatic.meta.ogType`** - the value used for the `<meta property="og:type">` tag, such as `website` or `article`
* **`seomatic.meta.ogTitle`** - the value used for the `<meta property="og:title">` tag. This defaults to `{seomatic.meta.seoTitle}`
* **`seomatic.meta.ogSiteNamePosition`** - controls where the `seomatic.site.siteName` appears relative to the `seomatic.meta.ogTitle` in the `<meta property="og:title">` tag. Valid values are `before`, `after`, or `none`.
* **`seomatic.meta.ogDescription`** - the value used for the `<meta property="og:description">` tag. This defaults to `{seomatic.meta.seoDescription}`
* **`seomatic.meta.ogImage`** - the value used for the `<meta property="og:image">` tag. This defaults to `{seomatic.meta.seoImage}`
* **`seomatic.meta.ogImageWidth`** - the width of the ogImage. This defaults to `{seomatic.meta.seoImageWidth}`
* **`seomatic.meta.ogImageHeight`** - the height of the ogImage. This defaults to `{seomatic.meta.seoImageHeight}`
* **`seomatic.meta.ogImageDescription`** - the value used for the `<meta property="og:image:alt">` tag. This defaults to `{seomatic.meta.seoImageDescription}`

### Twitter Variables:

* **`seomatic.meta.twitterCard`** - the value used for the `<meta name="twitter:card">` tag, such as `summary` or `summary_large_image`
* **`seomatic.meta.twitterCreator`** - the value used for the `<meta name="twitter:creator">` tag. This defaults to `{seomatic.site.twitterHandle}`
* **`seomatic.meta.twitterTitle`** - the value used for the `<meta name="twitter:title">` tag. This defaults to `{seomatic.meta.seoTitle}`
* **`seomatic.meta.twitterSiteNamePosition`** - controls where the `seomatic.site.siteName` appears relative to the `seomatic.meta.twitterTitle` in the `<meta name="twitter:title">` tag. Valid values are `before`, `after`, or `none`.
* **`seomatic.meta.twitterDescription`** - the value used for the `<meta name="twitter:description">` tag. This defaults to `{seomatic.meta.seoDescription}`
* **`seomatic.meta.twitterImage`** - the value used for the `<meta name="twitter:image">` tag. This defaults to `{seomatic.meta.seoImage}`
* **`seomatic.meta.twitterImageWidth`** - the width of the Twitter image. This defaults to `{seomatic.meta.seoImageWidth}`
* **`seomatic.meta.twitterImageHeight`** - the height of the Twitter image. This defaults to `{seomatic.meta.seoImageHeight}`
* **`seomatic.meta.twitterImageDescription`** - the value used for the `<meta name="twitter:image:alt">` tag. This defaults to `{seomatic.meta.seoImageDescription}`

## Site Variables `seomatic.site`

The `seomatic.site` variable has site-wide settings that are available on a per-site basis for multi-site setups.

* **`seomatic.site.siteName`** - The name of the site
* **`seomatic.site.twitterHandle`** - The site Twitter handle
* **`seomatic.site.facebookProfileId`** - The site Facebook profile ID
* **`seomatic.site.facebookAppId`** - The site Facebook app ID
* **`seomatic.site.googleSiteVerification`** - The Google Site Verification code
* **`seomatic.site.bingSiteVerification`** - The Bing Site Verification code
* **`seomatic.site.pinterestSiteVerification`** - The Pinterest Site Verification code
* **`seomatic.site.sameAsLinks`** - Array of links for Same As... Sites, indexed by the handle. So for example you could access the site Facebook URL via `seomatic.site.sameAsLinks["facebook"]["url"]`. These links are used to generate the `<meta property="og:same_as">` tags, and are also used in the `sameAs` property in the `mainEntityOfPage` JSON-LD.
* **`seomatic.site.siteLinksSearchTarget`** - Google Site Links search target. [Learn More](https://developers.google.com/search/docs/data-types/sitelinks-searchbox)
* **`seomatic.site.siteLinksQueryInput`** - Google Site Links query input. [Learn More](https://developers.google.com/search/docs/data-types/sitelinks-searchbox)

### Site Identity Variables `seomatic.site.identity`

The `seomatic.site.identity` variable is used to create [JSON-LD Structured Data](https://developers.google.com/search/docs/guides/intro-structured-data) that _can_ appear as [Rich Snippets](https://developers.google.com/search/docs/guides/mark-up-content) on Google Search Engine Results Pages (SERP). JSON-LD Structured Data helps computers understand context and relationships, and is also read by other social media sites and apps.

The `seomatic.site.identity` encapsulates all of the information associated with the owner of the site.

* **`seomatic.site.identity.siteType`** - The schema.org general type
* **`seomatic.site.identity.siteSubType`** - The schema.org sub-type
* **`seomatic.site.identity.siteSpecificType`** - The schema.org specific type
* **`seomatic.site.identity.computedType`** - The computed most specific schema.org type
* **`seomatic.site.identity.genericName`** - The name of the entity that owns the site
* **`seomatic.site.identity.genericAlternateName`** - An alternate or nickname for the entity that owns the site
* **`seomatic.site.identity.genericDescription`** - A description of the entity that owns the site
* **`seomatic.site.identity.genericUrl`** - A URL for the entity that owns the site
* **`seomatic.site.identity.genericImage`** - A URL to an image or logo that represents the entity that owns the site. The image must be in JPG, PNG, or GIF format.
* **`seomatic.site.identity.genericImageWidth`** - The width of the entity image
* **`seomatic.site.identity.genericImageHeight`** - The height of the entity image
* **`seomatic.site.identity.genericImageIds`** - Asset ID array for the entity image
* **`seomatic.site.identity.genericTelephone`** - The primary contact telephone number for the entity that owns the site
* **`seomatic.site.identity.genericEmail`** - The primary contact email address for the entity that owns the site
* **`seomatic.site.identity.genericStreetAddress`** - The street address of the entity that owns the website, for example: 123 Main Street
* **`seomatic.site.identity.genericAddressLocality`** -  locality of the entity that owns the website, for example: Portchester
* **`seomatic.site.identity.genericAddressRegion`** - The region of the entity that owns the website, for example: New York or NY
* **`seomatic.site.identity.genericPostalCode`** - The postal code of the entity that owns the website, for example: 14580
* **`seomatic.site.identity.genericAddressCountry`** - The country in which the entity that owns the site is located, for example: US
* **`seomatic.site.identity.genericGeoLatitude`** - The latitude of the location of the entity that owns the website, for example: -120.5436367
* **`seomatic.site.identity.genericGeoLongitude`** - The longitude of the location of the entity that owns the website, for example: 80.6033588
* **`seomatic.site.identity.personGender`** - Only for entities of the type Person, the gender of the person
* **`seomatic.site.identity.personBirthPlace`** - Only for entities of the type Person, the place where the person was born
* **`seomatic.site.identity.organizationDuns`** - Only for entities of the type Organization, the DUNS (Dunn & Bradstreet) number of the organization that owns the site
* **`seomatic.site.identity.organizationFounder`** - Only for entities of the type Organization, the name of the founder of the organization
* **`seomatic.site.identity.organizationFoundingDate`** - Only for entities of the type Organization, the date the organization/company/restaurant was founded in [ISO 8601 date format](http://schema.org/Date), for example: `2018-03-26`
* **`seomatic.site.identity.organizationFoundingLocation`** - Only for entities of the type Organization, the location where the organization was founded
* **`seomatic.site.identity.organizationContactPoints`** - Only for entities of the type Organization, an array of contact points for the organization. [Learn More](https://developers.google.com/search/docs/guides/enhance-site#provide-business-contact-markup)
* **`seomatic.site.identity.corporationTickerSymbol`** - Only for entities of the type Corporation, the exchange ticker symbol of the corporation
* **`seomatic.site.identity.localBusinessPriceRange`** - Only for entities of the type LocalBusiness, the approximate price range of the goods or services offered by this local business
* **`seomatic.site.identity.localBusinessOpeningHours`** - Only for entities of the type LocalBusiness, an array of the opening hours for this local business. [Learn More][https://developers.google.com/search/docs/data-types/local-business]
* **`seomatic.site.identity.restaurantServesCuisine`** - Only for entities of the type Food Establishment, the primary type of cuisine that the food establishment serves
* **`seomatic.site.identity.restaurantMenuUrl`** - Only for entities of the type Food Establishment, a URL to the food establishment’s menu
* **`seomatic.site.identity.restaurantReservationsUrl`** - Only for entities of the type Food Establishment, a URL to the food establishment’s reservations page

### Site Creator Variables `seomatic.site.creator`

The `seomatic.site.creator` variable is used to create [JSON-LD Structured Data](https://developers.google.com/search/docs/guides/intro-structured-data) that _can_ appear as [Rich Snippets](https://developers.google.com/search/docs/guides/mark-up-content) on Google Search Engine Results Pages (SERP). JSON-LD Structured Data helps computers understand context and relationships, and is also read by other social media sites and apps.

The `seomatic.site.creator` encapsulates all of the information associated with the creator of the site. This information is also used in the `humans.txt` page

* **`seomatic.site.creator.siteType`** - The schema.org general type
* **`seomatic.site.creator.siteSubType`** - The schema.org sub-type
* **`seomatic.site.creator.siteSpecificType`** - The schema.org specific type
* **`seomatic.site.creator.computedType`** - The computed most specific schema.org type
* **`seomatic.site.creator.genericName`** - The name of the entity that created the site
* **`seomatic.site.creator.genericAlternateName`** - An alternate or nickname for the entity that created the site
* **`seomatic.site.creator.genericDescription`** - A description of the entity that created the site
* **`seomatic.site.creator.genericUrl`** - A URL for the entity that created the site
* **`seomatic.site.creator.genericImage`** - A URL to an image or logo that represents the entity that created the site. The image must be in JPG, PNG, or GIF format.
* **`seomatic.site.creator.genericImageWidth`** - The width of the entity image
* **`seomatic.site.creator.genericImageHeight`** - The height of the entity image
* **`seomatic.site.creator.genericImageIds`** - Asset ID array for the entity image
* **`seomatic.site.creator.genericTelephone`** - The primary contact telephone number for the entity that created the site
* **`seomatic.site.creator.genericEmail`** - The primary contact email address for the entity that created the site
* **`seomatic.site.creator.genericStreetAddress`** - The street address of the entity that created the website, for example: 123 Main Street
* **`seomatic.site.creator.genericAddressLocality`** -  locality of the entity that created the website, for example: Portchester
* **`seomatic.site.creator.genericAddressRegion`** - The region of the entity that created the website, for example: New York or NY
* **`seomatic.site.creator.genericPostalCode`** - The postal code of the entity that created the website, for example: 14580
* **`seomatic.site.creator.genericAddressCountry`** - The country in which the entity that created the site is located, for example: US
* **`seomatic.site.creator.genericGeoLatitude`** - The latitude of the location of the entity that created the website, for example: -120.5436367
* **`seomatic.site.creator.genericGeoLongitude`** - The longitude of the location of the entity that created the website, for example: 80.6033588
* **`seomatic.site.creator.personGender`** - Only for entities of the type Person, the gender of the person
* **`seomatic.site.creator.personBirthPlace`** - Only for entities of the type Person, the place where the person was born
* **`seomatic.site.creator.organizationDuns`** - Only for entities of the type Organization, the DUNS (Dunn & Bradstreet) number of the organization that created the site
* **`seomatic.site.creator.organizationFounder`** - Only for entities of the type Organization, the name of the founder of the organization
* **`seomatic.site.creator.organizationFoundingDate`** - Only for entities of the type Organization, the date the organization/company/restaurant was founded in [ISO 8601 date format](http://schema.org/Date), for example: `2018-03-26`
* **`seomatic.site.creator.organizationFoundingLocation`** - Only for entities of the type Organization, the location where the organization was founded
* **`seomatic.site.creator.organizationContactPoints`** - Only for entities of the type Organization, an array of contact points for the organization. [Learn More](https://developers.google.com/search/docs/guides/enhance-site#provide-business-contact-markup)
* **`seomatic.site.creator.corporationTickerSymbol`** - Only for entities of the type Corporation, the exchange ticker symbol of the corporation
* **`seomatic.site.creator.localBusinessPriceRange`** - Only for entities of the type LocalBusiness, the approximate price range of the goods or services offered by this local business
* **`seomatic.site.creator.localBusinessOpeningHours`** - Only for entities of the type LocalBusiness, an array of the opening hours for this local business. [Learn More][https://developers.google.com/search/docs/data-types/local-business]
* **`seomatic.site.creator.restaurantServesCuisine`** - Only for entities of the type Food Establishment, the primary type of cuisine that the food establishment serves
* **`seomatic.site.creator.restaurantMenuUrl`** - Only for entities of the type Food Establishment, a URL to the food establishment’s menu
* **`seomatic.site.creator.restaurantReservationsUrl`** - Only for entities of the type Food Establishment, a URL to the food establishment’s reservations page

## Config Variables `seomatic.config`

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

## Helper Functions `seomatic.helper`

* **`seomatic.helper.paginate(PAGEINFO)`** - Given the `PAGEINFO` variable from the `{% paginate %}` tag as [described here](https://docs.craftcms.com/v3/templating/tags/paginate.html#the-pageInfo-variable), this will properly set the `canonicalUrl`, as well as adding the `<link rel='prev'>` and `<link rel='next'>` tags for you.
* **`seomatic.helper.isPreview()`** - returns `true` if the current request is a preview, `false` if it is not
* **`seomatic.helper.sameAsByHandle(HANDLE)`** - returns an array of information about the **Same As URLs** site specified in `HANDLE`. Here’s an example of the information in the returned array:
```
array (size=4)
  'siteName' => string 'Twitter'
  'handle' => string 'twitter'
  'url' => string 'https://twitter.com/nystudio107'
  'account' => string 'nystudio107'
```
* **`seomatic.helper.truncate(TEXT, LENGTH, SUBSTR)`** - Truncates the `TEXT` to a given `LENGTH`. If `SUBSTR` is provided, and truncating occurs, the string is further truncated so that the substring may be appended without exceeding the desired length.
* **`seomatic.helper.truncateOnWord(TEXT, LENGTH, SUBSTR)`** - Truncates the `TEXT` to a given `LENGTH`, while ensuring that it does not split words. If `SUBSTR` is provided, and truncating occurs, the string is further truncated so that the substring may be appended without exceeding the desired length.
* **`seomatic.helper.getLocalizedUrls(URI, SITE_ID)`** - Return a list of localized URLs for a given `URI` that are in the `SITE_ID` site’s group. Both `URI` and `SITE_ID` are optional, and will use the current request’s `URI` and the current site’s `SITE_ID` if omitted.
* **`seomatic.helper.loadMetadataForUri(URI, SITE_ID)`** - Load the appropriate meta containers for the given `URI` and optional `SITE_ID`
* **`seomatic.helper.sitemapIndexForSiteId(SITE_ID)`** - Get the URL to the `SITE_ID`s sitemap index
* **`seomatic.helper.extractTextFromField(FIELD)`** - Extract plain text from a PlainText, Redactor, CKEdtior, Tags, Matrix, or Neo field
* **`seomatic.helper.extractKeywords(TEXT, LIMIT)`** - Extract up to `LIMIT` most important keywords from `TEXT`
* **`seomatic.helper.extractSummary(TEXT)`** - Extract the most important 3 sentences from `TEXT`
* **`seomatic.helper.socialTransform(ASSET, TRANSFORMNAME)`** - Transform the `ASSET` (either an Asset or an Asset ID) for social media sites in `TRANSFORMNAME`; valid values are `base`, `facebook`, `twitter-summary`, and `twitter-large`
* **`seomatic.helper.seoFileLink(FILE_URL, ROBOTS, CANONICAL, INLINE)`** - Generates a link to a local or remote file that allows you to set the `X-Robots-Tag` header via `ROBOTS` (defaults to `all`) and `Link` canonical header via `CANONICAL` (defaults to `''`) as per [Advanced rel="canonical" HTTP Headers](https://moz.com/blog/how-to-advanced-relcanonical-http-headers). `INLINE` controls whether the file will be displayed inline or downloaded. If any values are empty `''`, the headers will not be included.
* **`seomatic.helper.sanitizeUserInput(TEXT)`** - Sanitize the `TEXT` by decoding any HTML Entities, URL decoding the text, then removing any newlines, stripping HTML tags, stripping Twig tags, and changing single {}'s into ()'s

## SEOmatic Tags & Containers

All of the SEOmatic tags, links, scripts, title, and JSON-LD are meta objects that have their values set from the `seomatic.meta` variables.

These meta objects know what properties they should have, and can self-validate. If `devMode` is on, you can check the Yii2 Debug Toolbar’s Log to see any validation warnings or errors with your tags.

All of SEOmatic’s meta objects are stored in containers, and they can be accessed and manipulated directly. You can even dynamically create new tags via Twig at template render time.

All of the meta object (tags, scripts, links, title, and JSON-LD) have the same API to make it easy to use.

### Meta Object `.get()`
```twig
{% set descriptionTag = seomatic.tag.get("description") %}
```
...will return the `<meta name="description">` meta object to you in `descriptionTag`.

### Meta Object Properties

You can access meta object properties just like you can any Twig variable:

```twig
{{ descriptionTag.content }}
```
Or
```twig
{% set myContent = seomatic.meta.seoTitle %}
```

They can also be changed by passing in a value with the Twig `{% do %}` syntax:


```twig
{% do descriptionTag.content("Some description") %}
```

All meta objects also have an `include` property that determines whether or not they should be included on your web page:

```twig
{% do descriptionTag.include(false) %}
```

You could also chain this together in a single line:
```twig
{% do seomatic.tag.get("description").include(false) %}
```

And you can set multiple attributes at once using an array syntax:

```twig
{% do seomatic.tag.get("description").setAttributes({
  "content": "Some Description",
  "include": false
  })
%}
```

Which is the same as doing:


```twig
{% do seomatic.tag.get("description")
  .content("Some Description")
  .include(false)
%}
```

So use whatever you like better.

### Extra Tag Attributes

Should you need to add extra tag attributes to a Meta Item, such as the various `data-` tags, you can do that with the `.tagAttrs` property:

```twig
{% set tag = seomatic.tag.get('description') %}
{% if tag | length %}
    {% do tag.tagAttrs({
        "data-type": "lazy-description",
    }) %}
{% endif %}
```

This will generate a tag that looks like this:
```html
<meta name="description" content="Here is my description!" data-type="lazy-description">
```

A more practical example would be using [Klaro](https://heyklaro.com/) to manage Cookie consent, etc. to not activate Google Analytics until consent is given:

```twig
{% set tag = seomatic.script.get('googleAnalytics') %}
{% if tag | length %}
    {% do tag.tagAttrs({
        "type": "text/plain",
        "data-type": "application/javascript",
        "data-name": "google-analytics",
    }) %}
{% endif %}
```

Then when the page renders in production, it’ll look like this:
```html
<script type="text/plain" data-name="google-analytics" data-type="application/javascript">(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-XXXXXXXXX', 'auto');
ga('send', 'pageview');
</script>

```

For a complete list of the Script handles SEOmatic uses can be found in [ScriptContainer.php](https://github.com/nystudio107/craft-seomatic/blob/v3/src/seomatic-config/globalmeta/ScriptContainer.php)

### Meta Object `.create()`

To create a new meta object, you pass in a key:value array of the attributes to use when creating it:

```twig
{% set linkTag = seomatic.link.create({
  "rel": "canonical",
  "href": "https://nystudio107.com"
  })
%}
```

By default, newly created meta objects are added to the appropriate meta container, so they will be rendered on the page. Should you wish to create a meta object but _not_ have it added to a container, you can pass in an optional `false` parameter:

```twig
{% set linkTag = seomatic.link.create({
  "rel": "canonical",
  "href": "https://nystudio107.com"
  }, false)
%}
```

### Meta Object Validation

All meta objects can self-validate:
```twig
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

* URL
  * Must be one of these types: URL

Which tells you that the `url` parameter is invalid.  The default validation just ensures that all of the properties are correct.

You can also set the _scenario_ to display properties that Google requires/recommends:

```twig
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

* URL
  * Must be one of these types: URL
* Image
  * This property is recommended by Google.
* Author
  * This property is required by Google.
* DatePublished
  * This property is required by Google.
* Headline
  * This property is required by Google.
* Publisher
  * This property is required by Google.
* MainEntityOfPage
  * This property is recommended by Google.
* DateModified
  * This property is recommended by Google.

If the site has `devMode` on, all of the meta objects are automatically validated as they are rendered, with the results displayed in the Yii Debug Toolbar. The Yii Debug Toolbar can be enabled in your account settings page.

## JSON-LD Meta Object Functions `seomatic.jsonLd`

* **`seomatic.jsonLd.get(META_HANDLE)`** Returns the JSON-LD meta object of the handle `META_HANDLE` or `null` if it is not found
* **`seomatic.jsonLd.create()`** Creates a JSON-LD meta object from an array of key-value properties. The `type` can be any of the [Schema.org](http://schema.org/docs/full.html) types.
* **`seomatic.jsonLd.add(META_OBJECT)`** Adds the `META_OBJECT` to the JSON-LD container to be rendered
* **`seomatic.jsonLd.render()`** Renders all of the JSON-LD meta objects to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.jsonLd.container()`** Returns the container that holds an array of all of the JSON-LD meta objects

### JSON-LD Meta Object Examples:

Create a new [Article](http://schema.org/Article) JSON-LD meta object:
```twig
{% set myJsonLd = seomatic.jsonLd.create({
    'type': 'Article',
    'name': 'Some Blog',
    'url': 'https://nystudio107.com/blog',
}) %}
```

Get the existing **MainEntityOfPage** as set in the Global SEO or Content SEO Control Panel section to modify it (schema.org: [mainEntityOfPage](http://schema.org/docs/datamodel.html#mainEntityBackground)):
```twig
{% set mainEntity = seomatic.jsonLd.get('mainEntityOfPage') %}
```

To add something to the existing **MainEntityOfPage** (in this case an [Offer](https://schema.org/Offer)), you can do it like this:
```twig
{% set mainEntity = seomatic.jsonLd.get('mainEntityOfPage') %}

{% set offersJsonLd = seomatic.jsonLd.create({
    'type': 'Offer',
    'name': 'Some prop',
    'url': 'Some url',
}, false) %}

{% do mainEntity.offers(offersJsonLd) %}
```

The `, false` parameter tells it to create the JSON-LD object, but to _not_ automatically add it to the JSON-LD container. We do this because we don’t want it rendered on its own, we want it as part of the existing `mainEntityOfPage` JSON-LD object.

Get the existing **BreadcrumbList** as generated automatically by SEOmatic to modify them (schema.org: [BreadcrumbList](http://schema.org/BreadcrumbList)):
```twig
{% set crumbs = seomatic.jsonLd.get('breadcrumbList') %}
```

Display the breadcrumbs on the page:

```twig
{% set crumbList = seomatic.jsonLd.get('breadcrumbList').itemListElement %}
{% for crumb in crumbList %}
    <a href="{{ crumb.item }}">{{ crumb.name }}</a>
    {% if not loop.last %}&raquo;{% endif %}
{% endfor %}
```

To entirely replace the existing **BreadcrumbList** on a page:
```twig
{% set crumbList = seomatic.jsonLd.create({
    'type': 'BreadcrumbList',
    'name': 'Breadcrumbs',
    'description': 'Breadcrumbs list',
    'itemListElement': [
        {
            'type': 'ListItem',
            'position': 1,
            'name': 'Homepage',
            'item': 'http://example.com/'
        },
        {
            'type': 'ListItem',
            'position': 2,
            'name': 'Our blog',
            'item': 'http://example.com/blog/'
        },
        {
            'type': 'ListItem',
            'position': 3,
            'name': 'Technology blogs',
            'item': 'http://example.com/blog/tech'
        },
    ]
}) %}
```

If you need to create a schema element and propagate it, then use "key".
Propagate **SiteNavigationElement**:
```twig
        {% for nav in navigationMenu %}
            {% do seomatic.jsonLd.create({
                'key': 'navItem' ~ nav.title,
                'type': 'SiteNavigationElement',
                'name': nav.title,
                'url': nav.url
            }) %}
        {% endfor %}
```

Get the existing **Identity** as set in the Site Settings Control Panel section to modify it:
```twig
{% set identity = seomatic.jsonLd.get('identity') %}
```

Let’s say you want to add a [Brand](https://schema.org/Brand) to the **Identity**, you’d do this:

```twig
{% set identity = seomatic.jsonLd.get('identity') %}

{% set brand = seomatic.jsonLd.create({
    'type': 'Brand',
    'name': 'Some prop',
    'url': 'Some url',
}, false) %}

{% do identity.brand(brand) %}
```

The `, false` parameter tells it to create the JSON-LD object, but to _not_ automatically add it to the JSON-LD container. We do this because we don’t want it rendered on its own, we want it as part of the existing `mainEntityOfPage` JSON-LD object.

Get the existing **Creator** as set in the Site Settings Control Panel section to modify it:
```twig
{% set identity = seomatic.jsonLd.get('creator') %}
```

## Link Meta Object Functions `seomatic.link`

* **`seomatic.link.get(META_HANDLE)`** Returns the Link meta object of the handle `META_HANDLE` or `null` if it is not found
* **`seomatic.link.create(CONFIG_ARRAY)`** Creates a Link meta object from an array of key-value properties
* **`seomatic.link.add(META_OBJECT)`** Adds the `META_OBJECT` to the Link container to be rendered
* **`seomatic.link.render()`** Renders all of the Link meta objects to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.link.container()`** Returns the container that holds an array of all of the Link meta objects

### Link Meta Object Examples:

Change the `<link rel="canonical">`:
```twig
{% do seomatic.link.get("canonical").href("https://nystudio107.com") %}
```

Note that you can achieve the same result with:
```twig
{% do seomatic.meta.canonicalUrl("https://nystudio107.com") %}
```

...since the `canonicalUrl` populates the `<link rel="canonical">` Link meta object

To check what `alternate` links are rendered:

```twig
    {% set alt = seomatic.link.get('alternate') %}
    {% do alt.href([
            'http://example.com',
            'http://example.com/es'
        ]).hreflang([
            'x-default',
            'es',
        ])
    %}
```

## Script Meta Object Functions `seomatic.script`

* **`seomatic.script.get(META_HANDLE)`** Returns the Script meta object of the handle `META_HANDLE` or `null` if it is not found 
* **`seomatic.script.create()`** Creates a Script meta object from an array of key-value properties
* **`seomatic.script.add(META_OBJECT)`** Adds the `META_OBJECT` to the Script container to be rendered
* **`seomatic.script.render()`** Renders all of the Script meta objects to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.script.container()`** Returns the container that holds an array of all of the Script meta objects

### Script Meta Object Examples:

Don’t include the Google Analytics script on the page:
```twig
{% do seomatic.script.get("googleAnalytics").include(false) %}
```

For a complete list of the Script handles SEOmatic uses can be found in [ScriptContainer.php](https://github.com/nystudio107/craft-seomatic/blob/v3/src/seomatic-config/globalmeta/ScriptContainer.php)

## Tag Meta Object Functions `seomatic.tag`

* **`seomatic.tag.get(META_HANDLE)`** Returns the Tag meta object of the handle `META_HANDLE` or `null` if it is not found
* **`seomatic.tag.create()`** Creates a Tag meta object from an array of key-value properties
* **`seomatic.tag.add(META_OBJECT)`** Adds the `META_OBJECT` to the Tag container to be rendered
* **`seomatic.tag.render()`** Renders all of the Tag meta objects to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.tag.container()`** Returns the container that holds an array of all of the Tag meta objects

### Tag Meta Object Examples:

Change the `<meta name="twitter:title">`:

```twig
{% do seomatic.tag.get("twitter:title").content("Hello, world") %}
```

Note that you can achieve the same result with:
```twig
{% do seomatic.meta.twitterTitle("Hello, world") %}
```

...since the `twitterTitle` populates the `<meta name="twitter:title">` Tag meta object by default.

Let’s say you didn’t want Google et al to index a particular page or under certain conditions. You could do this:

```twig
{% do seomatic.tag.get("robots").content("none") %}
```

Note that you can achieve the same result with:
```twig
{% do seomatic.meta.robots("none") %}
```

...since the `robots` populates the `<meta name="robots">` Tag meta object by default.

You can have multiple OpenGraph tags of the same time, for example `og:image`:

```twig
{% set ogImage = seomatic.tag.get('og:image') %}
{% do ogImage.content([
    'http://example.com/image1.jpg',
    'http://example.com/image2.jpg',
]) %}
```

...and it’ll generate a tag for each image:
```html
<meta content="http://example.com/image2.jpg" property="og:image">
<meta content="http://example.com/image1.jpg" property="og:image">
 ```

## Title Meta Object Functions `seomatic.title`

* **`seomatic.title.get(META_HANDLE)`** Returns the Title meta object of the handle `META_HANDLE` or `null` if it is not found
* **`seomatic.title.create()`** Creates a Title meta object from an array of key/value properties
* **`seomatic.title.add(META_OBJECT)`** Adds the `META_OBJECT` to the Title container to be rendered
* **`seomatic.title.render()`** Renders Title meta object to your template. This is only needed if you have turned off **Automatic Render** in Plugin Settings
* **`seomatic.title.container()`** Returns the container that holds an array with the Title meta object in it

### Tag Meta Object Examples:

Change the `<title>`:

```twig
{% do seomatic.title.get("title").content("My page title") %}
```

Note that you can achieve the same result with:
```twig
{% do seomatic.meta.seoTitle("My page title") %}
```

...since the `seoTitle` populates the `<title">` Title meta object

## Meta Containers

Normally you don’t need to work with meta containers directly, but SEOmatic gives you access to them to.

You can get the meta container for each type of meta object by doing:

```twig
{% set jsonLdContainer = seomatic.jsonLd.container() %}
{% set linkContainer = seomatic.link.container() %}
{% set scriptContainer = seomatic.script.container() %}
{% set tagContainer = seomatic.tag.container() %}
{% set titleContainer = seomatic.title.container() %}
```

Then you can do things like tell an entire container to not render:

```twig
{% set scriptContainer = seomatic.script.container() %}
{% do scriptContainer.include(false) %}
```

Or just:

```twig
{% do seomatic.script.container().include(false) %}
```

Containers are also cached. Typically SEOmatic manages this cache for you, but should you wish to invalidate the cache manually, you can do so via:

```twig
{% set scriptContainer = seomatic.script.container() %}
{% do scriptContainer.clearCache(true) %}
```

Or just:

```twig
{% do seomatic.script.container().clearCache(true) %}
```

Brought to you by [nystudio107](https://nystudio107.com/)
