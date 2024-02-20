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
 * Trait for BioChemEntity.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BioChemEntity
 */
trait BioChemEntityTrait
{
    /**
     * A similar BioChemEntity, e.g., obtained by fingerprint similarity
     * algorithms.
     *
     * @var array|BioChemEntity|BioChemEntity[]
     */
    public $bioChemSimilarity;

    /**
     * A common representation such as a protein sequence or chemical structure
     * for this entity. For images use schema.org/image.
     *
     * @var string|array|PropertyValue|PropertyValue[]|array|Text|Text[]|array|URL|URL[]
     */
    public $hasRepresentation;

    /**
     * The taxonomic grouping of the organism that expresses, encodes, or in some
     * way related to the BioChemEntity.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Taxon|Taxon[]|array|Text|Text[]|array|URL|URL[]
     */
    public $taxonomicRange;

    /**
     * Molecular function performed by this BioChemEntity; please use
     * PropertyValue if you want to include any evidence.
     *
     * @var array|URL|URL[]|array|DefinedTerm|DefinedTerm[]|array|PropertyValue|PropertyValue[]
     */
    public $hasMolecularFunction;

    /**
     * Biological process this BioChemEntity is involved in; please use
     * PropertyValue if you want to include any evidence.
     *
     * @var array|DefinedTerm|DefinedTerm[]|array|PropertyValue|PropertyValue[]|array|URL|URL[]
     */
    public $isInvolvedInBiologicalProcess;

    /**
     * A BioChemEntity that is known to interact with this item.
     *
     * @var array|BioChemEntity|BioChemEntity[]
     */
    public $bioChemInteraction;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var array|Grant|Grant[]
     */
    public $funding;

    /**
     * A role played by the BioChemEntity within a biological context.
     *
     * @var array|DefinedTerm|DefinedTerm[]
     */
    public $biologicalRole;

    /**
     * Indicates a BioChemEntity that is (in some sense) a part of this
     * BioChemEntity.
     *
     * @var array|BioChemEntity|BioChemEntity[]
     */
    public $isPartOfBioChemEntity;

    /**
     * Indicates a BioChemEntity that (in some sense) has this BioChemEntity as a
     * part.
     *
     * @var array|BioChemEntity|BioChemEntity[]
     */
    public $hasBioChemEntityPart;

    /**
     * Another BioChemEntity encoding by this one.
     *
     * @var array|Gene|Gene[]
     */
    public $isEncodedByBioChemEntity;

    /**
     * Subcellular location where this BioChemEntity is located; please use
     * PropertyValue if you want to include any evidence.
     *
     * @var array|URL|URL[]|array|DefinedTerm|DefinedTerm[]|array|PropertyValue|PropertyValue[]
     */
    public $isLocatedInSubcellularLocation;

    /**
     * Disease associated to this BioChemEntity. Such disease can be a
     * MedicalCondition or a URL. If you want to add an evidence supporting the
     * association, please use PropertyValue.
     *
     * @var array|MedicalCondition|MedicalCondition[]|array|URL|URL[]|array|PropertyValue|PropertyValue[]
     */
    public $associatedDisease;
}
