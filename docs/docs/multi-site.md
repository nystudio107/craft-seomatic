# Multi-Site Language/Locale Support

SEOmatic comes with multi-site support baked in. Each site has its own localized settings that can be different on a per-site basis.

Craft CMS [defines Sites](https://craftcms.com/docs/5.x/system/sites.html) as any combination of site settings and locale (language). But there needs to be some way to organize these sites to define a relationship between them. That’s what [Site Groups](https://github.com/craftcms/cms/issues/1668) are for.

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
