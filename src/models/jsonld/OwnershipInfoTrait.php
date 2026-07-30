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
 * schema.org version: v30.0
 * Trait for OwnershipInfo.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/OwnershipInfo
 */
trait OwnershipInfoTrait
{
    /**
     * The organization or person from which the product was acquired.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $acquiredFrom;

    /**
     * The date and time of obtaining the product.
     *
     * @var array|DateTime|DateTime[]
     */
    public $ownedFrom;

    /**
     * The date and time of giving up ownership on the product.
     *
     * @var array|DateTime|DateTime[]
     */
    public $ownedThrough;

    /**
     * The product that this structured value is referring to.
     *
     * @var array|Product|Product[]|array|Service|Service[]
     */
    public $typeOfGood;
}
