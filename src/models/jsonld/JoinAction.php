<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\InteractAction;

/**
 * JoinAction - An agent joins an event/group with participants/friends at a
 * location. Related actions: RegisterAction: Unlike RegisterAction,
 * JoinAction refers to joining a group/team of people. SubscribeAction:
 * Unlike SubscribeAction, JoinAction does not imply that you'll be receiving
 * updates. FollowAction: Unlike FollowAction, JoinAction does not imply that
 * you'll be polling for updates.
 *
 * Extends: InteractAction
 * @see    http://schema.org/JoinAction
 */
class JoinAction extends InteractAction
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'JoinAction';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/JoinAction';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An agent joins an event/group with participants/friends at a location. Related actions: RegisterAction: Unlike RegisterAction, JoinAction refers to joining a group/team of people. SubscribeAction: Unlike SubscribeAction, JoinAction does not imply that you\'ll be receiving updates. FollowAction: Unlike FollowAction, JoinAction does not imply that you\'ll be polling for updates.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'InteractAction';

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
     * Upcoming or past event associated with this place, organization, or action.
     * Supersedes events.
     *
     * @var Event [schema.org types: Event]
     */
    public $event;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'event',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'event' => ['Event'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'event' => 'Upcoming or past event associated with this place, organization, or action. Supersedes events.',
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
            [['event',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
