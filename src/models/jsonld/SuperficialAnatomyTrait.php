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
 * Trait for SuperficialAnatomy.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SuperficialAnatomy
 */
trait SuperficialAnatomyTrait
{
    /**
     * A medical therapy related to this anatomy.
     *
     * @var array|MedicalTherapy|MedicalTherapy[]
     */
    public $relatedTherapy;

    /**
     * The significance associated with the superficial anatomy; as an example,
     * how characteristics of the superficial anatomy can suggest underlying
     * medical conditions or courses of treatment.
     *
     * @var string|array|Text|Text[]
     */
    public $significance;

    /**
     * Anatomical systems or structures that relate to the superficial anatomy.
     *
     * @var array|AnatomicalSystem|AnatomicalSystem[]|array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $relatedAnatomy;

    /**
     * A medical condition associated with this anatomy.
     *
     * @var array|MedicalCondition|MedicalCondition[]
     */
    public $relatedCondition;

    /**
     * If applicable, a description of the pathophysiology associated with the
     * anatomical system, including potential abnormal changes in the mechanical,
     * physical, and biochemical functions of the system.
     *
     * @var string|array|Text|Text[]
     */
    public $associatedPathophysiology;
}
