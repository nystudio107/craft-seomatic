# Config Variables

The `seomatic.config` variables are the global plugin configuration variables set in the `config.php` file. You can copy the `config.php` file to the Craft `config/` directory as `seomatic.php` to change them in a multi-environment friendly way.

* **`seomatic.config.pluginName`** – The public-facing name of the plugin.
* **`seomatic.config.renderEnabled`** – Should SEOmatic render metadata?
* **`seomatic.config.environment`** – The server environment, either `live`, `staging`, or `local`.
* **`seomatic.config.displayPreviewSidebar`** – Should SEOmatic display the SEO Preview sidebar?
* **`seomatic.config.displayAnalysisSidebar`** – Should SEOmatic display the SEO Analysis sidebar?
* **`seomatic.config.devModeTitlePrefix`** – If `devMode` is on, prefix the `<title>` with this string.
* **`seomatic.config.separatorChar`** – The separator character to use for the `<title>` tag.
* **`seomatic.config.maxTitleLength`** – The max number of characters in the `<title>` tag.
* **`seomatic.config.maxDescriptionLength`** – The max number of characters in the `<meta name="description">` tag.
