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
 * Trait for ArchiveComponent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ArchiveComponent
 */
trait ArchiveComponentTrait
{
    /**
     * [[ArchiveOrganization]] that holds, keeps or maintains the
     * [[ArchiveComponent]].
     *
     * @var array|ArchiveOrganization|ArchiveOrganization[]
     */
    public $holdingArchive;

    /**
     * Current location of the item.
     *
     * @var string|array|Text|Text[]|array|Place|Place[]|array|PostalAddress|PostalAddress[]
     */
    public $itemLocation;
}
