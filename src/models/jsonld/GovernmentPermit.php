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

use nystudio107\seomatic\models\jsonld\Permit;

/**
 * GovernmentPermit - A permit issued by a government agency.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/GovernmentPermit
 */
class GovernmentPermit extends Permit
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'GovernmentPermit';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/GovernmentPermit';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A permit issued by a government agency.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Permit';

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
     * The organization issuing the ticket or permit.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $issuedBy;

    /**
     * The service through with the permit was granted.
     *
     * @var Service [schema.org types: Service]
     */
    public $issuedThrough;

    /**
     * The target audience for this permit.
     *
     * @var Audience [schema.org types: Audience]
     */
    public $permitAudience;

    /**
     * The duration of validity of a permit or similar thing.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $validFor;

    /**
     * The date when the item becomes valid.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $validFrom;

    /**
     * The geographic area where a permit or similar thing is valid.
     *
     * @var AdministrativeArea [schema.org types: AdministrativeArea]
     */
    public $validIn;

    /**
     * The date when the item is no longer valid.
     *
     * @var Date [schema.org types: Date]
     */
    public $validUntil;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'issuedBy',
        'issuedThrough',
        'permitAudience',
        'validFor',
        'validFrom',
        'validIn',
        'validUntil'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'issuedBy' => ['Organization'],
        'issuedThrough' => ['Service'],
        'permitAudience' => ['Audience'],
        'validFor' => ['Duration'],
        'validFrom' => ['DateTime'],
        'validIn' => ['AdministrativeArea'],
        'validUntil' => ['Date']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'issuedBy' => 'The organization issuing the ticket or permit.',
        'issuedThrough' => 'The service through with the permit was granted.',
        'permitAudience' => 'The target audience for this permit.',
        'validFor' => 'The duration of validity of a permit or similar thing.',
        'validFrom' => 'The date when the item becomes valid.',
        'validIn' => 'The geographic area where a permit or similar thing is valid.',
        'validUntil' => 'The date when the item is no longer valid.'
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
            [['issuedBy','issuedThrough','permitAudience','validFor','validFrom','validIn','validUntil'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
