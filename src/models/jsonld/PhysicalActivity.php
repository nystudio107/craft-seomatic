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

use nystudio107\seomatic\models\jsonld\LifestyleModification;

/**
 * PhysicalActivity - Any bodily activity that enhances or maintains physical
 * fitness and overall health and wellness. Includes activity that is part of
 * daily living and routine, structured exercise, and exercise prescribed as
 * part of a medical treatment or recovery plan.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/PhysicalActivity
 */
class PhysicalActivity extends LifestyleModification
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'PhysicalActivity';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/PhysicalActivity';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Any bodily activity that enhances or maintains physical fitness and overall health and wellness. Includes activity that is part of daily living and routine, structured exercise, and exercise prescribed as part of a medical treatment or recovery plan.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'LifestyleModification';

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
     * The anatomy of the underlying organ system or structures associated with
     * this entity.
     *
     * @var mixed|AnatomicalStructure|AnatomicalSystem|SuperficialAnatomy [schema.org types: AnatomicalStructure, AnatomicalSystem, SuperficialAnatomy]
     */
    public $associatedAnatomy;

    /**
     * A category for the item. Greater signs or slashes can be used to informally
     * indicate a category hierarchy.
     *
     * @var mixed|PhysicalActivityCategory|string|Thing [schema.org types: PhysicalActivityCategory, Text, Thing]
     */
    public $category;

    /**
     * The characteristics of associated patients, such as age, gender, race etc.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $epidemiology;

    /**
     * Changes in the normal mechanical, physical, and biochemical functions that
     * are associated with this activity or condition.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $pathophysiology;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'associatedAnatomy',
        'category',
        'epidemiology',
        'pathophysiology'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'associatedAnatomy' => ['AnatomicalStructure','AnatomicalSystem','SuperficialAnatomy'],
        'category' => ['PhysicalActivityCategory','Text','Thing'],
        'epidemiology' => ['Text'],
        'pathophysiology' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'associatedAnatomy' => 'The anatomy of the underlying organ system or structures associated with this entity.',
        'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
        'epidemiology' => 'The characteristics of associated patients, such as age, gender, race etc.',
        'pathophysiology' => 'Changes in the normal mechanical, physical, and biochemical functions that are associated with this activity or condition.'
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

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
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
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['associatedAnatomy','category','epidemiology','pathophysiology'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
