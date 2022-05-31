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
 * Trait for DeliveryEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DeliveryEvent
 */

trait DeliveryEventTrait
{
    
    /**
     * Password, PIN, or access code needed for delivery (e.g. from a locker).
     *
     * @var string|Text
     */
    public $accessCode;

    /**
     * After this date, the item will no longer be available for pickup.
     *
     * @var DateTime
     */
    public $availableThrough;

    /**
     * Method used for delivery or shipping.
     *
     * @var DeliveryMethod
     */
    public $hasDeliveryMethod;

    /**
     * When the item is available for pickup from the store, locker, etc.
     *
     * @var DateTime
     */
    public $availableFrom;

}
