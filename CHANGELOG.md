# SEOmatic Changelog

## 3.0.25 - 2018.07.03
### Changed
* Strip tags from the incoming `craft.app.request.pathInfo` for the `canonicalUrl`
* Fixed the breadcrumbs link on the Plugin Settings page
* Fixed an issue where users without admin privileges could not save the SEOmatic Plugin Settings
* Fixed an issue where category groups would be lumped together in the sitemap

## 3.0.24 - 2018.06.25
### Added
* Allow the use of Emoji in the plugin settings, such as for the `devMode` title prefix

### Changed
* Set the default devMode title prefix to 🚧 
* Sync section / category group handles that are renamed
* Don't log meta item error messages unless `devMode` is on
* Don’t encode preview URLs
* Fixed an issue where disabling a section’s URLs was not sync properly with the Content SEO settings

## 3.0.23 - 2018.06.18
### Added
* Added support for emojis in any of the SEOmatic fields

### Changed
* Fixed an issue introduced in Craft CMS 3.0.10 that would cause JSON-LD to be not fully rendered
* Allow nothing (`--`) to be selected as a Source Field in the Image/Video Sitemap fields
* Added cache busting to the SEO preview images so that they will always display the latest image
* Fixed an issue where removing an SEO Image from an SEO Settings field would cause it to persist

## 3.0.22 - 2018.06.12
### Changed
* Remove default value for devMode Prefix that prevented it from saving an empty value
* Fix default values for Title position, Twitter Title position, and OG Title position
* Allow for the setting of the `dataLayer` via Twig for Google Tag Manager
* Added pagination support via `seomatic.helper.paginate()` to properly set the paginated `canonicalUrl` as well as the `<link rel='prev'>` and `<link rel='next'>` tags
* Preserve the pagination trigger query string for the `<link rel='hreflang'>` tags

## 3.0.21 - 2018.06.01
### Changed
* Fixed `ContactPoint` rendering
* Fixed an issue where an array of one JSON-LD would not render
* Make JSON-LD URLs fully qualified

## 3.0.20 - 2018.05.31
### Changed
* Make sure `twitter:creator` and `twitter:site` are not resolve as aliases
* Fixed an issue where `syncBundleWithConfig` could return `null`
* Preserve the FrontendTemplate settings during meta bundle updates

## 3.0.19 - 2018.05.21
### Changed
* Ensure that the previews are not double-encoded
* Remove vestigial meta bundles from the sitemap index

## 3.0.18 - 2018.05.20
### Changed
* Fixed an issue where the JSON-LD types weren’t correct
* Sync bundle when Global SEO, Content SEO, and Site Settings are changed
* Ensure that the first character of each meta item key is lower-cased
* Render JSON-LD properties that have an `@id` set

## 3.0.17 - 2018.05.19
### Changed
* Make the various `seomatic.helper` functions more tolerant about having `null` passed in as a parameter

## 3.0.16 - 2018.05.18
### Changed
* Fixed a regression that the `rel="alternate"` link tags to not render properly 
* Fixed a regression where the Site Settings would throw an exception

## 3.0.15 - 2018.05.17
### Changed
* Fixed a regression that caused per-environment settings to be applied in the AdminCP
* Fixed an issue that caused `seomatic.xxx.get()` to not return `null` if no matching item was found

## 3.0.14 - 2018.05.17
### Changed
* Ensure that any image or video URLs in the sitemap are full absolute URLs
* Fixed multiple issues with the `gtag.js` script that prevented it from working properly
* HTML-encode all URLs and user-enterable data in the sitemaps and sitemap indexes
* Fixed an issue where the meta items are not indexed properly, causing you to be unable to get them from the Twig API
* Fixed an issue where meta items that should have been excluded by environment were not

## 3.0.13 - 2018.05.15
### Changed
* Fixed an issue where the `gtag` body script did not properly render
* Fixed an issue where empty results for pull fields would not fall back on the parent (usually global) settings
* Fixed an issue where `seomatic.helper.loadMetadataForUri()` might not replace the container metadata properly

