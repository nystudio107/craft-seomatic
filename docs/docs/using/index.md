---
title: Twig Templating
description: Using SEOmatic documentation for the SEOmatic plugin. The SEOmatic plugin facilitates modern SEO best practices & implementation for Craft CMS 4.
---

# Twig Templating

SEOmatic can work fully without any Twig templating code at all. However, it provides a robust API that you can tap into from your Twig templates should you desire to do so.

SEOmatic makes a global `seomatic` variable available in your Twig templates that allows you to work with the SEOmatic variables and functions.

## A Word About `{% cache %}` Tags

If you use Craft’s built-in `{% cache %}` tags, ensure that you don’t have any of SEOmatic’s tags (listed below) inside of them. The reason is that SEOmatic dynamically generates the tags on each request, using its own caching system for performance reasons.

When you surround any Twig code in a `{% cache %}` tag, that code will only ever be executed once. On subsequent runs, the HTML result of what was inside of the `{% cache %}` tag is just returned, and the Twig code inside of it is never executed.

For more information on how the `{% cache %}` tag works, see the [The Craft {% cache %} Tag In-Depth](https://nystudio107.com/blog/the-craft-cache-tag-in-depth) article.

## SEOmatic Variables

All of the SEOmatic variables can be accessed as you would any normal Twig variable:

```twig
{{ seomatic.meta.seoTitle }}
```
Or
```twig
{% set title = seomatic.meta.seoTitle %}
```

They can also be changed by passing in a value with the Twig `{% do %}` syntax:

```twig
{% do seomatic.meta.seoTitle("Some Title") %}
```
Or
```twig
{% do seomatic.meta.seoDescription(
  "This is my description. There are many like it, but this one is mine."
) %}
```

You can also set multiple variables at once using array syntax:

```twig
{% do seomatic.meta.setAttributes({
  "seoTitle": "Some Title",
  "seoDescription": "This is my description. There are many like it..."
}) %}
```

Or you can chain them together:

```twig
{% do seomatic.meta
  .seoTitle("Some Title")
  .seoDescription("This is my description. There are many like it...") %}
```

These do the same thing, so use whichever you prefer.

You can set SEOmatic variables anywhere in your templates, even in sub-templates you `include` from other templates. This works because SEOmatic dynamically injects the meta tags, scripts, links, and JSON-LD into your page after the template is done rendering.

SEOmatic variables can also reference other SEOmatic variables using single-bracket syntax:

```twig
{% do seomatic.meta.seoDescription("{seomatic.meta.seoTitle}") %}
```

You can also reference `entry`, `category`, or `product` Craft variables, if they are present in your template:

```twig
{% do seomatic.meta.seoTitle("{entry.title}") %}
```

Or

```twig
{% do seomatic.meta.seoTitle("{category.title}") %}
```

But most of the time, you’ll want to just set them like you would regular variables:

```twig
{% do seomatic.meta.seoTitle(entry.title) %}
```

Or

```twig
{% do seomatic.meta.seoTitle(category.title) %}
```

...so that there is no additional Twig parsing that needs to be done.

SEOmatic variables are also parsed for aliases, and in Craft 3.1, for [environment variables](https://craftcms.com/docs/5.x/configure.html#control-panel-settings) as well.

There may be occasions where you want to output the final parsed value of an SEOmatic variable on the front end. You can do that via `seomatic.meta.parsedValue()`. For example:

```twig
{{ seomatic.meta.parsedValue('seoDescription') }}
```

This will output the final parsed value of the `seomatic.meta.seoDescription` variable.

This parsing is done automatically by SEOmatic just before the meta information is added to your page.

## Tags & Containers

All of the SEOmatic tags, links, scripts, title, and JSON-LD are meta objects that have their values set from the `seomatic.meta` variables.

These meta objects know what properties they should have, and can self-validate. If `devMode` is on, you can check the Yii2 Debug Toolbar’s Log to see any validation warnings or errors with your tags.

All of SEOmatic’s meta objects are stored in containers, and they can be accessed and manipulated directly. You can even dynamically create new tags via Twig at template render time.

All of the meta object (tags, scripts, links, title, and JSON-LD) have the same API to make it easy to use.

### Meta Object `.get()`

```twig
{% set descriptionTag = seomatic.tag.get("description") %}
```

...will return the `<meta name="description">` meta object to you in `descriptionTag`.

### Meta Object Properties

You can access meta object properties just like you can any Twig variable:

```twig
{{ descriptionTag.content }}
```

Or

```twig
{% set myContent = seomatic.meta.seoTitle %}
```

They can also be changed by passing in a value with the Twig `{% do %}` syntax:

```twig
{% do descriptionTag.content("Some description") %}
```

All meta objects also have an `include` property that determines whether or not they should be included on your web page:

```twig
{% do descriptionTag.include(false) %}
```

You could also chain this together in a single line:

```twig
{% do seomatic.tag.get("description").include(false) %}
```

And you can set multiple attributes at once using an array syntax:

```twig
{% do seomatic.tag.get("description").setAttributes({
  "content": "Some Description",
  "include": false
}) %}
```

Which is the same as doing:

```twig
{% do seomatic.tag.get("description")
  .content("Some Description")
  .include(false) %}
```

So use whatever you like better.

### Extra Tag Attributes

Should you need to add extra tag attributes to a Meta Item, such as the various `data-` tags, you can do that with the `.tagAttrs` property:

```twig
{% set tag = seomatic.tag.get('description') %}
{% if tag | length %}
  {% do tag.tagAttrs({
    "data-type": "whatever",
  }) %}
{% endif %}
```

This will generate a tag like this:

```html
<meta name="description" content="My description!" data-type="whatever">
```

A more practical example would be using [Klaro](https://heyklaro.com/) to manage Cookie consent, etc. to not activate Google Analytics until consent is given:

```twig
{% set tag = seomatic.script.get('googleAnalytics') %}
{% if tag | length %}
  {% do tag.tagAttrs({
    "type": "text/plain",
    "data-type": "application/javascript",
    "data-name": "google-analytics",
  }) %}
{% endif %}
```

Then when the page renders in production, it’ll look like this:
```html
<script type="text/plain" data-name="google-analytics" data-type="application/javascript">(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-XXXXXXXXX', 'auto');
ga('send', 'pageview');
</script>
```

See [ScriptContainer.php](https://github.com/nystudio107/craft-seomatic/blob/v4/src/seomatic-config/globalmeta/ScriptContainer.php) for a complete list of the script handles SEOmatic uses.

### Meta Object `.create()`

To create a new meta object, you pass in a key:value array of the attributes to use when creating it:

```twig
{% set linkTag = seomatic.link.create({
  "rel": "canonical",
  "href": "https://nystudio107.com"
}) %}
```

By default, newly created meta objects are added to the appropriate meta container, so they will be rendered on the page. Should you wish to create a meta object but _not_ have it added to a container, you can pass in an optional `false` parameter:

```twig
{% set linkTag = seomatic.link.create({
  "rel": "canonical",
  "href": "https://nystudio107.com"
}, false) %}
```

### Meta Object Validation

All meta objects can self-validate:

```twig
{% set myJsonLd = seomatic.jsonLd.create({
  'type': 'Article',
  'name': 'Some Blog',
  'url': 'woopsie',
}) %}

{% if myJsonLd.validate() %}
  <p>Valid!</p>
{% else %}
  <ul>
    {% for param,errors in myJsonLd.errors %}
      <li>
        {{ param ~ " " }}
        <ul>
          {% for error in errors %}
            <li>
              {{ error ~ " " }}
            </li>
          {% endfor %}
        </ul>
      </li>
    {% endfor %}
  </ul>
{% endif %}
```

This will output:

* URL
  * Must be one of these types: URL

Which tells you that the `url` parameter is invalid.  The default validation just ensures that all of the properties are correct.

You can also set the _scenario_ to display properties that Google requires/recommends:

```twig
{% set myJsonLd = seomatic.jsonLd.create({
  'type': 'Article',
  'name': 'Some Blog',
  'url': 'woopsie',
}) %}

{% do myJsonLd.setScenario('google') %}

{% if myJsonLd.validate() %}
  <p>Valid!</p>
{% else %}
  <ul>
    {% for param,errors in myJsonLd.errors %}
      <li>
        {{ param ~ " " }}
        <ul>
          {% for error in errors %}
            <li>
              {{ error ~ " " }}
            </li>
          {% endfor %}
        </ul>
      </li>
    {% endfor %}
  </ul>
{% endif %}
```

This will output:

* URL
  * Must be one of these types: URL
* Image
  * This property is recommended by Google.
* Author
  * This property is required by Google.
* DatePublished
  * This property is required by Google.
* Headline
  * This property is required by Google.
* Publisher
  * This property is required by Google.
* MainEntityOfPage
  * This property is recommended by Google.
* DateModified
  * This property is recommended by Google.

If the site has `devMode` on, all of the meta objects are automatically validated as they are rendered, with the results displayed in the Yii Debug Toolbar. The Yii Debug Toolbar can be enabled in your account settings page.
