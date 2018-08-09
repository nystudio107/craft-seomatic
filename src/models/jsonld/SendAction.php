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

use nystudio107\seomatic\models\jsonld\TransferAction;

/**
 * SendAction - The act of physically/electronically dispatching an object for
 * transfer from an origin to a destination.Related actions: ReceiveAction:
 * The reciprocal of SendAction. GiveAction: Unlike GiveAction, SendAction
 * does not imply the transfer of ownership (e.g. I can send you my laptop,
 * but I'm not necessarily giving it to you).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       https://schema.org/SendAction
 */
class SendAction extends TransferAction
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'SendAction';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/SendAction';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The act of physically/electronically dispatching an object for transfer from an origin to a destination.Related actions: ReceiveAction: The reciprocal of SendAction. GiveAction: Unlike GiveAction, SendAction does not imply the transfer of ownership (e.g. I can send you my laptop, but I\'m not necessarily giving it to you).';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'TransferAction';

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
     * A sub property of instrument. The method of delivery.
     *
     * @var DeliveryMethod [schema.org types: DeliveryMethod]
     */
    public $deliveryMethod;

    /**
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     *
     * @var mixed|Audience|ContactPoint|Organization|Person [schema.org types: Audience, ContactPoint, Organization, Person]
     */
    public $recipient;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'deliveryMethod',
        'recipient'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'deliveryMethod' => ['DeliveryMethod'],
        'recipient' => ['Audience','ContactPoint','Organization','Person']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'deliveryMethod' => 'A sub property of instrument. The method of delivery.',
        'recipient' => 'A sub property of participant. The participant who is at the receiving end of the action.'
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
            [['deliveryMethod','recipient'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
