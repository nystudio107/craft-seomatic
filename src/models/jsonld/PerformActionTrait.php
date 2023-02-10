<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
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
     * @var EntertainmentBusiness
     */
    public $entertainmentBusiness;
}
