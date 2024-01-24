# Tag Meta Object Functions

The `seomatic.tag` functions are for working with `<meta>` tags.

* **`seomatic.tag.get(META_HANDLE)`** – Returns the Tag meta object of the handle `META_HANDLE` or `null` if it is not found.
* **`seomatic.tag.create()`** – Creates a Tag meta object from an array of key-value properties.
* **`seomatic.tag.add(META_OBJECT)`** – Adds the `META_OBJECT` to the Tag container to be rendered.
* **`seomatic.tag.render()`** – Renders all of the Tag meta objects to your template. Only necessary if you’ve disabled **Automatic Render** in [Plugin Settings](../configuring/plugin-settings.md).
* **`seomatic.tag.container()`** – Returns the container that holds an array of all of the Tag meta objects.

## Tag Meta Object Examples

Change the `<meta name="twitter:title">`:

```twig
{% do seomatic.tag.get("twitter:title").content("Hello, world") %}
```

Note that you can achieve the same result with:

```twig
{% do seomatic.meta.twitterTitle("Hello, world") %}
```

...since the `twitterTitle` populates the `<meta name="twitter:title">` Tag meta object by default.

Let’s say you didn’t want Google et al to index a particular page or under certain conditions. You could do this:

```twig
{% do seomatic.tag.get("robots").content("none") %}
```

Note that you can achieve the same result with:

```twig
{% do seomatic.meta.robots("none") %}
```

...since the `robots` populates the `<meta name="robots">` Tag meta object by default.

You can have multiple Open Graph tags of the same time, for example `og:image`:

```twig
{% set ogImage = seomatic.tag.get('og:image') %}
{% do ogImage.content([
  'http://example.com/image1.jpg',
  'http://example.com/image2.jpg',
]) %}
```

...and it’ll generate a tag for each image:

```html
<meta content="http://example.com/image2.jpg" property="og:image">
<meta content="http://example.com/image1.jpg" property="og:image">
```
