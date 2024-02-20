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
 * Trait for Claim.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Claim
 */
trait ClaimTrait
{
    /**
     * Indicates the first known occurrence of a [[Claim]] in some
     * [[CreativeWork]].
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $firstAppearance;

    /**
     * Indicates an occurrence of a [[Claim]] in some [[CreativeWork]].
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $appearance;

    /**
     * For a [[Claim]] interpreted from [[MediaObject]] content     sed to
     * indicate a claim contained, implied or refined from the content of a
     * [[MediaObject]].
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $claimInterpreter;
}
