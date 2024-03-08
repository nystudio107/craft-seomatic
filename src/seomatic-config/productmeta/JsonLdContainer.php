<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\services\JsonLd as JsonLdService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
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
                'dateCreated' => '{{ product.dateCreated|atom }}',
                'dateModified' => '{{ product.dateUpdated|atom }}',
                'datePublished' => '{{ product.postDate|atom }}',
                'copyrightYear' => '{{ product.postDate|date("Y") }}',
                'inLanguage' => '{{ seomatic.meta.language }}',
                'copyrightHolder' => [
                    'id' => '{{ parseEnv(seomatic.site.identity.genericUrl) }}#identity',
                ],
                'author' => [
                    'id' => '{{ parseEnv(seomatic.site.identity.genericUrl) }}#identity',
                ],
                'creator' => [
                    'id' => '{{ parseEnv(seomatic.site.creator.genericUrl) }}#creator',
                ],
                'publisher' => [
                    'id' => '{{ parseEnv(seomatic.site.creator.genericUrl) }}#creator',
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
                'sku' => '{{ product.getDefaultVariant().getSku() }}',
                'offers' => [
                    'type' => 'Offer',
                    'url' => '{{ seomatic.meta.canonicalUrl }}',
                    'price' => '{{ product.getDefaultVariant().getSalePrice()|number_format(2, ".", "") }}',
                    'priceCurrency' => '{{ craft.commerce.paymentCurrencies.primaryPaymentCurrencyIso() }}',
                    'offeredBy' => [
                        'id' => '{{ parseEnv(seomatic.site.identity.genericUrl) }}#identity',
                    ],
                    'seller' => [
                        'id' => '{{ parseEnv(seomatic.site.identity.genericUrl) }}#identity',
                    ],
                    'availability' => 'http://schema.org/{% if product.hasUnlimitedStock or product.totalStock > 0 %}InStock{% else %}OutOfStock{% endif %}',
                ],
            ],
        ],
    ],
];
