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
 * Trait for Joint.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Joint
 */
trait JointTrait
{
    /**
     * The degree of mobility the joint allows.
     *
     * @var string|array|MedicalEntity|MedicalEntity[]|array|Text|Text[]
     */
    public $functionalClass;

    /**
     * The biomechanical properties of the bone.
     *
     * @var string|array|Text|Text[]
     */
    public $biomechnicalClass;

    /**
     * The name given to how bone physically connects to each other.
     *
     * @var string|array|Text|Text[]
     */
    public $structuralClass;
}
