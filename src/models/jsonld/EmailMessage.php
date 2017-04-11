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

use nystudio107\seomatic\models\jsonld\Message;

/**
 * EmailMessage - An email message.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     1.0.0
 * @see       http://schema.org/EmailMessage
 */
class EmailMessage extends Message
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'EmailMessage';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/EmailMessage';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An email message.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Message';

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

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'dateRead',
        'dateReceived',
        'dateSent',
        'messageAttachment',
        'recipient',
        'sender'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'dateRead' => ['DateTime'],
        'dateReceived' => ['DateTime'],
        'dateSent' => ['DateTime'],
        'messageAttachment' => ['CreativeWork'],
        'recipient' => ['Audience','Organization','Person'],
        'sender' => ['Audience','Organization','Person']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'dateRead' => 'The date/time at which the message has been read by the recipient if a single recipient exists.',
        'dateReceived' => 'The date/time the message was received if a single recipient exists.',
        'dateSent' => 'The date/time at which the message was sent.',
        'messageAttachment' => 'A CreativeWork attached to the message.',
        'recipient' => 'A sub property of participant. The participant who is at the receiving end of the action.',
        'sender' => 'A sub property of participant. The participant who is at the sending end of the action.'
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
            [['dateRead','dateReceived','dateSent','messageAttachment','recipient','sender'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
