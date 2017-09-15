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
    'twitter:card'        => [
        'charset'   => '',
        'content'   => 'summary',
        'httpEquiv' => '',
        'name'      => 'twitter:card',
    ],
    'twitter:site'        => [
        'charset'   => '',
        'content'   => '@{seomatic.social.twitterHandle}',
        'httpEquiv' => '',
        'name'      => 'twitter:site',
    ],
    'twitter:title'       => [
        'charset'   => '',
        'content'   => '{seomatic.seo.title}',
        'httpEquiv' => '',
        'name'      => 'twitter:title',
    ],
    'twitter:description' => [
        'charset'   => '',
        'content'   => '{seomatic.seo.description}',
        'httpEquiv' => '',
        'name'      => 'twitter:description',
    ],
];
