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
 * Trait for WinAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/WinAction
 */
trait WinActionTrait
{
    /**
     * A sub property of participant. The loser of the action.
     *
     * @var array|Person|Person[]
     */
    public $loser;
}
