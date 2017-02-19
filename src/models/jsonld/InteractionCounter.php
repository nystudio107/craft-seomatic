<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * InteractionCounter - A summary of how users have interacted with this
 * CreativeWork. In most cases, authors will use a subtype to specify the
 * specific type of interaction.
 *
 * Extends: StructuredValue
 * @see    http://schema.org/InteractionCounter
 */
class InteractionCounter extends StructuredValue
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'InteractionCounter';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/InteractionCounter';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A summary of how users have interacted with this CreativeWork. In most cases, authors will use a subtype to specify the specific type of interaction.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'StructuredValue';

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
     * The WebSite or SoftwareApplication where the interactions took place.
     *
     * @var mixed|SoftwareApplication|WebSite [schema.org types: SoftwareApplication, WebSite]
     */
    public $interactionService;

    /**
     * The Action representing the type of interaction. For up votes, +1s, etc.
     * use LikeAction. For down votes use DislikeAction. Otherwise, use the most
     * specific Action.
     *
     * @var mixed|Action [schema.org types: Action]
     */
    public $interactionType;

    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $userInteractionCount;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'interactionService',
            'interactionType',
            'userInteractionCount',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'interactionService' => ['SoftwareApplication','WebSite'],
            'interactionType' => ['Action'],
            'userInteractionCount' => ['Integer'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'interactionService' => 'The WebSite or SoftwareApplication where the interactions took place.',
            'interactionType' => 'The Action representing the type of interaction. For up votes, +1s, etc. use LikeAction. For down votes use DislikeAction. Otherwise, use the most specific Action.',
            'userInteractionCount' => 'The number of interactions for the CreativeWork using the WebSite or SoftwareApplication.',
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
            [['interactionService','interactionType','userInteractionCount',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
