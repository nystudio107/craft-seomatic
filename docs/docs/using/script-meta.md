# Script Meta Object Functions

The `seomatic.script` functions are for working with `<script>` tags.

* **`seomatic.script.get(META_HANDLE)`** – Returns the Script meta object of the handle `META_HANDLE` or `null` if it is not found.
* **`seomatic.script.create()`** – Creates a Script meta object from an array of key-value properties.
* **`seomatic.script.add(META_OBJECT)`** – Adds the `META_OBJECT` to the Script container to be rendered.
* **`seomatic.script.render()`** – Renders all of the Script meta objects to your template. Only necessary if you’ve disabled **Automatic Render** in [Plugin Settings](../configuring/plugin-settings.md).
* **`seomatic.script.container()`** – Returns the container that holds an array of all of the Script meta objects.

## Script Meta Object Examples:

Don’t include the Google Analytics script on the page:

```twig
{% do seomatic.script.get("googleAnalytics").include(false) %}
```

For a complete list of the Script handles SEOmatic uses can be found in [ScriptContainer.php](https://github.com/nystudio107/craft-seomatic/blob/v4/src/seomatic-config/globalmeta/ScriptContainer.php)
