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

use nystudio107\seomatic\models\jsonld\Clip;

/**
 * RadioClip - A short radio program or a segment/part of a radio program.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/RadioClip
 */
class RadioClip extends Clip
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'RadioClip';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/RadioClip';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A short radio program or a segment/part of a radio program.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Clip';

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
     * Position of the clip within an ordered group of clips.
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $clipNumber;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $director;

    /**
     * The end time of the clip expressed as the number of seconds from the
     * beginning of the work.
     *
     * @var mixed|float [schema.org types: Number]
     */
    public $endOffset;

    /**
     * The composer of the soundtrack.
     *
     * @var mixed|MusicGroup|Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * The episode to which this clip belongs.
     *
     * @var mixed|Episode [schema.org types: Episode]
     */
    public $partOfEpisode;

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
     * The start time of the clip expressed as the number of seconds from the
     * beginning of the work.
     *
     * @var mixed|float [schema.org types: Number]
     */
    public $startOffset;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'actor',
        'clipNumber',
        'director',
        'endOffset',
        'musicBy',
        'partOfEpisode',
        'partOfSeason',
        'partOfSeries',
        'startOffset'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'actor' => ['Person'],
        'clipNumber' => ['Integer','Text'],
        'director' => ['Person'],
        'endOffset' => ['Number'],
        'musicBy' => ['MusicGroup','Person'],
        'partOfEpisode' => ['Episode'],
        'partOfSeason' => ['CreativeWorkSeason'],
        'partOfSeries' => ['CreativeWorkSeries'],
        'startOffset' => ['Number']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
        'clipNumber' => 'Position of the clip within an ordered group of clips.',
        'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
        'endOffset' => 'The end time of the clip expressed as the number of seconds from the beginning of the work.',
        'musicBy' => 'The composer of the soundtrack.',
        'partOfEpisode' => 'The episode to which this clip belongs.',
        'partOfSeason' => 'The season to which this episode belongs.',
        'partOfSeries' => 'The series to which this episode or season belongs. Supersedes partOfTVSeries.',
        'startOffset' => 'The start time of the clip expressed as the number of seconds from the beginning of the work.'
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
            [['actor','clipNumber','director','endOffset','musicBy','partOfEpisode','partOfSeason','partOfSeries','startOffset'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
