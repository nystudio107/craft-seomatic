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
 * Trait for EndorseAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EndorseAction
 */
trait EndorseActionTrait
{
    /**
     * A sub property of participant. The person/organization being supported.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $endorsee;
}
