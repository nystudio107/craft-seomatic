# Pagination & SEO

If you are using paginated entries, you’ll want to add some additional markup to your templates to make Google et al aware of this. Fortunately, SEOmatic makes that easy, you simply do:

```twig
{% do seomatic.helper.paginate(PAGEINFO) %}
```

The `PAGEINFO` here is the variable from the `{% paginate %}` tag as [described here](https://craftcms.com/docs/5.x/reference/twig/tags.html#paginate), this will properly set the `canonicalUrl`, as well as adding the `<link rel='prev'>` and `<link rel='next'>` tags for you.

A complete example (following [Craft’s {% paginate %} documentation](https://craftcms.com/docs/5.x/reference/twig/tags.html#paginate)) might look like this:

```twig{4}
{% paginate craft.entries()
  .section('blog')
  .limit(10) as pageInfo, pageEntries %}
{% do seomatic.helper.paginate(pageInfo) %}

{% for entry in pageEntries %}
  <article>
    <h1>{{ entry.title }}</h1>
    {{ entry.body }}
  </article>
{% endfor %}

{% if pageInfo.prevUrl %}
  <a href="{{ pageInfo.prevUrl }}">Previous Page</a>
{% endif %}

{% if pageInfo.nextUrl %}
  <a href="{{ pageInfo.nextUrl }}">Next Page</a>
{% endif %}
```

More info: [SEO Guide to Google Webmaster Recommendations for Pagination](https://moz.com/blog/seo-guide-to-google-webmaster-recommendations-for-pagination)
