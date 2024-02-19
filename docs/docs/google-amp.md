# Google AMP Support

SEOmatic works great with [Google AMP](https://www.ampproject.org/)! In fact, it will provide the [JSON-LD structured data](https://www.ampproject.org/docs/fundamentals/spec) that is _required_ by the AMP spec.

You do however need to [Make your page discoverable](https://www.ampproject.org/docs/fundamentals/discovery):

Add the following to the non-AMP template to tell Google where the AMP version of the page is; `yourAmpPageLink` the URL to your AMP page:

```twig
{% set linkTag = seomatic.link.create({
  "rel": "amphtml",
  "href": yourAmpPageLink
}) %}
```

And this to the AMP template to tell Google where the canonical HTML page is:

```twig
{% do seomatic.meta.canonicalUrl(entry.url) %}
```

Since AMP [doesn’t allow for third-party JavaScript](https://medium.com/google-developers/how-to-avoid-common-mistakes-when-publishing-accelerated-mobile-pages-9ea61abf530f), you might want to add this to your AMP templates:

```twig
{% do seomatic.script.container().include(false) %}
```

This will cause SEOmatic to not render _any_ custom scripts you might have enabled (such as Google Analytics, gtag, etc.)

Then you can include Google AMP Analytics as per [Adding Analytics to your AMP pages](https://developers.google.com/analytics/devguides/collection/amp-analytics/) (this assumes you’re using `gtag`):

```twig
{% set script = seomatic.script.get('gtag') %}
{% set analyticsId = script.vars.googleAnalyticsId.value ??? '' %}

<amp-analytics type="googleanalytics">
  <script type="application/json">
    {
      "vars": {
        "account": "{{ analyticsId }}"
      },
      "triggers": {
        "trackPageview": {
          "on": "visible",
          "request": "pageview"
        }
      }
    }
  </script>
</amp-analytics>
```

The above uses the `???` empty coalesce operator that comes with SEOmatic; check out [SEOmatic’s ??? Empty Coalesce operator](./using/empty-coalesce-operator.md) for details.
