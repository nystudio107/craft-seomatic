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
     * @var Person|ContactPoint|Organization
     */
    public $bccRecipient;

    /**
     * A sub property of participant. The participant who is at the receiving end
     * of the action.
     *
     * @var Person|Audience|ContactPoint|Organization
     */
    public $recipient;

    /**
     * The date/time the message was received if a single recipient exists.
     *
     * @var DateTime
     */
    public $dateReceived;

    /**
     * A sub property of recipient. The recipient copied on a message.
     *
     * @var Person|Organization|ContactPoint
     */
    public $ccRecipient;

    /**
     * A CreativeWork attached to the message.
     *
     * @var CreativeWork
     */
    public $messageAttachment;

    /**
     * A sub property of recipient. The recipient who was directly sent the
     * message.
     *
     * @var ContactPoint|Person|Audience|Organization
     */
    public $toRecipient;

    /**
     * The date/time at which the message was sent.
     *
     * @var DateTime
     */
    public $dateSent;

    /**
     * The date/time at which the message has been read by the recipient if a
     * single recipient exists.
     *
     * @var Date|DateTime
     */
    public $dateRead;

    /**
     * A sub property of participant. The participant who is at the sending end of
     * the action.
     *
     * @var Person|Audience|Organization
     */
    public $sender;

}
