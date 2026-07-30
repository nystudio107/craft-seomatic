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
 * schema.org version: v30.0
 * Trait for MusicComposition.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicComposition
 */
trait MusicCompositionTrait
{
    /**
     * The person or organization who wrote a composition, or who is the composer
     * of a work performed at some event.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $composer;

    /**
     * The date and place the work was first performed.
     *
     * @var array|Event|Event[]
     */
    public $firstPerformance;

    /**
     * Smaller compositions included in this work (e.g. a movement in a symphony).
     *
     * @var array|MusicComposition|MusicComposition[]
     */
    public $includedComposition;

    /**
     * The International Standard Musical Work Code for the composition.
     *
     * @var string|array|Text|Text[]
     */
    public $iswcCode;

    /**
     * The person who wrote the words.
     *
     * @var array|Person|Person[]
     */
    public $lyricist;

    /**
     * The words in the song.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $lyrics;

    /**
     * An arrangement derived from the composition.
     *
     * @var array|MusicComposition|MusicComposition[]
     */
    public $musicArrangement;

    /**
     * The type of composition (e.g. overture, sonata, symphony, etc.).
     *
     * @var string|array|Text|Text[]
     */
    public $musicCompositionForm;

    /**
     * The key, mode, or scale this composition uses.
     *
     * @var string|array|Text|Text[]
     */
    public $musicalKey;

    /**
     * An audio recording of the work.
     *
     * @var array|MusicRecording|MusicRecording[]
     */
    public $recordedAs;
}
