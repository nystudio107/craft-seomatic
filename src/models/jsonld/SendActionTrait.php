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
 * Trait for SendAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SendAction
 */
trait SendActionTrait
{
    /**
     * A sub property of instrument. The method of delivery.
     *
     * @var array|DeliveryMethod|DeliveryMethod[]
     */
    public $deliveryMethod;

    /**
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     *
     * @var array|Audience|Audience[]|array|ContactPoint|ContactPoint[]|array|Organization|Organization[]|array|Person|Person[]
     */
    public $recipient;
}
