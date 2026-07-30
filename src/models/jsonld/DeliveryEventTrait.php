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
     * @var string|array|Text|Text[]
     */
    public $accessCode;

    /**
     * When the item is available for pickup from the store, locker, etc.
     *
     * @var array|DateTime|DateTime[]
     */
    public $availableFrom;

    /**
     * After this date, the item will no longer be available for pickup.
     *
     * @var array|DateTime|DateTime[]
     */
    public $availableThrough;

    /**
     * Method used for delivery or shipping.
     *
     * @var array|DeliveryMethod|DeliveryMethod[]
     */
    public $hasDeliveryMethod;
}
