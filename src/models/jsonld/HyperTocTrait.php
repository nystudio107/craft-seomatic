<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for HyperToc.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HyperToc
 */

trait HyperTocTrait
{
    
    /**
     * Indicates a [[HyperTocEntry]] in a [[HyperToc]].
     *
     * @var HyperTocEntry
     */
    public $tocEntry;

    /**
     * A media object that encodes this CreativeWork. This property is a synonym
     * for encoding.
     *
     * @var MediaObject
     */
    public $associatedMedia;

}
