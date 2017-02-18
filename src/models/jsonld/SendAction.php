<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\TransferAction;

/**
 * SendAction - The act of physically/electronically dispatching an object for
 * transfer from an origin to a destination.Related actions: ReceiveAction:
 * The reciprocal of SendAction. GiveAction: Unlike GiveAction, SendAction
 * does not imply the transfer of ownership (e.g. I can send you my laptop,
 * but I'm not necessarily giving it to you).
 * Extends: TransferAction
 * @see    http://schema.org/SendAction
 */
class SendAction extends TransferAction
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'SendAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/SendAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The act of physically/electronically dispatching an object for transfer from an origin to a destination.Related actions: ReceiveAction: The reciprocal of SendAction. GiveAction: Unlike GiveAction, SendAction does not imply the transfer of ownership (e.g. I can send you my laptop, but I\'m not necessarily giving it to you).';

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
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     * @var mixed Audience, Organization, Person [schema.org types: Audience, Organization, Person]
     */
    public $recipient;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'deliveryMethod',
                'recipient',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'deliveryMethod' => ['DeliveryMethod'],
                'recipient' => ['Audience','Organization','Person'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'deliveryMethod' => 'A sub property of instrument. The method of delivery.',
                'recipient' => 'A sub property of participant. The participant who is at the receiving end of the action.',
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
                [['deliveryMethod','recipient',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class SendAction*/
