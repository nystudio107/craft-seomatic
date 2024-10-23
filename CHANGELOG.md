# SEOmatic Changelog

## 5.1.6 - UNRELEASED
### Changed
* No longer do a potentially expensive query on page load for sections that have a massive number of entries ([#1526](https://github.com/nystudio107/craft-seomatic/issues/1526))

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
