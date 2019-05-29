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

use nystudio107\seomatic\models\jsonld\MedicalEntity;

/**
 * AnatomicalSystem - An anatomical system is a group of anatomical structures
 * that work together to perform a certain task. Anatomical systems, such as
 * organ systems, are one organizing principle of anatomy, and can includes
 * circulatory, digestive, endocrine, integumentary, immune, lymphatic,
 * muscular, nervous, reproductive, respiratory, skeletal, urinary,
 * vestibular, and other systems.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/AnatomicalSystem
 */
class AnatomicalSystem extends MedicalEntity
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'AnatomicalSystem';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/AnatomicalSystem';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An anatomical system is a group of anatomical structures that work together to perform a certain task. Anatomical systems, such as organ systems, are one organizing principle of anatomy, and can includes circulatory, digestive, endocrine, integumentary, immune, lymphatic, muscular, nervous, reproductive, respiratory, skeletal, urinary, vestibular, and other systems.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'MedicalEntity';

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
     * If applicable, a description of the pathophysiology associated with the
     * anatomical system, including potential abnormal changes in the mechanical,
     * physical, and biochemical functions of the system.
     *
     * @var string [schema.org types: Text]
     */
    public $associatedPathophysiology;

    /**
     * Specifying something physically contained by something else. Typically used
     * here for the underlying anatomical structures, such as organs, that
     * comprise the anatomical system.
     *
     * @var mixed|AnatomicalStructure|AnatomicalSystem [schema.org types: AnatomicalStructure, AnatomicalSystem]
     */
    public $comprisedOf;

    /**
     * A medical condition associated with this anatomy.
     *
     * @var mixed|MedicalCondition [schema.org types: MedicalCondition]
     */
    public $relatedCondition;

    /**
     * Related anatomical structure(s) that are not part of the system but relate
     * or connect to it, such as vascular bundles associated with an organ system.
     *
     * @var mixed|AnatomicalStructure [schema.org types: AnatomicalStructure]
     */
    public $relatedStructure;

    /**
     * A medical therapy related to this anatomy.
     *
     * @var mixed|MedicalTherapy [schema.org types: MedicalTherapy]
     */
    public $relatedTherapy;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'associatedPathophysiology',
        'comprisedOf',
        'relatedCondition',
        'relatedStructure',
        'relatedTherapy'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'associatedPathophysiology' => ['Text'],
        'comprisedOf' => ['AnatomicalStructure','AnatomicalSystem'],
        'relatedCondition' => ['MedicalCondition'],
        'relatedStructure' => ['AnatomicalStructure'],
        'relatedTherapy' => ['MedicalTherapy']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'associatedPathophysiology' => 'If applicable, a description of the pathophysiology associated with the anatomical system, including potential abnormal changes in the mechanical, physical, and biochemical functions of the system.',
        'comprisedOf' => 'Specifying something physically contained by something else. Typically used here for the underlying anatomical structures, such as organs, that comprise the anatomical system.',
        'relatedCondition' => 'A medical condition associated with this anatomy.',
        'relatedStructure' => 'Related anatomical structure(s) that are not part of the system but relate or connect to it, such as vascular bundles associated with an organ system.',
        'relatedTherapy' => 'A medical therapy related to this anatomy.'
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
            [['associatedPathophysiology','comprisedOf','relatedCondition','relatedStructure','relatedTherapy'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
