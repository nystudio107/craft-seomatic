# Site Variables

The `seomatic.site` variable has site-wide settings that are available on a per-site basis for multi-site setups.

* **`seomatic.site.siteName`** – The name of the site.
* **`seomatic.site.twitterHandle`** – The site Twitter handle.
* **`seomatic.site.facebookProfileId`** – The site Facebook profile ID.
* **`seomatic.site.facebookAppId`** – The site Facebook app ID.
* **`seomatic.site.googleSiteVerification`** – The Google Site Verification code.
* **`seomatic.site.bingSiteVerification`** – The Bing Site Verification code.
* **`seomatic.site.pinterestSiteVerification`** – The Pinterest Site Verification code.
* **`seomatic.site.sameAsLinks`** – Array of links for Same As... Sites, indexed by the handle. So for example you could access the site Facebook URL via `seomatic.site.sameAsLinks["facebook"]["url"]`. These links are used to generate the `<meta property="og:same_as">` tags, and are also used in the `sameAs` property in the `mainEntityOfPage` JSON-LD.
* **`seomatic.site.siteLinksSearchTarget`** – Google Site Links search target. [Learn More](https://developers.google.com/search/docs/data-types/sitelinks-searchbox)
* **`seomatic.site.siteLinksQueryInput`** – Google Site Links query input. [Learn More](https://developers.google.com/search/docs/data-types/sitelinks-searchbox)

## Site Identity Variables

The `seomatic.site.identity` variable is used to create [JSON-LD Structured Data](https://developers.google.com/search/docs/guides/intro-structured-data) that _can_ appear as [Rich Snippets](https://developers.google.com/search/docs/guides/mark-up-content) on Google Search Engine Results Pages (SERP). JSON-LD Structured Data helps computers understand context and relationships, and is also read by other social media sites and apps.

The `seomatic.site.identity` encapsulates all of the information associated with the owner of the site.

* **`seomatic.site.identity.siteType`** – The schema.org general type.
* **`seomatic.site.identity.siteSubType`** – The schema.org sub-type.
* **`seomatic.site.identity.siteSpecificType`** – The schema.org specific type.
* **`seomatic.site.identity.computedType`** – The computed most specific schema.org type.
* **`seomatic.site.identity.genericName`** – The name of the entity that owns the site.
* **`seomatic.site.identity.genericAlternateName`** – An alternate or nickname for the entity that owns the site.
* **`seomatic.site.identity.genericDescription`** – A description of the entity that owns the site.
* **`seomatic.site.identity.genericUrl`** – A URL for the entity that owns the site.
* **`seomatic.site.identity.genericImage`** – A URL to an image or logo that represents the entity that owns the site. The image must be in JPG, PNG, or GIF format.
* **`seomatic.site.identity.genericImageWidth`** – The width of the entity image.
* **`seomatic.site.identity.genericImageHeight`** – The height of the entity image.
* **`seomatic.site.identity.genericImageIds`** – Asset ID array for the entity image.
* **`seomatic.site.identity.genericTelephone`** – The primary contact telephone number for the entity that owns the site.
* **`seomatic.site.identity.genericEmail`** – The primary contact email address for the entity that owns the site.
* **`seomatic.site.identity.genericStreetAddress`** – The street address of the entity that owns the website, for example: 123 Main Street.
* **`seomatic.site.identity.genericAddressLocality`** – Locality of the entity that owns the website, for example: Portchester.
* **`seomatic.site.identity.genericAddressRegion`** – The region of the entity that owns the website, for example: New York or NY.
* **`seomatic.site.identity.genericPostalCode`** – The postal code of the entity that owns the website, for example: 14580
* **`seomatic.site.identity.genericAddressCountry`** – The country in which the entity that owns the site is located, for example: US
* **`seomatic.site.identity.genericGeoLatitude`** – The latitude of the location of the entity that owns the website, for example: -120.5436367
* **`seomatic.site.identity.genericGeoLongitude`** – The longitude of the location of the entity that owns the website, for example: 80.6033588
* **`seomatic.site.identity.personGender`** – Only for entities of the type Person, the gender of the person.
* **`seomatic.site.identity.personBirthPlace`** – Only for entities of the type Person, the place where the person was born.
* **`seomatic.site.identity.organizationDuns`** – Only for entities of the type Organization, the DUNS (Dunn & Bradstreet) number of the organization that owns the site.
* **`seomatic.site.identity.organizationFounder`** – Only for entities of the type Organization, the name of the founder of the organization.
* **`seomatic.site.identity.organizationFoundingDate`** – Only for entities of the type Organization, the date the organization/company/restaurant was founded in [ISO 8601 date format](http://schema.org/Date), for example: `2018-03-26`.
* **`seomatic.site.identity.organizationFoundingLocation`** – Only for entities of the type Organization, the location where the organization was founded.
* **`seomatic.site.identity.organizationContactPoints`** – Only for entities of the type Organization, an array of contact points for the organization. [Learn More](https://developers.google.com/search/docs/guides/enhance-site#provide-business-contact-markup)
* **`seomatic.site.identity.corporationTickerSymbol`** – Only for entities of the type Corporation, the exchange ticker symbol of the corporation.
* **`seomatic.site.identity.localBusinessPriceRange`** – Only for entities of the type LocalBusiness, the approximate price range of the goods or services offered by this local business.
* **`seomatic.site.identity.localBusinessOpeningHours`** – Only for entities of the type LocalBusiness, an array of the opening hours for this local business. [Learn More](https://developers.google.com/search/docs/appearance/structured-data/local-business)
* **`seomatic.site.identity.restaurantServesCuisine`** – Only for entities of the type Food Establishment, the primary type of cuisine that the food establishment serves.
* **`seomatic.site.identity.restaurantMenuUrl`** – Only for entities of the type Food Establishment, a URL to the food establishment’s menu.
* **`seomatic.site.identity.restaurantReservationsUrl`** – Only for entities of the type Food Establishment, a URL to the food establishment’s reservations page.

## Site Creator Variables

The `seomatic.site.creator` variable is used to create [JSON-LD Structured Data](https://developers.google.com/search/docs/guides/intro-structured-data) that _can_ appear as [Rich Snippets](https://developers.google.com/search/docs/guides/mark-up-content) on Google Search Engine Results Pages (SERP). JSON-LD Structured Data helps computers understand context and relationships, and is also read by other social media sites and apps.

The `seomatic.site.creator` encapsulates all of the information associated with the creator of the site. This information is also used in the `humans.txt` page

* **`seomatic.site.creator.siteType`** – The schema.org general type.
* **`seomatic.site.creator.siteSubType`** – The schema.org sub-type.
* **`seomatic.site.creator.siteSpecificType`** – The schema.org specific type.
* **`seomatic.site.creator.computedType`** – The computed most specific schema.org type.
* **`seomatic.site.creator.genericName`** – The name of the entity that created the site.
* **`seomatic.site.creator.genericAlternateName`** – An alternate or nickname for the entity that created the site.
* **`seomatic.site.creator.genericDescription`** – A description of the entity that created the site.
* **`seomatic.site.creator.genericUrl`** – A URL for the entity that created the site.
* **`seomatic.site.creator.genericImage`** – A URL to an image or logo that represents the entity that created the site. The image must be in JPG, PNG, or GIF format.
* **`seomatic.site.creator.genericImageWidth`** – The width of the entity image.
* **`seomatic.site.creator.genericImageHeight`** – The height of the entity image.
* **`seomatic.site.creator.genericImageIds`** – Asset ID array for the entity image.
* **`seomatic.site.creator.genericTelephone`** – The primary contact telephone number for the entity that created the site.
* **`seomatic.site.creator.genericEmail`** – The primary contact email address for the entity that created the site.
* **`seomatic.site.creator.genericStreetAddress`** – The street address of the entity that created the website, for example: 123 Main Street.
* **`seomatic.site.creator.genericAddressLocality`** – locality of the entity that created the website, for example: Portchester
* **`seomatic.site.creator.genericAddressRegion`** – The region of the entity that created the website, for example: New York or NY
* **`seomatic.site.creator.genericPostalCode`** – The postal code of the entity that created the website, for example: 14580
* **`seomatic.site.creator.genericAddressCountry`** – The country in which the entity that created the site is located, for example: US
* **`seomatic.site.creator.genericGeoLatitude`** – The latitude of the location of the entity that created the website, for example: -120.5436367
* **`seomatic.site.creator.genericGeoLongitude`** – The longitude of the location of the entity that created the website, for example: 80.6033588
* **`seomatic.site.creator.personGender`** – Only for entities of the type Person, the gender of the person.
* **`seomatic.site.creator.personBirthPlace`** – Only for entities of the type Person, the place where the person was born.
* **`seomatic.site.creator.organizationDuns`** – Only for entities of the type Organization, the DUNS (Dunn & Bradstreet) number of the organization that created the site.
* **`seomatic.site.creator.organizationFounder`** – Only for entities of the type Organization, the name of the founder of the organization.
* **`seomatic.site.creator.organizationFoundingDate`** – Only for entities of the type Organization, the date the organization/company/restaurant was founded in [ISO 8601 date format](http://schema.org/Date), for example: `2018-03-26`
* **`seomatic.site.creator.organizationFoundingLocation`** – Only for entities of the type Organization, the location where the organization was founded.
* **`seomatic.site.creator.organizationContactPoints`** – Only for entities of the type Organization, an array of contact points for the organization. [Learn More](https://developers.google.com/search/docs/guides/enhance-site#provide-business-contact-markup)
* **`seomatic.site.creator.corporationTickerSymbol`** – Only for entities of the type Corporation, the exchange ticker symbol of the corporation.
* **`seomatic.site.creator.localBusinessPriceRange`** – Only for entities of the type LocalBusiness, the approximate price range of the goods or services offered by this local business.
* **`seomatic.site.creator.localBusinessOpeningHours`** – Only for entities of the type LocalBusiness, an array of the opening hours for this local business. [Learn More](https://developers.google.com/search/docs/appearance/structured-data/local-business)
* **`seomatic.site.creator.restaurantServesCuisine`** – Only for entities of the type Food Establishment, the primary type of cuisine that the food establishment serves.
* **`seomatic.site.creator.restaurantMenuUrl`** – Only for entities of the type Food Establishment, a URL to the food establishment’s menu.
* **`seomatic.site.creator.restaurantReservationsUrl`** – Only for entities of the type Food Establishment, a URL to the food establishment’s reservations page.
