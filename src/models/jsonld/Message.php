<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Message - A single message from a sender to one or more organizations or
 * people.
 *
 * Extends: CreativeWork
 * @see    http://schema.org/Message
 */
class Message extends CreativeWork
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Message';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Message';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A single message from a sender to one or more organizations or people.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
     * The date/time at which the message has been read by the recipient if a
     * single recipient exists.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $dateRead;

    /**
     * The date/time the message was received if a single recipient exists.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $dateReceived;

    /**
     * The date/time at which the message was sent.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $dateSent;

    /**
     * A CreativeWork attached to the message.
     *
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $messageAttachment;

    /**
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     *
     * @var mixed|Audience|Organization|Person [schema.org types: Audience, Organization, Person]
     */
    public $recipient;

    /**
     * A sub property of participant. The participant who is at the sending end of
     * the action.
     *
     * @var mixed|Audience|Organization|Person [schema.org types: Audience, Organization, Person]
     */
    public $sender;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'dateRead',
            'dateReceived',
            'dateSent',
            'messageAttachment',
            'recipient',
            'sender',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'dateRead' => ['DateTime'],
            'dateReceived' => ['DateTime'],
            'dateSent' => ['DateTime'],
            'messageAttachment' => ['CreativeWork'],
            'recipient' => ['Audience','Organization','Person'],
            'sender' => ['Audience','Organization','Person'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'dateRead' => 'The date/time at which the message has been read by the recipient if a single recipient exists.',
            'dateReceived' => 'The date/time the message was received if a single recipient exists.',
            'dateSent' => 'The date/time at which the message was sent.',
            'messageAttachment' => 'A CreativeWork attached to the message.',
            'recipient' => 'A sub property of participant. The participant who is at the receiving end of the action.',
            'sender' => 'A sub property of participant. The participant who is at the sending end of the action.',
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
            [['dateRead','dateReceived','dateSent','messageAttachment','recipient','sender',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
