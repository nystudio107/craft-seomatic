[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/quality-score.png?b=v4)](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/?branch=v4) [![Build Status](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/build.png?b=v4)](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/build-status/v4) 
[![Code Intelligence Status](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/code-intelligence.svg?b=v4)](https://scrutinizer-ci.com/code-intelligence) [![Code Coverage](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/badges/coverage.png?b=v4)](https://scrutinizer-ci.com/g/nystudio107/craft-seomatic/?branch=v4)

# SEOmatic Plugin for Craft CMS 4.x

SEOmatic is a comprehensive, powerful, and flexible turnkey SEO system that facilitates [modern SEO best practices](https://nystudio107.com/blog/modern-seo-snake-oil-vs-substance) & implementation for Craft CMS.

![Plugin banner that reads “Introducing SEOmatic, SEO done right.”](./docs/docs/resources/img/plugin-banner.jpg)

## Key Features

- Healthy SEO by default, tailored to your Craft site’s content model.
- Implements JSON-LD microdata, Twitter Cards tags, Facebook Open Graph tags, XML sitemaps, robots.txt, humans.txt, and HTML meta tags.
- Custom fields for overriding default SEO values.
- Control panel SEO previews for content authors.
- Visual Configuration overview for helping with project setup.
- Tools for validating and debugging metadata.
- Customizable permissions for tailoring what editors are able to change.
- Various utilities for managing additional meta tags, text excerpts, and more.
- Deep support for Craft features: multi-site, headless mode, GraphQL, and more.

> [!TIP]
> One SEO-related topic that SEOmatic _does not_ cover is 404 redirects; for that we recommend our [Retour plugin](https://github.com/nystudio107/craft-retour).

## Used By

<img src="./docs/docs/.vitepress/theme/img/moz-logo.svg" alt="Moz logo" width="140" height="40"> <img src="./docs/docs/.vitepress/theme/img/craft-cms-logo.svg" alt="Craft CMS logo" width="220" height="55">

SEOmatic is the SEO tool that the SEO experts at [Moz.com](https://moz.com/) and the creators of Craft CMS, Pixel & Tonic, rely on to handle their SEO!

## Requirements

This plugin requires Craft CMS 4.0.0 or later.

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

## Documentation

[SEOmatic Documentation](https://nystudio107.com/plugins/seomatic/documentation)

## SEOmatic Roadmap

Some things to do, and ideas for potential features:

* **Content Analytics** - Add content analytics, potentially in the "Pro" edition

Brought to you by [nystudio107](https://nystudio107.com/)
