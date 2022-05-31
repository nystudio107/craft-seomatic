<?php
/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for AnatomicalStructure.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AnatomicalStructure
 */

trait AnatomicalStructureTrait
{
    
    /**
     * Location in the body of the anatomical structure.
     *
     * @var string|Text
     */
    public $bodyLocation;

    /**
     * Other anatomical structures to which this structure is connected.
     *
     * @var AnatomicalStructure
     */
    public $connectedTo;

    /**
     * The anatomical or organ system that this structure is part of.
     *
     * @var AnatomicalSystem
     */
    public $partOfSystem;

    /**
     * A medical therapy related to this anatomy.
     *
     * @var MedicalTherapy
     */
    public $relatedTherapy;

    /**
     * An image containing a diagram that illustrates the structure and/or its
     * component substructures and/or connections with other structures.
     *
     * @var ImageObject
     */
    public $diagram;

    /**
     * A medical condition associated with this anatomy.
     *
     * @var MedicalCondition
     */
    public $relatedCondition;

    /**
     * Component (sub-)structure(s) that comprise this anatomical structure.
     *
     * @var AnatomicalStructure
     */
    public $subStructure;

    /**
     * If applicable, a description of the pathophysiology associated with the
     * anatomical system, including potential abnormal changes in the mechanical,
     * physical, and biochemical functions of the system.
     *
     * @var string|Text
     */
    public $associatedPathophysiology;

}
