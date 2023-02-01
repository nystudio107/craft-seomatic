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
     * @var DeliveryMethod
     */
    public $deliveryMethod;

    /**
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     *
     * @var Organization|ContactPoint|Person|Audience
     */
    public $recipient;
}
