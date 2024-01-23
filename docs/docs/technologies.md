---
title: SEO Technologies
description: SEO Technologies documentation for the SEOmatic plugin. The SEOmatic plugin facilitates modern SEO best practices & implementation for Craft CMS 4.
---

# SEO Technologies

## Pagination and SEO

If you are using paginated entries, you’ll want to add some additional markup to your templates to make Google et al aware of this. Fortunately, SEOmatic makes that easy, you simply do:

```twig
{% do seomatic.helper.paginate(PAGEINFO) %}
```

The `PAGEINFO` here is the variable from the `{% paginate %}` tag as [described here](https://craftcms.com/docs/4.x/dev/tags.html#paginate), this will properly set the `canonicalUrl`, as well as adding the `<link rel='prev'>` and `<link rel='next'>` tags for you.

A complete example (following [Craft’s {% paginate %} documentation](https://craftcms.com/docs/4.x/dev/tags.html#paginate)) might look like this:

```twig{4}
{% paginate craft.entries()
  .section('blog')
  .limit(10) as pageInfo, pageEntries %}
{% do seomatic.helper.paginate(pageInfo) %}

{% for entry in pageEntries %}
  <article>
    <h1>{{ entry.title }}</h1>
    {{ entry.body }}
  </article>
{% endfor %}

{% if pageInfo.prevUrl %}
  <a href="{{ pageInfo.prevUrl }}">Previous Page</a>
{% endif %}

{% if pageInfo.nextUrl %}
  <a href="{{ pageInfo.nextUrl }}">Next Page</a>
{% endif %}
```
More info: [SEO Guide to Google Webmaster Recommendations for Pagination](https://moz.com/blog/seo-guide-to-google-webmaster-recommendations-for-pagination)

## Multi-Site Language/Locale Support

SEOmatic comes with multi-site support baked in. Each site has its own localized settings that can be different on a per-site basis.

Craft CMS [defines Sites](https://craftcms.com/docs/4.x/sites.html) as any combination of site settings and locale (language). But there needs to be some way to organize these sites to define a relationship between them. That’s what [Site Groups](https://github.com/craftcms/cms/issues/1668) are for.

SEOmatic treats each Site Group as a separate entity, and any sites contained in that site group are treated as localizations of the same site.

This is necessary because there needs to be some way to let SEOmatic know what the relationship is between the various sites.

So for example, you might have:

```
├── Primary Site Group
│   ├── English Site
│   ├── Chinese Site
|   └── German Site
├── Sister Site Group
│   ├── English Site
|   └── German Site
```

While you technically don’t have to organize your Site Groups in this manner, SEOmatic currently requires it so that it can understand the relationship between your sites.

This is necessary because for a variety of SEO-related things, we need to tell search engines what is really just another localization/translation of the same thing.

If you _don’t_ want to organize your sites in this manner, you’ll need to turn off the **Site Groups define logically separate sites** setting on the Plugin Settings page.

Sites that are grouped together under the same Site Group will have `<link rel="alternate" hreflang="XX">` & `<meta content="xx_XX" property="og:locale:alternate">` URLs added automatically in the HTML.

To disable SEOmatic’s automatic rendering of these tags, you can do:
```twig
{% do seomatic.link.get('alternate').include(false) %}
{% do seomatic.tag.get('og:locale:alternate').include(false) %}
```

Sites that are grouped together under the same Site Group will also be included in the appropriate sitemap indexes, and have `<xhtml:link rel="alternate" hreflang="xx-xx">` tags added to the respective sitemaps.

To disable the generation of the `<xhtml:link rel="alternate" hreflang="xx-xx">` on a per-Entry basis, you can do this by adding an SEO Settings to the Section/Category Group/Product in question, and turn off **Sitemap Enabled** on a per-entry basis.

## Plugin Support

SEOmatic automatically works with the following plugins:

* [Craft Commerce](https://plugins.craftcms.com/commerce) from Pixel & Tonic
* [Digital Products](https://plugins.craftcms.com/digital-products) from Pixel & Tonic
* [Calendar](https://plugins.craftcms.com/calendar) from Solspace

This means that SEOmatic will treat the Elements that these plugins provide as first class citizens, just like Craft Entries & Categories.

SEOmatic will generate metadata, sitemaps, and have a Craft CP UI for them. If you have a custom Element provided by a plugin or module, you can integrate it using the [SeoElementInterface](https://github.com/nystudio107/craft-seomatic/blob/v3/src/base/SeoElementInterface.php).

## Emoji Support

SEOmatic supports using Emojis in any of the fields in SEOmatic, so you could use one in the SEO Description, for instance:

![Screenshot of an SEO Settings field that includes emoji in a Custom Text description override](./resources/screenshots/seomatic-emoji-support.png)

It’s up to Google whether or not to display the emojis that you add to your SEO meta, but used effectively, they can help make your entries in the SERP stand out from others. Learn more: [Why Use Emojis in Your SEO / PPC Strategy?](https://www.jellyfish.net/en-us/news-and-views/why-use-emojis-in-your-seo-ppc-strategy)

![Screenshot of SEOmatic’s General settings in the Global SEO section, with the macOS emoji picker open and a boom emoji leading the global site title](./resources/screenshots/seomatic-mac-emoji-keyboard.png)

On the Mac, you can invoke an Emoji keyboard inside of any text field by hitting Command Control Space. This works in any Mac application, not just web browsers or SEOmatic.

## Google AMP Support

SEOmatic works great with [Google AMP](https://www.ampproject.org/)! In fact, it will provide the [JSON-LD structured data](https://www.ampproject.org/docs/fundamentals/spec) that is _required_ by the AMP spec.

You do however need to [Make your page discoverable](https://www.ampproject.org/docs/fundamentals/discovery):

Add the following to the non-AMP template to tell Google where the AMP version of the page is; `yourAmpPageLink` the URL to your AMP page:

```twig
{% set linkTag = seomatic.link.create({
  "rel": "amphtml",
  "href": yourAmpPageLink
}) %}
```

And this to the AMP template to tell Google where the canonical HTML page is:

```twig
{% do seomatic.meta.canonicalUrl(entry.url) %}
```

Since AMP [doesn’t allow for third-party JavaScript](https://medium.com/google-developers/how-to-avoid-common-mistakes-when-publishing-accelerated-mobile-pages-9ea61abf530f), you might want to add this to your AMP templates:
```twig
{% do seomatic.script.container().include(false) %}
```

This will cause SEOmatic to not render _any_ custom scripts you might have enabled (such as Google Analytics, gtag, etc.)

Then you can include Google AMP Analytics as per [Adding Analytics to your AMP pages](https://developers.google.com/analytics/devguides/collection/amp-analytics/) (this assumes you’re using `gtag`):

```twig
{% set script = seomatic.script.get('gtag') %}
{% set analyticsId = script.vars.googleAnalyticsId.value ??? '' %}

<amp-analytics type="googleanalytics">
  <script type="application/json">
    {
      "vars": {
        "account": "{{ analyticsId }}"
      },
      "triggers": {
        "trackPageview": {
          "on": "visible",
          "request": "pageview"
        }
      }
    }
  </script>
</amp-analytics>
```

The above uses the `???` empty coalesce operator that comes with SEOmatic; check out [SEOmatic’s ??? Empty Coalesce operator](#seomatics--empty-coalesce-operator) for details.

## Single Page App (SPA) Support

SEOmatic fully supports working with SPAs, allowing you to receive the metadata needed for a given route either as an array, or as DOM elements ready to be inserted.

See the **Headless SPA API** section for details.
