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
     * @var float|Number
     */
    public $additionalNumberOfGuests;

    /**
     * Comments, typically from users.
     *
     * @var Comment
     */
    public $comment;

    /**
     * The response (yes, no, maybe) to the RSVP.
     *
     * @var RsvpResponseType
     */
    public $rsvpResponse;
}
