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
 * Trait for PerformAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PerformAction
 */
trait PerformActionTrait
{
    /**
     * A sub property of location. The entertainment business where the action
     * occurred.
     *
     * @var array|EntertainmentBusiness|EntertainmentBusiness[]
     */
    public $entertainmentBusiness;
}
