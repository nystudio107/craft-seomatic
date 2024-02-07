# SEOmatic Changelog

## 5.0.0-beta.3 - UNRELEASED
### Added
* Add `phpstan` and `ecs` code linting
* Add `code-analysis.yaml` GitHub action

### Changed
* `getContentColumnType()` -> `dbType()`, add `phpType()` in the Field classes
* PHPstan code cleanup
* ECS code cleanup

### Fixed
* Fixed an issue where `DynamicMeta` didn't properly take into account that `robots` can be a comma delimited list of values now ([#1399](https://github.com/nystudio107/craft-seomatic/issues/1399))
* Fixed an issue where a `robots` setting of `none` or `noindex` in the Content SEO settings make it impossible to override the `robots` setting in an SEO Settings field ([#1399](https://github.com/nystudio107/craft-seomatic/issues/1399))
* Added  the unused `static` to the Tailwind CSS `blocklist` to avoid a name collision with a Craft CSS class ([#1412](https://github.com/nystudio107/craft-seomatic/issues/1412))
* Added `webp` and `gif` as allowed social media image formats now that the social media sites accept them, and guard against no transform existing ([#1411](https://github.com/nystudio107/craft-seomatic/issues/1411))

## 5.0.0-beta.2 - 2024.01.23
### Fixed
* Fixed an issue where matrix blocks in an entry would throw an error when saving, because they have no section ([#1406](https://github.com/nystudio107/craft-seomatic/issues/1406))

## 5.0.0-beta.1 - 2024.01.22
### Added
* Initial beta release for Craft CMS 5
