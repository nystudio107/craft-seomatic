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

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * StatisticalPopulation - A StatisticalPopulation is a set of instances of a
 * certain given type that satisfy some set of constraints. The property
 * populationType is used to specify the type. Any property that can be used
 * on instances of that type can appear on the statistical population. For
 * example, a StatisticalPopulation representing all Persons with a
 * homeLocation of East Podunk California, would be described by applying the
 * appropriate homeLocation and populationType properties to a
 * StatisticalPopulation item that stands for that set of people. The
 * properties numConstraints and constrainingProperties are used to specify
 * which of the populations properties are used to specify the population.
 * Note that the sense of "population" used here is the general sense of a
 * statistical population, and does not imply that the population consists of
 * people. For example, a populationType of Event or NewsArticle could be
 * used. See also Observation, and the data and datasets overview for more
 * details.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/StatisticalPopulation
 */
class StatisticalPopulation extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'StatisticalPopulation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/StatisticalPopulation';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A StatisticalPopulation is a set of instances of a certain given type that satisfy some set of constraints. The property populationType is used to specify the type. Any property that can be used on instances of that type can appear on the statistical population. For example, a StatisticalPopulation representing all Persons with a homeLocation of East Podunk California, would be described by applying the appropriate homeLocation and populationType properties to a StatisticalPopulation item that stands for that set of people. The properties numConstraints and constrainingProperties are used to specify which of the populations properties are used to specify the population. Note that the sense of "population" used here is the general sense of a statistical population, and does not imply that the population consists of people. For example, a populationType of Event or NewsArticle could be used. See also Observation, and the data and datasets overview for more details.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

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
        'constrainingProperty',
        'numConstraints',
        'populationType'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'constrainingProperty' => ['Integer'],
        'numConstraints' => ['Integer'],
        'populationType' => ['Class']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'constrainingProperty' => 'Indicates a property used as a constraint to define a StatisticalPopulation with respect to the set of entities corresponding to an indicated type (via populationType).',
        'numConstraints' => 'Indicates the number of constraints (not counting populationType) defined for a particular StatisticalPopulation. This helps applications understand if they have access to a sufficiently complete description of a StatisticalPopulation.',
        'populationType' => 'Indicates the populationType common to all members of a StatisticalPopulation.'
    ];

    // Static Protected Properties
    // =========================================================================
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
     * Indicates a property used as a constraint to define a StatisticalPopulation
     * with respect to the set of entities corresponding to an indicated type (via
     * populationType).
     *
     * @var int [schema.org types: Integer]
     */
    public $constrainingProperty;
    /**
     * Indicates the number of constraints (not counting populationType) defined
     * for a particular StatisticalPopulation. This helps applications understand
     * if they have access to a sufficiently complete description of a
     * StatisticalPopulation.
     *
     * @var int [schema.org types: Integer]
     */
    public $numConstraints;
    /**
     * Indicates the populationType common to all members of a
     * StatisticalPopulation.
     *
     * @var Class [schema.org types: Class]
     */
    public $populationType;

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
            [['constrainingProperty', 'numConstraints', 'populationType'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
