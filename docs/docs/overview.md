---
title: SEOmatic Overview
description: SEOmatic Overview documentation for the SEOmatic plugin. The SEOmatic plugin facilitates modern SEO best practices & implementation for Craft CMS 3 & 4.
---
# SEOmatic Overview

SEOmatic facilitates [modern SEO best practices](https://nystudio107.com/blog/modern-seo-snake-oil-vs-substance) & implementation for Craft CMS 3 & 4. It is a turnkey SEO system that is comprehensive, powerful, and flexible.

SEOmatic allows you to quickly get a site up and running with a robust, comprehensive SEO strategy.  It is also implemented in a Craft-y way, in that it is also flexible and customizable.

It implements [JSON-LD](https://developers.google.com/schemas/formats/json-ld?hl=en) microdata, [Twitter Cards](https://dev.twitter.com/cards/overview) tags, [Facebook OpenGraph](https://developers.facebook.com/docs/sharing/opengraph) tags, [Sitemaps](https://www.sitemaps.org/protocol.html) of your content, [Robots.txt](http://www.robotstxt.org/robotstxt.html) bot directives, [Humans.txt](http://humanstxt.org) authorship accreditation, and as well as HTML meta tags.

SEOmatic populates your templates with SEO Meta in the same way that Craft populates your templates with `entry` variables, with a similar level of freedom and flexibility in terms of how you use them.

SEOmatic works automatically with Craft Commerce 2 as well, providing metadata, JSON-LD structured data, and sitemaps for your Products.

SEOmatic also caches each unique SEO Meta request so that your site performance is minimally impacted by the rich SEO Meta tags provided.

## The Meta Cascade

SEOmatic cascades SEO data for any given route, by allowing three distinct places where content authors / admins can add that data:

* **Global SEO** - Global SEO settings are the base settings that are used site-wide. If there are no more specific SEO settings for a given page, it will fall back on the Global SEO settings
* **Content SEO** - Each Section in Craft CMS (Entries, Categories, Products, etc.) gets its own unique set of SEO settings that will be applied to that section (and Entry Types also can have unique settings). Typically you would set up your Content SEO settings to _pull_ from existing fields in the corresponding sections.
* **SEO Settings fields** - If you require overrides on a per-entry basis, the SEO Settings field allows you to do that as well. However, if Content SEO is set up to pull from your existing content fields, SEO Settings fields only sparringly need to be used

These SEO settings layer on top of each other, so the most specific value provided is always what is used for a given page. Content SEO settings override Global SEO settings, and SEO Settings fields override them both.

If any SEO setting value is left **empty**, it will fall back on existing SEO settings data. For example, if you have no SEO Image specified in your Content SEO settings for a given Section, it will fall back on the Global SEO Image.

In this way, the SEO data that SEOmatic provides _cascades_ together to form the final SEO meta data for a given page.

## Twig Overrides

SEOmatic also has a very robust Twig API for all of the SEO settings. For a given page, all of the SEO information provided by content authors cascades together as described above, and then is available in your Twig templates (or in PHP) for you to manipulate further as you see fit.

In this way, you have complete control over the SEO meta data that is rendered for your website.

See the **Using SEOmatic** section for an in-depth look at how SEOmatic works under the hood, and for reference on the Twig APIs.

Brought to you by [nystudio107](https://nystudio107.com/)
