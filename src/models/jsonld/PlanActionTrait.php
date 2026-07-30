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
 * Trait for PlanAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PlanAction
 */
trait PlanActionTrait
{
    /**
     * The time the object is scheduled to.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $scheduledTime;
}
