# Meta Variables

The `seomatic.meta` variable contains all of the meta variables that control the SEO that will be rendered on the site. They are pre-populated from your settings and content in the control panel, but you can change them as you see fit.

## General Variables

* **`seomatic.meta.mainEntityOfPage`** – The [schema.org](http://schema.org/docs/full.html) type that represents the main entity of the page.
* **`seomatic.meta.seoTitle`** – The title that is used for the `<title>` tag.
* **`seomatic.meta.siteNamePosition`** – controls where the `seomatic.site.siteName` appears relative to the `seomatic.meta.seoTitle` in the `<title>` tag. Valid values are `before`, `after`, or `none`.
* **`seomatic.meta.seoDescription`** – The description that is used for the `<meta name="description">` tag.
* **`seomatic.meta.seoKeywords`** – The keywords that are used for the `<meta name="keywords">` tag. Note that this tag is _ignored_ by Google.
* **`seomatic.meta.seoImage`** – The image URL that is used for SEO image.
* **`seomatic.meta.seoImageWidth`** – The width of the SEO image.
* **`seomatic.meta.seoImageHeight`** – The height of the SEO image.
* **`seomatic.meta.seoImageDescription`** – A textual description of the SEO image.
* **`seomatic.meta.canonicalUrl`** – The URL used for the `<link rel="canonical">` tag. By default, this is set to `{seomatic.helper.safeCanonicalUrl()}` or `{entry.url}`/`{category.url}`/`{product.url}`, but you can change it as you see fit. This variable is also used to set the `link rel="canonical"` HTTP header.
* **`seomatic.meta.robots`** – The setting used for the `<meta name="robots">` tag that controls how bots should index your site. This variable is also used to set the `X-Robots-Tag` HTTP header. [Learn More](https://developers.google.com/search/reference/robots_meta_tag)

## Facebook Open Graph Variables

* **`seomatic.meta.ogType`** – The value used for the `<meta property="og:type">` tag, such as `website` or `article`.
* **`seomatic.meta.ogTitle`** – The value used for the `<meta property="og:title">` tag. This defaults to `{seomatic.meta.seoTitle}`.
* **`seomatic.meta.ogSiteNamePosition`** – controls where the `seomatic.site.siteName` appears relative to the `seomatic.meta.ogTitle` in the `<meta property="og:title">` tag. Valid values are `before`, `after`, or `none`.
* **`seomatic.meta.ogDescription`** – The value used for the `<meta property="og:description">` tag. This defaults to `{seomatic.meta.seoDescription}`.
* **`seomatic.meta.ogImage`** – The value used for the `<meta property="og:image">` tag. This defaults to `{seomatic.meta.seoImage}`.
* **`seomatic.meta.ogImageWidth`** – The width of the ogImage. This defaults to `{seomatic.meta.seoImageWidth}`.
* **`seomatic.meta.ogImageHeight`** – The height of the ogImage. This defaults to `{seomatic.meta.seoImageHeight}`.
* **`seomatic.meta.ogImageDescription`** – The value used for the `<meta property="og:image:alt">` tag. This defaults to `{seomatic.meta.seoImageDescription}`.

## Twitter Variables

* **`seomatic.meta.twitterCard`** – The value used for the `<meta name="twitter:card">` tag, such as `summary` or `summary_large_image`.
* **`seomatic.meta.twitterCreator`** – The value used for the `<meta name="twitter:creator">` tag. This defaults to `{seomatic.site.twitterHandle}`.
* **`seomatic.meta.twitterTitle`** – The value used for the `<meta name="twitter:title">` tag. This defaults to `{seomatic.meta.seoTitle}`.
* **`seomatic.meta.twitterSiteNamePosition`** – controls where the `seomatic.site.siteName` appears relative to the `seomatic.meta.twitterTitle` in the `<meta name="twitter:title">` tag. Valid values are `before`, `after`, or `none`.
* **`seomatic.meta.twitterDescription`** – The value used for the `<meta name="twitter:description">` tag. This defaults to `{seomatic.meta.seoDescription}`.
* **`seomatic.meta.twitterImage`** – The value used for the `<meta name="twitter:image">` tag. This defaults to `{seomatic.meta.seoImage}`.
* **`seomatic.meta.twitterImageWidth`** – The width of the Twitter image. This defaults to `{seomatic.meta.seoImageWidth}`.
* **`seomatic.meta.twitterImageHeight`** – The height of the Twitter image. This defaults to `{seomatic.meta.seoImageHeight}`.
* **`seomatic.meta.twitterImageDescription`** – The value used for the `<meta name="twitter:image:alt">` tag. This defaults to `{seomatic.meta.seoImageDescription}`.

