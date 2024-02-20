# Empty Coalesce Operator

SEOmatic adds the `???` operator to Twig that will return the first thing that is defined, not null, and not empty. This allows you to safely "cascade" empty text/image values.

This can be used both in Twig templates, and in any of SEOmatic’s fields, which are parsed as Twig templates as well.

This is particularly useful for SEO fields (both text & images), where you’re dealing with a number of fallback/default values that may or may not exist, and may or may not be empty.

The `???` Empty Coalescing operator is similar to the `??` [null coalescing operator](https://nystudio107.com/blog/handling-errors-gracefully-in-craft-cms#coalescing-the-night-away), but also ignores empty strings (`""`) and empty arrays (`[]`) as well.

The problem is that to [code defensively](https://nystudio107.com/blog/handling-errors-gracefully-in-craft-cms#defensive-coding-in-twig), you want to make sure that all of these things are defined, not null, and also have a value. So you end up with something like:

```twig
{% if entry is defined and
  entry.description is defined and
  entry.description | length
%}
  {% set description = entry.description %}
{% elseif category is defined and
  category.description is defined and
  category.description | length
%}
  {% set description = category.description %}
{% else %}
  {% set description = global.description %}
{% endif %}
```

This gets quite verbose and quite tiresome quickly. There are other ways you can do something similar, such as using using the `?:` [ternary operator](https://twig.symfony.com/doc/2.x/templates.html#other-operators) and the [default filter](https://twig.symfony.com/doc/2.x/filters/default.html), but this too gets a bit unwieldy.

You can use the [null coalescing operator](https://nystudio107.com/blog/handling-errors-gracefully-in-craft-cms#coalescing-the-night-away), which picks the first thing that is defined and not null:

```twig
{% set description = entry.description ??
  category.description ??
  global.description %}
```

But the problem here is it’ll _just_ pick the first thing that is defined and not `null`. So if `entry.description` is an empty string, it’ll use that, which is rarely what you want.

Enter the Empty Coalescing operator, and it becomes:

```twig
{% set description = entry.description ???
  category.description ???
  global.description %}
```

Now `description` will be set to the first thing that is defined, not null, _and_ not empty.

Nice. Simple. Readable. And most importantly, likely the result you’re expecting.

The examples presented here use the `???` operator for SEOmatic functions, but you can use them for anything you like.

We’ve submitted a [pull request](https://github.com/twigphp/Twig/pull/2787) in the hopes of making this part of Twig core. This functionality is also available separately in the [Empty Coalesce](https://nystudio107.com/plugins/empty-coalesce) plugin.
