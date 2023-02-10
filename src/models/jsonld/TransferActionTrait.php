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
 * Trait for TransferAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TransferAction
 */
trait TransferActionTrait
{
    /**
     * A sub property of location. The final location of the object or the agent
     * after the action.
     *
     * @var Place
     */
    public $toLocation;

    /**
     * A sub property of location. The original location of the object or the
     * agent before the action.
     *
     * @var Place
     */
    public $fromLocation;
}
