<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\ContactPoint;

/**
 * PostalAddress - The mailing address.
 *
 * Extends: ContactPoint
 * @see    http://schema.org/PostalAddress
 */
class PostalAddress extends ContactPoint
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'PostalAddress';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/PostalAddress';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The mailing address.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'ContactPoint';

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
     * The country. For example, USA. You can also provide the two-letter ISO
     * 3166-1 alpha-2 country code.
     *
     * @var mixed|Country|string [schema.org types: Country, Text]
     */
    public $addressCountry;

    /**
     * The locality. For example, Mountain View.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $addressLocality;

    /**
     * The region. For example, CA.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $addressRegion;

    /**
     * The post office box number for PO box addresses.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $postOfficeBoxNumber;

    /**
     * The postal code. For example, 94043.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $postalCode;

    /**
     * The street address. For example, 1600 Amphitheatre Pkwy.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $streetAddress;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'addressCountry',
            'addressLocality',
            'addressRegion',
            'postOfficeBoxNumber',
            'postalCode',
            'streetAddress',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'addressCountry' => ['Country','Text'],
            'addressLocality' => ['Text'],
            'addressRegion' => ['Text'],
            'postOfficeBoxNumber' => ['Text'],
            'postalCode' => ['Text'],
            'streetAddress' => ['Text'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'addressCountry' => 'The country. For example, USA. You can also provide the two-letter ISO 3166-1 alpha-2 country code.',
            'addressLocality' => 'The locality. For example, Mountain View.',
            'addressRegion' => 'The region. For example, CA.',
            'postOfficeBoxNumber' => 'The post office box number for PO box addresses.',
            'postalCode' => 'The postal code. For example, 94043.',
            'streetAddress' => 'The street address. For example, 1600 Amphitheatre Pkwy.',
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
            [['addressCountry','addressLocality','addressRegion','postOfficeBoxNumber','postalCode','streetAddress',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
