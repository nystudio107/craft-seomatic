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

use nystudio107\seomatic\services\FrontendTemplates;
use nystudio107\seomatic\models\FrontendTemplateContainer;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'name'        => 'Frontend Templates',
    'description' => 'Templates that are rendered on the frontend',
    'handle'      => FrontendTemplates::FRONTENDTEMPLATES_CONTAINER,
    'class'       => (string)FrontendTemplateContainer::class,
    'include'     => true,
    'data'        => [
        FrontendTemplates::HUMANS_TXT_HANDLE => [
            'handle'          => FrontendTemplates::HUMANS_TXT_HANDLE,
            'path'            => 'humans.txt',
            'template'        => '_frontend/pages/humans.twig',
            'controller'      => 'frontend-template',
            'action'          => 'humans',
            'templateString'  => '',
        ],
        FrontendTemplates::ROBOTS_TXT_HANDLE => [
            'handle'          => FrontendTemplates::ROBOTS_TXT_HANDLE,
            'path'            => 'robots.txt',
            'template'        => '_frontend/pages/robots.twig',
            'controller'      => 'frontend-template',
            'action'          => 'robots',
            'templateString'  => '',
        ],
    ],
];
