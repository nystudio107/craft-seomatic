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
 * Trait for TransferAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/TransferAction
 */
trait TransferActionTrait
{
    /**
     * A sub property of location. The original location of the object or the
     * agent before the action.
     *
     * @var array|Place|Place[]
     */
    public $fromLocation;

    /**
     * A sub property of location. The final location of the object or the agent
     * after the action.
     *
     * @var array|Place|Place[]
     */
    public $toLocation;
}
