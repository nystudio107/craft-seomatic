<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * MusicComposition - A musical composition.
 *
 * Extends: CreativeWork
 * @see    http://schema.org/MusicComposition
 */
class MusicComposition extends CreativeWork
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MusicComposition';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MusicComposition';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A musical composition.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
     * The person or organization who wrote a composition, or who is the composer
     * of a work performed at some event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $composer;

    /**
     * The date and place the work was first performed.
     *
     * @var mixed|Event [schema.org types: Event]
     */
    public $firstPerformance;

    /**
     * Smaller compositions included in this work (e.g. a movement in a symphony).
     *
     * @var mixed|MusicComposition [schema.org types: MusicComposition]
     */
    public $includedComposition;

    /**
     * The International Standard Musical Work Code for the composition.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $iswcCode;

    /**
     * The person who wrote the words.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $lyricist;

    /**
     * The words in the song.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $lyrics;

    /**
     * An arrangement derived from the composition.
     *
     * @var mixed|MusicComposition [schema.org types: MusicComposition]
     */
    public $musicArrangement;

    /**
     * The type of composition (e.g. overture, sonata, symphony, etc.).
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $musicCompositionForm;

    /**
     * The key, mode, or scale this composition uses.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $musicalKey;

    /**
     * An audio recording of the work. Inverse property: recordingOf.
     *
     * @var mixed|MusicRecording [schema.org types: MusicRecording]
     */
    public $recordedAs;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'composer',
            'firstPerformance',
            'includedComposition',
            'iswcCode',
            'lyricist',
            'lyrics',
            'musicArrangement',
            'musicCompositionForm',
            'musicalKey',
            'recordedAs',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'composer' => ['Organization','Person'],
            'firstPerformance' => ['Event'],
            'includedComposition' => ['MusicComposition'],
            'iswcCode' => ['Text'],
            'lyricist' => ['Person'],
            'lyrics' => ['CreativeWork'],
            'musicArrangement' => ['MusicComposition'],
            'musicCompositionForm' => ['Text'],
            'musicalKey' => ['Text'],
            'recordedAs' => ['MusicRecording'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'composer' => 'The person or organization who wrote a composition, or who is the composer of a work performed at some event.',
            'firstPerformance' => 'The date and place the work was first performed.',
            'includedComposition' => 'Smaller compositions included in this work (e.g. a movement in a symphony).',
            'iswcCode' => 'The International Standard Musical Work Code for the composition.',
            'lyricist' => 'The person who wrote the words.',
            'lyrics' => 'The words in the song.',
            'musicArrangement' => 'An arrangement derived from the composition.',
            'musicCompositionForm' => 'The type of composition (e.g. overture, sonata, symphony, etc.).',
            'musicalKey' => 'The key, mode, or scale this composition uses.',
            'recordedAs' => 'An audio recording of the work. Inverse property: recordingOf.',
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
            [['composer','firstPerformance','includedComposition','iswcCode','lyricist','lyrics','musicArrangement','musicCompositionForm','musicalKey','recordedAs',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
