<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Action;

/**
 * PlayAction - The act of playing/exercising/training/performing for
 * enjoyment, leisure, recreation, Competition or exercise. Related actions:
 * ListenAction: Unlike ListenAction (which is under ConsumeAction),
 * PlayAction refers to performing for an audience or at an event, rather than
 * consuming music. WatchAction: Unlike WatchAction (which is under
 * ConsumeAction), PlayAction refers to showing/displaying for an audience or
 * at an event, rather than consuming visual content.
 * Extends: Action
 * @see    http://schema.org/PlayAction
 */
class PlayAction extends Action
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'PlayAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/PlayAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The act of playing/exercising/training/performing for enjoyment, leisure, recreation, Competition or exercise. Related actions: ListenAction: Unlike ListenAction (which is under ConsumeAction), PlayAction refers to performing for an audience or at an event, rather than consuming music. WatchAction: Unlike WatchAction (which is under ConsumeAction), PlayAction refers to showing/displaying for an audience or at an event, rather than consuming visual content.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Action';

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
     * An intended audience, i.e. a group for whom something was created.
     * Supersedes serviceAudience.
     * @var Audience [schema.org types: Audience]
     */
    public $audience;

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
                'audience',
                'event',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'audience' => ['Audience'],
                'event' => ['Event'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'audience' => 'An intended audience, i.e. a group for whom something was created. Supersedes serviceAudience.',
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
                [['audience','event',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class PlayAction*/
