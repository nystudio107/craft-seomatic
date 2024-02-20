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
 * Trait for AnatomicalStructure.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AnatomicalStructure
 */
trait AnatomicalStructureTrait
{
    /**
     * A medical therapy related to this anatomy.
     *
     * @var array|MedicalTherapy|MedicalTherapy[]
     */
    public $relatedTherapy;

    /**
     * Other anatomical structures to which this structure is connected.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $connectedTo;

    /**
     * Component (sub-)structure(s) that comprise this anatomical structure.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $subStructure;

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
     * The anatomical or organ system that this structure is part of.
     *
     * @var array|AnatomicalSystem|AnatomicalSystem[]
     */
    public $partOfSystem;

    /**
     * An image containing a diagram that illustrates the structure and/or its
     * component substructures and/or connections with other structures.
     *
     * @var array|ImageObject|ImageObject[]
     */
    public $diagram;

    /**
     * Location in the body of the anatomical structure.
     *
     * @var string|array|Text|Text[]
     */
    public $bodyLocation;
}
