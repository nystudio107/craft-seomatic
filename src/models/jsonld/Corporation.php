<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Organization;

/**
 * Corporation - Organization: A business corporation.
 * Extends: Organization
 * @see    http://schema.org/Corporation
 */
class Corporation extends Organization
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Corporation';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Corporation';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Organization: A business corporation.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Organization';

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
     * The exchange traded instrument associated with a Corporation object. The
     * tickerSymbol is expressed as an exchange and an instrument name separated
     * by a space character. For the exchange component of the tickerSymbol
     * attribute, we reccommend using the controlled vocaulary of Market
     * Identifier Codes (MIC) specified in ISO15022.
     * @var string [schema.org types: Text]
     */
    public $tickerSymbol;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'tickerSymbol',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'tickerSymbol' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'tickerSymbol' => 'The exchange traded instrument associated with a Corporation object. The tickerSymbol is expressed as an exchange and an instrument name separated by a space character. For the exchange component of the tickerSymbol attribute, we reccommend using the controlled vocaulary of Market Identifier Codes (MIC) specified in ISO15022.',
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
                [['tickerSymbol',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Corporation*/
