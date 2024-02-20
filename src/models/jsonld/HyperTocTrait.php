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
 * Trait for HyperToc.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HyperToc
 */
trait HyperTocTrait
{
    /**
     * A media object that encodes this CreativeWork. This property is a synonym
     * for encoding.
     *
     * @var array|MediaObject|MediaObject[]
     */
    public $associatedMedia;

    /**
     * Indicates a [[HyperTocEntry]] in a [[HyperToc]].
     *
     * @var array|HyperTocEntry|HyperTocEntry[]
     */
    public $tocEntry;
}
