<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\PropertyValue;

/**
 * LocationFeatureSpecification - Specifies a location feature by providing a
 * structured value representing a feature of an accommodation as a
 * property-value pair of varying degrees of formality.
 * Extends: PropertyValue
 * @see    http://schema.org/LocationFeatureSpecification
 */
class LocationFeatureSpecification extends PropertyValue
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'LocationFeatureSpecification';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/LocationFeatureSpecification';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Specifies a location feature by providing a structured value representing a feature of an accommodation as a property-value pair of varying degrees of formality.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'PropertyValue';

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
     * The hours during which this service or contact is available.
     * @var OpeningHoursSpecification [schema.org types: OpeningHoursSpecification]
     */
    public $hoursAvailable;

    /**
     * The date when the item becomes valid.
     * @var DateTime [schema.org types: DateTime]
     */
    public $validFrom;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     * @var DateTime [schema.org types: DateTime]
     */
    public $validThrough;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'hoursAvailable',
                'validFrom',
                'validThrough',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'hoursAvailable' => ['OpeningHoursSpecification'],
                'validFrom' => ['DateTime'],
                'validThrough' => ['DateTime'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'hoursAvailable' => 'The hours during which this service or contact is available.',
                'validFrom' => 'The date when the item becomes valid.',
                'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.',
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
                [['hoursAvailable','validFrom','validThrough',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class LocationFeatureSpecification*/
