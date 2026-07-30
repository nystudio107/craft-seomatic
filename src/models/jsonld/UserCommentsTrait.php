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
 * Trait for UserComments.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/UserComments
 */
trait UserCommentsTrait
{
    /**
     * The text of the UserComment.
     *
     * @var string|array|Text|Text[]
     */
    public $commentText;

    /**
     * The time at which the UserComment was made.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $commentTime;

    /**
     * The creator/author of this CreativeWork. This is the same as the Author
     * property for CreativeWork.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $creator;

    /**
     * Specifies the CreativeWork associated with the UserComment.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $discusses;

    /**
     * The URL at which a reply may be posted to the specified UserComment.
     *
     * @var array|URL|URL[]
     */
    public $replyToUrl;
}
