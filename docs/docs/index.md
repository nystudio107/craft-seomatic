---
title: SEOmatic plugin for Craft CMS 5.x
description: Documentation for the SEOmatic plugin. The SEOmatic plugin facilitates modern SEO best practices & implementation for Craft CMS 5.
---

# SEOmatic Plugin for Craft CMS 5.x

SEOmatic is a comprehensive, powerful, and flexible turnkey SEO system that facilitates [modern SEO best practices](https://nystudio107.com/blog/modern-seo-snake-oil-vs-substance) & implementation for Craft CMS.

![Plugin banner that reads “Introducing SEOmatic, SEO done right.”](./resources/img/plugin-banner.jpg)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/quality-score.png?b=v5)](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/?branch=v5) [![Code Coverage](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/coverage.png?b=v5)](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/?branch=v5) [![Build Status](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/build.png?b=v5)](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/build-status/v5) [![Code Intelligence Status](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/code-intelligence.svg?b=v5)](https://scrutinizer-ci.com/code-intelligence)

## Key Features

- Healthy SEO by default, tailored to your Craft site’s content model—including Craft Commerce products.
- Implements HTML tags, JSON-LD microdata, Twitter Card tags, Facebook Open Graph tags, XML sitemaps, robots.txt, humans.txt, and ads.txt.
- Supports SEO-friendly pagination.
- Control panel SEO previews for content authors.
- Custom fields for overriding default SEO values.
- Visual Configuration overview for helping with project setup.
- Deep support for Craft features: multi-site, customizable permissions, headless mode, GraphQL, and more.
- Tools for validating and debugging metadata.
- Various utilities for managing additional meta tags, text excerpts, and more.

::: tip Use Retour for 404 Redirects
SEOmatic _does not_ cover is 404 redirects; for that we recommend our [Retour plugin](https://github.com/nystudio107/craft-retour).
:::

## Used By

<UsedByLogos />

The SEO experts at [Moz.com](https://moz.com/) and the creators of Craft CMS rely on SEOmatic!

## Requirements

This plugin requires Craft CMS 5.0.0 or later.

## Installation

1. Open your terminal and go to your Craft project:

    ```
    cd /path/to/project
    ```

2. Tell Composer to load the plugin:

    ```
    composer require nystudio107/craft-seomatic
    ```

3. Install the plugin via CLI:

    ```
    php craft install/plugin seomatic
    ```

    Or in the control panel, go to **Settings** → **Plugins** and click **Install** for SEOmatic.

You can alternatively install SEOmatic via the **Plugin Store** in the Craft control panel.
