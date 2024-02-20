<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for DigitalDocumentPermission.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DigitalDocumentPermission
 */
trait DigitalDocumentPermissionTrait
{
    /**
     * The person, organization, contact point, or audience that has been granted
     * this permission.
     *
     * @var array|Audience|Audience[]|array|Person|Person[]|array|ContactPoint|ContactPoint[]|array|Organization|Organization[]
     */
    public $grantee;

    /**
     * The type of permission granted the person, organization, or audience.
     *
     * @var array|DigitalDocumentPermissionType|DigitalDocumentPermissionType[]
     */
    public $permissionType;
}
