<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWorkSeason;

/**
 * RadioSeason - Season dedicated to radio broadcast and associated online
 * delivery.
 *
 * Extends: CreativeWorkSeason
 * @see    http://schema.org/RadioSeason
 */
class RadioSeason extends CreativeWorkSeason
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'RadioSeason';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/RadioSeason';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Season dedicated to radio broadcast and associated online delivery.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWorkSeason';

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
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip. Supersedes actors.
     *
     * @var Person [schema.org types: Person]
     */
    public $actor;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     *
     * @var Person [schema.org types: Person]
     */
    public $director;

    /**
     * The end date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $endDate;

    /**
     * An episode of a tv, radio or game media within a series or season.
     * Supersedes episodes.
     *
     * @var mixed|Episode [schema.org types: Episode]
     */
    public $episode;

    /**
     * The number of episodes in this season or series.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $numberOfEpisodes;

    /**
     * The series to which this episode or season belongs. Supersedes
     * partOfTVSeries.
     *
     * @var mixed|CreativeWorkSeries [schema.org types: CreativeWorkSeries]
     */
    public $partOfSeries;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $productionCompany;

    /**
     * Position of the season within an ordered group of seasons.
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $seasonNumber;

    /**
     * The start date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $startDate;

    /**
     * The trailer of a movie or tv/radio series, season, episode, etc.
     *
     * @var mixed|VideoObject [schema.org types: VideoObject]
     */
    public $trailer;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'actor',
            'director',
            'endDate',
            'episode',
            'numberOfEpisodes',
            'partOfSeries',
            'productionCompany',
            'seasonNumber',
            'startDate',
            'trailer',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'actor' => ['Person'],
            'director' => ['Person'],
            'endDate' => ['Date','DateTime'],
            'episode' => ['Episode'],
            'numberOfEpisodes' => ['Integer'],
            'partOfSeries' => ['CreativeWorkSeries'],
            'productionCompany' => ['Organization'],
            'seasonNumber' => ['Integer','Text'],
            'startDate' => ['Date','DateTime'],
            'trailer' => ['VideoObject'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
            'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
            'endDate' => 'The end date and time of the item (in ISO 8601 date format).',
            'episode' => 'An episode of a tv, radio or game media within a series or season. Supersedes episodes.',
            'numberOfEpisodes' => 'The number of episodes in this season or series.',
            'partOfSeries' => 'The series to which this episode or season belongs. Supersedes partOfTVSeries.',
            'productionCompany' => 'The production company or studio responsible for the item e.g. series, video game, episode etc.',
            'seasonNumber' => 'Position of the season within an ordered group of seasons.',
            'startDate' => 'The start date and time of the item (in ISO 8601 date format).',
            'trailer' => 'The trailer of a movie or tv/radio series, season, episode, etc.',
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
            [['actor','director','endDate','episode','numberOfEpisodes','partOfSeries','productionCompany','seasonNumber','startDate','trailer',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
