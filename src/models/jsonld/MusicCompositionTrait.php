<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for MusicComposition.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicComposition
 */
trait MusicCompositionTrait
{
    /**
     * The date and place the work was first performed.
     *
     * @var array|Event|Event[]
     */
    public $firstPerformance;

    /**
     * The key, mode, or scale this composition uses.
     *
     * @var string|array|Text|Text[]
     */
    public $musicalKey;

    /**
     * Smaller compositions included in this work (e.g. a movement in a symphony).
     *
     * @var array|MusicComposition|MusicComposition[]
     */
    public $includedComposition;

    /**
     * An audio recording of the work.
     *
     * @var array|MusicRecording|MusicRecording[]
     */
    public $recordedAs;

    /**
     * The person or organization who wrote a composition, or who is the composer
     * of a work performed at some event.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $composer;

    /**
     * The person who wrote the words.
     *
     * @var array|Person|Person[]
     */
    public $lyricist;

    /**
     * The International Standard Musical Work Code for the composition.
     *
     * @var string|array|Text|Text[]
     */
    public $iswcCode;

    /**
     * An arrangement derived from the composition.
     *
     * @var array|MusicComposition|MusicComposition[]
     */
    public $musicArrangement;

    /**
     * The words in the song.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $lyrics;

    /**
     * The type of composition (e.g. overture, sonata, symphony, etc.).
     *
     * @var string|array|Text|Text[]
     */
    public $musicCompositionForm;
}
