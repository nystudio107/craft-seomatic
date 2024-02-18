# Helper Functions

The `seomatic.helper` functions are utilities that can help with pagination, previews, and preparing text and Assets.

* **`seomatic.helper.paginate(PAGEINFO)`** – Given the `PAGEINFO` variable from the `{% paginate %}` tag as [described here](https://craftcms.com/docs/5.x/reference/twig/tags.html#paginate), this will properly set the `canonicalUrl`, as well as adding the `<link rel='prev'>` and `<link rel='next'>` tags for you.
* **`seomatic.helper.isPreview()`** – Returns `true` if the current request is a preview, `false` if it is not.
* **`seomatic.helper.sameAsByHandle(HANDLE)`** – Returns an array of information about the **Same As URLs** site specified in `HANDLE`. Here’s an example of the information in the returned array:
  ```php
  array (size=4)
    'siteName' => string 'Twitter'
    'handle' => string 'twitter'
    'url' => string 'https://twitter.com/nystudio107'
    'account' => string 'nystudio107'
  ```
* **`seomatic.helper.truncate(TEXT, LENGTH, SUBSTR)`** – Truncates the `TEXT` to a given `LENGTH`. If `SUBSTR` is provided, and truncating occurs, the string is further truncated so that the substring may be appended without exceeding the desired length.
* **`seomatic.helper.truncateOnWord(TEXT, LENGTH, SUBSTR)`** – Truncates the `TEXT` to a given `LENGTH`, while ensuring that it does not split words. If `SUBSTR` is provided, and truncating occurs, the string is further truncated so that the substring may be appended without exceeding the desired length.
* **`seomatic.helper.getLocalizedUrls(URI, SITE_ID)`** – Return a list of localized URLs for a given `URI` that are in the `SITE_ID` site’s group. Both `URI` and `SITE_ID` are optional, and will use the current request’s `URI` and the current site’s `SITE_ID` if omitted.
* **`seomatic.helper.loadMetadataForUri(URI, SITE_ID)`** – Load the appropriate meta containers for the given `URI` and optional `SITE_ID`.
* **`seomatic.helper.sitemapIndexForSiteId(SITE_ID)`** – Get the URL to the `SITE_ID`s sitemap index
* **`seomatic.helper.extractTextFromField(FIELD)`** – Extract plain text from a PlainText, Redactor, CKEdtior, Tags, Matrix, or Neo field.
* **`seomatic.helper.extractKeywords(TEXT, LIMIT)`** – Extract up to `LIMIT` most important keywords from `TEXT`.
* **`seomatic.helper.extractSummary(TEXT)`** – Extract the most important 3 sentences from `TEXT`.
* **`seomatic.helper.socialTransform(ASSET, TRANSFORMNAME)`** – Transform the `ASSET` (either an Asset or an Asset ID) for social media sites in `TRANSFORMNAME`; valid values are `base`, `facebook`, `twitter-summary`, and `twitter-large`.
* **`seomatic.helper.seoFileLink(FILE_URL, ROBOTS, CANONICAL, INLINE)`** – Generates a link to a local or remote file that allows you to set the `X-Robots-Tag` header via `ROBOTS` (defaults to `all`) and `Link` canonical header via `CANONICAL` (defaults to `''`) as per [Advanced rel="canonical" HTTP Headers](https://moz.com/blog/how-to-advanced-relcanonical-http-headers). `INLINE` controls whether the file will be displayed inline or downloaded. If any values are empty `''`, the headers will not be included.
* **`seomatic.helper.sanitizeUserInput(TEXT)`** – Sanitize the `TEXT` by decoding any HTML Entities, URL decoding the text, then removing any newlines, stripping HTML tags, stripping Twig tags, and changing single {}'s into ()'s.
