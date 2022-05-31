<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for Role.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Role
 */

trait RoleTrait
{
    
    /**
     * A position played, performed or filled by a person or organization, as part
     * of an organization. For example, an athlete in a SportsTeam might play in
     * the position named 'Quarterback'.
     *
     * @var string|Text|URL
     */
    public $namedPosition;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var DateTime|Date
     */
    public $startDate;

    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var Date|DateTime
     */
    public $endDate;

    /**
     * A role played, performed or filled by a person or organization. For
     * example, the team of creators for a comic book might fill the roles named
     * 'inker', 'penciller', and 'letterer'; or an athlete in a SportsTeam might
     * play in the position named 'Quarterback'.
     *
     * @var string|URL|Text
     */
    public $roleName;

}
