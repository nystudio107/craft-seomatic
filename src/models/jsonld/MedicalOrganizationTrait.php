<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for MedicalOrganization.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalOrganization
 */
trait MedicalOrganizationTrait
{
    /**
     * Name or unique ID of network. (Networks are often reused across different
     * insurance plans.)
     *
     * @var string|Text
     */
    public $healthPlanNetworkId;

    /**
     * A medical specialty of the provider.
     *
     * @var MedicalSpecialty
     */
    public $medicalSpecialty;

    /**
     * Whether the provider is accepting new patients.
     *
     * @var bool|Boolean
     */
    public $isAcceptingNewPatients;
}
