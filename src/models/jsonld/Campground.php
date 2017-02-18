<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CivicStructure;

/**
 * Campground - A camping site, campsite, or campground is a place used for
 * overnight stay in the outdoors. In British English a campsite is an area,
 * usually divided into a number of pitches, where people can camp overnight
 * using tents or camper vans or caravans; this British English use of the
 * word is synonymous with the American English expression campground. In
 * American English the term campsite generally means an area where an
 * individual, family, group, or military unit can pitch a tent or parks a
 * camper; a campground may contain many campsites (Source: Wikipedia, the
 * free encyclopedia, see http://en.wikipedia.org/wiki/Campsite). See also the
 * dedicated document on the use of schema.org for marking up hotels and other
 * forms of accommodations.
 * Extends: CivicStructure
 * @see    http://schema.org/Campground
 */
class Campground extends CivicStructure
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Campground';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Campground';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A camping site, campsite, or campground is a place used for overnight stay in the outdoors. In British English a campsite is an area, usually divided into a number of pitches, where people can camp overnight using tents or camper vans or caravans; this British English use of the word is synonymous with the American English expression campground. In American English the term campsite generally means an area where an individual, family, group, or military unit can pitch a tent or parks a camper; a campground may contain many campsites (Source: Wikipedia, the free encyclopedia, see http://en.wikipedia.org/wiki/Campsite). See also the dedicated document on the use of schema.org for marking up hotels and other forms of accommodations.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CivicStructure';

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
     * The general opening hours for a business. Opening hours can be specified as
     * a weekly time range, starting with days, then times per day. Multiple days
     * can be listed with commas ',' separating each day. Day or time ranges are
     * specified using a hyphen '-'. Days are specified using the following
     * two-letter combinations: Mo, Tu, We, Th, Fr, Sa, Su. Times are specified
     * using 24:00 time. For example, 3pm is specified as 15:00. Here is an
     * example: <time itemprop="openingHours" datetime="Tu,Th
     * 16:00-20:00">Tuesdays and Thursdays 4-8pm</time>. If a business is open 7
     * days a week, then it can be specified as <time itemprop="openingHours"
     * datetime="Mo-Su">Monday through Sunday, all day</time>.
     * @var string [schema.org types: Text]
     */
    public $openingHours;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'openingHours',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'openingHours' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'openingHours' => 'The general opening hours for a business. Opening hours can be specified as a weekly time range, starting with days, then times per day. Multiple days can be listed with commas \',\' separating each day. Day or time ranges are specified using a hyphen \'-\'. Days are specified using the following two-letter combinations: Mo, Tu, We, Th, Fr, Sa, Su. Times are specified using 24:00 time. For example, 3pm is specified as 15:00. Here is an example: <time itemprop="openingHours" datetime="Tu,Th 16:00-20:00">Tuesdays and Thursdays 4-8pm</time>. If a business is open 7 days a week, then it can be specified as <time itemprop="openingHours" datetime="Mo-Su">Monday through Sunday, all day</time>.',
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
                [['openingHours',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Campground*/
