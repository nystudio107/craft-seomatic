<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\FindAction;

/**
 * TrackAction - An agent tracks an object for updates. Related actions:
 * FollowAction: Unlike FollowAction, TrackAction refers to the interest on
 * the location of innanimates objects. SubscribeAction: Unlike
 * SubscribeAction, TrackAction refers to the interest on the location of
 * innanimate objects.
 * Extends: FindAction
 * @see    http://schema.org/TrackAction
 */
class TrackAction extends FindAction
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'TrackAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/TrackAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An agent tracks an object for updates. Related actions: FollowAction: Unlike FollowAction, TrackAction refers to the interest on the location of innanimates objects. SubscribeAction: Unlike SubscribeAction, TrackAction refers to the interest on the location of innanimate objects.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'FindAction';

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
     * A sub property of instrument. The method of delivery.
     * @var DeliveryMethod [schema.org types: DeliveryMethod]
     */
    public $deliveryMethod;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'deliveryMethod',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'deliveryMethod' => ['DeliveryMethod'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'deliveryMethod' => 'A sub property of instrument. The method of delivery.',
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
                [['deliveryMethod',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class TrackAction*/
