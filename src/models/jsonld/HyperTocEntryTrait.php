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
 * Trait for HyperTocEntry.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HyperTocEntry
 */
trait HyperTocEntryTrait
{
    /**
     * A media object that encodes this CreativeWork. This property is a synonym
     * for encoding.
     *
     * @var array|MediaObject|MediaObject[]
     */
    public $associatedMedia;

    /**
     * A [[HyperTocEntry]] can have a [[tocContinuation]] indicated, which is
     * another [[HyperTocEntry]] that would be the default next item to play or
     * render.
     *
     * @var array|HyperTocEntry|HyperTocEntry[]
     */
    public $tocContinuation;

    /**
     * Text of an utterances (spoken words, lyrics etc.) that occurs at a certain
     * section of a media object, represented as a [[HyperTocEntry]].
     *
     * @var string|array|Text|Text[]
     */
    public $utterances;
}
