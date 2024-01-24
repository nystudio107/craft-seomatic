# JSON-LD Meta Object Functions

The `seomatic.jsonLd` functions make it easier to create, manipulate, and render valid JSON-LD microdata.

* **`seomatic.jsonLd.get(META_HANDLE)`** – Returns the JSON-LD meta object of the handle `META_HANDLE` or `null` if it is not found.
* **`seomatic.jsonLd.create()`** – Creates a JSON-LD meta object from an array of key-value properties. The `type` can be any of the [Schema.org](http://schema.org/docs/full.html) types.
* **`seomatic.jsonLd.add(META_OBJECT)`** – Adds the `META_OBJECT` to the JSON-LD container to be rendered.
* **`seomatic.jsonLd.render()`** – Renders all of the JSON-LD meta objects to your template. Only necessary if you’ve disabled **Automatic Render** in [Plugin Settings](../configuring/plugin-settings.md).
* **`seomatic.jsonLd.container()`** – Returns the container that holds an array of all of the JSON-LD meta objects.

## JSON-LD Meta Object Examples:

Create a new [Article](http://schema.org/Article) JSON-LD meta object:

```twig
{% set myJsonLd = seomatic.jsonLd.create({
  'type': 'Article',
  'name': 'Some Blog',
  'url': 'https://nystudio107.com/blog',
}) %}
```

Get the existing **MainEntityOfPage** as set in the Global SEO or Content SEO control panel section to modify it (schema.org: [mainEntityOfPage](http://schema.org/docs/datamodel.html#mainEntityBackground)):
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

To replace the existing **BreadcrumbList** on a page:

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

Use `key` to create a schema element and propagate it. Propagate **SiteNavigationElement**:

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

Get the existing **Identity** as set in the Site Settings control panel section to modify it:

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

Get the existing **Creator** as set in the Site Settings control panel section to modify it:
```twig
{% set identity = seomatic.jsonLd.get('creator') %}
```
