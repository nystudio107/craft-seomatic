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
 * Trait for SellAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SellAction
 */

trait SellActionTrait
{
    
    /**
     * The warranty promise(s) included in the offer.
     *
     * @var WarrantyPromise
     */
    public $warrantyPromise;

    /**
     * A sub property of participant. The participant/person/organization that
     * bought the object.
     *
     * @var Person|Organization
     */
    public $buyer;

}
