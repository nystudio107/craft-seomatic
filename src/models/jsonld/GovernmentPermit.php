<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Permit;

/**
 * GovernmentPermit - A permit issued by a government agency.
 *
 * Extends: Permit
 * @see    http://schema.org/GovernmentPermit
 */
class GovernmentPermit extends Permit
{
    // Static Properties
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
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
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
     * The time validity of the permit.
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
     * The geographic area where the permit is valid.
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

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'issuedBy',
            'issuedThrough',
            'permitAudience',
            'validFor',
            'validFrom',
            'validIn',
            'validUntil',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'issuedBy' => ['Organization'],
            'issuedThrough' => ['Service'],
            'permitAudience' => ['Audience'],
            'validFor' => ['Duration'],
            'validFrom' => ['DateTime'],
            'validIn' => ['AdministrativeArea'],
            'validUntil' => ['Date'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'issuedBy' => 'The organization issuing the ticket or permit.',
            'issuedThrough' => 'The service through with the permit was granted.',
            'permitAudience' => 'The target audience for this permit.',
            'validFor' => 'The time validity of the permit.',
            'validFrom' => 'The date when the item becomes valid.',
            'validIn' => 'The geographic area where the permit is valid.',
            'validUntil' => 'The date when the item is no longer valid.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['issuedBy','issuedThrough','permitAudience','validFor','validFrom','validIn','validUntil',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
