# SEOmatic Changelog

## 4.1.5 - 2024.10.21
### Fixed
* Fixed `togImageField` field typo in the FeedMe integration ([#1520](https://github.com/nystudio107/craft-seomatic/issues/1520))
* Fixed a field mapping issue for fields in the FeedMe integration ([#1520](https://github.com/nystudio107/craft-seomatic/issues/1520))

## 4.1.4 - 2024.09.29
### Fixed
* Normalize the incoming `url` and `path` so that `mergUrlWithPath()` handles edge-cases properly ([#1512](https://github.com/nystudio107/craft-seomatic/issues/1512))
* Fixed an issue where the `ads.txt` wasn't renamed properly when requested via GraphQL ([#1513](https://github.com/nystudio107/craft-seomatic/issues/1513))
* Fixed an exception caused by the wrong argument passed to `Asset::getAssetById()` in edge cases ([#1515](https://github.com/nystudio107/craft-seomatic/issues/1515))
* Removed vestigial sitemap rendering code in `SitemapTemplate` that had a code path that had a code path that could return a `503` ([#1437](https://github.com/nystudio107/craft-seomatic/issues/1437))

## 4.1.3 - 2024.09.10
### Changed
* Make the Content SEO listings better at eliminating duplicates by pruning sections that no longer exist ([#1499](https://github.com/nystudio107/craft-seomatic/issues/1499))
* Fixed an issue where a section with a `typeId` of `0` wouldn't validate, and thus the changes to the Content SEO settings would not validate & save ([#1510](https://github.com/nystudio107/craft-seomatic/issues/1510))
* Fixed an issue where the homepage metacontainer cache did not get properly cleared ([#1514](https://github.com/nystudio107/craft-seomatic/issues/1514))

## 4.1.2 - 2024.08.15
### Changed
* Made the SEO preview sidebar UI more consistent with Craft ([#1497](https://github.com/nystudio107/craft-seomatic/pull/1497))

### Fixed
* Fixed an issue where GraphQL or Meta Container endpoint requests that had a token set were not being caches separately
* Also add any `token` to the meta container cache key for regular requests
* Fixed an issue where using "Single Page" for the **Sitemap Page Size** setting would cause an exception to be thrown when generating the sitemap ([#1498](https://github.com/nystudio107/craft-seomatic/issues/1498))

## 4.1.1 - 2024.07.19
### Changed
* Renamed the **Regenerate Sitemaps Automatically** setting to **Invalidate Sitemap Caches Automatically** for clarity

### Fixed
* Fixed an issue where getting the sitemaps via GraphQL and meta container endpoint only retrieved the first page since the switch to paginated sitemaps ([#1492](https://github.com/nystudio107/craft-seomatic/issues/1492))
* Fixed an issue where saving an entry could be slow, because SEOmatic was pointlessly trying to regenerate the sitemap cache (which is no longer a thing with paginated sitemaps) ([#1494](https://github.com/nystudio107/craft-seomatic/issues/1494))

## 4.1.0 - 2024.07.12
### Added
* Remove queue generated sitemaps, switch to paginated sitemaps to allow them to be rendered at web response time, but still be managable in size

## 4.0.50 - 2024.05.13
### Added
* Added a setting in Plugin Settings -> Tags to specify which site should be used as the `x-default` for `hreflang` tags ([1162](https://github.com/nystudio107/craft-seomatic/issues/1162))

### Changed
* Moved where paginated `hreflang` tags are added for paginated pages, so that they can be overriden via Twig templating code. They are now added inside of `seomatic.helper.paginate()`

### Fixed
* Fixed an issue that could cause an exception to be thrown if the selected asset for the Creator or Identity brand image was deleted ([#1472](https://github.com/nystudio107/craft-seomatic/issues/1472))
* Fixed an issue where the SEO preview for SEO Settings fields and the sidebar wouldn't be displayed correctly for drafts ([#1449](https://github.com/nystudio107/craft-seomatic/issues/1449))

## 4.0.49 - 2024.05.20
### Fixed
* Fixed an issue where the down and up arrows were reversed for sorting purposes

## 4.0.48 - 2024.04.10
### Added
* Ensure that `getTransformByHandle()` is passed a string

## 4.0.47 - 2024.04.10
### Added
* Fix regression of `getAssetTransforms()` -> `getImageTransforms()`

## 4.0.46 - 2024.04.10
### Added
* Added the ability to choose the Asset Transform to apply to images in the sitemap ([#1407](https://github.com/nystudio107/craft-seomatic/issues/1407))

### Fixed
* Fixed a regression in `extractTextFromField` that could cause it to not render properly by being more explicit, looking only for arrays or `Collections` in `isArrayLike()` ([#1441](https://github.com/nystudio107/craft-seomatic/issues/1441))
* Fixed an issue where the `typeId` coming in from editing the Content SEO settings was a string, when it needed to be cast to an integer ([#1442](https://github.com/nystudio107/craft-seomatic/issues/1442)) ([#1368](https://github.com/nystudio107/craft-seomatic/issues/1368))
* Fixed an issue where the **Copy Settings From** menu didn't work correctly for multiple entry types ([#1368](https://github.com/nystudio107/craft-seomatic/issues/1368))

## 4.0.45 - 2024.03.22
### Fixed
* Addressed an issue where if SEOmatic was set to extract text or keywords from a relation field that was eager loaded, it would extract the serialized value of the field instead of the actual text ([#1415](https://github.com/nystudio107/craft-seomatic/issues/1415))

## 4.0.44 - 2024.03.14
### Fixed
* Fixed a regression that would throw an exception when attempting to save the `security.txt` template ([#1435](https://github.com/nystudio107/craft-seomatic/issues/1435))

## 4.0.43 - 2024.03.08
### Changed
* Add `PerplexityBot` to the default `disallow` list in `robots.txt`, as there's no benefit to allowing it to index your site
* Allow locales to be in the format `language[_territory]` such that the territory is optional
* Ensure that `security.txt` templates always end with a new line ([#1429](https://github.com/nystudio107/craft-seomatic/issues/1429))

### Fixed
* Fixed an issue where a trailing slash would be added to a paginated URL that uses URL parameters and `addTrailingSlashesToUrls` was `true` in the General config ([#1401](https://github.com/nystudio107/craft-seomatic/issues/1401))
* Fixed an issue where clicking the SEOmatic CP nav item would result in a 403 exception if the current user didn't have permission to view the SEOmatic dashboard ([#1410](https://github.com/nystudio107/craft-seomatic/issues/1410))
* Fixed an issue where an exception could be thrown when generating a sitemap with assets, and the field mapping was empty ([#1425](https://github.com/nystudio107/craft-seomatic/issues/1425))
* Fixed an issue where the `@id` in the `mainEntityOfPage` JSON-LD wouldn't be correct if the `identity` and `creator` were not the same ([#1431](https://github.com/nystudio107/craft-seomatic/pull/1431))

## 4.0.42 - 2024.02.20
### Fixed
* Fixed an issue where an exception could be thrown due to a bad commit

## 4.0.41 - 2024.02.20
### Added
* Added the ability to generate a [News Sitemap](https://developers.google.com/search/docs/crawling-indexing/sitemaps/news-sitemap) for any Section
* Added an **SEOmatic Debug Toolbar Panel** setting to Plugin Settings → Advanced that lets you control whether the SEOmatic Debug Toolbar panel is added to the Yii2 Debug Toolbar (if it is enabled)
* Updated to schema.org [v26.0](https://schema.org/docs/releases.html), fixes ([#1420](https://github.com/nystudio107/craft-seomatic/issues/1420))

### Changed
* Completely revamped the documentation to hopefully make it more accessible & useful (thanks to Matt Stein @ Adjacent)
* PHPstan code cleanup

### Fixed
* Fixed an issue that would cause assets in Neo blocks to not appear as images in the sitemap
* Fixed an issue that would cause assets in SuperTable blocks to not appear as images in the sitemap
* Fixed an issue with missing classes in `Sitemap` helper
* Fixed an issue that would cause text in Neo blocks to not get extracted

## 4.0.40 - 2024.02.13
### Fixed
* Fixed a regression where the `robots` tag would be set to `none` for CP requests, which is incorrect, because GraphQL and meta container endpoints are CP requests  ([#1414](https://github.com/nystudio107/craft-seomatic/issues/1414))

## 4.0.39 - 2024.02.09
### Added
* Add `phpstan` and `ecs` code linting
* Add `code-analysis.yaml` GitHub action

### Changed
* PHPstan code cleanup
* ECS code cleanup

### Fixed
* Fixed an issue where `DynamicMeta` didn't properly take into account that `robots` can be a comma delimited list of values now ([#1399](https://github.com/nystudio107/craft-seomatic/issues/1399))
* Fixed an issue where a `robots` setting of `none` or `noindex` in the Content SEO settings make it impossible to override the `robots` setting in an SEO Settings field ([#1399](https://github.com/nystudio107/craft-seomatic/issues/1399))
* Added  the unused `static` to the Tailwind CSS `blocklist` to avoid a name collision with a Craft CSS class ([#1412](https://github.com/nystudio107/craft-seomatic/issues/1412))
* Added `webp` and `gif` as allowed social media image formats now that the social media sites accept them, and guard against no transform existing ([#1411](https://github.com/nystudio107/craft-seomatic/issues/1411))

## 4.0.38 - 2024.01.22
### Changed
* Updated docs to use node 20 & a new sitemap plugin

### Fixed
* Fixed overly large debug toolbar pane response size due to repeating inline SVG icons
* Ensure that CP requests and Tokenized requests have `robots` tag & header set to `none` ([#1394](https://github.com/nystudio107/craft-seomatic/issues/1394))

## 4.0.37 - 2023.12.12
### Added
* Added a `EVENT_INCLUDE_SITEMAP_ENTRY` event to allow plugins or modules to determine whether entries should be added to the sitemap or not ([#1393](https://github.com/nystudio107/craft-seomatic/issues/1393))
* Allow the `config/seomatic.php` `siteUrlOverride` to be set to either a string, or an array of site URLs, indexed by the site handle for overriding complex headless multi-site Craft setups ([#1376](https://github.com/nystudio107/craft-seomatic/issues/1376))

### Changed
* Switch over to listening for element changes via `Element::EVENT_AFTER_PROPAGATE` events instead of `Elements::EVENT_AFTER_SAVE_ELEMENT` and have it check the `Element::$resaving` attribute instead of `Model::$scenario` = `SCENARIO_ESSENTIALS` to determine whether sitemap queue jobs should be created ([#1388](https://github.com/nystudio107/craft-seomatic/issues/1388))
* If the Site URL Override feature is used, pass along the parameters, too, when building the URL ([#950](https://github.com/nystudio107/craft-seomatic/issues/950))
* Removed the automatic Google Sitemap ping endpoint, since [Google has deprecated it and will be removing it entirely soon](https://developers.google.com/search/blog/2023/06/sitemaps-lastmod-ping) ([#1392](https://github.com/nystudio107/craft-seomatic/issues/1392))

## 4.0.36 - 2023.11.28
### Added
* Switch over to Vite `^5.0.0` & Node `^20.0.0` for the buildchain
* The sitemaps now check `enabledForSite` to determine whether elements should be included in the sitemap ([#1388](https://github.com/nystudio107/craft-seomatic/issues/1388))

### Changed
* Remove vestigial `queue` option from the console command
* Rebrand `Twitter` to `X (Twitter)` in all user-displayed text
* Updated the X (Twitter) large image previews to reflect the new style in X (Twitter)

### Fixed
* Fixed an issue where the **Truncate Description Tags** toggle did not work as expected ([#1386](https://github.com/nystudio107/craft-seomatic/issues/1386))
* Fixed an issue where the frontend SEO preview URLs could be wrong if you're using the Site URL Override feature ([#950](https://github.com/nystudio107/craft-seomatic/issues/950#issuecomment-1829947536))

## 4.0.35 - 2023.11.16
### Fixed
* Only try the `getMatchedElement()` optimization when it's not a console request, and surround it with `try/catch` to catch any potentially thrown exceptions ([#1384](https://github.com/nystudio107/craft-seomatic/issues/1384))

## 4.0.34 - 2023.11.15
### Changed
* Try to use Craft's matched element from `UrlManager` in `MetaContainers` if looking for an enabled element, the current `siteId` is being used and the current `uri` matches what was in the request ([#1381](https://github.com/nystudio107/craft-seomatic/pull/1381))

### Fixed
* Fixed an issue where the `CanonicalLink` would render if the `Robots` tag contained multiple values ([#1378](https://github.com/nystudio107/craft-seomatic/issues/1378))
* Fixed incorrect references to `SeoEntry` in the Campaign `SeoElement` ([#1382](https://github.com/nystudio107/craft-seomatic/pull/1382))

## 4.0.33 - 2023.10.22
### Added
* Added an SEOmatic debug panel to the Yii2 Debug Toolbar to aid in debugging SEO metadata

## 4.0.32 - 2023.10.09
### Added
* Added support for the Shopify plugin, so imported Shopify Products are automatically recognized by SEOmatic, and get properly mapped metadata
* Add integration with the Campaign plugin, so Campaign landing pages are automatically recognized by SEOmatic, and get properly mapped metadata
* Disallow Google Bard and Vertex AI bots in `robots.txt` by default, as there's no benefit to allowing it to index your site. ref: https://developers.google.com/search/docs/crawling-indexing/overview-google-crawlers#common-crawlers

### Changed
* Moved the `security.txt` location to `.well-known/security.txt` from the server root, and make the bundle updating mechanism preserve user settings in the process ([#1353](https://github.com/nystudio107/craft-seomatic/issues/1353))
* Hide the SEO Image / OG Image / Twitter Image mode selectors if transforming is disabled
* Set the `twitterImageTransform` and `ogImageTransform` to `false` by default, since the default is also `sameAsSeo` and this will result in better default expected behavior ([#1364](https://github.com/nystudio107/craft-seomatic/issues/1364))

### Fixed
* Fixed a syntax error in the digitalproductmeta JsonLD Container ([#1361](https://github.com/nystudio107/craft-seomatic/issues/1361))

## 4.0.31 - 2023.09.12
### Added
* Disallow ChatGPT bot in `robots.txt` by default, as there's no benefit to allowing it to index your site. ref: https://www.searchenginejournal.com/openai-launches-gptbot-how-to-restrict-access/493394/

### Changed
* The Plugin Settings -> Tags -> **Add `hreflang` Tags** setting now also controls whether `hreflang` URLs are added to sitemaps ([#1340](https://github.com/nystudio107/craft-seomatic/issues/1340))

### Fixed
* Fixed an issue that caused you to be unable to dynamically include/exclude scripts that have body JavaScript via Twig, by unifying the rendering method ([#1334](https://github.com/nystudio107/craft-seomatic/issues/1334))
* Fixed an issue that caused the default Content SEO Site Name Position to not default to Same As Global Site Name Position ([#1321](https://github.com/nystudio107/craft-seomatic/issues/1321)) ([#1333](https://github.com/nystudio107/craft-seomatic/issues/1333))

## 4.0.30 - 2023.07.19
### Fixed
* Fixed a regression caused by ([#1334](https://github.com/nystudio107/craft-seomatic/issues/1334)) which caused Google Tag Manager noscript template is output with `<script>` tags around it ([#1346](https://github.com/nystudio107/craft-seomatic/issues/1346))

## 4.0.29 - 2023.07.18
### Changed
* Use any custom field labels for "pull fields" in SEOmatic settings ([#1335](https://github.com/nystudio107/craft-seomatic/issues/1335))

### Fixed
* Fixed an issue where the `MetaJsonLd` container was not properly cached, which caused a performance issue as well as storing more data in the cache than necessary
* Fixed a regression that caused the SEO Preview to not appear in the sidebar for Commerce 4, due to Commerce 4 not supporting the `EVENT_DEFINE_SIDEBAR_HTML` event (despite there being code in Commerce 4 that appears to support it) ([#1336](https://github.com/nystudio107/craft-seomatic/issues/1336))
* Fixed an issue that caused you to be unable to dynamically include/exclude scripts that have body JavaScript via Twig, by unifying the rendering method ([#1334](https://github.com/nystudio107/craft-seomatic/issues/1334))

## 4.0.28 - 2023.06.13
### Fixed
* Fixed an issue that would cause settings in the Tracking Scripts settings to be wiped out whenever other settings in SEOmatic were saved ([#1327](https://github.com/nystudio107/craft-seomatic/issues/1327))

## 4.0.27 - 2023.06.02
### Changed
* Bumped the schema version to side-step a Craft bug that would throw an error when running `craft/update` with a plugin that had a new migration without a schema version change

## 4.0.26 - 2023.06.01
### Added
* Show a deprecation notice on the **Google Analytics** tracking script setting, with an explanation of it being discontinued
* Added the ability to completely disable scripts from displaying & rendering if they have been discontinued
* Add an announcement if the site is using the soon to be deprecated Google Universal Analytics via SEOmatic

### Changed
* Don't try to submit sitemap indexes to search engines if sitemaps are disabled for that section

### Security
* Addressed a potential XSS vulnerability when using `seomatic.helper.paginate()`

## 4.0.25 - 2023.05.19
### Changed
* Have the Site Name Position default to "Same as Global Setting" ([#1321](https://github.com/nystudio107/craft-seomatic/issues/1321))

### Fixed
* Revert ([this commit](https://github.com/nystudio107/craft-seomatic/commit/63897ade501f9cf3175eed57a6fb91940fd32a38)) which caused CLI-based GraphQL generation to fail
* Removed vestigial "No Twitter handle has been set" message ([#1316](https://github.com/nystudio107/craft-seomatic/issues/1316))
* Fixed an issue that would cause SEOmatic to ignore the Override lightswitch setting for SEO Settings fields in the context of generated sitemaps

## 4.0.24 - 2023.05.01
### Added
* Added a **View Sitemap Index** button to SEOmatic → Site Settings → Sitemap ([#1085](https://github.com/nystudio107/craft-seomatic/issues/1085))

### Fixed
* Fixed an issue where SEOmatic would cause other plugins to fail to be able to register Twig extensions after it when using the CLI command `craft plugin/install --all` ([#1312](https://github.com/nystudio107/craft-seomatic/issues/1312))
* Fix cache-busting param on seo images ([#1310](https://github.com/nystudio107/craft-seomatic/pull/1310))
* Fixed an issue where `encodeUrlQueryParams` wouldn't include the URL's port

### Changed
* Ensure that makes sure that alternate site url's also take into account a potential site override url in sitemaps ([#1298](https://github.com/nystudio107/craft-seomatic/pull/1298))
* Use the `getSalePrice()` for the default `Product` and `DigitalProduct` JSON-LD structured data ([#930](https://github.com/nystudio107/craft-seomatic/issues/930))

## 4.0.23 - 2023.03.27
### Changed
* Removed the requirement that the Site Twitter Handle is set for Twitter cards to be generated ([#1275](https://github.com/nystudio107/craft-seomatic/issues/1275))

### Fixed
* Fixed a caching issue that would cause the Main Entity of Page schema type menu to malfunction ([#1303](https://github.com/nystudio107/craft-seomatic/issues/1303))


## 4.0.22 - 2023.03.13
### Added
* Added `(Google rich result)` in the Main Entity of Page dropdown, for Schema.org types that Google uses for Rich Results
* Add descriptions & links for `(pending)` and `(Google rich result)` schemas in the Main Entity of Page dropdown
* Added a caching layer to the Schema helper

## 4.0.21 - 2023.03.09
### Added
* Added support for Doxster field types as pull sources ([#1279](https://github.com/nystudio107/craft-seomatic/pull/1279))
* Added Sitemap Frequency and Priority to Content SEO overview ([#1294]https://github.com/nystudio107/craft-seomatic/issues/1294)

### Changed
* Don't disable `hreflang` tags based on whether the section is included in the sitemap or not ([#1285](https://github.com/nystudio107/craft-seomatic/issues/1285))
* Ensure that the state of the General tab and the override switch is taken into account when determining if `robots` is disabled in an SEO Settings field for `hreflang` URLs
* Changed the sitemap submission timeout to be `5` seconds, to avoid lengthy delays if Google cannot be reached for some reason ([#1288](https://github.com/nystudio107/craft-seomatic/issues/1288))
* Add versioning to the docs
* Add Pending types from Schema.org back into the Main Entity of Page dropdown, but mark them as `(pending)`

### Fixed
* Fixed an issue where an error would be logged if a source Asset field was selected as an SEO Image, and it was eager loaded ([#1291](https://github.com/nystudio107/craft-seomatic/issues/1291))
* Ensure that URL query parameters are properly encoded after being sanitized ([#1075](https://github.com/nystudio107/craft-seomatic/issues/1075))

## 4.0.20 - 2023.02.09
### Added
* Updated to schema.org [v15.0](https://schema.org/docs/releases.html), fixes ([#1277](https://github.com/nystudio107/craft-seomatic/issues/1277))

### Changed
* Use dynamic docker container name & port for the `buildchain`
* Update the `buildchain` to use Vite `^4.0.0`
* Refactored the docs buildchain to use a dynamic docker container setup

### Fixed
* Fixed an issue where sitemaps would be regenerated even if URLs were disabled for a particular section, in certain circumstances ([#1212](https://github.com/nystudio107/craft-seomatic/issues/1212))
* Removed the check for the now-deprecated `layer` property in the `tree.jsonld` schema from schema.org, so that it can be parsed properly

## 4.0.19 - 2023.01.11
### Fix
* Fixed a regression that would cause `entry.` to not resolve in meta values

## 4.0.18 - 2023.01.10
### Fix
* Fixed an issue where meta tags would not render on a very specific version of PHP (`8.1.13`) ([#1257](https://github.com/nystudio107/craft-seomatic/issues/1257))

## 4.0.17 - 2023.01.09
### Changed
* Update to use Vite `^4.0.0` for the buildchain

### Fixed
* Solspace calendar integration error would throw an exception if you deleted a Calendar ([#1259](https://github.com/nystudio107/craft-seomatic/pull/1259))

## 4.0.16 - 2022.12.07
### Fixed
* Ensure that `parsedValue()` always returns a string

### Changed
* Fixed the disabled state of SEO Settings Override fields so they look consistent
* Remove the odd Craft `modifiedAttributes` styling when a field value is changed ([#12403](https://github.com/craftcms/cms/issues/12403))
* Removed the `field` class from the SEO Settings field wrapper so an additional `status-badge` isn't injected by Craft
* Fix the styling of the SEO Image, Twitter Image, and FaceBook OpenGraph image in the SEO Settings field when they are not overridden

## 4.0.15 - 2022.11.22
### Fixed
* Fixed a regression in the SEO Settings field where the **Override** state for a field would not save ([#1239](https://github.com/nystudio107/craft-seomatic/issues/1239))

## 4.0.14 - 2022.11.20
### Changed
* Better styling for the Robots focus ring
* Refactored the docs to use the latest version of VitePress (`^1.0.0-alpha.29`)

### Fixed
* Fixed a regression that caused entries with SEO Settings fields in them to think the entry had changed, when it hadn't ([#1239](https://github.com/nystudio107/craft-seomatic/issues/1239))
* Fixed an issue where the Facebook Opengraph Image Transform Mode would appear in an SEO Settings field, even if it was disabled ([#1240](https://github.com/nystudio107/craft-seomatic/issues/1240))
* Fixed an issue where `extractTextFromField()` would throw an exception for Neo fields ([#1242](https://github.com/nystudio107/craft-seomatic/issues/1242))

## 4.0.13 - 2022.11.11
### Added
* Greatly improved the Robots field, allowing you to pick multiple values, and additional values added by Google ([#1237](https://github.com/nystudio107/craft-seomatic/issues/1237))

### Changed
* Switch from Webpack to Vite for the plugin asset build system

### Fixed
* Fix query level structureDepth 'Invalid numeric value: 1<=' ([#1238](https://github.com/nystudio107/craft-seomatic/pull/1238))

## 4.0.12 - 2022.11.03
### Changed
* Fixed an exception that could be thrown if you are using an SEO Settings field, by adding an explicit cast to `(array)` for checkbox field values that should be saved as an empty array `[]` but instead are saved as an empty string `''`. Believed to be a regression in Craft 4.3 ([#1233](https://github.com/nystudio107/craft-seomatic/issues/1233)) ([#1231](https://github.com/nystudio107/craft-seomatic/issues/1231))
* Handle the case where an asset's `dateModified` is null ([#1234](https://github.com/nystudio107/craft-seomatic/issues/1234))

## 4.0.11 - 2022.11.01
### Changed
* Switch from Twigfield to Code Editor

### Fixed
* Fixed an issue with Twigfield was errantly loaded in SEO Settings fields ([#1229](https://github.com/nystudio107/craft-seomatic/issues/1229))
* Fixed an issue where **Include Images & Videos in Sitemap** appeared in the SEO Settings field, despite being disabled in the field settings ([#1163](https://github.com/nystudio107/craft-seomatic/issues/1163))

## 4.0.10 - 2022.10.19
### Fixed
* Fix `phpcs` coding style CI tests

### Changed
* Refactored `TrackingVarsAutocomplete` to use Twigfield `^1.0.12`'s ability to pass down data via `twigfieldOptions` rather than relying on the data cache

## 4.0.9 - 2022.10.03
### Changed
* Use `App::env()` to check environment ([#1210](https://github.com/nystudio107/craft-seomatic/pull/1210))
* Added `CRAFT_ENVIRONMENT` check to `SeomaticVariable` ([#1210](https://github.com/nystudio107/craft-seomatic/pull/1210))
* Don't bother invalidating sitemaps via the console command, as it causes them to be regenerated twice
* Use a stale-while-revalidate pattern for sitemap generation, so the old cached sitemap will be served until the new one as been regenerated due to an invalidation (content editing) ([#1213](https://github.com/nystudio107/craft-seomatic/issues/1213))

### Fixed
* Fixed an issue where the announcement migration would fail due to using closures (changed for the Craft 4.0.0 release)
* Ensure that `$driver` is nullable in the install migration

## 4.0.8 - 2022.09.17
### Changed
* Check both `ENVIRONMENT` and `CRAFT_ENVIRONMENT` when attempt to auto-determine the current environment
* Move to using `ServicesTrait` and add getter methods for services

### Fixed
* Fixed an improper docblock typing for the `genericImage` property on the `Entity` model ([#1193](https://github.com/nystudio107/craft-seomatic/issues/1193))

## 4.0.7 - 2022.08.23
### Changed
* Add `allow-plugins` to `composer.json` to allow CI tests to work
* Handle passed in `array`s and `ElementQuery`s in `assetFromAssetOrIdOrQuery()`
* Bumped the `bundleVersion` to ensure that meta bundles are updated with the new settings

### Fixed
* Display a more accurate environment message if they are manually setting the SEOmatic Environment ([#1186](https://github.com/nystudio107/craft-seomatic/issues/1186))

## 4.0.6 - 2022.06.30
### Changed
* Require `nystudio107/craft-twigfield` version `^1.0.9`
* Add an additional CP route for Solspace Calendar, which allows characters like `-`'s in their handles ([#1170](https://github.com/nystudio107/craft-seomatic/issues/1170))

### Fixed
* Fixed an issue where the `ads.txt`, `humans.txt`, `robots.txt`, and `security.txt` preview links in the CP would 404 on a site where the primary site URL wasn't a root URL ([#1168](https://github.com/nystudio107/craft-seomatic/issues/1168))
* Fixed an issue with some of the default values in `seomatic-config` for Twitter meta tags ([#1171](https://github.com/nystudio107/craft-seomatic/issues/1171))

## 4.0.5 - 2022.06.27
### Fixed
* Fixed issues with some of the default values in `seomatic-config` for the `productmeta` 

## 4.0.4 - 2022.06.26
### Fixed
* Fixed issues with some of the default values in `seomatic-config` that would cause some meta values to be unparsed ([#1164](https://github.com/nystudio107/craft-seomatic/issues/1164))

## 4.0.3 - 2022.06.22
### Added
* Integrated [Twigfield](https://github.com/nystudio107/craft-twigfield) into SEOmatic, so fields that allow Twig expressions now have an editor with full autocomplete of the Craft and SEOmatic APIs
* SEOmatic SEO Settings fields do not utilize the Twigfield editor, to keep things simple for content authors (though they still parse as Twig expressions)
* Switched the default Twig expressions from single-bracket `{ }` to double-bracket `{{ }}` for consistency's sake in the `seomatic-config` settings (single-bracket expressions still work, however)

### Changed
* The SEO Keywords field no longer uses a tokenized input, to allow for the use of the Twigfield editor
* Updated the docs to add **The Meta Cascade** to the **Overview** section to better explain how SEOmatic works

## 4.0.2 - 2022.06.18
### Changed
* Only strip the `tokenParm` URL parameter from the canonical URL, leaving others intact if explicitly set by the developer (generally query strings should not be in canonical URLs, but there are exceptions)
* Don't provide link to Plugin Settings or allow them to be accessed without permission, or without `allowAdminChanges` being enabled ([#1150](https://github.com/nystudio107/craft-seomatic/issues/1150))

### Fixed
* Fixed an issue where a pinned version of `davechild/textstatistics` caused SEOmatic to not work with other plugins that required a more recent version of the package ([#1153](https://github.com/nystudio107/craft-seomatic/issues/1153))
* Fixed an issue where a GraphQL frontendTemplates request for a disabled file results in error ([#1156](https://github.com/nystudio107/craft-seomatic/issues/1156))
* Fix `security.txt` template ([#1154](https://github.com/nystudio107/craft-seomatic/pull/1154))

## 4.0.1 - 2022.05.31
### Added
* Added Schema.org v14 JSON-LD models, generated via [SchemaGen](https://github.com/nystudio107/schemagen) ([#1092](https://github.com/nystudio107/craft-seomatic/issues/1092))

### Changed
* Removed Bing from `SEARCH_ENGINE_SUBMISSION_URLS` due to it being deprecated ([#1043](https://github.com/nystudio107/craft-seomatic/issues/1043))

### Fixed
* Don't allow the autocomplete object inspection to recurse infinitely, set a cap of 10 levels deep ([#1132](https://github.com/nystudio107/craft-seomatic/issues/1132))

### Fixed
* Ensure the constant `Seomatic::SEOMATIC_PREVIEW_AUTHORIZATION_KEY` has `public` access

## 4.0.0 - 2022.05.16
### Added
* Initial Craft CMS 4 release

### Fixed
* Fixed an issue that would throw an exception if using Feed Me with SEOmatic ([#1125](https://github.com/nystudio107/craft-seomatic/issues/1125))
* Fixed an issue where incorrectly namespaced tab `id`s caused the tabs to not function in SEO Settings fields ([#1131](https://github.com/nystudio107/craft-seomatic/issues/1131))

## 4.0.0-beta.8 - 2022.04.18
### Changed
* Don’t use deprecated `TypeManager::prepareFieldDefinitions()`
* Pass through all `siteUrl()` parameters in the Helper service ([#1114](https://github.com/nystudio107/craft-seomatic/pull/1114))
* Ensure that the `currentSite` is set to the requested one when processing headless requests via API endpoint or GraphQL, to ensure things like `siteUrl()` etc. resolve correctly ([#1111](https://github.com/nystudio107/craft-seomatic/issues/1111))
* Remove all `::craft3*` version static variables, and the conditional code they depend on
* Use the native `str_contains()` over `StringHelper::contains()` (which is slower, and allocated objects, etc.)

### Fixed
* Fixed an issue where the `Autocomplete` helper could throw an exception if it encountered a `ReflectionUnionType`
* Add `box-content` class on the code editors, to adjust for the new Tailwind CSS reset in v4
* Fixed an issue where none of the Site Settings changes could be saved ([#1107](https://github.com/nystudio107/craft-seomatic/issues/1107))
* Fixed an issue with the default `Humans.txt` implementation of `parseEnv()` ([#1109](https://github.com/nystudio107/craft-seomatic/issues/1109))
* Fixed a validation issue due to incorrect typing that caused the Plugin Settings to be unable to be saved ([#1112](https://github.com/nystudio107/craft-seomatic/issues/1112))
* Dynamically change `[0]` to `.collect()[0]` in certain MetaGlobalVars fields so Asset Query accesses will work with Craft 4
* Change `[0]` to `.collect()[0]` so Asset Query accesses will work with Craft 4

## 4.0.0-beta.7 - 2022.04.08
### Changed
* Only regenerate sitemaps via queue jobs if they are a result of an invalidation of the sitemap cache ([#1098](https://github.com/nystudio107/craft-seomatic/issues/1098)) ([#1097](https://github.com/nystudio107/craft-seomatic/issues/1097))
* Add typing to the Settings model

### Fixed
* Fixed an issue where disabled entries could appear in breadcrumbs JSON-LD ([#1088](https://github.com/nystudio107/craft-seomatic/issues/1088))
* Fix an issue where the cacheDuration setting could throw an exception ([#1102](https://github.com/nystudio107/craft-seomatic/issues/1102))

## 4.0.0-beta.6 - 2022.03.22

### Fixed
* Changed `SuperTableBlockTypeModel::getFields()` to `getCustomFields()`
* Changed `MatrixBlockType::getFields()` to `getCustomFields()`
* Fixed an issue that could cause an exception to be thrown during a console request ([#1080](https://github.com/nystudio107/craft-seomatic/issues/1080))

## 4.0.0-beta.5 - 2022.03.18

### Fixed

* Fixed an issue in the `TwigExpressionValidator` class that prevented you from accessing the `seomatic.` variable in some circumstances ([#1076](https://github.com/nystudio107/craft-seomatic/issues/1076))
* Fix AssetTransform/Volume classes for Craft CMS 4
* Fix registering permissions ([#1081](https://github.com/nystudio107/craft-seomatic/pull/1081))

## 4.0.0-beta.4 - 2022.03.13

### Changed
* Added validation rules for `metaCacheDuration` property on the `Settings` model
* Change the default email address in `security.txt` to the placeholder `user@example.com`
* The `ads.txt` and `security.txt` templates are no longer enabled by default, because they require configuration before use ([#1077](https://github.com/nystudio107/craft-seomatic/issues/1077))

### Fixed
* Fix issues with editable table fields, due to the change in default values for Craft 4
* Ensure that the `metaCacheDuration` is normalized to `0` if set to `null` or `'null'`

## 4.0.0-beta.3 - 2022.03.04

### Fixed

* Updated types for Craft CMS `4.0.0-alpha.1` via Rector

## 4.0.0-beta.2 - 2022.03.01

### Changed

* `MetaJsonLd::create()` now also looks for class names prefixed with `Schema_`
* Updated types for Craft 4
* Don’t exclude `/src/models/jsonld` from rector config

### Fixed

* Fixed generated JSON-LD classes with invalid class names

## 4.0.0-beta.1 - 2022.02.24

### Added

* Initial Craft CMS 4 compatibility
