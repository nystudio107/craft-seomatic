# What SEOmatic Does

This page offers a more in-depth look at what SEOmatic does for you automatically, so can know where to jump in if there’s something you’d like to change.

Once you’re familiar with the [meta cascade](./overview.md#the-meta-cascade), it’s safe to jump straight to [configuration](./configuring/) if you’d rather skip this under-the-hood tour.

None of the information presented here is necessary for you to understand in order to use SEOmatic effectively.

This section is provided in case you want a gestalt view of how it all works.

## Minimal Configuration

SEOmatic’s approach is to be as useful as possible with the least amount of required configuration.

Because of this, and because it’s deeply integrated with Craft CMS, several things happen the moment you install it:

- SEO preview targets are added to every section with public URLs.
- Front-end templates are injected with title, meta, link, and JSON-LD tags.
- XML sitemaps and robots.txt are served, taking care to prevent indexing for non-production environments.
- Front-end and control panel page titles include emoji to visually identify non-production environments.
- HTTP response headers are added to front-end and control panel URLs.
- An SEOmatic panel is included when Craft’s [debug toolbar](./advanced.md#debug-toolbar) is enabled.
- Page titles are prepended with 🚧 to indicate non-production environments.

## Leveraging the Content Model

### Healthy SEO by Default

SEOmatic’s most important benefit is the ability to render the best metadata for a page using information that’s already available. The details can come from layered configuration, tailoring by content authors, and complete customization by developers using PHP or Twig.

This is more complicated than relying on entry fields or elaborate templates for one very good reason: it leverages Craft’s bespoke content modeling for healthy SEO by default. This frees content authors from having to manage SEO fields so they can focus on excellent content.

This can be a subtle thing for a small site, and a huge deal as it grows and evolves.

### Routes → Bundles → Containers

In order to make this possible, SEOmatic responds to a Craft request by examining its route and finding relevant SEO settings organized in bundles.

You can think of bundles as blobs of SEO settings that may be relevant to a given route.

SEOmatic starts with the Global SEO settings as a base, and then layers on top any Content SEO settings the correspond to a more specific Craft CMS Section. If there are any SEO Settings fields in that Section, those are then layered on top of the Content SEO settings.

This is called the [meta cascade](./overview.md#the-meta-cascade).

From these combined SEO settings, SEOmatic then creates containers that have objects for all of the tags, links, scripts, and other SEO metadata that it will render on your page for you.

These containers are injected in your Twig templates so that you can modify them as you see fit before the metadata they contain is finally rendered on the page.

You can also modify the containers via PHP in a custom module or plugin as well.

The [title container](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-config/globalmeta/TitleContainer.php), for example, describes the `<title>` HTML tag. It has simple settings for how the site name should be treated in addition to the page title.

The [tag container](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-config/globalmeta/TagContainer.php) is more complicated, detailing every expected `<meta>` tag that would commonly appear on a page.

A series of these containers is added by default, because most sites will use them:

- [TitleContainer](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-config/globalmeta/TitleContainer.php) describes the `<title>` tag that’s rendered in the `<head>`.
- [TagContainer](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-config/globalmeta/TagContainer.php) describes all the `<meta>` tags, rendered just after the `<title>` tag.
- [LinkContainer](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-config/globalmeta/LinkContainer.php) describes the `<link>` tags, rendered following the `<meta>` tags.
- [ScriptContainer](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-config/globalmeta/ScriptContainer.php) describes the supported tracking `<script>` tags.
- [JsonLdContainer](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-config/globalmeta/JsonLdContainer.php) describes the JSON-LD `<script type="application/ld+json">` tag data that’s rendered below any `<script>` tags just before `</body>`.

SEOmatic renders all of these for you, using settings you’ll see in each one.

Script tags, for example, may need to appear at different positions in a page depending on what they do. `ScriptContainer.php` includes [`position`](https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-config/globalmeta/ScriptContainer.php#L46) and https://github.com/nystudio107/craft-seomatic/blob/develop-v5/src/seomatic-config/globalmeta/ScriptContainer.php#L47 properties used to clarify exactly where individual scripts need to appear—and they’re already configured to ensure everything ends up in the right place.

You can [override any of these containers](https://nystudio107.com/blog/tips-for-using-seomatic-effectively#customized-setup) if you’d like.

You can disable automatic rendering globally in the [General Plugin Settings](./configuring/plugin-settings.md), and instead render whichever containers you’d like manually:

```twig
{# Render the title container #}
{{ seomatic.title.container().render() }}
```

## Customizing with Twig and PHP

If you choose to customize SEO details programmatically, it’s more likely that you’ll want to adjust the content itself rather than the containers that describe how it will be rendered.

The [SEOmatic Variables](./using/index.md#seomatic-variables) section walks through common usage and examples, and anything you can do with Twig is also available via PHP. You may even want to use PHP if your adjustments should be reflected in a control panel SEO preview.

You might set your own SEO description—used in several places—in Twig:

```twig
{% do seomatic.meta.seoDescription(
  "This is my description. There are many like it, but this one is mine."
) %}
```

You could do the exact same thing with PHP:

```php
Seomatic::$seomaticVariable->meta->seoDescription = "This is my description. There are many like it, but this one is mine.";
```

::: tip
It’s important to consider _when_ you do this with PHP. The [AddDynamicMetaEvent](advanced.md#adddynamicmetaevent) is ideal for customizing meta items in this way.
:::

## Tooling

SEOmatic also includes tools like its [debug panel](advanced.md#debug-toolbar) and [self-validating objects](using/index.md#meta-object-validation) to make it easier to inspect and double-check output.
