<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Legislation - A legal document such as an act, decree, bill, etc.
 * (enforceable or not) or a component of a legal act (like an article).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Legislation
 */
class Legislation extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Legislation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Legislation';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A legal document such as an act, decree, bill, etc. (enforceable or not) or a component of a legal act (like an article).';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================
    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'legislationApplies',
        'legislationChanges',
        'legislationConsolidates',
        'legislationDate',
        'legislationDateVersion',
        'legislationIdentifier',
        'legislationJurisdiction',
        'legislationLegalForce',
        'legislationPassedBy',
        'legislationResponsible',
        'legislationTransposes',
        'legislationType'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'legislationApplies' => ['Legislation'],
        'legislationChanges' => ['Legislation'],
        'legislationConsolidates' => ['Legislation'],
        'legislationDate' => ['Date'],
        'legislationDateVersion' => ['Date'],
        'legislationIdentifier' => ['Text', 'URL'],
        'legislationJurisdiction' => ['AdministrativeArea', 'Text'],
        'legislationLegalForce' => ['LegalForceStatus'],
        'legislationPassedBy' => ['Organization', 'Person'],
        'legislationResponsible' => ['Organization', 'Person'],
        'legislationTransposes' => ['Legislation'],
        'legislationType' => ['CategoryCode', 'Text']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'legislationApplies' => 'Indicates that this legislation (or part of a legislation) somehow transfers another legislation in a different legislative context. This is an informative link, and it has no legal value. For legally-binding links of transposition, use the legislationTransposes property. For example an informative consolidated law of a European Union\'s member state "applies" the consolidated version of the European Directive implemented in it.',
        'legislationChanges' => 'Another legislation that this legislation changes. This encompasses the notions of amendment, replacement, correction, repeal, or other types of change. This may be a direct change (textual or non-textual amendment) or a consequential or indirect change. The property is to be used to express the existence of a change relationship between two acts rather than the existence of a consolidated version of the text that shows the result of the change. For consolidation relationships, use the legislationConsolidates property.',
        'legislationConsolidates' => 'Indicates another legislation taken into account in this consolidated legislation (which is usually the product of an editorial process that revises the legislation). This property should be used multiple times to refer to both the original version or the previous consolidated version, and to the legislations making the change.',
        'legislationDate' => 'The date of adoption or signature of the legislation. This is the date at which the text is officially aknowledged to be a legislation, even though it might not even be published or in force.',
        'legislationDateVersion' => 'The point-in-time at which the provided description of the legislation is valid (e.g. : when looking at the law on the 2016-04-07 (= dateVersion), I get the consolidation of 2015-04-12 of the "National Insurance Contributions Act 2015")',
        'legislationIdentifier' => 'An identifier for the legislation. This can be either a string-based identifier, like the CELEX at EU level or the NOR in France, or a web-based, URL/URI identifier, like an ELI (European Legislation Identifier) or an URN-Lex.',
        'legislationJurisdiction' => 'The jurisdiction from which the legislation originates.',
        'legislationLegalForce' => 'Whether the legislation is currently in force, not in force, or partially in force.',
        'legislationPassedBy' => 'The person or organization that originally passed or made the law : typically parliament (for primary legislation) or government (for secondary legislation). This indicates the "legal author" of the law, as opposed to its physical author.',
        'legislationResponsible' => 'An individual or organization that has some kind of responsibility for the legislation. Typically the ministry who is/was in charge of elaborating the legislation, or the adressee for potential questions about the legislation once it is published.',
        'legislationTransposes' => 'Indicates that this legislation (or part of legislation) fulfills the objectives set by another legislation, by passing appropriate implementation measures. Typically, some legislations of European Union\'s member states or regions transpose European Directives. This indicates a legally binding link between the 2 legislations.',
        'legislationType' => 'The type of the legislation. Examples of values are "law", "act", "directive", "decree", "regulation", "statutory instrument", "loi organique", "règlement grand-ducal", etc., depending on the country.'
    ];
    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];
    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];
    /**
     * Indicates that this legislation (or part of a legislation) somehow
     * transfers another legislation in a different legislative context. This is
     * an informative link, and it has no legal value. For legally-binding links
     * of transposition, use the legislationTransposes property. For example an
     * informative consolidated law of a European Union's member state "applies"
     * the consolidated version of the European Directive implemented in it.
     *
     * @var Legislation [schema.org types: Legislation]
     */
    public $legislationApplies;
    /**
     * Another legislation that this legislation changes. This encompasses the
     * notions of amendment, replacement, correction, repeal, or other types of
     * change. This may be a direct change (textual or non-textual amendment) or a
     * consequential or indirect change. The property is to be used to express the
     * existence of a change relationship between two acts rather than the
     * existence of a consolidated version of the text that shows the result of
     * the change. For consolidation relationships, use the
     * legislationConsolidates property.
     *
     * @var Legislation [schema.org types: Legislation]
     */
    public $legislationChanges;
    /**
     * Indicates another legislation taken into account in this consolidated
     * legislation (which is usually the product of an editorial process that
     * revises the legislation). This property should be used multiple times to
     * refer to both the original version or the previous consolidated version,
     * and to the legislations making the change.
     *
     * @var Legislation [schema.org types: Legislation]
     */
    public $legislationConsolidates;
    /**
     * The date of adoption or signature of the legislation. This is the date at
     * which the text is officially aknowledged to be a legislation, even though
     * it might not even be published or in force.
     *
     * @var Date [schema.org types: Date]
     */
    public $legislationDate;
    /**
     * The point-in-time at which the provided description of the legislation is
     * valid (e.g. : when looking at the law on the 2016-04-07 (= dateVersion), I
     * get the consolidation of 2015-04-12 of the "National Insurance
     * Contributions Act 2015")
     *
     * @var Date [schema.org types: Date]
     */
    public $legislationDateVersion;
    /**
     * An identifier for the legislation. This can be either a string-based
     * identifier, like the CELEX at EU level or the NOR in France, or a
     * web-based, URL/URI identifier, like an ELI (European Legislation
     * Identifier) or an URN-Lex.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $legislationIdentifier;
    /**
     * The jurisdiction from which the legislation originates.
     *
     * @var mixed|AdministrativeArea|string [schema.org types: AdministrativeArea, Text]
     */
    public $legislationJurisdiction;

    // Static Protected Properties
    // =========================================================================
    /**
     * Whether the legislation is currently in force, not in force, or partially
     * in force.
     *
     * @var LegalForceStatus [schema.org types: LegalForceStatus]
     */
    public $legislationLegalForce;
    /**
     * The person or organization that originally passed or made the law :
     * typically parliament (for primary legislation) or government (for secondary
     * legislation). This indicates the "legal author" of the law, as opposed to
     * its physical author.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $legislationPassedBy;
    /**
     * An individual or organization that has some kind of responsibility for the
     * legislation. Typically the ministry who is/was in charge of elaborating the
     * legislation, or the adressee for potential questions about the legislation
     * once it is published.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $legislationResponsible;
    /**
     * Indicates that this legislation (or part of legislation) fulfills the
     * objectives set by another legislation, by passing appropriate
     * implementation measures. Typically, some legislations of European Union's
     * member states or regions transpose European Directives. This indicates a
     * legally binding link between the 2 legislations.
     *
     * @var Legislation [schema.org types: Legislation]
     */
    public $legislationTransposes;
    /**
     * The type of the legislation. Examples of values are "law", "act",
     * "directive", "decree", "regulation", "statutory instrument", "loi
     * organique", "règlement grand-ducal", etc., depending on the country.
     *
     * @var mixed|CategoryCode|string [schema.org types: CategoryCode, Text]
     */
    public $legislationType;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['legislationApplies', 'legislationChanges', 'legislationConsolidates', 'legislationDate', 'legislationDateVersion', 'legislationIdentifier', 'legislationJurisdiction', 'legislationLegalForce', 'legislationPassedBy', 'legislationResponsible', 'legislationTransposes', 'legislationType'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
