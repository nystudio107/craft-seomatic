<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\InteractAction;

/**
 * CommunicateAction - The act of conveying information to another person via
 * a communication medium (instrument) such as speech, email, or telephone
 * conversation.
 * Extends: InteractAction
 * @see    http://schema.org/CommunicateAction
 */
class CommunicateAction extends InteractAction
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'CommunicateAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/CommunicateAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The act of conveying information to another person via a communication medium (instrument) such as speech, email, or telephone conversation.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'InteractAction';

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
     * The subject matter of the content.
     * @var Thing [schema.org types: Thing]
     */
    public $about;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the IETF BCP 47 standard. See also
     * availableLanguage. Supersedes language.
     * @var mixed Language, string [schema.org types: Language, Text]
     */
    public $inLanguage;

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
                'about',
                'inLanguage',
                'recipient',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'about' => ['Thing'],
                'inLanguage' => ['Language','Text'],
                'recipient' => ['Audience','Organization','Person'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'about' => 'The subject matter of the content.',
                'inLanguage' => 'The language of the content or performance or used in an action. Please use one of the language codes from the IETF BCP 47 standard. See also availableLanguage. Supersedes language.',
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
                [['about','inLanguage','recipient',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class CommunicateAction*/
