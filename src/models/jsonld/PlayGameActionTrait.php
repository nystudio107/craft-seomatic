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
 * Trait for PlayGameAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PlayGameAction
 */
trait PlayGameActionTrait
{
    /**
     * Indicates the availability type of the game content associated with this
     * action, such as whether it is a full version or a demo.
     *
     * @var string|Text|GameAvailabilityEnumeration
     */
    public $gameAvailabilityType;
}
