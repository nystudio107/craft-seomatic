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
 * Trait for MedicalOrganization.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalOrganization
 */
trait MedicalOrganizationTrait
{
    /**
     * Whether the provider is accepting new patients.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isAcceptingNewPatients;

    /**
     * A medical specialty of the provider.
     *
     * @var array|MedicalSpecialty|MedicalSpecialty[]
     */
    public $medicalSpecialty;

    /**
     * Name or unique ID of network. (Networks are often reused across different
     * insurance plans.)
     *
     * @var string|array|Text|Text[]
     */
    public $healthPlanNetworkId;
}
