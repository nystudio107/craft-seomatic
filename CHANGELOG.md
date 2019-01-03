# SEOmatic Changelog

## 3.1.38 - 2019.01.03
### Changed
* Register cache options for every type of request
* Refactored the sitemaps and sitemap indexes to always be in the server root, as per the [sitemaps spec](https://www.sitemaps.org/protocol.html#location)

## 3.1.37 - 2018.12.19
### Changed
* Ensure that title truncation handles edge cases gracefully
* Breadcrumbs in the CP now maintain the selected site
* Parse sitemaps and sitemap URLs for aliases and as Twig templates
* Don't try to add assets with null URLs to sitemaps

## 3.1.36 - 2018.12.10
### Added
* Added the ability to add additional sitemaps that exist out of the CMS into the `sitemap.xml` via Site Settings -> Sitemap as well as via plugin

### Changed
* Fixed an issue where `LocalBusiness` JSON-LD type didn't inherit all of the properties from `Place` that it should
* Fixed an issue with `seomatic.helper.getLocalizedUrls` not working as expected for routes other than the current request
* Fixed an issue where plugin-generated custom sitemap URLs didn't have their `lastmod` respected for the sitemap index
* Fixed an issue accessing `metaBundleSettings` in the Field when it doesn't exist

## 3.1.35 - 2018.12.03
### Changed
* Fixed an issue where the `potentialAction` JSON-LD for the Site Links Search was rendered even if it was left empty
* Fixed an issue where the SEO Settings field did not properly override the `mainEntityOfPage`

## 3.1.34 - 2018.11.28
### Added
* Added a level 2 cache on the controller-based API requests for meta containers to improve "headless" performance
* Added support for LinkedIn Insight analytics in Tracking Scripts
* Added support for HubSpot analytics in Tracking Scripts
* Display the status of tracking scripts in the listing section
* Allow editing of the tracking scripts body scripts

### Changed
* Added the Open Graph tag `og:site_name`
* Removed `craftcms/vue-asset` composer dependency
* Call `App::maxPowerCaptain()` whenever a queue is manually run (both via web and console request)

## 3.1.33 - 2018.11.22
### Changed
* Fixed an issue with socialTransform() throwing a Twig exception

## 3.1.32 - 2018.11.19
### Added
* Added `<title>` prefixes for the Control Panel and `devMode` Control Panel
* Allow social media images to be either `.jpg` or `.png` formats

## 3.1.31 - 2018.11.18
### Added
* Added a console command `./craft seomatic/sitemap/generate` to generate sitemaps via the CLI
* Added the SEOmatic->Plugin setting **Regenerate Sitemaps Automatically** to control the automatic regenerate of sitemaps

### Changed
* Fix division by zero error if no sections exist
* Dynamically base the Twitter transform type from the current evaluated type, rather than hardcoding it

## 3.1.30 - 2018.11.13
### Added
* Added support for the [ads.txt](https://iabtechlab.com/ads-txt/) Authorized Digital Sellers standard

### Changed
* Clear FastCGI Caches upon sitemap generation
* If `runQueueAutomatically` is `true` return the generated sitemap immediately via http request
* Adjusted Control Panel dashboard charts
* Fixed an issue where the Content SEO settings would display sections that are not enabled for a given site

## 3.1.29 - 2018.11.11
### Changed
* Added the ability to show SEO Settings fields in the Element Index's Table Columns
* Redid the Dashboard graphs to be more useful and modern looking
* Modernized package.json and webpack build
* Confetti on install (yay!)

## 3.1.28 - 2018.11.07
### Changed
* Remove `__home__` from preview URIs
* Fixed a regression that caused the SEO Settings field to not override things like Facebook/Twitter images properly
* Fixed an issue that caused the SEO Settings field to not display tabs properly if the General tab was hidden

## 3.1.27 - 2018.11.07
### Changed
* Fixed an issue where sitemaps generated in the Control Panel did not have the proper cache duration set, so they were always invalidated
* Disabled tracking scripts from sending Page View data during Live Preview
* Ensure background image values are quoted for the SEO previews
* If `runQueueAutomatically` is set, start running the queue job to generate the sitemap immediately

## 3.1.26 - 2018.11.05
### Changed
* Don't regenerate the sitemaps when elements are being re-saved enmasse via Section resaving
* Fixed JavaScript console error due to outdated assets build

## 3.1.25 - 2018.11.05
### Added
* Moved sitemap generation to a queue job, to allow for very large sitemaps to be generated without timing out

### Changed
* Normalize the incoming URI to account for `__home__`

## 3.1.24 - 2018.11.02
### Added
* Added the ability to control the depth that sitemaps should be generated for Categories (just like already existed for Structures)
* Added `EVENT_INCLUDE_CONTAINER` event to manipulate containers
* Always create sitemap URLs from the given site, since they have to have the same origin
* Added labels to the Google, Twitter, and Facebook previews

### Changed
* Fix rendering for MetaLink and MetaTag with multiple tags when requesting them via Controller
* Fixed an issue where SEO Settings fields would override the Sitemap settings even if that was disabled
* Fixed an issue with the SEO Settings field when switching between Entry Types
* Pass down the `$uri` and `$siteId` to `addDynamicMetaToContainers()` to `addMetaLinkHrefLang()`
* Fix rendering of canonical and home links from Controllers
* Fixed an issue with there Dashboard charts could be out of sync if sections were deleted/renamed
* Use the default transform mechanism for SEO images
* Only include the fields the user is allowed to edit in the SEO Settings overrides
* Fixed an issue where Twitter images could be resized improperly based on the card type

## 3.1.23 - 2018.10.15
### Changed
* Returns the correct `sitemap.xml` for multi-site "sister site" groups
* Cache frontend templates on a per-site basis
* Make sure that `humans.txt` links are full URLs
* Handle the case where all **Same As** URLs are deleted
* Fixed an issue where `hreflang` tags were still added even with the setting was disabled, but only for paginated entries
* Changed the default `title` length to `70` and the default `description` length to `155`
* Fixed an issue where nested JSON-LD objects would contain erroneous `key` and `include` properties

## 3.1.22 - 2018.09.25
### Changed
* Fixed an issue where choosing **All** for sitemap **Structure Depth** resulted in it displaying nothing
* Fixed an issue with the SiteLinks Search Box not having the correct format in `query-input`
* Fixed an issue where Craft could sometimes hang if we asked for an image transform with `generateNow` = `true`

## 3.1.21 - 2018.09.18
### Added
* Added the `.clearCache` property to all meta containers, allowing them to be manually cleared via Twig
* Don't include any dynamic metadata for response codes `>= 400`

### Changed
* SEOmatic will now automatically take the `dataLayer` property into account for the script container's cache key
* Better document titles for SEOmatic Control Panel pages
* Remove vestigial Redirects classes
* Don't check the response `statusCode` for console requests

## 3.1.20 - 2018.09.12
### Added
* Added  memoization cache to the FieldHelper class to help improve inner loop performance
* Add the ability to control structure depth for sitemaps

### Changed
* For requests with a status code of >= 400, use one cache key

## 3.1.19 - 2018.09.04
### Changed
* Changed the Composer dependency for `davechild/textstatistics` to lock it down to `1.0.2` [Semver?](https://github.com/DaveChild/Text-Statistics/issues/48)

## 3.1.18.1 - 2018.08.30
### Changed
* Fixed an `undefined index` error

## 3.1.18 - 2018.08.30
### Added
* Added the **Site Groups define logically separate sites** Plugin Setting to allow for different Site Group use-cases

### Changed
* Removed potential duplicates from `og:locale:alternate`
* Don't include `alternate` or `og:locale:alternate` tags for Content SEO sections that have Sitemaps disabled
* Handle disabled sections for sites in Content SEO better

## 3.1.17 - 2018.08.29
### Changed
* Fixed an error trying to access a property of a non-object in MetaContainers.php
* Prevent classname conflict with older versions of PHP
* Fix an issue where transform modes didn't work with Custom Image sources
* Scale the `logo` to fit to 600x60 as per [Google specs](https://developers.google.com/search/docs/data-types/article#amp_logo_guidelines)

## 3.1.16 - 2018.08.23
### Changed
* Handle elements that don't exist on other sites better
* Don't include hreflang in sitemaps for sites where it has been disabled, whether through Content SEO or SEO Settings field settings
* Hide Transform Image and Transform Type in the SEO Settings field if they aren't enabled
* Fixed a conflicting use \craft\helpers\Json import

## 3.1.15 - 2018.08.16
### Changed
* Fixed an issue where sitemap caches were not getting properly cleared
* Fixed an issue where elements disabled in a site were showing up in the `hreflang`
* Fixed namespaces and custom sitemap event triggering

## 3.1.14 - 2018.08.14
### Added
* Added in the ability to override sitemap settings on a per-Entry/Category Group/Product basis
* Implement `Json::decode()` to avoid large integers being converted to floats
* If the SEO Settings field for an entry has **Robots** set to `none` or has sitemaps disabled, it isn't included in the `hreflang`
* Added a setting to control whether `hreflang` tags are automatically added

### Changed
* Ensure that the sitemap index cache gets invalidated when entries are modified
* Specify `rel="noopener"` for external links.
* Fix the order that the field migration happens to let the mapping magic happen
* SEOmatic now requires Craft CMS 3.0.20 or later
* Fixed an issue with paginated pages that have no results on them

## 3.1.13.1 - 2018.08.07
### Changed
* Fixed a potential `undefined index` error with pull fields, resulting from the new cropping modes

## 3.1.13 - 2018.08.07
### Added
* Added the ability to choose between **Crop** (the default), **Fit**, or **Stretch** for the SEO, Twitter, and Facebook image transforms

### Changed
* Brought back the missing ** Transform Facebook OpenGraph Image** field
* Don't do anything with pagination on console requests

## 3.1.12 - 2018.08.06
### Changed
* Make the base `Container` class extend `FluentModel` so that containers can be accessed via templates just like MetaTags are
* Ensure that we check to see if a container's `include` property is set before rendering it
* Use a unique cache key for everything for the request, including the pagination and URI
* Prep script containers for inclusion in `includeScriptBodyHtml()`

## 3.1.11 - 2018.08.05
### Changed
* Fixed a regression that caused an error loading entries

## 3.1.10 - 2018.08.05
### Changed
* Cleaned up how the pagination cache key works
* Add the current request path into the mix for the meta container cache key
* Force social media values to be displayed as strings

## 3.1.9 - 2018.08.04
### Changed
* Fixed an issue where SEOmatic wouldn't find Entry metadata if the entry was first saved as a Draft, then published
* Include the pagination page in the cache key to ensure paginated pages are uniquely cached

## 3.1.8 - 2018.08.03
### Changed
* Fixed a regression that caused you to be unable to save **Custom URL** for an image source in the Control Panel

## 3.1.7 - 2018.08.02
### Changed
* Fixed an issue where Content SEO permissions were not respected properly in the Control Panel
* Display the Tracking Scripts status in the Control Panel regardless of `devMode` setting

### Added
* Don't render a canonical url for http status codes >= 400
* Set meta robots tag to `none` for http status codes >= 400

### Security
* Decode HTML entities, then strip tags in `safeCanonicalUrl()`

## 3.1.6 - 2018.07.25
### Changed
* Really ensure that paginated pages are cached separately in the second-level cache

## 3.1.5 - 2018.07.24
### Changed
* No longer include any matched element in the Content SEO previews (which can be confusing if there are SEO Settings field overrides)
* Ensure that paginated pages are cached separately in the second-level cache
* Fixed an issue where changes to the SEO Image would not propagate to the Facebook/Twitter image when changed if "Same as SEO Image" was set

## 3.1.4 - 2018.07.23 [CRITICAL]
### Security
* Changed the way requests that don't match any elements generate the `canonicalUrl`, to avoid potentially executing injected Twig code

## 3.1.3 - 2018.07.20
### Added
* Added **Additional Sitemap URLs** to Site Settings -> Miscellaneous for custom sitemap URLs 
* Added `EVENT_REGISTER_SITEMAP_URLS` event so plugins can register custom sitemap URLs 
* Added the `Referrer-Policy` header based on the value of the `referrer` tag
* Added the ability to control whether any http response headers are added by SEOmatic
* Added the Facebook OpenGraph tags `og:image:width` & `og:image:height`
* Added the Twitter card tags `twitter:image:width` & `twitter:image:height`

### Changed
* Clear SEOmatic caches after saving the plugin settings
* Fixed an issue where boolean settings in meta containers that were set to false would not override as expected

## 3.1.2 - 2018.07.17
### Changed
* Fixed an issue with the language being set to `en_US` instead of `en-US` in `getLocalizedUrls()`

## 3.1.1 - 2018.07.14
### Changed
* Fix parsing logic error in `MetaValue`
* Fixed an issue where the SiteLinks Search Box wouldn't work because it errantly parsed the setting as Twig
* Better title for pull field dropdown menus
* Fix potential preview issues in Content SEO for certain multi-site setups

## 3.1.0 - 2018.07.11
### Added
* Added full support for Craft Commerce 2
* Added a caching layer to `includeMetaContainers()` for improved performance
* Added more fine-grained profiling data
* Re-organized how event handlers are loaded to allow for compatibility with Fallback Site plugin

### Changed
* Canonical URLs are now always lower-cased, and made absolute
* Fixed an issue where the SiteLinks Search Box wouldn't work because it errantly parsed the setting as Twig
* Allow for default empty settings for the SEO Settings field for things like the Twitter Card type, etc.
* Added a warning to let people know tracking scripts are disabled when `devMode` is on
* Fixed an issue with JSON-LD dropping certain properties if non-default types were selected

## 3.0.25 - 2018.07.03
### Changed
* Strip tags from the incoming `craft.app.request.pathInfo` for the `canonicalUrl`
* Fixed the breadcrumbs link on the Plugin Settings page
* Fixed an issue where users without admin privileges could not save the SEOmatic Plugin Settings
* Fixed an issue where category groups would be lumped together in the sitemap
* Fixed an issue with og:locale and og:locale:alternate being improperly formatted

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
* Fixed a regression that caused per-environment settings to be applied in the Control Panel
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
* Fixed an issue where re-using the same Field handle from other Field types would cause an exception to be thrown in the Control Panel
* Improved the way SEOmatic matches the current element
* Bypass the data cache entirely in the Control Panel, to avoid refresh issues
* Fixed an issue where sometimes the correct data is not what is previewed in the Control Panel
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
* Removed caching from Control Panel requests, which fixes improperly displayed social media previews
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
* Clicking on Settings on from the Control Panel now redirects to the appropriate SEOmatic sub-nav

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
* Added `Schema` helper class & controller in preparation for dynamic schema types displayed in the Control Panel

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
* Fixed an issue with an incorrect redirect destination after saving a Tracking Scripts setting in the Control Panel
* Optimized the images used in the documentation

## 3.0.0-beta.2 - 2018.03.13
### Changed
* Fixed issues with `: void` on PHP 7.0.x

## 3.0.0-beta.1 - 2018.03.13
### Added
* Initial beta release
