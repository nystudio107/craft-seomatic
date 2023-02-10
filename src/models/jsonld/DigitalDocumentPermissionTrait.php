<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
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
     * @var Audience|Organization|ContactPoint|Person
     */
    public $grantee;

    /**
     * The type of permission granted the person, organization, or audience.
     *
     * @var DigitalDocumentPermissionType
     */
    public $permissionType;
}
