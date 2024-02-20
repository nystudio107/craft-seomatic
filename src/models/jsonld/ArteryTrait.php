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
 * Trait for Artery.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Artery
 */
trait ArteryTrait
{
    /**
     * The area to which the artery supplies blood.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $supplyTo;

    /**
     * The branches that comprise the arterial structure.
     *
     * @var array|AnatomicalStructure|AnatomicalStructure[]
     */
    public $arterialBranch;
}
