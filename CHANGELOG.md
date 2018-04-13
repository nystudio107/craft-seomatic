# SEOmatic Changelog

## 3.0.0-beta.22 - 2018.04.12
### Added
* Added performance profiling to major bottlenecks
* Lots of code cleanup courtesy of the PHP Inspections plugin

### Changed
* Fixed an issue with the Field improperly saving values as objects
* Removed caching from AdminCP requests, which fixes improperly displayed social media previews
* Fixed a deprecation error with `.iso8601()`

### Changed

## 3.0.0-beta.21 - 2018.04.06
### Added
* Don't display the Facebook/Twitter not set in the sidebar preview, only on the Settings pages
* Added an `Seomatic_Meta` Field to more gracefully handle sites upgraded from Craft 2.x that used the old FieldType
* If you add an SEO Settings field to a Section that has an old Craft 2.x Seomatic Meta field in it, it will automatically migrate the data and settings to the new field for you
* SEOmatic will automatically map your old Craft 2.x Field settings to corresponding Content SEO settings

### Changed
* Better Dashboard display of SEO setup graphs
* Fixed an issue with an improperly named Site / Social Media permission
* Fixed an issue with the helper functions not gracefully handling `null` being passed in
* Fixed validation errors that could cause you to be unable to save changes to various SEOmatic settings

## 3.0.0-beta.20 - 2018.04.02
### Changed
* Added additional fields for the `mainEntityOfPage` JSON-LD
* Clicking on Settings on from the AdminCP now redirects to the appropriate SEOmatic sub-nav

### Added
* Added an **SEO Settings** Field that allows you to override SEO settings on a per-entry basis
* Added a schema.org link for the Main Entity of Page type you have specified
* Added `seomatic.helper.truncate` and `seomatic.helper.truncateOnWord` helper functions for truncating text

## 3.0.0-beta.19 - 2018.03.28
### Changed
* Fixed an issue where you could not disable `humans.txt` or `robots.txt`
* Fixed an issue where the `computedType` wasn't saved properly for Global and Content SEO
* Fixed an issue with JSON-LD generated for content containers not cascading as intended

### Added
* Added the ability to globally disable sitemap rendering

## 3.0.0-beta.18 - 2018.03.26
### Changed
* Preserve Site Identity and Site Creator settings across bundle updates

## 3.0.0-beta.17 - 2018.03.26
### Changed
* Check against `siteType`, `siteSubType` and `siteSpecificType` being `null` on the Site Settings pages
* Updated `humans.txt` template to display information from the Creator settings
* Separate Identity and Creator Entity Brand fields
* Remove JSON-LD schema.org properties that have just one entry in them (just the `@type`)
* Fixed an issue where `hreflang`s could be incorrect

### Added
* Documented the Identity and Creator Site Settings variables
* Added `menu` and `acceptsReservations` to the FoodEstablishment JSON-LD
* Added link `rel=“home”` to the default tag container
* Added `seomatic.helper.getLocalizedUrls()` function that will return a list of localized URLs
* Added `sameAs` social media URLs to the Identity JSON-LD
* Added `og:locale:alternate` Facebook OpenGraph tags

## 3.0.0-beta.16 - 2018.03.25
### Changed
* Fixed an issue where fresh installations were not taken to the Welcome screen
* Replaced old SEOmatic icon in the Asset Bundle
* Fixed an issue where Identity and Creator settings were not properly defaulted from the config files on fresh installations
* Better parsing of the JSON-LD config files

### Added
* Added Miscellaneous settings with Google Site Links search settings
* Preserve user settings in the Tracking Scripts when bundles are updated
* Fleshed out the JSON-LD for `mainEntityOfPage`, `identity`, and `creator`

## 3.0.0-beta.15 - 2018.03.24
### Changed
* Separated the mainEntityOfPage templates off into a partial
* Cleaned up the Identity Settings & Creator Settings pages

