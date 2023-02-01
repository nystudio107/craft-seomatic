<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
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
     * @var MediaObject
     */
    public $associatedMedia;

    /**
     * Text of an utterances (spoken words, lyrics etc.) that occurs at a certain
     * section of a media object, represented as a [[HyperTocEntry]].
     *
     * @var string|Text
     */
    public $utterances;

    /**
     * A [[HyperTocEntry]] can have a [[tocContinuation]] indicated, which is
     * another [[HyperTocEntry]] that would be the default next item to play or
     * render.
     *
     * @var HyperTocEntry
     */
    public $tocContinuation;
}
