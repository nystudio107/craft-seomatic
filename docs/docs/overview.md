---
title: SEOmatic Overview
description: SEOmatic Overview documentation for the SEOmatic plugin. The SEOmatic plugin facilitates modern SEO best practices & implementation for Craft CMS 3 & 4.
---

# SEOmatic Overview

SEOmatic allows you to quickly get a site running with a robust, comprehensive SEO strategy that follows [modern best practices](https://nystudio107.com/blog/modern-seo-snake-oil-vs-substance). It does this in a Craft-y way that’s flexible and customizable.

SEOmatic adds meta containers that are available to your templates much like Craft’s `entry` variables. Working with them should feel familiar and flexible.

Unlike Craft’s `entry` variables, the meta containers may use information that’s modified at different levels and expressed different ways on the site.

SEOmatic manages caches behind the scenes to ensure all this information can be used effectively with a minimal impact on site performance.

## The Meta Cascade

SEOmatic cascades SEO data for any given route, by allowing three distinct places where content authors can add that data:

1. **Global SEO** – Site-wide base settings applied when there isn’t anything more specific.
2. **Content SEO** – Settings for each Craft _section_, like Entries, Categories, and Products. Sections and entry types can designate which fields SEOmatic should pull details from.
3. **SEO Settings Fields** – Entry-level customization via the included SEO Settings field type. Ideally this is only necessary for tailoring when _Content SEO_ configuration designates useful defaults.

These SEO settings layer on top of each other, so the most specific value provided is always what is used for a given page. Content SEO settings override Global SEO settings, and SEO Settings fields override them both.

If any SEO setting value is left **empty**, it will fall back on existing SEO settings data. For example, if you have no SEO Image specified in your Content SEO settings for a given Section, it will fall back on the Global SEO Image.

In this way, the SEO data that SEOmatic provides _cascades_ together to form the final SEO meta data for a given page.

## Twig Overrides

You can work with and further manipulate the SEO information from that cascade using robust Twig and PHP APIs, for complete control over the SEO meta data that is rendered for your website.

See [Using SEOmatic](./using.md) for an in-depth look at how SEOmatic works under the hood, and for reference on the Twig APIs.
