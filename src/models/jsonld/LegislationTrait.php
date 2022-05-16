<?php
/**
 * SEOmatic plugin for Craft CMS 4
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
 * Trait for Legislation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Legislation
 */

trait LegislationTrait
{
    
    /**
     * Indicates that this legislation (or part of legislation) fulfills the
     * objectives set by another legislation, by passing appropriate
     * implementation measures. Typically, some legislations of European Union's
     * member states or regions transpose European Directives. This indicates a
     * legally binding link between the 2 legislations.
     *
     * @var Legislation
     */
    public $legislationTransposes;

    /**
     * Whether the legislation is currently in force, not in force, or partially
     * in force.
     *
     * @var LegalForceStatus
     */
    public $legislationLegalForce;

    /**
     * The type of the legislation. Examples of values are "law", "act",
     * "directive", "decree", "regulation", "statutory instrument", "loi
     * organique", "règlement grand-ducal", etc., depending on the country.
     *
     * @var string|CategoryCode|Text
     */
    public $legislationType;

    /**
     * Indicates a legal jurisdiction, e.g. of some legislation, or where some
     * government service is based.
     *
     * @var string|Text|AdministrativeArea
     */
    public $jurisdiction;

    /**
     * An identifier for the legislation. This can be either a string-based
     * identifier, like the CELEX at EU level or the NOR in France, or a
     * web-based, URL/URI identifier, like an ELI (European Legislation
     * Identifier) or an URN-Lex.
     *
     * @var string|Text|URL
     */
    public $legislationIdentifier;

    /**
     * Another legislation that this legislation changes. This encompasses the
     * notions of amendment, replacement, correction, repeal, or other types of
     * change. This may be a direct change (textual or non-textual amendment) or a
     * consequential or indirect change. The property is to be used to express the
     * existence of a change relationship between two acts rather than the
     * existence of a consolidated version of the text that shows the result of
     * the change. For consolidation relationships, use the <a
     * href="/legislationConsolidates">legislationConsolidates</a> property.
     *
     * @var Legislation
     */
    public $legislationChanges;

    /**
     * An individual or organization that has some kind of responsibility for the
     * legislation. Typically the ministry who is/was in charge of elaborating the
     * legislation, or the adressee for potential questions about the legislation
     * once it is published.
     *
     * @var Organization|Person
     */
    public $legislationResponsible;

    /**
     * The jurisdiction from which the legislation originates.
     *
     * @var string|AdministrativeArea|Text
     */
    public $legislationJurisdiction;

    /**
     * The date of adoption or signature of the legislation. This is the date at
     * which the text is officially aknowledged to be a legislation, even though
     * it might not even be published or in force.
     *
     * @var Date
     */
    public $legislationDate;

    /**
     * The person or organization that originally passed or made the law :
     * typically parliament (for primary legislation) or government (for secondary
     * legislation). This indicates the "legal author" of the law, as opposed to
     * its physical author.
     *
     * @var Person|Organization
     */
    public $legislationPassedBy;

    /**
     * Indicates another legislation taken into account in this consolidated
     * legislation (which is usually the product of an editorial process that
     * revises the legislation). This property should be used multiple times to
     * refer to both the original version or the previous consolidated version,
     * and to the legislations making the change.
     *
     * @var Legislation
     */
    public $legislationConsolidates;

    /**
     * Indicates that this legislation (or part of a legislation) somehow
     * transfers another legislation in a different legislative context. This is
     * an informative link, and it has no legal value. For legally-binding links
     * of transposition, use the <a
     * href="/legislationTransposes">legislationTransposes</a> property. For
     * example an informative consolidated law of a European Union's member state
     * "applies" the consolidated version of the European Directive implemented in
     * it.
     *
     * @var Legislation
     */
    public $legislationApplies;

    /**
     * The point-in-time at which the provided description of the legislation is
     * valid (e.g. : when looking at the law on the 2016-04-07 (= dateVersion), I
     * get the consolidation of 2015-04-12 of the "National Insurance
     * Contributions Act 2015")
     *
     * @var Date
     */
    public $legislationDateVersion;

}
