<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\TransferAction;

/**
 * ReturnAction - The act of returning to the origin that which was previously
 * received (concrete objects) or taken (ownership).
 * Extends: TransferAction
 * @see    http://schema.org/ReturnAction
 */
class ReturnAction extends TransferAction
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'ReturnAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/ReturnAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The act of returning to the origin that which was previously received (concrete objects) or taken (ownership).';

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
                'recipient',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'recipient' => ['Audience','Organization','Person'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
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
                [['recipient',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class ReturnAction*/
