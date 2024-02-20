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
 * Trait for SellAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SellAction
 */
trait SellActionTrait
{
    /**
     * A sub property of participant. The participant/person/organization that
     * bought the object.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $buyer;

    /**
     * The warranty promise(s) included in the offer.
     *
     * @var array|WarrantyPromise|WarrantyPromise[]
     */
    public $warrantyPromise;
}
