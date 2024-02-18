---
title: SEO Settings Field
description: SEOmatic Fields documentation for the SEOmatic plugin. The SEOmatic plugin facilitates modern SEO best practices & implementation for Craft CMS 4.
---

# SEO Settings Field

SEOmatic has an SEO Settings Field that you can add to your Field Layouts. For most sites, the Field is not needed; instead set up the fields to pull from in the Content SEO settings for each Section.

Modern SEO works best if it actually reflects what is on the page, visible to the user, so pulling from your page’s content will work well in most cases.

## Using SEO Settings Fields

However, in some cases you may want more control over page SEO for specific entries. That’s where the SEO Settings field comes in. Add it to your Section’s Field Layout, and you can override specific SEO settings on a per-entry basis.

When a new entry is created with an SEO Settings field in it, the field values will all have the **Override** light switch turned off.

The field settings let you control exactly what fields will appear and be visible for you or your client to override:

![Screenshot of settings for the SEO Settings field type](./resources/screenshots/seomatic-field-settings.png)

By default, just a few sensible settings are made visible in the Field:

![Screenshot of the SEO Settings field as seen from an entry detail page](./resources/screenshots/seomatic-field-defaults.png)

With the **Override** light switch off, the settings will default to the Content SEO and/or Global SEO setting for that field, so you can use the Field only for the exceptional cases.

If you turn the **Override** light switch on:

![Screenshot of the SEO Settings field as seen from an entry detail page, with the SEO Description Source switch flipped on and a Custom Text selection making an input available for text entry](./resources/screenshots/seomatic-field-defaults-override.png)

...you can override the given setting on a per-entry basis.

You can enable every possible field to be displayed in the SEO Settings field if you like:

![Screenshot of the SEO Settings field as seen from an entry detail page, showing more tabs (General, Twitter, Facebook, Sitemap) and more fields in the selected General tab](./resources/screenshots/seomatic-field-full.png)

But it’s probably best to limit it to just the things that you or your client might want to change on a per-entry basis.

If you enable an SEO Settings field in an Element Index’s Table Columns, you’ll see an SEO preview there as well:

![Screenshot of a Craft CMS Entries channel listing, with an SEO Settings column to the right that displays a SERP preview next to each item](./resources/screenshots/seomatic-table-columns-google.png)

You can control whether the preview will be from Google, Facebook, or Twitter in the Field Settings.

![Screenshot of a Craft CMS Entries channel listing, with an SEO Settings column to the right displaying a social card preview next to each item](./resources/screenshots/seomatic-table-columns-facebook.png)

### Template Access

To access your SEOmatic field’s data directly in a template, you can do so via:

```twig
{{ entry.mySeoSettingsField.metaGlobalVars.seoTitle }}
```

All of the variables listed in the [General Variables](./using/index.md#seomatic-variables) can be accessed in this manner.

There may be occasions where you want to output the final parsed value of an SEOmatic variable on the front end. You can do that via `entry.mySeoSettingsField.metaGlobalVars.parsedValue()`. For example:

```twig
{{ entry.mySeoSettingsField.metaGlobalVars.parsedValue('seoDescription') }}
```

This will output the final parsed value of the `entry.mySeoSettingsField.metaGlobalVars.seoDescription` variable.

This parsing is done automatically by SEOmatic just before the meta information is added to your page.
