<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * TVSeries - CreativeWorkSeries dedicated to TV broadcast and associated
 * online delivery.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/TVSeries
 */
class TVSeries extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'TVSeries';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/TVSeries';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'CreativeWorkSeries dedicated to TV broadcast and associated online delivery.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
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
     * A season that is part of the media series. Supersedes season.
     *
     * @var CreativeWorkSeason [schema.org types: CreativeWorkSeason]
     */
    public $containsSeason;

    /**
     * The country of the principal offices of the production company or
     * individual responsible for the movie or program.
     *
     * @var Country [schema.org types: Country]
     */
    public $countryOfOrigin;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     *
     * @var Person [schema.org types: Person]
     */
    public $director;

    /**
     * An episode of a tv, radio or game media within a series or season.
     * Supersedes episodes.
     *
     * @var Episode [schema.org types: Episode]
     */
    public $episode;

    /**
     * The composer of the soundtrack.
     *
     * @var mixed|MusicGroup|Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * The number of episodes in this season or series.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $numberOfEpisodes;

    /**
     * The number of seasons in this series.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $numberOfSeasons;

    /**
     * The production company or studio responsible for the item e.g. series,
     * video game, episode etc.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $productionCompany;

    /**
     * The trailer of a movie or tv/radio series, season, episode, etc.
     *
     * @var mixed|VideoObject [schema.org types: VideoObject]
     */
    public $trailer;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'actor',
        'containsSeason',
        'countryOfOrigin',
        'director',
        'episode',
        'musicBy',
        'numberOfEpisodes',
        'numberOfSeasons',
        'productionCompany',
        'trailer'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'actor' => ['Person'],
        'containsSeason' => ['CreativeWorkSeason'],
        'countryOfOrigin' => ['Country'],
        'director' => ['Person'],
        'episode' => ['Episode'],
        'musicBy' => ['MusicGroup','Person'],
        'numberOfEpisodes' => ['Integer'],
        'numberOfSeasons' => ['Integer'],
        'productionCompany' => ['Organization'],
        'trailer' => ['VideoObject']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
        'containsSeason' => 'A season that is part of the media series. Supersedes season.',
        'countryOfOrigin' => 'The country of the principal offices of the production company or individual responsible for the movie or program.',
        'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
        'episode' => 'An episode of a tv, radio or game media within a series or season. Supersedes episodes.',
        'musicBy' => 'The composer of the soundtrack.',
        'numberOfEpisodes' => 'The number of episodes in this season or series.',
        'numberOfSeasons' => 'The number of seasons in this series.',
        'productionCompany' => 'The production company or studio responsible for the item e.g. series, video game, episode etc.',
        'trailer' => 'The trailer of a movie or tv/radio series, season, episode, etc.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['actor','containsSeason','countryOfOrigin','director','episode','musicBy','numberOfEpisodes','numberOfSeasons','productionCompany','trailer'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
