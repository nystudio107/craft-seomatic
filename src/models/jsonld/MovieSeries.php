<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWorkSeries;

/**
 * MovieSeries - A series of movies. Included movies can be indicated with the
 * hasPart property.
 * Extends: CreativeWorkSeries
 * @see    http://schema.org/MovieSeries
 */
class MovieSeries extends CreativeWorkSeries
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'MovieSeries';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/MovieSeries';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A series of movies. Included movies can be indicated with the hasPart property.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreativeWorkSeries';

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
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     * @var Person [schema.org types: Person]
     */
    public $director;

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
                'director',
                'musicBy',
                'productionCompany',
                'trailer',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'actor' => ['Person'],
                'director' => ['Person'],
                'musicBy' => ['MusicGroup','Person'],
                'productionCompany' => ['Organization'],
                'trailer' => ['VideoObject'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
                'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
                'musicBy' => 'The composer of the soundtrack.',
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
                [['actor','director','musicBy','productionCompany','trailer',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class MovieSeries*/
