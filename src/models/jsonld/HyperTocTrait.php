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
     * @var MediaObject
     */
    public $associatedMedia;

    /**
     * Indicates a [[HyperTocEntry]] in a [[HyperToc]].
     *
     * @var HyperTocEntry
     */
    public $tocEntry;
}
