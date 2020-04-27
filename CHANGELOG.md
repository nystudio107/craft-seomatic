# SEOmatic Changelog

## 3.3.0 - 2020.04.20
### Added
* Added a new searchable Schema UI selector for finding Main Entity of Page types quickly
* Added support for importing SEO meta info into SEOmatic via FeedMe
* Added a validator for the `Duration` schema.org type
* Added a “Include Paginated `hreflang` Tags” setting
* Added a **Submit Sitemap Changes** plugin setting
* Added emoji support for Sections

### Changed
* The MetaLink error `...did not render because it is missing attributes` is no longer render as an error, but rather via the `info` log level, with `WARNING - ` proceeding it
* You can now pass in `@type` or `type` for the schema type

### Fixed
* If a page has a `robots` tag that marks it as `noindex` or `none`, don't include a canonical URL
* No longer delete caches  in response to `TemplateCaches::EVENT_AFTER_DELETE_CACHES`
* Fixed an issue where SEO previews could have the wrong URLs for multi-site setups

### Security
* Fixed a regression where malformed data passed to the metacontainers controller could result in SSTI which leads to information disclosure

## 3.2.51 - 2020.04.06
### Added
* Updated to [Schema.org 7.0.3](https://schema.org/version/7.03/schema-all.html) including [SpecialAnnouncement](https://webmasters.googleblog.com/2020/04/highlight-covid-19-announcements-search.html) and other types/changes to handle the COVID-19 crisis
* Added several optional properties to the [Event](https://developers.google.com/search/docs/data-types/event) schema.org type: `eventStatus`, `eventAttendanceMode`, and `previousStartDate`
* Included the `extension` schema.org types as well as `core` schema.org types
* Added `eventAttendanceMode` and `eventStatus` with defaults to the Event JSON-LD

## 3.2.50 - 2020.04.02
### Fixed
* Fixed an issue that appears to be a regression in Yii2, which would cause the Opening Hours to be unable to be saved
* Fixed an issue with the **Site URL Override** feature that could result in a malformed URL

### Changed
* Updated to latest npm dependencies via `npm audit fix` for both the primary app and the docs
* Have the SEO Preview displayed URL reflect the **Site URL Override**

## 3.2.49 - 2020.03.24
### Added
* Aliases will now auto-suggest in the Site URL Override settings field
* SEOmatic now will replace any stripped HTML tags with a space, so that the text is more readable

### Fixed
* The Site URL Override is now parsed for both aliases and environment variables

### Security
* Ensure that URLs are `urldecode`d before attempting to use a RegEx to strip tags from them

## 3.2.48 - 2020.03.18
### Added
* Added batching to sitemap generation so that the memory used is fixed, and no longer dependent on how many sitemap entries are being processed
* Added a `Cache-Control` header of `no-cache, no-store` to the `503` w/`Retry-After` that SEOmatic returns for sitemaps that are still being generated

### Fixed
* Fixed regex in `sanitizeUrl()`

## 3.2.47 - 2020.03.06
### Fixed
* Fixed an issue where hreflang URLs were incorrect if you had different localized URIs per entry
* Take keys into account when comparing defaults with values in SEO Settings fields
* Fixed a regression with the canonical URL when fetched via GraphQL/XHR
* Fixed an issue in which if Globals were used as source to pull from in a multi-site setup, they'd always preview as the default site value

## 3.2.46 - 2020.03.03
### Changed
* Fixed some dates to dateCreated as categories doesn't have postDate

### Security
* Fixed an issue where malformed data passed to the metacontainers controller could result in SSTI which leads to information disclosure

## 3.2.45 - 2020.02.28
### Added
* Added the ability to query by site handle via GraphQL (in addition to `siteId`)

### Changed
* Ensure that the `x-default` `hreflang` is set to the primary site, not just the first site

### Fixed
* Ensure that the GraphQL service has the `invalidateCaches()` method before attempting to call it (it wasn't added until 3.3.12)

## 3.2.44 - 2020.02.24
### Added
* Added the ability to copy any of the SEOmatic settings from one site to another, to make setup easier
* If `robots` is set to `none` in an SEO Settings field, the entry won't appear in the sitemap

### Fixed
* Fixed an issue where if you changed the **Sitemap Limit** to something other than None, then switched it back, you'd get an empty but non-null value for the limit, which didn't play nice with element queries from third party elements
* Preserve numeric `0` values in JSON-LD properties

### Security
* Don't include headers for any response code >= 400
* Remove any Twig tags that somehow are present in the incoming URL

## 3.2.43 - 2020.02.13
### Changed
* Make sure that the `BreadCrumbsList` JSON-LD and `link rel="home"` tags respect the `siteUrlOverride` setting

### Fixed
* Fixed some minor UX spacing issues on Craft CMS 3.4

## 3.2.42 - 2020.02.06
### Added
* Added `seomatic.helper.isPreview` and updated the tracking scripts to utilize it, to handle Craft 3.2 deprecation of `craft.app.request.isLivePreview`
* Added an `account` column to the **Same As URLs** so you can store the social media account (if any) along with the URL
* Added `seomatic.helper.sameAsByHandle(HANDLE)` to retrieve information about one of the **Same As URLs** by handle

### Fixed
* `seomatic:dashboard` permission is now required for the displaying of the Dashboard

## 3.2.41 - 2020.01.29
### Added
* Added the ability for sitemaps to extract images & video from SuperTable fields
* Added the ability for text to be pulled from SuperTable fields for SEO Descriptions, etc.

### Fixed
* Fixed a regression that caused you to no longer be able to put an array of values in the `content` field of an `og:image` tag for multiple OpenGraph images
* Fixed a regression that could cause SEO Settings fields to not propagate images properly

## 3.2.40 - 2020.01.23
### Added
* Added rules to `MetaJsonLd` to allow for mass-setting via `.setAttributes()` of `id`, `type`, and `context`

### Changed
* Eliminated harmless JavaScript errors if a keywords element doesn't exist

### Fixed
* Social Media preview targets are now only added if the element has a `uri` that is not `null`

## 3.2.39 - 2020.01.17
### Added
* SEOmatic will now send back an array of data in the `metaScriptContainer` for GraphQL, etc. so that you can get at both the `script` and `bodyScript` even if `isArray` is false
* When an entry is saved, if the value in an SEO Settings field matches the value in Content SEO for that section, the field is set to an empty value to allow for overriding

### Fixed
* Fixed an issue where you couldn't change the Facebook OpenGraph Type in Content SEO if you had an SEO Settings field added to that section
* SEO Settings fields no longer defaults to whatever the parent element's Content SEO settings, which fixes the override cascade

## 3.2.38 - 2020.01.07
### Changed
* Saving changes to the SEOmatic settings will now also clear the GraphQL caches on Craft 3.3 or later
* SEOmatic now tracks if sitemap jobs are pushed into the queue, and will release old sitemap queue jobs so that they don't stack up

### Fixed
* Fixed an issue where the JavaScript console could have an error logged if there were no keywords
* Make sure `twitter:creator` and `twitter:site` are not resolve as aliases

## 3.2.37 - 2019.12.11
### Security
* Throw an exception if an invalid sort field is passed into the `actionMetaBundles()` controller method, to eliminate a low-impact SQL injection vulnerability

## 3.2.36 - 2019.12.10
### Security
* Fixed a low-impact SQL injection vulnerability

## 3.2.35 - 2019.11.26
### Added
* Added a `siteUrlOverride` config setting for when you need to override the `siteUrl`, for instance in a headless GraphQL or ElementAPI setup

### Changed
* If a `config/seomatic.php` file is present, use that as the source of truth for the `'environment'` setting
* Refactored the plugin settings into separate tabs to make them easier to use

### Fixed
* Removed thousands separator from Product schema

## 3.2.34 - 2019.11.19
### Changed
* Made the `robots` default to an empty value for SEO Settings fields
* Updated the URL for sitemap submissions to the Bing search engine
* URL encode the query part of the sitemap submissions to search engines

## 3.2.33 - 2019.11.11
### Added
* Added `MAX_TEMPLATE_LENGTH` to prevent rendering super large object templates

### Changed
* Renamed several JSON-LD core types that were using reserved PHP 7 class names
* No longer match disabled elements unless we’re previewing

## 3.2.32 - 2019.11.05
### Changed
* Rolled back a change that could cause the CP and site to slow down on uncached requests

## 3.2.31 - 2019.11.04
### Changed
* Fixed the base image transform to be `'position' => null`

## 3.2.30 - 2019.10.31
### Changed
* SEOmatic will now invalidate container caches if they contain pending image transforms
* Enforce the `og:locale` and `og:locale:alternaate` formats of `xx_XX` even for two-character language codes
* Set `'position' => 'null'` for the base image transforms

## 3.2.29 - 2019.10.24
### Changed
* If an section has its robots set to `none` or `noindex` in Content SEO, don't add it to the sitemap index
* Add a **Lowercase Canonical URL** setting to **Plugin Settings**
* Fixed an issue with the `DataType` JSON-LD type
* Cleaned up the GraphQL type generator

## 3.2.28 - 2019.10.08
### Changed
* The sitemaps and sitemap indexes that SEOmatic generates are now automatically minified
* Added native GraphQL support

## 3.2.27 - 2019.09.30
### Changed
* Fixed an issue with breadcrumbs beyond the first one

## 3.2.26 - 2019.09.26
### Changed
* Fixed an issue where SEOmatic would put multiple sitemap entries for recurring Solspace Calendar events
* Removed errant logging in the Content SEO controller
* Fixed an issue where the script tag caches could be outputting something other than a string
* Updated the Breadcrumbs format to match Google's new format requirements
* More specifically list what happens in `local` dev & `staging` environments

## 3.2.25 - 2019.09.18
### Changed
* Fixed an issue where `mainEntityOfPage` overrides via an SEO Settings field could be the wrong model type

## 3.2.24 - 2019.09.09
### Changed
* Fixed a potential XSS issue if you used `{% do seomatic.helper.paginate() %}` and there was a malformed query string
* Replaced frontend api route with an actionUrl()

## 3.2.23 - 2019.09.06
### Changed
* Fixed a typo in the environment info popup
* If the SEO image is not on a local volume, avoid a potentially long round-trip by being paranoid, and defaulting to not generating the image transform immediately

## 3.2.22 - 2019.09.03
### Changed
* Cleaned up the `title` parsing to allow for `siteName` only titles more cleanly
* If the source asset file is missing, set `generateNow` to `false` rather than `null`, overriding `generateTransformsBeforePageLoad`
* Maintain the currently selected site between global nav items in the CP sidebar

## 3.2.21 - 2019.08.26
### Changed
* Fixed an issue where SEOmatic would errantly say the environment was disabled
* Parse the SEOmatic environment variable in the environment check
* Preflight to ensure that the source asset actually exists to avoid Craft hanging
* Fix incorrect event type for `RegisterSitemapUrlsEvent`

## 3.2.20 - 2019.08.16
### Changed
* Added a **Environment** label on the Dashboard, with explanations for why the environment setting is overridden (if it is)

## 3.2.19 - 2019.08.06
### Changed
* Strip the query string at render time for the `canonical` link, to ensure any Craft 3.2 `token` params are stripped

## 3.2.18 - 2019.07.31
### Added
* Added searching, sorting, and pagination to the Content SEO pages

### Changed
* Typecast the `sourceName` and `sourceTemplate` to a string before validation
* Moved over to a more modern tokenfield library for SEO Keywords

## 3.2.17 - 2019.07.25
### Changed
* Typecast the `sourceName` and `sourceTemplate` to a string everywhere, to handle numeric section/template names
* No longer use `error` and `warning` log levels for MetaItem debug messages
* No longer use `error` log levels for MetaTag debug messages

## 3.2.16 - 2019.07.18
### Added
* Added **Social Media Preview Target** plugin setting
* Added `X-Robots-Tag: noindex` header to the sitemaps to prevent the sitemaps themselves from appearing in the SERP

### Changed
* Fixed an issue with the sitemap generation not respecting an already running queue

## 3.2.15 - 2019.07.15
### Changed
* Fixed an issue where assigning a Rich Text field to a JSON-LD property didn't work
* Added typecast behavior to the `MetaBundle` model
* Typecast the `MetaBundle` `sourceName` to a string

## 3.2.14 - 2019.07.12
### Added
* Added to the cache tag dependencies for the Field's preview data
* Added `sourceType` to the `InvalidateContainerCachesEvent` event
* Added `siteId` and `sourceType` to the source cache tag dependencies

### Changed
* Prevented public accessing of the Social Media Preview
* Added a 📣 in front of the Social Media Preview

## 3.2.13 - 2019.07.11
### Added
* Added **Social Media Preview** as a Live Preview target on Craft 3.2 or later

## 3.2.12 - 2019.07.10
### Changed
* Do not invalidate meta bundle for drafts and revisions in Craft 3.2 or later

## 3.2.11 - 2019.07.09
### Changed
* If an entry has its robots set to `none` or `noindex`, don't add it to the sitemap
* Only append `mtime` to an SEO image if there are no query params already

## 3.2.10 - 2019.06.27
### Added
* The generated JSON-LD now uses a single root JSON-LD object with the JSON-LD types included in the `@graph` array

### Changed
* Fixed an issue where headers were sent when the corresponding tags were not present
* Fixed an issue that caused SEOmatic to throw an error after you deleted a Solspace Calender calendar
* If we're not in local dev, tell it to generate the transform immediately so that urls like `actions/assets/generate-transform` don't get cached
* Add an `mtime` cache busting URL param to all social media images
* The Facebook and Twitter Transform and Transform Mode settings are now visible even if "Same As SEO Image" is selected

## 3.2.9 - 2019.06.13
### Changed
* Fixed an issue where the built JS bundles would error inside of webpack

## 3.2.8 - 2019.06.13
### Changed
* Switched over to `startDateLocalized` & `endDateLocalized` for Solspace Calendar defaults
* Fixed an issue with the Breadcrumbs JSON-LD not being generated properly for sites that has a path as part of their URL (e.g. `example.com/us/`)
* Handle an edge-case where a migration didn't work properly to add `ADS_TXT_HANDLE`
* Fixed an issue where an error would be thrown if a new Section was created, and you had a site group that had no sites in it
* Fixed an issue where the SEOmatic CSS was affecting the CP CSS
* Fixed the **Look up Latitude/Longitude** button; it now opens [www.latlong.net](https://www.latlong.net/convert-address-to-lat-long.html) because Google requires an API key now

## 3.2.7 - 2019.06.03
### Changed
* Added the ability to pass in `asArray` as a parameter for CraftQL queries to a JSON-encoded array of data back
* Updated build system

## 3.2.6 - 2019.05.29
### Changed
* Updated to [schema.org 3.6](http://schema.org/version/3.6/) with over 900 JSON-LD Structured Data schemas!

## 3.2.5 - 2019.05.29
### Changed
* Added `FAQPage` schema type from [schema.org](https://schema.org/FAQPage)
* Ensure that URLs with spaces or other non-RFC1738 compliant characters are encoded
* Replace "steps" by "step" in HowTo JSON-LD
* Changed `copyrightYear` to output just the year
* Fixed an issue with the JavaScript bundle not instantiating for SEO Settings fields
* Updated to latest npm deps

## 3.2.4 - 2019.05.24
### Changed
* Fixed a typecasting issue that caused `link rel="alternate"` to render for entries that were disabled for a particular site
* Remove pagination via query string for `link rel="alternate"`
* Remove the pointless `Twig_Node_Expression_EmptyCoalesce` class

## 3.2.3 - 2019.05.22
### Changed
* Fixed an issue where the new SEO Settings Field implementation could cause images to be duplicated
* Fixed an issue where JSON-LD schema could not be properly overridden via an SEO Settings field
* Fixed an issue where the dynamically populated schema menu would have improper padding in the `value`s

## 3.2.2 - 2019.05.21
### Changed
* Fixed an issue where a Section with no elements in it could cause the Sitemaps queue job to stall
* Fixed Slack & Discord “summary card” CSS

## 3.2.1 - 2019.05.21
### Changed
* Fixed an issue where the Site Setup checklist wasn't accurately reflecting the site settings
* Fixed an issue where trying to create a new section would throw a Type Error, preventing you from doing so

## 3.2.0 - 2019.05.20
### Added
* Added SEO Previews for LinkedIn, Pinterest, Slack, and Discord
* Added the ability to control what SEO Previews appear in the sidebar
* Added CraftQL support for fetching SEOmatic container meta data
* Added support for Solspace Calendar events for custom metadata, JSON-LD, etc.
* SEO Settings fields now default to whatever the parent element's Content SEO settings are when instantiating it
* The Dashboard setup checklists now display checkboxes for items have have been set up properly
* Added a `SeoElementInterface` to abstract out the support for custom elements

### Changed
* Changed paginated `rel="alternate"` URLs to always point to the first page in other languages, not the paginated page (that may or may not exist)
* Fixed an issue in `getLocalizedUrls()` so that it handles `getElementUriForSite()` returning both `null` and `false`
* If a meta value with the key of `target` (used for schema.org `SearchAction`s) doesn't have a `{` as the first character, it is not parsed as Twig
* Fixed an issue where environment variables in tracking scripts were not parsed

## 3.1.50 - 2019.04.30
### Added
* Added the `???` Empty Coalesce operator to allow for the easy cascading of default text/image SEO values

### Changed
* Fix the `addXDefaultHrefLang` so it doesn’t throw an error if enabled

## 3.1.49 - 2019.04.22
### Changed
* Don't create `rel=alternate` links for sections that aren't enabled for a site
* Added a new `addXDefaultHrefLang` setting (which defaults to `true`) to control whether the `x-default` `hreflang` tag is included
* Updated Twig namespacing to be compliant with deprecated class aliases in 2.7.x
* Changed the default Google Tag Manager data layer variable back to the default `dataLayer` (which it should have been all along)
* Fixed `SoftwareApplication` JSON-LD object model

## 3.1.48 - 2019.04.16
### Changed
* Added `/cache/` to the default paths excluded in `robots.txt` to auto-exclude the default Blitz `/cache/blitz/` path
* SEOmatic now throws a `AddDynamicMetaEvent` event to give modules/plugins a chance to add any dynamic meta items to SEOmatic's containers
* SEOmatic now throws a `InvalidateContainerCachesEvent` event whenever it clears its meta container caches, so other plugins/modules can listen in for it
* No longer regenerate sitemaps when a Section is edited and `'regenerateSitemapsAutomatically' => false`
* Update the display name of sections, category groups, and products in Content SEO when they are edited

## 3.1.47 - 2019.04.02
### Changed
* Added `Environment::determineEnvironment()` so SEOmatic is can be smarter about automatically mapping environments
* Allow the **SEOmatic Environment** plugin setting to be an Environment Variable in Craft 3.1 or higher
 * Allow for Section handles that are longer than 64 characters
 * Fixed an issue where the `mainEntityOfPage` could reset to the default `WebPage` if you saved the settings on panes other than General
 * Fixed an issue with paginated `rel="alternate"` links on a multi-site setup where the slugs differed from site to site
 
## 3.1.46 - 2019.03.15
### Changed
* Use dash instead of underscore for sitemap urls
* Don't allow editing of the plugin settings if `allowAdminChanges` is false
* Sort Content SEO listings by name to make things easier to find
* Add missing properties to the `Question` JSON-LD schema

## 3.1.45 - 2019.03.04
### Changed
* Fixed an issue where `container.clearCache` wasn't using the correct cache key to invalidate the cache
* Fixed an issue where Google Tag Manager would render in Live Preview
* Added try/catch around alias/parseEnv to try to catch errors that shouldn't happen

## 3.1.44 - 2019.02.18
### Changed
* Fixed an issue with the URL in the sitemap index to the custom sitemap was invalid
* Fixed an issue when using the meta containers controller with tracking scripts `and asArray=true`

## 3.1.43 - 2019.02.15
### Changed
* Fixed an issue in Content SEO if no field layouts are yet defined
* Fixed a regression where pagination info is stripped from hreflang
* Add `JSON_HEX_TAG` flag for encoding JSON-LD to ensure that `<` & `>` are escaped
* Addressed an issue where you couldn't set the Main Entity of Page to nothing in Content SEO settings

## 3.1.42 - 2019.02.07
### Changed
* Fixed an issue where `.env` vars were not actually parsed for the Tracking settings

## 3.1.41 - 2019.02.07
### Changed
* If you're using Craft 3.1, SEOmatic variables/fields are parsed for [environment variables](https://docs.craftcms.com/v3/config/environments.html#control-panel-settings) as well as aliases
* All tracking fields auto-complete `.env` [environment variables](https://docs.craftcms.com/v3/config/environments.html#control-panel-settings)

## 3.1.40 - 2019.01.30
### Changed
* Fixed an issue with sitemap generation if your Section had a Neo field in it
* Fixed an issue if you passed in no parameters to `seomatic.helper.getLocalizedUrls()` could cause the incorrect localized URLs to be returned
* Removed errant error logging

## 3.1.39 - 2019.01.24
### Added
* Added a SEO Setup checklist to the Dashboard
* Added support for pulling content from [Neo](https://github.com/spicywebau/craft-neo) fields

### Changed
* Fixed an issue where the generated `hreflang` URLs were wrong if you had localized slugs
* Sitemaps now return a 503 Service Unavailable an a `Retry-After` so bots will try back later if for some reason they can't be rendered for the current request (Async Queue generation, etc.)
* Fixed a namespacing issue with `UrlHelper`
* Handle the case where no sections have been set up yet more gracefully

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
