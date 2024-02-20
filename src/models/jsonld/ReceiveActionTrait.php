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
 * Trait for ReceiveAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ReceiveAction
 */
trait ReceiveActionTrait
{
    /**
     * A sub property of participant. The participant who is at the sending end of
     * the action.
     *
     * @var array|Organization|Organization[]|array|Audience|Audience[]|array|Person|Person[]
     */
    public $sender;

    /**
     * A sub property of instrument. The method of delivery.
     *
     * @var array|DeliveryMethod|DeliveryMethod[]
     */
    public $deliveryMethod;
}
