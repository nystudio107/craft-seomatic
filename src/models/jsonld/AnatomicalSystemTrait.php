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
 * Trait for AnatomicalSystem.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AnatomicalSystem
 */
trait AnatomicalSystemTrait
{
    /**
     * If applicable, a description of the pathophysiology associated with the
     * anatomical system, including potential abnormal changes in the mechanical,
     * physical, and biochemical functions of the system.
     *
     * @var string|Text
     */
    public $associatedPathophysiology;

    /**
     * A medical therapy related to this anatomy.
     *
     * @var MedicalTherapy
     */
    public $relatedTherapy;

    /**
     * Specifying something physically contained by something else. Typically used
     * here for the underlying anatomical structures, such as organs, that
     * comprise the anatomical system.
     *
     * @var AnatomicalStructure|AnatomicalSystem
     */
    public $comprisedOf;

    /**
     * Related anatomical structure(s) that are not part of the system but relate
     * or connect to it, such as vascular bundles associated with an organ system.
     *
     * @var AnatomicalStructure
     */
    public $relatedStructure;

    /**
     * A medical condition associated with this anatomy.
     *
     * @var MedicalCondition
     */
    public $relatedCondition;
}
