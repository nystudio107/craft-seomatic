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
 * Trait for OwnershipInfo.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OwnershipInfo
 */
trait OwnershipInfoTrait
{
    /**
     * The date and time of giving up ownership on the product.
     *
     * @var array|DateTime|DateTime[]
     */
    public $ownedThrough;

    /**
     * The date and time of obtaining the product.
     *
     * @var array|DateTime|DateTime[]
     */
    public $ownedFrom;

    /**
     * The organization or person from which the product was acquired.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $acquiredFrom;

    /**
     * The product that this structured value is referring to.
     *
     * @var array|Product|Product[]|array|Service|Service[]
     */
    public $typeOfGood;
}
