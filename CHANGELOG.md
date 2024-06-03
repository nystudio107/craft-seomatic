# SEOmatic Changelog

## 5.0.4 - UNRELEASED
### Fixed
* Fixed an issue that could cause an exception to be thrown if the selected asset for the Creator or Identity brand image was deleted ([#1472](https://github.com/nystudio107/craft-seomatic/issues/1472))

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
