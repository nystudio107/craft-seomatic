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
 * Trait for JoinAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/JoinAction
 */
trait JoinActionTrait
{
    /**
     * Upcoming or past event associated with this place, organization, or action.
     *
     * @var Event
     */
    public $event;
}
