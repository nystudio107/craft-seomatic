# Meta Containers

Normally you don’t need to work with meta containers directly, but SEOmatic gives you access to them too.

You can get the meta container for each type of meta object by doing:

```twig
{% set jsonLdContainer = seomatic.jsonLd.container() %}
{% set linkContainer = seomatic.link.container() %}
{% set scriptContainer = seomatic.script.container() %}
{% set tagContainer = seomatic.tag.container() %}
{% set titleContainer = seomatic.title.container() %}
```

Then you can do things like tell an entire container to not render:

```twig
{% set scriptContainer = seomatic.script.container() %}
{% do scriptContainer.include(false) %}
```

Or just:

```twig
{% do seomatic.script.container().include(false) %}
```

Containers are also cached. Typically SEOmatic manages this cache for you, but should you wish to invalidate the cache manually, you can do so via:

```twig
{% set scriptContainer = seomatic.script.container() %}
{% do scriptContainer.clearCache(true) %}
```

Or just:

```twig
{% do seomatic.script.container().clearCache(true) %}
```
