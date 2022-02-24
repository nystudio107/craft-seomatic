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
 * EducationalOccupationalCredential - An educational or occupational
 * credential. A diploma, academic degree, certification, qualification,
 * badge, etc., that may be awarded to a person or other entity that meets the
 * requirements defined by the credentialer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/EducationalOccupationalCredential
 */
class EducationalOccupationalCredential extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'EducationalOccupationalCredential';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/EducationalOccupationalCredential';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An educational or occupational credential. A diploma, academic degree, certification, qualification, badge, etc., that may be awarded to a person or other entity that meets the requirements defined by the credentialer.';

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
        'competencyRequired',
        'credentialCategory',
        'educationalLevel',
        'recognizedBy',
        'validFor',
        'validIn'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'competencyRequired' => ['DefinedTerm', 'Text', 'URL'],
        'credentialCategory' => ['DefinedTerm', 'Text', 'URL'],
        'educationalLevel' => ['DefinedTerm', 'Text', 'URL'],
        'recognizedBy' => ['Organization'],
        'validFor' => ['Duration'],
        'validIn' => ['AdministrativeArea']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'competencyRequired' => 'Knowledge, skill, ability or personal attribute that must be demonstrated by a person or other entity.',
        'credentialCategory' => 'The category or type of credential being described, for example "degree”, “certificate”, “badge”, or more specific term.',
        'educationalLevel' => 'The level in terms of progression through an educational or training context. Examples of educational levels include \'beginner\', \'intermediate\' or \'advanced\', and formal sets of level indicators.',
        'recognizedBy' => 'An organization that acknowledges the validity, value or utility of a credential. Note: recognition may include a process of quality assurance or accreditation.',
        'validFor' => 'The duration of validity of a permit or similar thing.',
        'validIn' => 'The geographic area where a permit or similar thing is valid.'
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
     * Knowledge, skill, ability or personal attribute that must be demonstrated
     * by a person or other entity.
     *
     * @var mixed|DefinedTerm|string|string [schema.org types: DefinedTerm, Text, URL]
     */
    public $competencyRequired;

    // Static Protected Properties
    // =========================================================================
    /**
     * The category or type of credential being described, for example "degree”,
     * “certificate”, “badge”, or more specific term.
     *
     * @var mixed|DefinedTerm|string|string [schema.org types: DefinedTerm, Text, URL]
     */
    public $credentialCategory;
    /**
     * The level in terms of progression through an educational or training
     * context. Examples of educational levels include 'beginner', 'intermediate'
     * or 'advanced', and formal sets of level indicators.
     *
     * @var mixed|DefinedTerm|string|string [schema.org types: DefinedTerm, Text, URL]
     */
    public $educationalLevel;
    /**
     * An organization that acknowledges the validity, value or utility of a
     * credential. Note: recognition may include a process of quality assurance or
     * accreditation.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $recognizedBy;
    /**
     * The duration of validity of a permit or similar thing.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $validFor;
    /**
     * The geographic area where a permit or similar thing is valid.
     *
     * @var AdministrativeArea [schema.org types: AdministrativeArea]
     */
    public $validIn;

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
            [['competencyRequired', 'credentialCategory', 'educationalLevel', 'recognizedBy', 'validFor', 'validIn'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
