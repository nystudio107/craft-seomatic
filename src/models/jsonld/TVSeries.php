<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * TVSeries - CreativeWorkSeries dedicated to TV broadcast and associated
 * online delivery.
 * Extends: CreativeWork
 * @see    http://schema.org/TVSeries
 */
class TVSeries extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'TVSeries';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/TVSeries';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'CreativeWorkSeries dedicated to TV broadcast and associated online delivery.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreativeWork';

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
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip. Supersedes actors.
     * @var Person [schema.org types: Person]
     */
    public $actor;

    /**
     * A season that is part of the media series. Supersedes season.
     * @var CreativeWorkSeason [schema.org types: CreativeWorkSeason]
     */
    public $containsSeason;

    /**
     * The country of the principal offices of the production company or
     * individual responsible for the movie or program.
     * @var Country [schema.org types: Country]
     */
    public $countryOfOrigin;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     * @var Person [schema.org types: Person]
     */
    public $director;

    /**
     * An episode of a tv, radio or game media within a series or season.
     * Supersedes episodes.
     * @var Episode [schema.org types: Episode]
     */
    public $episode;

    /**
     * The composer of the soundtrack.
     * @var mixed MusicGroup, Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * The number of episodes in this season or series.
     * @var mixed int [schema.org types: Integer]
     */
    public $numberOfEpisodes;

    /**
     * The number of seasons in this series.
     * @var mixed int [schema.org types: Integer]
     */
    public $numberOfSeasons;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     * @var mixed Organization [schema.org types: Organization]
     */
    public $productionCompany;

    /**
     * The trailer of a movie or tv/radio series, season, episode, etc.
     * @var mixed VideoObject [schema.org types: VideoObject]
     */
    public $trailer;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'actor',
                'containsSeason',
                'countryOfOrigin',
                'director',
                'episode',
                'musicBy',
                'numberOfEpisodes',
                'numberOfSeasons',
                'productionCompany',
                'trailer',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'actor' => ['Person'],
                'containsSeason' => ['CreativeWorkSeason'],
                'countryOfOrigin' => ['Country'],
                'director' => ['Person'],
                'episode' => ['Episode'],
                'musicBy' => ['MusicGroup','Person'],
                'numberOfEpisodes' => ['Integer'],
                'numberOfSeasons' => ['Integer'],
                'productionCompany' => ['Organization'],
                'trailer' => ['VideoObject'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
                'containsSeason' => 'A season that is part of the media series. Supersedes season.',
                'countryOfOrigin' => 'The country of the principal offices of the production company or individual responsible for the movie or program.',
                'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
                'episode' => 'An episode of a tv, radio or game media within a series or season. Supersedes episodes.',
                'musicBy' => 'The composer of the soundtrack.',
                'numberOfEpisodes' => 'The number of episodes in this season or series.',
                'numberOfSeasons' => 'The number of seasons in this series.',
                'productionCompany' => 'The production company or studio responsible for the item e.g. series, video game, episode etc.',
                'trailer' => 'The trailer of a movie or tv/radio series, season, episode, etc.',
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
                [['actor','containsSeason','countryOfOrigin','director','episode','musicBy','numberOfEpisodes','numberOfSeasons','productionCompany','trailer',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class TVSeries*/
