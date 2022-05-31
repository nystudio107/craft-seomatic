<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for Claim.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Claim
 */

trait ClaimTrait
{
    
    /**
     * For a [[Claim]] interpreted from [[MediaObject]] content     sed to
     * indicate a claim contained, implied or refined from the content of a
     * [[MediaObject]].
     *
     * @var Person|Organization
     */
    public $claimInterpreter;

    /**
     * Indicates the first known occurence of a [[Claim]] in some
     * [[CreativeWork]].
     *
     * @var CreativeWork
     */
    public $firstAppearance;

    /**
     * Indicates an occurence of a [[Claim]] in some [[CreativeWork]].
     *
     * @var CreativeWork
     */
    public $appearance;

}
