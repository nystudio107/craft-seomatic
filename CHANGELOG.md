# SEOmatic Changelog

## 5.1.20 - 2026.01.20
### Fixed
* Fixed a regression that caused the sidebar preview to not appear for Solspace Calendar
* Fixed an issue with Craft `^5.9` where it throws an error because `craftcms/cms` no longer uses the `Stringy` package ([#1684](https://github.com/nystudio107/craft-seomatic/issues/1684))

## 5.1.19 - 2025.10.23
### Fixed
* Fixed an issue where a `null` element in the nested field chain could throw an error ([#1660](https://github.com/nystudio107/craft-seomatic/issues/1660))
* Revert a regression that caused image transforms for social images to be broken if a focal point was set ([#1665](https://github.com/nystudio107/craft-seomatic/issues/1665))

## 5.1.18 - 2025.10.06
### Added
* Added a `twigExtensionClasses` config setting to allow additional TwigExtension classes to be loaded in the Twig `SandboxView` that SEOmatic uses to render ([#1632](https://github.com/nystudio107/craft-seomatic/issues/1632))
* Only allow users to pick SEO/Facebook/Twitter images from asset volumes that they had permission to access ([#1650](https://github.com/nystudio107/craft-seomatic/issues/1650))

### Changed
* No longer block various AI bots via `robots.txt` by default ([#1635](https://github.com/nystudio107/craft-seomatic/issues/1635))
* Handle setting the focal point for social images that are transformed ([#1626](https://github.com/nystudio107/craft-seomatic/issues/1626))

### Fixed
* Fixed an issue with page footer text being untranslatable on 3 pages due to filter ordering ([#1651](https://github.com/nystudio107/craft-seomatic/issues/1651))
* Fixed an issue where sitemap generation could fail with the new Content Block fields under certain conditions ([#1645](https://github.com/nystudio107/craft-seomatic/issues/1645))
* Don't overwrite the `dataLayer` if it already exists in the Google Tag Manager default script ([#1642](https://github.com/nystudio107/craft-seomatic/issues/1642))

## 5.1.17 - 2025.08.17
### Added
* Added the ability to choose from nested fields in Content Block fields from the SEOmatic GUI in the various Content SEO settings

### Changed
* Use `StringHelper::convertToUtf8()` instead of our homebrew solution
* Change `http` to `https` for schema.org type `@context`
* Don't cache sitemaps if they are somehow generated via a Craft preview with token parameters ([#1636](https://github.com/nystudio107/craft-seomatic/issues/1636))

### Fixed
* Fix an issue where emptying a section could cause the sitemap to throw an exception with certain versions of PHP ([#1629](https://github.com/nystudio107/craft-seomatic/issues/1629))
* Fix weirdness in rendering of certain schema type descriptions of the source information was malformed with spurious spaces ([#1623](https://github.com/nystudio107/craft-seomatic/issues/1623))

## 5.1.16 - 2025.06.11
### Fixed
* Removed `parseEnv` from the default `seomatic-sandbox.php`, because it is used by SEOmatic for rendering JSON-LD entity IDs ([#1616](https://github.com/nystudio107/craft-seomatic/issues/1616))

## 5.1.15 - 2025.06.11
### Fixed
* Fixed an issue with the `???` empty coalesce operator not being present in the Twig sandbox

## 5.1.14 - 2025.06.10
### Added
* Use [craft-twig-sandbox](https://github.com/nystudio107/craft-twig-sandbox) for rendering meta values in SEOmatic, for additional (and user-controllable) security

### Fixed
* Fixed an issue where certain caches (GraphQL & field) were not properly tagged with the new dependency, and thus were not cleared as elements were updated ([#1606](https://github.com/nystudio107/craft-seomatic/issues/1606))
* Fixed regression where the sitemap index `lastmod` would not update properly under certain circumstances

## 5.1.13 - 2025.04.24
### Added
* Added migration to drop the vestigial Craft 2.x tables `seomatic_meta` and `seomatic_settings` tables ([#1558](https://github.com/nystudio107/craft-seomatic/issues/1558))

### Changed
* Encode sitemap entities to make sure they follow the RFC-3986 standard for URIs, the RFC-3987 standard for IRIs and the XML standard. ref: https://sitemaps.org/protocol.html#escaping
* Invalidate the metacontainer caches for every site an element exists in when an element is changed ([#1600](https://github.com/nystudio107/craft-seomatic/issues/1600))

### Fixed
* Fix an issue where sitemap generation threw an exception for sections with Neo fields in them ([#1593](https://github.com/nystudio107/craft-seomatic/issues/1593))
* Properly XML-encode entities in the News Sitemap so that they validate ([#1596](https://github.com/nystudio107/craft-seomatic/issues/1596#issuecomment-2819222797))

## 5.1.12 - 2025.04.03
### Added
* Assets & Matrix Blocks are now eager loaded in the query that generates the sitemap, speeding things up significantly for sites with a number of assets in entries

### Fixed
* Fixed missing SEO Settings previews for element index views in Craft 5 ([#1569](https://github.com/nystudio107/craft-seomatic/issues/1569))
* Fixed an issue where Commerce Product types didn't show the language menu in Content SEO ([#1577](https://github.com/nystudio107/craft-seomatic/issues/1577))
* Fixed an issue where Content SEO sitemap settings had per-Entry Type settings, when they should not (one sitemap encompasses all Entry Types for a Section)
* Fixed the "back" link on human-readable sitemaps for multi-sites that have a path as part of their URL ([#1591](https://github.com/nystudio107/craft-seomatic/issues/1591))

## 5.1.11 - 2025.01.23
### Changed
* Removed leading spaces from the `robots.txt` template, [though Google ignores whitespace](https://developers.google.com/search/docs/crawling-indexing/robots/robots_txt#syntax)

### Fixed
* Fixed an issue where the Entry Types menu in Content SEO settings would only appear if you had mulitple sites ([#1563](https://github.com/nystudio107/craft-seomatic/issues/1563))

## 5.1.10 - 2025.01.16
### Added
* Added a `ModifySitemapQueryEvent` to allow the modification of the element query used to generate a sitemap ([#1553](https://github.com/nystudio107/craft-seomatic/issues/1553))

### Changed
* Use the `site` query parameter used globally by Craft in the CP for SEOmatic settings ([#1527](https://github.com/nystudio107/craft-seomatic/issues/1527))

### Fixed
* Fixed an issue where the L2 cache was not properly invalidated for containers _after_ a preview request, which could result in stale metadata
* Handle the case where SEOmatic settings for a specific `typeId` ended up in its own metabundle in addition to the default metabundle for that section ([#1557](https://github.com/nystudio107/craft-seomatic/issues/1557))

## 5.1.9 - 2025.01.08
### Changed
* Encode the URI in the `canonical` `link` header ([#1519](https://github.com/nystudio107/craft-seomatic/issues/1519))
* Ensure that URLs that are a site index URL and have a path prefix strip trailing slashes as appropriate ([#717](https://github.com/nystudio107/craft-seomatic/issues/717)) ([#5675](https://github.com/craftcms/cms/issues/5675))

### Fixed
* Add missing `<news>` sitemap entry implementation that didn't make it over to the Craft 5 version of the plugin ([#1551](https://github.com/nystudio107/craft-seomatic/issues/1551))

## 5.1.8 - 2024.12.21
### Changed
* If an incoming URL has a trailing slash, preserve it for things like the Canonical URL ([#1547](https://github.com/nystudio107/craft-seomatic/issues/1547))
* Deprecate & remove from the UI the **Invalidate Sitemap Caches Automatically** aka `regenerateSitemapsAutomatically` setting, since it is no longer relevant with the paginated sitemaps
* Deprecate the CLI command `seomatic/sitemap/generate`, since it no longer needed with the paginated sitemaps

### Fixed
* Fixed an issue where the **News Publication Name** isn't displayed in Content SEO &rarr; Sitemap settings ([#1551](https://github.com/nystudio107/craft-seomatic/issues/1551))

## 5.1.7 - 2024.11.20
### Fixed
* Fixed an issue where sites that are not enabled for a given Section were still showing up in the Sites menu in Content SEO ([#1539](https://github.com/nystudio107/craft-seomatic/issues/1539))
* Fixed an issue where newly created sections would not have Content SEO settings show up for  ([#1544](https://github.com/nystudio107/craft-seomatic/issues/1544))

## 5.1.6 - 2024.11.12
### Added
* Added the **Site Alternate Name** property to Site Settings, used in the JSON-LD for the homepage, if the MainEntityOfPage is WebPage or WebSite ([#1482](https://github.com/nystudio107/craft-seomatic/issues/1482))
* Added **Letterbox** crop mode for SEO image transforms ([#1337](https://github.com/nystudio107/craft-seomatic/issues/1337))

### Changed
* No longer do a potentially expensive query on page load for sections that have a massive number of entries ([#1526](https://github.com/nystudio107/craft-seomatic/issues/1526))
* Improved the display of the Entry Types menu in Content SEO
* If the current route is the homepage, set the `name` and `alternateName` JSON-LD for the `mainEntityOfPage` to `seomatic.site.siteName` and `seomatic.site.siteAlternateName` respectively, rather than the `seomatic.meta.seoTitle` ([#1482](https://github.com/nystudio107/craft-seomatic/issues/1482))
* The SEO preview display in Content SEO will pull an entry from the specific Entry Type rather than just the first entry. Note: If you have a custom `SeoElement` PHP class, it will require a very minor method signature change to continue working ([#1535](https://github.com/nystudio107/craft-seomatic/issues/1535))
* Text and Asset pull sources in Content SEO will now display only fields from the specific Entry Type rather than all fields for that Section. Note: If you have a custom `SeoElement` PHP class, it will require a very minor method signature change to continue working ([#1535](https://github.com/nystudio107/craft-seomatic/issues/1535))

### Fixed
* Fixed an issue where an exception would be thrown if the Campaign plugin was installed first, and then you newly installed SEOmatic ([#1530](https://github.com/nystudio107/craft-seomatic/issues/1530))

## 5.1.5 - 2024.10.21
### Fixed
* Fixed `togImageField` field typo in the FeedMe integration ([#1520](https://github.com/nystudio107/craft-seomatic/issues/1520))
* Fixed a field mapping issue for fields in the FeedMe integration ([#1520](https://github.com/nystudio107/craft-seomatic/issues/1520))

## 5.1.4 - 2024.09.29
### Fixed
* Normalize the incoming `url` and `path` so that `mergUrlWithPath()` handles edge-cases properly ([#1512](https://github.com/nystudio107/craft-seomatic/issues/1512))
* Fixed an issue where the `ads.txt` wasn't renamed properly when requested via GraphQL ([#1513](https://github.com/nystudio107/craft-seomatic/issues/1513))
* Fixed an issue where the homepage metacontainer cache did not get properly cleared ([#1514](https://github.com/nystudio107/craft-seomatic/issues/1514))
* Fixed an exception caused by the wrong argument passed to `Asset::getAssetById()` in edge cases ([#1515](https://github.com/nystudio107/craft-seomatic/issues/1515))
* Removed vestigial sitemap rendering code in `SitemapTemplate` that had a code path that had a code path that could return a `503` ([#1437](https://github.com/nystudio107/craft-seomatic/issues/1437))

## 5.1.3 - 2024.09.10
### Changed
* Make the Content SEO listings better at eliminating duplicates by pruning sections that no longer exist ([#1499](https://github.com/nystudio107/craft-seomatic/issues/1499))
* Fixed an issue where a section with a `typeId` of `0` wouldn't validate, and thus the changes to the Content SEO settings would not validate & save ([#1510](https://github.com/nystudio107/craft-seomatic/issues/1510))

### Fixed
* Fixed the visual appearance of the Entry Type dropdown menu in Content SEO settings

## 5.1.2 - 2024.08.15
### Changed
* Made the SEO preview sidebar UI more consistent with Craft ([#1497](https://github.com/nystudio107/craft-seomatic/pull/1497))

### Fixed
* Fixed an issue where GraphQL or Meta Container endpoint requests that had a token set were not being caches separately
* Also add any `token` to the meta container cache key for regular requests
* Fixed an issue where using "Single Page" for the **Sitemap Page Size** setting would cause an exception to be thrown when generating the sitemap ([#1498](https://github.com/nystudio107/craft-seomatic/issues/1498)) 

## 5.1.1 - 2024.07.19
### Changed
* Renamed the **Regenerate Sitemaps Automatically** setting to **Invalidate Sitemap Caches Automatically** for clarity

### Fixed
* Fixed an issue where getting the sitemaps via GraphQL and meta container endpoint only retrieved the first page since the switch to paginated sitemaps ([#1492](https://github.com/nystudio107/craft-seomatic/issues/1492))
* Fixed an issue where saving an entry could be slow, because SEOmatic was pointlessly trying to regenerate the sitemap cache (which is no longer a thing with paginated sitemaps) ([#1494](https://github.com/nystudio107/craft-seomatic/issues/1494))

## 5.1.0 - 2024.07.12
### Added
* Remove queue generated sitemaps, switch to paginated sitemaps to allow them to be rendered at web response time, but still be managable in size

## 5.0.4 - 2024.05.13
### Added
* Added a setting in Plugin Settings -> Tags to specify which site should be used as the `x-default` for `hreflang` tags ([1162](https://github.com/nystudio107/craft-seomatic/issues/1162))

### Changed
* Moved where paginated `hreflang` tags are added for paginated pages, so that they can be overriden via Twig templating code. They are now added inside of `seomatic.helper.paginate()`

### Fixed
* Fixed an issue that could cause an exception to be thrown if the selected asset for the Creator or Identity brand image was deleted ([#1472](https://github.com/nystudio107/craft-seomatic/issues/1472))
* Fixed an issue where the SEO preview for SEO Settings fields and the sidebar wouldn't be displayed correctly for drafts ([#1449](https://github.com/nystudio107/craft-seomatic/issues/1449))

## 5.0.3 - 2024.05.20
### Changed
* Changed the location of the site selection menu to match Craft styling ([#1467](https://github.com/nystudio107/craft-seomatic/pull/1467))

### Fixed
* Fixed an issue where the down and up arrows were reversed for sorting purposes
* Fixed an issue where nested Matrix entries that have URLs would throw an exception ([#1456](https://github.com/nystudio107/craft-seomatic/issues/1456))

## 5.0.2 - 2024.04.10
### Added
* Ensure that `getTransformByHandle()` is passed a string

## 5.0.1 - 2024.04.10
### Added
* Fix regression of `getAssetTransforms()` -> `getImageTransforms()`

## 5.0.0 - 2024.04.10
### Added
* Stable release for Craft 5
* Added the ability to choose the Asset Transform to apply to images in the sitemap ([#1407](https://github.com/nystudio107/craft-seomatic/issues/1407))

### Fixed
* Fixed a regression in `extractTextFromField` that could cause it to not render properly by being more explicit, looking only for arrays or `Collections` in `isArrayLike()` ([#1441](https://github.com/nystudio107/craft-seomatic/issues/1441))
* Fixed an issue where the `typeId` coming in from editing the Content SEO settings was a string, when it needed to be cast to an integer ([#1442](https://github.com/nystudio107/craft-seomatic/issues/1442)) ([#1368](https://github.com/nystudio107/craft-seomatic/issues/1368))
* Fixed an issue where the **Copy Settings From** menu didn't work correctly for multiple entry types ([#1368](https://github.com/nystudio107/craft-seomatic/issues/1368))

## 5.0.0-beta.8 - 2024.03.22
### Changed
* Remove support for SuperTable, since in Craft 5 they are converted to Matrix entries https://verbb.io/blog/craft-5-plugin-update#super-table

### Fixed
* Convert `MatrixBlock` -> `Entry` and `MatrixBlockQuery` -> `EntryQuery`
* Addressed an issue where if SEOmatic was set to extract text or keywords from a relation field that was eager loaded, it would extract the serialized value of the field instead of the actual text ([#1415](https://github.com/nystudio107/craft-seomatic/issues/1415))

## 5.0.0-beta.7 - 2024.03.14
### Fixed
* Fixed a regression that would throw an exception when attempting to save the `security.txt` template ([#1435](https://github.com/nystudio107/craft-seomatic/issues/1435))

## 5.0.0-beta.6 - 2024.03.08
### Changed
* Add `PerplexityBot` to the default `disallow` list in `robots.txt`, as there's no benefit to allowing it to index your site
* Allow locales to be in the format `language[_territory]` such that the territory is optional
* Ensure that `security.txt` templates always end with a new line ([#1429](https://github.com/nystudio107/craft-seomatic/issues/1429))

### Fixed
* Fixed an issue where a trailing slash would be added to a paginated URL that uses URL parameters and `addTrailingSlashesToUrls` was `true` in the General config ([#1401](https://github.com/nystudio107/craft-seomatic/issues/1401))
* Fixed an issue where clicking the SEOmatic CP nav item would result in a 403 exception if the current user didn't have permission to view the SEOmatic dashboard ([#1410](https://github.com/nystudio107/craft-seomatic/issues/1410))
* Fixed an issue where an exception could be thrown when generating a sitemap with assets, and the field mapping was empty ([#1425](https://github.com/nystudio107/craft-seomatic/issues/1425))
* Fixed an issue where the `@id` in the `mainEntityOfPage` JSON-LD wouldn't be correct if the `identity` and `creator` were not the same ([#1431](https://github.com/nystudio107/craft-seomatic/pull/1431))

## 5.0.0-beta.5 - 2024.02.20
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

## 5.0.0-beta.4 - 2024.02.13
### Fixed
* Fixed a regression where the `robots` tag would be set to `none` for CP requests, which is incorrect, because GraphQL and meta container endpoints are CP requests  ([#1414](https://github.com/nystudio107/craft-seomatic/issues/1414))

## 5.0.0-beta.3 - 2024.02.09
### Added
* Add `phpstan` and `ecs` code linting
* Add `code-analysis.yaml` GitHub action
* Added a custom Field icon

### Changed
* `getContentColumnType()` -> `dbType()`, add `phpType()` in the Field classes
* PHPstan code cleanup
* ECS code cleanup

### Fixed
* Fixed an issue where `DynamicMeta` didn't properly take into account that `robots` can be a comma delimited list of values now ([#1399](https://github.com/nystudio107/craft-seomatic/issues/1399))
* Fixed an issue where a `robots` setting of `none` or `noindex` in the Content SEO settings make it impossible to override the `robots` setting in an SEO Settings field ([#1399](https://github.com/nystudio107/craft-seomatic/issues/1399))
* Added  the unused `static` to the Tailwind CSS `blocklist` to avoid a name collision with a Craft CSS class ([#1412](https://github.com/nystudio107/craft-seomatic/issues/1412))
* Added `webp` and `gif` as allowed social media image formats now that the social media sites accept them, and guard against no transform existing ([#1411](https://github.com/nystudio107/craft-seomatic/issues/1411))
* Fixed an issue with the Sites menu styling

## 5.0.0-beta.2 - 2024.01.23
### Fixed
* Fixed an issue where matrix blocks in an entry would throw an error when saving, because they have no section ([#1406](https://github.com/nystudio107/craft-seomatic/issues/1406))

## 5.0.0-beta.1 - 2024.01.22
### Added
* Initial beta release for Craft CMS 5
