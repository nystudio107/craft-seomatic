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
 * Trait for BioChemEntity.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BioChemEntity
 */
trait BioChemEntityTrait
{
    /**
     * Indicates a BioChemEntity that (in some sense) has this BioChemEntity as a
     * part.
     *
     * @var BioChemEntity
     */
    public $hasBioChemEntityPart;

    /**
     * Another BioChemEntity encoding by this one.
     *
     * @var Gene
     */
    public $isEncodedByBioChemEntity;

    /**
     * The taxonomic grouping of the organism that expresses, encodes, or in some
     * way related to the BioChemEntity.
     *
     * @var string|URL|DefinedTerm|Text|Taxon
     */
    public $taxonomicRange;

    /**
     * Subcellular location where this BioChemEntity is located; please use
     * PropertyValue if you want to include any evidence.
     *
     * @var URL|DefinedTerm|PropertyValue
     */
    public $isLocatedInSubcellularLocation;

    /**
     * A BioChemEntity that is known to interact with this item.
     *
     * @var BioChemEntity
     */
    public $bioChemInteraction;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var Grant
     */
    public $funding;

    /**
     * Indicates a BioChemEntity that is (in some sense) a part of this
     * BioChemEntity.
     *
     * @var BioChemEntity
     */
    public $isPartOfBioChemEntity;

    /**
     * A similar BioChemEntity, e.g., obtained by fingerprint similarity
     * algorithms.
     *
     * @var BioChemEntity
     */
    public $bioChemSimilarity;

    /**
     * A common representation such as a protein sequence or chemical structure
     * for this entity. For images use schema.org/image.
     *
     * @var string|Text|URL|PropertyValue
     */
    public $hasRepresentation;

    /**
     * A role played by the BioChemEntity within a biological context.
     *
     * @var DefinedTerm
     */
    public $biologicalRole;

    /**
     * Biological process this BioChemEntity is involved in; please use
     * PropertyValue if you want to include any evidence.
     *
     * @var DefinedTerm|PropertyValue|URL
     */
    public $isInvolvedInBiologicalProcess;

    /**
     * Disease associated to this BioChemEntity. Such disease can be a
     * MedicalCondition or a URL. If you want to add an evidence supporting the
     * association, please use PropertyValue.
     *
     * @var MedicalCondition|URL|PropertyValue
     */
    public $associatedDisease;

    /**
     * Molecular function performed by this BioChemEntity; please use
     * PropertyValue if you want to include any evidence.
     *
     * @var URL|DefinedTerm|PropertyValue
     */
    public $hasMolecularFunction;
}
