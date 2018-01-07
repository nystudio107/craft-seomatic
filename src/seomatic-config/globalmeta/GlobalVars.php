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
        'ogTitle'              => '{seomatic.globals.seoTitle}',
        'ogDescription'        => '{seomatic.globals.seoDescription}',
        'ogImage'              => '{seomatic.globals.seoImage}',
        'twitterCard'          => 'summary',
        'twitterCreator'       => '{seomatic.settings.twitterHandle}',
        'twitterTitle'         => '{seomatic.globals.seoTitle}',
        'twitterDescription'   => '{seomatic.globals.seoDescription}',
        'twitterImage'         => '{seomatic.globals.seoImage}',
    ]
];
