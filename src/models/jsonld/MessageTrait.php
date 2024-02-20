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
 * Trait for Message.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Message
 */
trait MessageTrait
{
    /**
     * A sub property of recipient. The recipient blind copied on a message.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]|array|ContactPoint|ContactPoint[]
     */
    public $bccRecipient;

    /**
     * A sub property of participant. The participant who is at the sending end of
     * the action.
     *
     * @var array|Organization|Organization[]|array|Audience|Audience[]|array|Person|Person[]
     */
    public $sender;

    /**
     * A sub property of recipient. The recipient who was directly sent the
     * message.
     *
     * @var array|Organization|Organization[]|array|Audience|Audience[]|array|Person|Person[]|array|ContactPoint|ContactPoint[]
     */
    public $toRecipient;

    /**
     * The date/time the message was received if a single recipient exists.
     *
     * @var array|DateTime|DateTime[]
     */
    public $dateReceived;

    /**
     * The date/time at which the message has been read by the recipient if a
     * single recipient exists.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $dateRead;

    /**
     * The date/time at which the message was sent.
     *
     * @var array|DateTime|DateTime[]
     */
    public $dateSent;

    /**
     * A CreativeWork attached to the message.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $messageAttachment;

    /**
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     *
     * @var array|Organization|Organization[]|array|Audience|Audience[]|array|Person|Person[]|array|ContactPoint|ContactPoint[]
     */
    public $recipient;

    /**
     * A sub property of recipient. The recipient copied on a message.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]|array|ContactPoint|ContactPoint[]
     */
    public $ccRecipient;
}
