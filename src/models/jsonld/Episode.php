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
 * Episode - A media episode (e.g. TV, radio, video game) which can be part of
 * a series or season.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Episode
 */
class Episode extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Episode';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Episode';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A media episode (e.g. TV, radio, video game) which can be part of a series or season.';

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
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     *
     * @var Person [schema.org types: Person]
     */
    public $director;

    /**
     * Position of the episode within an ordered group of episodes.
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $episodeNumber;

    /**
     * The composer of the soundtrack.
     *
     * @var mixed|MusicGroup|Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * The season to which this episode belongs.
     *
     * @var mixed|CreativeWorkSeason [schema.org types: CreativeWorkSeason]
     */
    public $partOfSeason;

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
        'director',
        'episodeNumber',
        'musicBy',
        'partOfSeason',
        'partOfSeries',
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
        'director' => ['Person'],
        'episodeNumber' => ['Integer','Text'],
        'musicBy' => ['MusicGroup','Person'],
        'partOfSeason' => ['CreativeWorkSeason'],
        'partOfSeries' => ['CreativeWorkSeries'],
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
        'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
        'episodeNumber' => 'Position of the episode within an ordered group of episodes.',
        'musicBy' => 'The composer of the soundtrack.',
        'partOfSeason' => 'The season to which this episode belongs.',
        'partOfSeries' => 'The series to which this episode or season belongs. Supersedes partOfTVSeries.',
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
            [['actor','director','episodeNumber','musicBy','partOfSeason','partOfSeries','productionCompany','trailer'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
