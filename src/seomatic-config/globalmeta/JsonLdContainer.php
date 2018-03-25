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
                'url'              => '{seomatic.meta.canonicalUrl}',
                'mainEntityOfPage' => '{seomatic.meta.canonicalUrl}',
                'inLanguage'       => '{seomatic.meta.language}',
            ],
            'identity'         => [
                'type'             => '{seomatic.site.identity.computedType}',
                'id'               => '{seomatic.site.identity.genericUrl}#identity',
                'name'             => '{seomatic.site.identity.genericName}',
                'alternateName'    => '{seomatic.site.identity.genericAlternateName}',
                'description'      => '{seomatic.site.identity.genericDescription}',
                'image'            => [
                    'type'   => 'ImageObject',
                    'url'    => '{seomatic.site.identity.genericImage}',
                    'width'  => '{seomatic.site.identity.genericImageWidth}',
                    'height' => '{seomatic.site.identity.genericImageHeight}',
                ],
                'logo'             => [
                    'type'   => 'ImageObject',
                    'url'    => '{seomatic.site.identity.genericImage}',
                    'width'  => '{seomatic.site.identity.genericImageWidth}',
                    'height' => '{seomatic.site.identity.genericImageHeight}',
                ],
                'url'              => '{seomatic.site.identity.genericUrl}',
                'inLanguage'       => '{seomatic.meta.language}',
                'founder'          => 'organizationFounder',
                'foundingDate'     => 'organizationFoundingDate',
                'foundingLocation' => 'organizationFoundingLocation',
            ],
        ],
    ],
];
