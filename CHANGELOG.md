# SEOmatic Changelog

### 3.0.0-beta.16 - 2018.03.25
## Changed
* Fixed an issue where fresh installations were not taken to the Welcome screen
* Replaced old SEOmatic icon in the Asset Bundle
* Fixed an issue where Identity and Creator settings were not properly defaulted from the config files on fresh installations
* Better parsing of the JSON-LD config files

## Added
* Added Miscellaneous settings with Google Site Links search settings
* Preserve user settings in the Tracking Scripts when bundles are updated
* Fleshed out the JSON-LD for `mainEntityOfPage`, `identity`, and `creator`

### 3.0.0-beta.15 - 2018.03.24
## Changed
* Separated the mainEntityOfPage templates off into a partial
* Cleaned up the Identity Settings & Creator Settings pages

## Added
* Added a description of JSON-LD Structured Data to the Identity & Creator pages
* Added **Main Entity of Page** settings on the Global SEO and Content SEO General pages

### 3.0.0-beta.14 - 2018.03.23
## Changed
* Fixed an issue with console requests raising an exception in `addDynamicMetaToContainers()`
* Add `errors` display to all settings templates

## Added
* Implemented dynamic Identity Settings & Creator Settings pages

### 3.0.0-beta.13 - 2018.03.22
## Changed
* Don't look for `getPathInfo()` during a console request
* Fixed an issue switching between sites on the Tracking scripts settings
* Revise how `seoFileLink()` works
* Handle eager loaded elements in `TextHelper`

### 3.0.0-beta.12 - 2018.03.20
## Added
* Added colored status indicators on the Content SEO index page that match the colors in the donut chart on the Dashboard
* Added `seomatic.helper.seoFileLink()` to allow setting the `X-Robots-Tag` and `Link` headers on static files as per [Advanced rel="canonical" HTTP Headers](https://moz.com/blog/how-to-advanced-relcanonical-http-headers)
* Added a `Link` header for the canonical URL

## Changed
* Don't display SEO previews if the Section has no URLs

### 3.0.0-beta.11 - 2018.03.19
## Changed
* Refactored the meta bundle update process to preserve user configured meta bundle settings
* Throw a 404 if a sitemap is hit but sitemaps have been disabled for that section
* Exclude section sitemaps from the sitemap index if sitemaps have been disabled for that section

### 3.0.0-beta.10 - 2018.03.18
## Changed
* Reverted incorrect bundle merging

### 3.0.0-beta.9 - 2018.03.18
## Added
* Added `Schema` helper class & controller in preparation for dynamic schema types displayed in the AdminCP

## Changed
* Fixed incorrect `moz-transform` vendor prefix that caused the sidebar SEO preview to look weird in FireFox
* Fixed a nasty bug that could cause improper merging of config arrays, resulting in an ever-growing column size in the db

### 3.0.0-beta.8 - 2018.03.16
## Changed
* Fixed per-environment rendering of attributes
* Made meta bundle updating non-destructive to existing data

### 3.0.0-beta.7 - 2018.03.16
## Added
* Added a "Same as Global Site Name Position" setting as the default for the **Site Name Position** Content SEO settings

## Changed
* Fixed an issue where the last breadcrumb on the Content SEO `edit-content` page was a 404
* Fixed a caching issue that could result in stale data if you used `seomatic.helper.loadMetadataForUri()`
* Don't automatically generate thumbnails for videos in the sitemap
* Changed the Dashboard charts over to gauge charts

### 3.0.0-beta.6 - 2018.03.15
## Added
* Check whether the `seomatic_metabundles` table exists before installing any even listeners

### 3.0.0-beta.5 - 2018.03.15
## Changed
* Fixed an issue where the caching didn't work properly for multi-sites

### 3.0.0-beta.4 - 2018.03.14
## Added
* Added a validation rule for `genericAddressCountry` so it saves
* Added a validation rules for `renderEnabled`, `separatorChar`, `displayAnalysisSidebar` and `displayPreviewSidebar` so you can save the plugin settings.
* Added initial Dashboard

## Changed
* Don't install event listeners until after all plugins have loaded, to ensure db migrations have been run

### 3.0.0-beta.3 - 2018.03.14
### Added
* Added a migration for older Craft 2.x sites that had SEOmatic installed already, so that SEOmatic for Craft 3 can install its base tables

## Changed
* Fixed an issue with an incorrect redirect destination after saving a Tracking Scripts setting in the AdminCP
* Optimized the images used in the documentation

### 3.0.0-beta.2 - 2018.03.13
## Changed
* Fixed issues with `: void` on PHP 7.0.x

### 3.0.0-beta.1 - 2018.03.13
## Added
* Initial beta release
