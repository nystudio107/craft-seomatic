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

use nystudio107\seomatic\models\jsonld\CommunicateAction;

/**
 * CheckInAction - The act of an agent communicating (service provider, social
 * media, etc) their arrival by registering/confirming for a previously
 * reserved service (e.g. flight check in) or at a place (e.g. hotel),
 * possibly resulting in a result (boarding pass, etc). Related actions:
 * CheckOutAction: The antonym of CheckInAction. ArriveAction: Unlike
 * ArriveAction, CheckInAction implies that the agent is informing/confirming
 * the start of a previously reserved service. ConfirmAction: Unlike
 * ConfirmAction, CheckInAction implies that the agent is informing/confirming
 * the start of a previously reserved service rather than its
 * validity/existence.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       https://schema.org/CheckInAction
 */
class CheckInAction extends CommunicateAction
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'CheckInAction';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/CheckInAction';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The act of an agent communicating (service provider, social media, etc) their arrival by registering/confirming for a previously reserved service (e.g. flight check in) or at a place (e.g. hotel), possibly resulting in a result (boarding pass, etc). Related actions: CheckOutAction: The antonym of CheckInAction. ArriveAction: Unlike ArriveAction, CheckInAction implies that the agent is informing/confirming the start of a previously reserved service. ConfirmAction: Unlike ConfirmAction, CheckInAction implies that the agent is informing/confirming the start of a previously reserved service rather than its validity/existence.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CommunicateAction';

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
     * The subject matter of the content.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $about;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the IETF BCP 47 standard. See also
     * availableLanguage. Supersedes language.
     *
     * @var mixed|Language|string [schema.org types: Language, Text]
     */
    public $inLanguage;

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
        'about',
        'inLanguage',
        'recipient'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'about' => ['Thing'],
        'inLanguage' => ['Language','Text'],
        'recipient' => ['Audience','ContactPoint','Organization','Person']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'about' => 'The subject matter of the content.',
        'inLanguage' => 'The language of the content or performance or used in an action. Please use one of the language codes from the IETF BCP 47 standard. See also availableLanguage. Supersedes language.',
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
            [['about','inLanguage','recipient'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
