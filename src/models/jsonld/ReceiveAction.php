<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\TransferAction;

/**
 * ReceiveAction - The act of physically/electronically taking delivery of an
 * object thathas been transferred from an origin to a destination. Reciprocal
 * of SendAction. Related actions: SendAction: The reciprocal of
 * ReceiveAction. TakeAction: Unlike TakeAction, ReceiveAction does not imply
 * that the ownership has been transfered (e.g. I can receive a package, but
 * it does not mean the package is now mine).
 * Extends: TransferAction
 * @see    http://schema.org/ReceiveAction
 */
class ReceiveAction extends TransferAction
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'ReceiveAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/ReceiveAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The act of physically/electronically taking delivery of an object thathas been transferred from an origin to a destination. Reciprocal of SendAction. Related actions: SendAction: The reciprocal of ReceiveAction. TakeAction: Unlike TakeAction, ReceiveAction does not imply that the ownership has been transfered (e.g. I can receive a package, but it does not mean the package is now mine).';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'TransferAction';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * A sub property of instrument. The method of delivery.
     * @var DeliveryMethod [schema.org types: DeliveryMethod]
     */
    public $deliveryMethod;

    /**
     * A sub property of participant. The participant who is at the sending end of
     * the action.
     * @var mixed Audience, Organization, Person [schema.org types: Audience, Organization, Person]
     */
    public $sender;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'deliveryMethod',
                'sender',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'deliveryMethod' => ['DeliveryMethod'],
                'sender' => ['Audience','Organization','Person'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'deliveryMethod' => 'A sub property of instrument. The method of delivery.',
                'sender' => 'A sub property of participant. The participant who is at the sending end of the action.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['deliveryMethod','sender',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class ReceiveAction*/
