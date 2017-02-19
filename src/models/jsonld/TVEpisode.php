<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Episode;

/**
 * TVEpisode - A TV episode which can be part of a series or season.
 *
 * Extends: Episode
 * @see    http://schema.org/TVEpisode
 */
class TVEpisode extends Episode
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'TVEpisode';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/TVEpisode';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A TV episode which can be part of a series or season.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Episode';

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
     * The country of the principal offices of the production company or
     * individual responsible for the movie or program.
     *
     * @var Country [schema.org types: Country]
     */
    public $countryOfOrigin;

    /**
     * Languages in which subtitles/captions are available, in IETF BCP 47
     * standard format.
     *
     * @var mixed|Language|string [schema.org types: Language, Text]
     */
    public $subtitleLanguage;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'countryOfOrigin',
            'subtitleLanguage',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'countryOfOrigin' => ['Country'],
            'subtitleLanguage' => ['Language','Text'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'countryOfOrigin' => 'The country of the principal offices of the production company or individual responsible for the movie or program.',
            'subtitleLanguage' => 'Languages in which subtitles/captions are available, in IETF BCP 47 standard format.',
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
            [['countryOfOrigin','subtitleLanguage',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
