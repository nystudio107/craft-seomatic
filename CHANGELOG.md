# SEOmatic Changelog

## 5.0.0-beta.8 - UNRELEASED
### Fixed
* Convert `MatrixBlock` -> `Entry` and `MatrixBlockQuery` -> `EntryQuery`

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