## 3.0.12 - 2018.05.10
### Changed
* Switch from `.one()` syntax to `[0]` to account for eager loading of transformed social media images
* Fixed an issue where SEOmatic incorrectly showed how many categories were in a category group on the Content SEO page
* Fixed an issue where Content SEO social images wouldn't fall back on the global images if they were set to "Same as SEO Image" and the SEO Image was empty
* Fixed a typo in the SEO Settings field settings
* SEOmatic no longer renders the `rel="author"` tag if you have `humans.txt` disabled

### Added
* Added translations for the SEO Settings Field options

## 3.0.11 - 2018.05.03
### Changed
* Removed `'interlace' => 'line'` from the social media transforms, which inexplicably caused Focal Points to not be used
* Fixed an issue where the JSON-LD would not fully render due to a regression

## 3.0.10 - 2018.05.02
### Changed
* Fixed incorrect social media permissions that prevented access to that settings page
* Fixed an issue where `section` meta bundles would be improperly marked as `field` due to a regression in the migration importing code
* Fixed an issue where `categoryGroup` meta bundles would be improperly marked as `field` due to a regression in the migration importing code
* Removed OpenGraph tag dependency on `facebookProfileId` or `facebookAppId` being present
* Fixed Pinterest verification tag dependency
* Bumped the schemaVersion

### Added
* Added a migration to remove any errant `seomatic_metabundles` rows that have `sourceBundleType` set to `field`

## 3.0.9 - 2018.05.01
### Changed
* Fixed an issue when migrating data from Craft 2.x `Seomatic_Meta` fields and an Asset was set to "Custom"

## 3.0.8 - 2018.04.30
### Changed
* Removed excessive validation that was causing SEOmatic Fields to not save properly

## 3.0.7 - 2018.04.30
### Changed
* Fixed a regression that caused SEOmatic to not import data from old Craft 2.x `Seomatic_Meta` fields properly

## 3.0.6 - 2018.04.30
### Changed
* Fixed a regression that caused the Section meta bundles to be the wrong type

## 3.0.5 - 2018.04.27
### Changed
* Better instructions for the **Canonical URL**
* Updated translations
* Use correct `sourceBundleType` for Field meta bundles
* Fixed a regression that caused Content SEO sections to not save properly

## 3.0.4 - 2018.04.26
### Changed
* Don't display Sections / Category Groups in Content SEO that no longer have public URLs
* Fixed an issue with console requests
* Fixed an issue where Sections and Category groups with the same `handle` didn't work right in Content SEO
* More validation on the data passed into the SEO Settings field as a config array

## 3.0.3 - 2018.04.25
### Changed
* Fixed an issue where re-using the same Field handle from other Field types would cause an exception to be thrown in the AdminCP
* Improved the way SEOmatic matches the current element
* Bypass the data cache entirely in the AdminCP, to avoid refresh issues
* Fixed an issue where sometimes the correct data is not what is previewed in the AdminCP
* Fixed an issue where the `canonicalUrl` seemed immutable on the Global SEO pages

## 3.0.2 - 2018.04.24
### Added
* `og:image` tags are now validated to ensure they are fully qualified URLs
* `og:image` tags now are converted to absolute URLs (to handle protocol-less URLs)
* `twitter:image` tags are now validated to ensure they are fully qualified URLs
* `twitter:image` tags now are converted to absolute URLs (to handle protocol-less URLs)
* Added missing translations

### Changed
* Fixed an issue where Tracking Scripts permissions weren't all propertly presented

## 3.0.1 - 2018.04.20
### Changed
* Fixed an issue with sitemap indexes for elements that have null URLs
* Fixed an issue with permissions and the Tracking Scripts page

## 3.0.0 - 2018.04.17
### Added
* Official GA release

## 3.0.0-beta.24 - 2018.04.17
### Changed
* Fixed a regression that caused the Site switcher to no longer work in the SEOmatic settings
* Fixed a regression that could cause the sitemap index to include the appropriate sections

## 3.0.0-beta.23 - 2018.04.16
### Changed
* Fixed an issue where the social transforms sometimes might not render properly
* SEOmatic now requires Craft CMS 3.0.2 or later (so we can listen to `TemplateCaches::EVENT_AFTER_DELETE_CACHES`)
* Handle Section or Category Groups that may have had their handles renamed

### Added
* SEOmatic now clears its caches any time `TemplateCaches::EVENT_AFTER_DELETE_CACHES` is triggered
* If the FastcgiCacheBust plugins is installed, clear its caches when SEOmatic clears its own caches

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
