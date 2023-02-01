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
 * Trait for FollowAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/FollowAction
 */
trait FollowActionTrait
{
    /**
     * A sub property of object. The person or organization being followed.
     *
     * @var Organization|Person
     */
    public $followee;
}
