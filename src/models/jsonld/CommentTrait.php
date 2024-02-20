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
 * Trait for Comment.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Comment
 */
trait CommentTrait
{
    /**
     * The parent of a question, answer or item in general. Typically used for Q/A
     * discussion threads e.g. a chain of comments with the first comment being an
     * [[Article]] or other [[CreativeWork]]. See also [[comment]] which points
     * from something to a comment about it.
     *
     * @var array|CreativeWork|CreativeWork[]|array|Comment|Comment[]
     */
    public $parentItem;

    /**
     * The number of upvotes this question, answer or comment has received from
     * the community.
     *
     * @var int|array|Integer|Integer[]
     */
    public $upvoteCount;

    /**
     * A CreativeWork such as an image, video, or audio clip shared as part of
     * this posting.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $sharedContent;

    /**
     * The number of downvotes this question, answer or comment has received from
     * the community.
     *
     * @var int|array|Integer|Integer[]
     */
    public $downvoteCount;
}
