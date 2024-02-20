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
 * Trait for AnatomicalSystem.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AnatomicalSystem
 */
trait AnatomicalSystemTrait
{
    /**
     * A medical therapy related to this anatomy.
     *
     * @var array|MedicalTherapy|MedicalTherapy[]
     */
    public $relatedTherapy;

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

    /**
     * Related anatomical structure(s) that are not part of the system but relate
     * or connect to it, such as vascular bundles associated with an organ system.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $relatedStructure;

    /**
     * Specifying something physically contained by something else. Typically used
     * here for the underlying anatomical structures, such as organs, that
     * comprise the anatomical system.
     *
     * @var array|AnatomicalSystem|AnatomicalSystem[]|array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $comprisedOf;
}