### Added
* Added a description of JSON-LD Structured Data to the Identity & Creator pages
* Added **Main Entity of Page** settings on the Global SEO and Content SEO General pages

## 3.0.0-beta.14 - 2018.03.23
### Changed
* Fixed an issue with console requests raising an exception in `addDynamicMetaToContainers()`
* Add `errors` display to all settings templates

### Added
* Implemented dynamic Identity Settings & Creator Settings pages

## 3.0.0-beta.13 - 2018.03.22
### Changed
* Don't look for `getPathInfo()` during a console request
* Fixed an issue switching between sites on the Tracking scripts settings
* Revise how `seoFileLink()` works
* Handle eager loaded elements in `TextHelper`

## 3.0.0-beta.12 - 2018.03.20
### Added
* Added colored status indicators on the Content SEO index page that match the colors in the donut chart on the Dashboard
* Added `seomatic.helper.seoFileLink()` to allow setting the `X-Robots-Tag` and `Link` headers on static files as per [Advanced rel="canonical" HTTP Headers](https://moz.com/blog/how-to-advanced-relcanonical-http-headers)
* Added a `Link` header for the canonical URL

### Changed
* Don't display SEO previews if the Section has no URLs

## 3.0.0-beta.11 - 2018.03.19
### Changed
* Refactored the meta bundle update process to preserve user configured meta bundle settings
* Throw a 404 if a sitemap is hit but sitemaps have been disabled for that section
* Exclude section sitemaps from the sitemap index if sitemaps have been disabled for that section

## 3.0.0-beta.10 - 2018.03.18
### Changed
* Reverted incorrect bundle merging

## 3.0.0-beta.9 - 2018.03.18
### Added
* Added `Schema` helper class & controller in preparation for dynamic schema types displayed in the AdminCP

### Changed
* Fixed incorrect `moz-transform` vendor prefix that caused the sidebar SEO preview to look weird in FireFox
* Fixed a nasty bug that could cause improper merging of config arrays, resulting in an ever-growing column size in the db

## 3.0.0-beta.8 - 2018.03.16
### Changed
* Fixed per-environment rendering of attributes
* Made meta bundle updating non-destructive to existing data

## 3.0.0-beta.7 - 2018.03.16
### Added
* Added a "Same as Global Site Name Position" setting as the default for the **Site Name Position** Content SEO settings

### Changed
* Fixed an issue where the last breadcrumb on the Content SEO `edit-content` page was a 404
* Fixed a caching issue that could result in stale data if you used `seomatic.helper.loadMetadataForUri()`
* Don't automatically generate thumbnails for videos in the sitemap
* Changed the Dashboard charts over to gauge charts

## 3.0.0-beta.6 - 2018.03.15
### Added
* Check whether the `seomatic_metabundles` table exists before installing any even listeners

## 3.0.0-beta.5 - 2018.03.15
### Changed
* Fixed an issue where the caching didn't work properly for multi-sites

## 3.0.0-beta.4 - 2018.03.14
### Added
* Added a validation rule for `genericAddressCountry` so it saves
* Added a validation rules for `renderEnabled`, `separatorChar`, `displayAnalysisSidebar` and `displayPreviewSidebar` so you can save the plugin settings.
* Added initial Dashboard

### Changed
* Don't install event listeners until after all plugins have loaded, to ensure db migrations have been run

## 3.0.0-beta.3 - 2018.03.14
### Added
* Added a migration for older Craft 2.x sites that had SEOmatic installed already, so that SEOmatic for Craft 3 can install its base tables

### Changed
* Fixed an issue with an incorrect redirect destination after saving a Tracking Scripts setting in the AdminCP
* Optimized the images used in the documentation

## 3.0.0-beta.2 - 2018.03.13
### Changed
* Fixed issues with `: void` on PHP 7.0.x

## 3.0.0-beta.1 - 2018.03.13
### Added
* Initial beta release
