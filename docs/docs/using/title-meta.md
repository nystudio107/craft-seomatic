# Title Meta Object Functions

The `seomatic.title` functions are for working with a page’s `<title>` tag.

* **`seomatic.title.get(META_HANDLE)`** – Returns the Title meta object of the handle `META_HANDLE` or `null` if it’s not found.
* **`seomatic.title.create()`** – Creates a Title meta object from an array of key-value properties.
* **`seomatic.title.add(META_OBJECT)`** – Adds the `META_OBJECT` to the Title container to be rendered.
* **`seomatic.title.render()`** – Renders Title meta object to your template. Only necessary if you’ve disabled **Automatic Render** in [Plugin Settings](../configuring/plugin-settings.md).
* **`seomatic.title.container()`** – Returns the container that holds an array with the Title meta object in it.

## Tag Meta Object Examples

Change the `<title>`:

```twig
{% do seomatic.title.get("title").content("My page title") %}
```

Note that you can achieve the same result with:

```twig
{% do seomatic.meta.seoTitle("My page title") %}
```

...since the `seoTitle` populates the `<title>` Title meta object.

