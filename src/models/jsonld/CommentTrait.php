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
 * Trait for Comment.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Comment
 */
trait CommentTrait
{
    /**
     * The parent of a question, answer or item in general.
     *
     * @var Comment
     */
    public $parentItem;

    /**
     * The number of downvotes this question, answer or comment has received from
     * the community.
     *
     * @var int|Integer
     */
    public $downvoteCount;

    /**
     * The number of upvotes this question, answer or comment has received from
     * the community.
     *
     * @var int|Integer
     */
    public $upvoteCount;
}
