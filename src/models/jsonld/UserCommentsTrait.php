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
 * Trait for UserComments.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/UserComments
 */

trait UserCommentsTrait
{
    
    /**
     * The URL at which a reply may be posted to the specified UserComment.
     *
     * @var URL
     */
    public $replyToUrl;

    /**
     * Specifies the CreativeWork associated with the UserComment.
     *
     * @var CreativeWork
     */
    public $discusses;

    /**
     * The time at which the UserComment was made.
     *
     * @var DateTime|Date
     */
    public $commentTime;

    /**
     * The text of the UserComment.
     *
     * @var string|Text
     */
    public $commentText;

    /**
     * The creator/author of this CreativeWork. This is the same as the Author
     * property for CreativeWork.
     *
     * @var Organization|Person
     */
    public $creator;

}
