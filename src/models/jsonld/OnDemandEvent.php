<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\PublicationEvent;

/**
 * OnDemandEvent - A publication event e.g. catch-up TV or radio podcast,
 * during which a program is available on-demand.
 *
 * Extends: PublicationEvent
 * @see    http://schema.org/OnDemandEvent
 */
class OnDemandEvent extends PublicationEvent
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'OnDemandEvent';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/OnDemandEvent';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A publication event e.g. catch-up TV or radio podcast, during which a program is available on-demand.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'PublicationEvent';

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
     * A flag to signal that the publication is accessible for free. Supersedes
     * free.
     *
     * @var bool [schema.org types: Boolean]
     */
    public $isAccessibleForFree;

    /**
     * A broadcast service associated with the publication event.
     *
     * @var BroadcastService [schema.org types: BroadcastService]
     */
    public $publishedOn;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'isAccessibleForFree',
            'publishedOn',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'isAccessibleForFree' => ['Boolean'],
            'publishedOn' => ['BroadcastService'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'isAccessibleForFree' => 'A flag to signal that the publication is accessible for free. Supersedes free.',
            'publishedOn' => 'A broadcast service associated with the publication event.',
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
            [['isAccessibleForFree','publishedOn',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
