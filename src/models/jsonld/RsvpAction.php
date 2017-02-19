<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\InformAction;

/**
 * RsvpAction - The act of notifying an event organizer as to whether you
 * expect to attend the event.
 *
 * Extends: InformAction
 * @see    http://schema.org/RsvpAction
 */
class RsvpAction extends InformAction
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'RsvpAction';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/RsvpAction';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The act of notifying an event organizer as to whether you expect to attend the event.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'InformAction';

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
     * If responding yes, the number of guests who will attend in addition to the
     * invitee.
     *
     * @var float [schema.org types: Number]
     */
    public $additionalNumberOfGuests;

    /**
     * Comments, typically from users.
     *
     * @var Comment [schema.org types: Comment]
     */
    public $comment;

    /**
     * The response (yes, no, maybe) to the RSVP.
     *
     * @var RsvpResponseType [schema.org types: RsvpResponseType]
     */
    public $rsvpResponse;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'additionalNumberOfGuests',
            'comment',
            'rsvpResponse',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'additionalNumberOfGuests' => ['Number'],
            'comment' => ['Comment'],
            'rsvpResponse' => ['RsvpResponseType'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'additionalNumberOfGuests' => 'If responding yes, the number of guests who will attend in addition to the invitee.',
            'comment' => 'Comments, typically from users.',
            'rsvpResponse' => 'The response (yes, no, maybe) to the RSVP.',
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
            [['additionalNumberOfGuests','comment','rsvpResponse',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
