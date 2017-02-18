<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Event;

/**
 * DeliveryEvent - An event involving the delivery of an item.
 * Extends: Event
 * @see    http://schema.org/DeliveryEvent
 */
class DeliveryEvent extends Event
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'DeliveryEvent';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/DeliveryEvent';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An event involving the delivery of an item.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Event';

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
     * Password, PIN, or access code needed for delivery (e.g. from a locker).
     * @var string [schema.org types: Text]
     */
    public $accessCode;

    /**
     * When the item is available for pickup from the store, locker, etc.
     * @var DateTime [schema.org types: DateTime]
     */
    public $availableFrom;

    /**
     * After this date, the item will no longer be available for pickup.
     * @var DateTime [schema.org types: DateTime]
     */
    public $availableThrough;

    /**
     * Method used for delivery or shipping.
     * @var DeliveryMethod [schema.org types: DeliveryMethod]
     */
    public $hasDeliveryMethod;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'accessCode',
                'availableFrom',
                'availableThrough',
                'hasDeliveryMethod',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'accessCode' => ['Text'],
                'availableFrom' => ['DateTime'],
                'availableThrough' => ['DateTime'],
                'hasDeliveryMethod' => ['DeliveryMethod'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'accessCode' => 'Password, PIN, or access code needed for delivery (e.g. from a locker).',
                'availableFrom' => 'When the item is available for pickup from the store, locker, etc.',
                'availableThrough' => 'After this date, the item will no longer be available for pickup.',
                'hasDeliveryMethod' => 'Method used for delivery or shipping.',
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
                [['accessCode','availableFrom','availableThrough','hasDeliveryMethod',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class DeliveryEvent*/
