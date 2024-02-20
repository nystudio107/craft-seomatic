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
 * Trait for BuyAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BuyAction
 */
trait BuyActionTrait
{
    /**
     * 'vendor' is an earlier term for 'seller'.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $vendor;

    /**
     * The warranty promise(s) included in the offer.
     *
     * @var array|WarrantyPromise|WarrantyPromise[]
     */
    public $warrantyPromise;

    /**
     * An entity which offers (sells / leases / lends / loans) the services /
     * goods.  A seller may also be a provider.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $seller;
}
