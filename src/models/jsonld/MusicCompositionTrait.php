<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for MusicComposition.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MusicComposition
 */
trait MusicCompositionTrait
{
    /**
     * The International Standard Musical Work Code for the composition.
     *
     * @var string|Text
     */
    public $iswcCode;

    /**
     * The words in the song.
     *
     * @var CreativeWork
     */
    public $lyrics;

    /**
     * The key, mode, or scale this composition uses.
     *
     * @var string|Text
     */
    public $musicalKey;

    /**
     * Smaller compositions included in this work (e.g. a movement in a symphony).
     *
     * @var MusicComposition
     */
    public $includedComposition;

    /**
     * An audio recording of the work.
     *
     * @var MusicRecording
     */
    public $recordedAs;

    /**
     * The person or organization who wrote a composition, or who is the composer
     * of a work performed at some event.
     *
     * @var Organization|Person
     */
    public $composer;

    /**
     * The type of composition (e.g. overture, sonata, symphony, etc.).
     *
     * @var string|Text
     */
    public $musicCompositionForm;

    /**
     * The date and place the work was first performed.
     *
     * @var Event
     */
    public $firstPerformance;

    /**
     * The person who wrote the words.
     *
     * @var Person
     */
    public $lyricist;

    /**
     * An arrangement derived from the composition.
     *
     * @var MusicComposition
     */
    public $musicArrangement;
}
