<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

use nystudio107\seomatic\helpers\Dependency;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\services\JsonLd as JsonLdService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    MetaJsonLdContainer::CONTAINER_TYPE.JsonLdService::GENERAL_HANDLE => [
        'name'         => 'General',
        'description'  => 'JsonLd Tags',
        'handle'       => JsonLdService::GENERAL_HANDLE,
        'class'        => (string)MetaJsonLdContainer::class,
        'include'      => true,
        'dependencies' => [
        ],
        'data'         => [
            'mainEntityOfPage' => [
                'type'             => '{seomatic.meta.mainEntityOfPage}',
                'name'             => '{seomatic.meta.seoTitle}',
                'description'      => '{seomatic.meta.seoDescription}',
                'url'              => '{seomatic.meta.canonicalUrl}',
                'mainEntityOfPage' => '{seomatic.meta.canonicalUrl}',
                'inLanguage'       => '{seomatic.meta.language}',
                'copyrightHolder'  => [
                    'id' => '{seomatic.site.identity.genericUrl}#identity',
                ],
                'author'           => [
                    'id' => '{seomatic.site.identity.genericUrl}#identity',
                ],
                'creator'          => [
                    'id' => '{seomatic.site.creator.genericUrl}#creator',
                ],
                'image'            => [
                    'type' => 'ImageObject',
                    'url'  => '{seomatic.meta.seoImage}',
                ],
                'potentialAction'  => [
                    'type'        => 'SearchAction',
                    'target'      => '{seomatic.site.siteLinksSearchTarget}',
                    'query-input' => '{seomatic.helper.siteLinksQueryInput()}',
                ],
            ],
            'identity'         => [
                'type'          => '{seomatic.site.identity.computedType}',
                'id'            => '{seomatic.site.identity.genericUrl}#identity',
                'name'          => '{seomatic.site.identity.genericName}',
                'alternateName' => '{seomatic.site.identity.genericAlternateName}',
                'description'   => '{seomatic.site.identity.genericDescription}',
                'url'           => '{seomatic.site.identity.genericUrl}',
                'telephone'     => '{seomatic.site.identity.genericTelephone}',
                'email'         => '{seomatic.site.identity.genericEmail}',
                'image'         => [
                    'type'   => 'ImageObject',
                    'url'    => '{seomatic.site.identity.genericImage}',
                    'width'  => '{seomatic.site.identity.genericImageWidth}',
                    'height' => '{seomatic.site.identity.genericImageHeight}',
                ],
                'logo'          => [
                    'type'   => 'ImageObject',
                    'url'    => '{seomatic.helper.socialTransform(seomatic.site.identity.genericImageIds[0], "schema-logo")}',
                    'width'  => '{seomatic.helper.socialTransformWidth(seomatic.site.identity.genericImageIds[0], "schema-logo")}',
                    'height' => '{seomatic.helper.socialTransformHeight(seomatic.site.identity.genericImageIds[0], "schema-logo")}',
                ],
                'address'       => [
                    'type'            => 'PostalAddress',
                    'streetAddress'   => '{seomatic.site.identity.genericStreetAddress}',
                    'addressLocality' => '{seomatic.site.identity.genericAddressLocality}',
                    'addressRegion'   => '{seomatic.site.identity.genericAddressRegion}',
                    'postalCode'      => '{seomatic.site.identity.genericPostalCode}',
                    'addressCountry'  => '{seomatic.site.identity.genericAddressCountry}',
                ],
                'geo'           => [
                    'type'      => 'GeoCoordinates',
                    'latitude'  => '{seomatic.site.identity.genericGeoLatitude}',
                    'longitude' => '{seomatic.site.identity.genericGeoLongitude}',
                ],

                'gender'     => '{seomatic.site.identity.personGender}',
                'birthPlace' => '{seomatic.site.identity.personBirthPlace}',

                'duns'             => '{seomatic.site.identity.organizationDuns}',
                'founder'          => '{seomatic.site.identity.organizationFounder}',
                'foundingDate'     => '{seomatic.site.identity.organizationFoundingDate}',
                'foundingLocation' => '{seomatic.site.identity.organizationFoundingLocation}',
                'contactPoints'    => [],

                'tickerSymbol' => '{seomatic.site.identity.corporationTickerSymbol}',

                'priceRange'   => '{seomatic.site.identity.localBusinessPriceRange}',
                'openingHours' => [],

                'servesCuisine'       => '{seomatic.site.identity.restaurantServesCuisine}',
                'menuUrl'             => '{seomatic.site.identity.restaurantMenuUrl}',
                'menu'                => '{seomatic.site.identity.restaurantMenuUrl}',
                'reservationsUrl'     => '{seomatic.site.identity.restaurantReservationsUrl}',
                'acceptsReservations' => '{seomatic.site.identity.restaurantReservationsUrl}',

                'inLanguage' => '{seomatic.meta.language}',
            ],
            'creator'          => [
                'type'          => '{seomatic.site.creator.computedType}',
                'id'            => '{seomatic.site.creator.genericUrl}#creator',
                'name'          => '{seomatic.site.creator.genericName}',
                'alternateName' => '{seomatic.site.creator.genericAlternateName}',
                'description'   => '{seomatic.site.creator.genericDescription}',
                'url'           => '{seomatic.site.creator.genericUrl}',
                'telephone'     => '{seomatic.site.creator.genericTelephone}',
                'email'         => '{seomatic.site.creator.genericEmail}',
                'image'         => [
                    'type'   => 'ImageObject',
                    'url'    => '{seomatic.site.creator.genericImage}',
                    'width'  => '{seomatic.site.creator.genericImageWidth}',
                    'height' => '{seomatic.site.creator.genericImageHeight}',
                ],
                'logo'          => [
                    'type'   => 'ImageObject',
                    'url'    => '{seomatic.helper.socialTransform(seomatic.site.creator.genericImageIds[0], "schema-logo")}',
                    'width'  => '{seomatic.helper.socialTransformWidth(seomatic.site.creator.genericImageIds[0], "schema-logo")}',
                    'height' => '{seomatic.helper.socialTransformHeight(seomatic.site.creator.genericImageIds[0], "schema-logo")}',
                ],
                'address'       => [
                    'type'            => 'PostalAddress',
                    'streetAddress'   => '{seomatic.site.creator.genericStreetAddress}',
                    'addressLocality' => '{seomatic.site.creator.genericAddressLocality}',
                    'addressRegion'   => '{seomatic.site.creator.genericAddressRegion}',
                    'postalCode'      => '{seomatic.site.creator.genericPostalCode}',
                    'addressCountry'  => '{seomatic.site.creator.genericAddressCountry}',
                ],
                'geo'           => [
                    'type'      => 'GeoCoordinates',
                    'latitude'  => '{seomatic.site.creator.genericGeoLatitude}',
                    'longitude' => '{seomatic.site.creator.genericGeoLongitude}',
                ],

                'gender'     => '{seomatic.site.creator.personGender}',
                'birthPlace' => '{seomatic.site.creator.personBirthPlace}',

                'duns'             => '{seomatic.site.creator.organizationDuns}',
                'founder'          => '{seomatic.site.creator.organizationFounder}',
                'foundingDate'     => '{seomatic.site.creator.organizationFoundingDate}',
                'foundingLocation' => '{seomatic.site.creator.organizationFoundingLocation}',
                'contactPoints'    => [],

                'tickerSymbol' => '{seomatic.site.creator.corporationTickerSymbol}',

                'priceRange'   => '{seomatic.site.creator.localBusinessPriceRange}',
                'openingHours' => [],

                'servesCuisine'       => '{seomatic.site.creator.restaurantServesCuisine}',
                'menuUrl'             => '{seomatic.site.creator.restaurantMenuUrl}',
                'menu'                => '{seomatic.site.creator.restaurantMenuUrl}',
                'reservationsUrl'     => '{seomatic.site.creator.restaurantReservationsUrl}',
                'acceptsReservations' => '{seomatic.site.creator.restaurantReservationsUrl}',

                'inLanguage' => '{seomatic.meta.language}',
            ],
        ],
    ],
];
