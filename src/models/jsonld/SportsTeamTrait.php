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
 * Trait for SportsTeam.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SportsTeam
 */
trait SportsTeamTrait
{
    /**
     * A person that acts in a coaching role for a sports team.
     *
     * @var array|Person|Person[]
     */
    public $coach;

    /**
     * A person that acts as performing member of a sports team; a player as
     * opposed to a coach.
     *
     * @var array|Person|Person[]
     */
    public $athlete;

    /**
     * Gender of something, typically a [[Person]], but possibly also fictional
     * characters, animals, etc. While https://schema.org/Male and
     * https://schema.org/Female may be used, text strings are also acceptable for
     * people who do not identify as a binary gender. The [[gender]] property can
     * also be used in an extended sense to cover e.g. the gender of sports teams.
     * As with the gender of individuals, we do not try to enumerate all
     * possibilities. A mixed-gender [[SportsTeam]] can be indicated with a text
     * value of "Mixed".
     *
     * @var string|array|GenderType|GenderType[]|array|Text|Text[]
     */
    public $gender;
}
