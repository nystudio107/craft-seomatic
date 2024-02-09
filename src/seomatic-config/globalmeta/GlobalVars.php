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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    '*' => [
        'mainEntityOfPage' => 'WebSite',
        'seoTitle' => '',
        'siteNamePosition' => 'before',
        'seoDescription' => '',
        'seoKeywords' => '',
        'seoImage' => '',
        'seoImageWidth' => '',
        'seoImageHeight' => '',
        'seoImageDescription' => '',
        'canonicalUrl' => '{{ seomatic.helper.safeCanonicalUrl() }}',
        'robots' => 'all',
        'ogType' => 'website',
        'ogTitle' => '{{ seomatic.meta.seoTitle }}',
        'ogSiteNamePosition' => 'none',
        'ogDescription' => '{{ seomatic.meta.seoDescription }}',
        'ogImage' => '{{ seomatic.meta.seoImage }}',
        'ogImageWidth' => '{{ seomatic.meta.seoImageWidth }}',
        'ogImageHeight' => '{{ seomatic.meta.seoImageHeight }}',
        'ogImageDescription' => '{{ seomatic.meta.seoImageDescription }}',
        'twitterCard' => 'summary',
        'twitterCreator' => '{{ seomatic.site.twitterHandle }}',
        'twitterTitle' => '{{ seomatic.meta.seoTitle }}',
        'twitterSiteNamePosition' => 'none',
        'twitterDescription' => '{{ seomatic.meta.seoDescription }}',
        'twitterImage' => '{{ seomatic.meta.seoImage }}',
        'twitterImageWidth' => '{{ seomatic.meta.seoImageWidth }}',
        'twitterImageHeight' => '{{ seomatic.meta.seoImageHeight }}',
        'twitterImageDescription' => '{{ seomatic.meta.seoImageDescription }}',
    ],
];
