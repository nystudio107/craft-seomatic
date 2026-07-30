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
 * schema.org version: v30.0
 * Trait for RsvpAction.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/RsvpAction
 */
trait RsvpActionTrait
{
    /**
     * If responding yes, the number of guests who will attend in addition to the
     * invitee.
     *
     * @var float|array|Number|Number[]
     */
    public $additionalNumberOfGuests;

    /**
     * Comments, typically from users.
     *
     * @var array|Comment|Comment[]
     */
    public $comment;

    /**
     * The response (yes, no, maybe) to the RSVP.
     *
     * @var array|RsvpResponseType|RsvpResponseType[]
     */
    public $rsvpResponse;
}
