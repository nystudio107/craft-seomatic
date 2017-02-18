<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\InteractAction;

/**
 * LeaveAction - An agent leaves an event / group with participants/friends at
 * a location. Related actions: JoinAction: The antonym of LeaveAction.
 * UnRegisterAction: Unlike UnRegisterAction, LeaveAction implies leaving a
 * group/team of people rather than a service.
 * Extends: InteractAction
 * @see    http://schema.org/LeaveAction
 */
class LeaveAction extends InteractAction
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'LeaveAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/LeaveAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An agent leaves an event / group with participants/friends at a location. Related actions: JoinAction: The antonym of LeaveAction. UnRegisterAction: Unlike UnRegisterAction, LeaveAction implies leaving a group/team of people rather than a service.';

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
     * Upcoming or past event associated with this place, organization, or action.
     * Supersedes events.
     * @var Event [schema.org types: Event]
     */
    public $event;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'event',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'event' => ['Event'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'event' => 'Upcoming or past event associated with this place, organization, or action. Supersedes events.',
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
                [['event',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class LeaveAction*/
