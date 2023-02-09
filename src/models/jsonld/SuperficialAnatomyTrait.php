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
 * Trait for SuperficialAnatomy.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SuperficialAnatomy
 */
trait SuperficialAnatomyTrait
{
    /**
     * Anatomical systems or structures that relate to the superficial anatomy.
     *
     * @var AnatomicalSystem|AnatomicalStructure
     */
    public $relatedAnatomy;

    /**
     * If applicable, a description of the pathophysiology associated with the
     * anatomical system, including potential abnormal changes in the mechanical,
     * physical, and biochemical functions of the system.
     *
     * @var string|Text
     */
    public $associatedPathophysiology;

    /**
     * The significance associated with the superficial anatomy; as an example,
     * how characteristics of the superficial anatomy can suggest underlying
     * medical conditions or courses of treatment.
     *
     * @var string|Text
     */
    public $significance;

    /**
     * A medical therapy related to this anatomy.
     *
     * @var MedicalTherapy
     */
    public $relatedTherapy;

    /**
     * A medical condition associated with this anatomy.
     *
     * @var MedicalCondition
     */
    public $relatedCondition;
}
