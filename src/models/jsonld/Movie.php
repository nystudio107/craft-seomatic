<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Movie - A movie.
 * Extends: CreativeWork
 * @see    http://schema.org/Movie
 */
class Movie extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Movie';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Movie';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A movie.';

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
     * The duration of the item (movie, audio recording, event, etc.) in ISO 8601
     * date format.
     * @var Duration [schema.org types: Duration]
     */
    public $duration;

    /**
     * The composer of the soundtrack.
     * @var mixed MusicGroup, Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     * @var mixed Organization [schema.org types: Organization]
     */
    public $productionCompany;

    /**
     * Languages in which subtitles/captions are available, in IETF BCP 47
     * standard format.
     * @var mixed Language, string [schema.org types: Language, Text]
     */
    public $subtitleLanguage;

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
                'countryOfOrigin',
                'director',
                'duration',
                'musicBy',
                'productionCompany',
                'subtitleLanguage',
                'trailer',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'actor' => ['Person'],
                'countryOfOrigin' => ['Country'],
                'director' => ['Person'],
                'duration' => ['Duration'],
                'musicBy' => ['MusicGroup','Person'],
                'productionCompany' => ['Organization'],
                'subtitleLanguage' => ['Language','Text'],
                'trailer' => ['VideoObject'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
                'countryOfOrigin' => 'The country of the principal offices of the production company or individual responsible for the movie or program.',
                'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
                'duration' => 'The duration of the item (movie, audio recording, event, etc.) in ISO 8601 date format.',
                'musicBy' => 'The composer of the soundtrack.',
                'productionCompany' => 'The production company or studio responsible for the item e.g. series, video game, episode etc.',
                'subtitleLanguage' => 'Languages in which subtitles/captions are available, in IETF BCP 47 standard format.',
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
                [['actor','countryOfOrigin','director','duration','musicBy','productionCompany','subtitleLanguage','trailer',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Movie*/
