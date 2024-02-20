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
 * Trait for MonetaryGrant.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MonetaryGrant
 */
trait MonetaryGrantTrait
{
    /**
     * The amount of money.
     *
     * @var float|array|MonetaryAmount|MonetaryAmount[]|array|Number|Number[]
     */
    public $amount;

    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $funder;
}
