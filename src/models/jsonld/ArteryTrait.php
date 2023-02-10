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
 * Trait for Artery.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Artery
 */
trait ArteryTrait
{
    /**
     * The branches that comprise the arterial structure.
     *
     * @var AnatomicalStructure
     */
    public $arterialBranch;

    /**
     * The area to which the artery supplies blood.
     *
     * @var AnatomicalStructure
     */
    public $supplyTo;
}
