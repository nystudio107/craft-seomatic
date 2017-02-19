<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\InteractAction;

/**
 * FollowAction - The act of forming a personal connection with
 * someone/something (object) unidirectionally/asymmetrically to get updates
 * polled from. Related actions: BefriendAction: Unlike BefriendAction,
 * FollowAction implies that the connection is not necessarily reciprocal.
 * SubscribeAction: Unlike SubscribeAction, FollowAction implies that the
 * follower acts as an active agent constantly/actively polling for updates.
 * RegisterAction: Unlike RegisterAction, FollowAction implies that the agent
 * is interested in continuing receiving updates from the object. JoinAction:
 * Unlike JoinAction, FollowAction implies that the agent is interested in
 * getting updates from the object. TrackAction: Unlike TrackAction,
 * FollowAction refers to the polling of updates of all aspects of animate
 * objects rather than the location of inanimate objects (e.g. you track a
 * package, but you don't follow it).
 *
 * Extends: InteractAction
 * @see    http://schema.org/FollowAction
 */
class FollowAction extends InteractAction
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'FollowAction';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/FollowAction';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The act of forming a personal connection with someone/something (object) unidirectionally/asymmetrically to get updates polled from. Related actions: BefriendAction: Unlike BefriendAction, FollowAction implies that the connection is not necessarily reciprocal. SubscribeAction: Unlike SubscribeAction, FollowAction implies that the follower acts as an active agent constantly/actively polling for updates. RegisterAction: Unlike RegisterAction, FollowAction implies that the agent is interested in continuing receiving updates from the object. JoinAction: Unlike JoinAction, FollowAction implies that the agent is interested in getting updates from the object. TrackAction: Unlike TrackAction, FollowAction refers to the polling of updates of all aspects of animate objects rather than the location of inanimate objects (e.g. you track a package, but you don\'t follow it).';

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
     * A sub property of object. The person or organization being followed.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $followee;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'followee',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'followee' => ['Organization','Person'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'followee' => 'A sub property of object. The person or organization being followed.',
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
            [['followee',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
