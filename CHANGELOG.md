# SEOmatic Changelog

### 3.0.0-beta.5 - 2018.03.15
## Added

## Changed
* Fixed an issue where the caching didn't work properly for multi-sites

### 3.0.0-beta.4 - 2018.03.14
## Added
* Added a validation rule for `genericAddressCountry` so it saves
* Added a validation rules for `renderEnabled`, `separatorChar`, `displayAnalysisSidebar` and `displayPreviewSidebar` so you can save the plugin settings.
* Added initial Dashboard

## Changed
* Don't install event listeners until after all plugins have loaded, to ensure db migrations have been run

### 3.0.0-beta.3 - 2018.03.14
### Added
* Added a migration for older Craft 2.x sites that had SEOmatic installed already, so that SEOmatic for Craft 3 can install its base tables

## Changed
* Fixed an issue with an incorrect redirect destination after saving a Tracking Scripts setting in the AdminCP
* Optimized the images used in the documentation

### 3.0.0-beta.2 - 2018.03.13
## Changed
* Fixed issues with `: void` on PHP 7.0.x

### 3.0.0-beta.1 - 2018.03.13
## Added
* Initial beta release
