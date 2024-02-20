# Link Meta Object Functions

The `seomatic.link` functions are for working with `<link>` tags.

* **`seomatic.link.get(META_HANDLE)`** – Returns the Link meta object of the handle `META_HANDLE` or `null` if it is not found.
* **`seomatic.link.create(CONFIG_ARRAY)`** – Creates a Link meta object from an array of key-value properties.
* **`seomatic.link.add(META_OBJECT)`** – Adds the `META_OBJECT` to the Link container to be rendered.
* **`seomatic.link.render()`** – Renders all of the Link meta objects to your template. Only necessary if you’ve disabled **Automatic Render** in [Plugin Settings](../configuring/plugin-settings.md).
* **`seomatic.link.container()`** – Returns the container that holds an array of all of the Link meta objects.

## Link Meta Object Examples:

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
]) %}
```
