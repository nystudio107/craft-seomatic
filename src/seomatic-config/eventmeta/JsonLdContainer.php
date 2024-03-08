<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\services\JsonLd as JsonLdService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */

return [
    MetaJsonLdContainer::CONTAINER_TYPE . JsonLdService::GENERAL_HANDLE => [
        'name' => 'General',
        'description' => 'JsonLd Tags',
        'handle' => JsonLdService::GENERAL_HANDLE,
        'class' => (string)MetaJsonLdContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
            'mainEntityOfPage' => [
                'type' => '{{ seomatic.meta.mainEntityOfPage }}',
                'name' => '{{ seomatic.meta.seoTitle }}',
                'headline' => '{{ seomatic.meta.seoTitle }}',
                'description' => '{{ seomatic.meta.seoDescription }}',
                'url' => '{{ seomatic.meta.canonicalUrl }}',
                'mainEntityOfPage' => '{{ seomatic.meta.canonicalUrl }}',
                'startDate' => '{{ event.startDateLocalized|atom }}',
                'endDate' => '{{ event.endDateLocalized|atom }}',
                'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
                'eventStatus' => 'https://schema.org/EventScheduled',
                'inLanguage' => '{{ seomatic.meta.language }}',
                'location' => [
                    'type' => 'Place',
                    'address' => '{{ seomatic.meta.seoTitle }}',
                    'name' => '{{ seomatic.meta.seoTitle }}',
                ],
                'organizer' => [
                    'id' => '{{ parseEnv(seomatic.site.identity.genericUrl) }}#identity',
                ],
                'contributor' => [
                    'id' => '{{ parseEnv(seomatic.site.creator.genericUrl) }}#creator',
                ],
                'funder' => [
                    'id' => '{{ parseEnv(seomatic.site.identity.genericUrl) }}#identity',
                ],
                'image' => [
                    'type' => 'ImageObject',
                    'url' => '{{ seomatic.meta.seoImage }}',
                ],
                'potentialAction' => [
                    'type' => 'SearchAction',
                    'target' => '{{ seomatic.site.siteLinksSearchTarget }}',
                    'query-input' => '{{ seomatic.helper.siteLinksQueryInput() }}',
                ],
            ],
        ],
    ],
];
