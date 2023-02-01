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
 * Trait for RentAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/RentAction
 */
trait RentActionTrait
{
    /**
     * A sub property of participant. The real estate agent involved in the
     * action.
     *
     * @var RealEstateAgent
     */
    public $realEstateAgent;

    /**
     * A sub property of participant. The owner of the real estate property.
     *
     * @var Person|Organization
     */
    public $landlord;
}
