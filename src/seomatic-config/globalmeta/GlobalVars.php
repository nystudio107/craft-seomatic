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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    '*' => [
        'seoTitle'             => 'Global SEO Title',
        'seoDescription'       => 'Global SEO Description',
        'seoImage'             => 'Global SEO Image',
        'canonicalUrl'         => '{{ craft.app.request.pathInfo }}',
        'robots'               => 'all',
        'ogType'               => 'Website',
        'ogTitle'              => '{seomatic.meta.seoTitle}',
        'ogDescription'        => '{seomatic.meta.seoDescription}',
        'ogImage'              => '{seomatic.meta.seoImage}',
        'twitterCard'          => 'summary',
        'twitterCreator'       => '{seomatic.config.twitterHandle}',
        'twitterTitle'         => '{seomatic.meta.seoTitle}',
        'twitterDescription'   => '{seomatic.meta.seoDescription}',
        'twitterImage'         => '{seomatic.meta.seoImage}',
    ]
];
