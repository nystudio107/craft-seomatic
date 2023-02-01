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
 * Trait for BuyAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BuyAction
 */
trait BuyActionTrait
{
    /**
     * An entity which offers (sells / leases / lends / loans) the services /
     * goods.  A seller may also be a provider.
     *
     * @var Organization|Person
     */
    public $seller;

    /**
     * The warranty promise(s) included in the offer.
     *
     * @var WarrantyPromise
     */
    public $warrantyPromise;

    /**
     * 'vendor' is an earlier term for 'seller'.
     *
     * @var Organization|Person
     */
    public $vendor;
}
