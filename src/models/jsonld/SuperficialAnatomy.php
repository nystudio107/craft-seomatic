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
 * SuperficialAnatomy - Anatomical features that can be observed by sight
 * (without dissection), including the form and proportions of the human body
 * as well as surface landmarks that correspond to deeper subcutaneous
 * structures. Superficial anatomy plays an important role in sports medicine,
 * phlebotomy, and other medical specialties as underlying anatomical
 * structures can be identified through surface palpation. For example, during
 * back surgery, superficial anatomy can be used to palpate and count
 * vertebrae to find the site of incision. Or in phlebotomy, superficial
 * anatomy can be used to locate an underlying vein; for example, the median
 * cubital vein can be located by palpating the borders of the cubital fossa
 * (such as the epicondyles of the humerus) and then looking for the
 * superficial signs of the vein, such as size, prominence, ability to refill
 * after depression, and feel of surrounding tissue support. As another
 * example, in a subluxation (dislocation) of the glenohumeral joint, the bony
 * structure becomes pronounced with the deltoid muscle failing to cover the
 * glenohumeral joint allowing the edges of the scapula to be superficially
 * visible. Here, the superficial anatomy is the visible edges of the scapula,
 * implying the underlying dislocation of the joint (the related anatomical
 * structure).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/SuperficialAnatomy
 */
class SuperficialAnatomy extends MedicalEntity
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'SuperficialAnatomy';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/SuperficialAnatomy';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Anatomical features that can be observed by sight (without dissection), including the form and proportions of the human body as well as surface landmarks that correspond to deeper subcutaneous structures. Superficial anatomy plays an important role in sports medicine, phlebotomy, and other medical specialties as underlying anatomical structures can be identified through surface palpation. For example, during back surgery, superficial anatomy can be used to palpate and count vertebrae to find the site of incision. Or in phlebotomy, superficial anatomy can be used to locate an underlying vein; for example, the median cubital vein can be located by palpating the borders of the cubital fossa (such as the epicondyles of the humerus) and then looking for the superficial signs of the vein, such as size, prominence, ability to refill after depression, and feel of surrounding tissue support. As another example, in a subluxation (dislocation) of the glenohumeral joint, the bony structure becomes pronounced with the deltoid muscle failing to cover the glenohumeral joint allowing the edges of the scapula to be superficially visible. Here, the superficial anatomy is the visible edges of the scapula, implying the underlying dislocation of the joint (the related anatomical structure).';

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
     * Anatomical systems or structures that relate to the superficial anatomy.
     *
     * @var mixed|AnatomicalStructure|AnatomicalSystem [schema.org types: AnatomicalStructure, AnatomicalSystem]
     */
    public $relatedAnatomy;

    /**
     * A medical condition associated with this anatomy.
     *
     * @var mixed|MedicalCondition [schema.org types: MedicalCondition]
     */
    public $relatedCondition;

    /**
     * A medical therapy related to this anatomy.
     *
     * @var mixed|MedicalTherapy [schema.org types: MedicalTherapy]
     */
    public $relatedTherapy;

    /**
     * The significance associated with the superficial anatomy; as an example,
     * how characteristics of the superficial anatomy can suggest underlying
     * medical conditions or courses of treatment.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $significance;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'associatedPathophysiology',
        'relatedAnatomy',
        'relatedCondition',
        'relatedTherapy',
        'significance'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'associatedPathophysiology' => ['Text'],
        'relatedAnatomy' => ['AnatomicalStructure','AnatomicalSystem'],
        'relatedCondition' => ['MedicalCondition'],
        'relatedTherapy' => ['MedicalTherapy'],
        'significance' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'associatedPathophysiology' => 'If applicable, a description of the pathophysiology associated with the anatomical system, including potential abnormal changes in the mechanical, physical, and biochemical functions of the system.',
        'relatedAnatomy' => 'Anatomical systems or structures that relate to the superficial anatomy.',
        'relatedCondition' => 'A medical condition associated with this anatomy.',
        'relatedTherapy' => 'A medical therapy related to this anatomy.',
        'significance' => 'The significance associated with the superficial anatomy; as an example, how characteristics of the superficial anatomy can suggest underlying medical conditions or courses of treatment.'
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
            [['associatedPathophysiology','relatedAnatomy','relatedCondition','relatedTherapy','significance'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
