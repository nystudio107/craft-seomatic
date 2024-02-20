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
 * Trait for Blog.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Blog
 */
trait BlogTrait
{
    /**
     * The International Standard Serial Number (ISSN) that identifies this serial
     * publication. You can repeat this property to identify different formats of,
     * or the linking ISSN (ISSN-L) for, this serial publication.
     *
     * @var string|array|Text|Text[]
     */
    public $issn;

    /**
     * Indicates a post that is part of a [[Blog]]. Note that historically, what
     * we term a "Blog" was once known as a "weblog", and that what we term a
     * "BlogPosting" is now often colloquially referred to as a "blog".
     *
     * @var array|BlogPosting|BlogPosting[]
     */
    public $blogPosts;

    /**
     * A posting that is part of this blog.
     *
     * @var array|BlogPosting|BlogPosting[]
     */
    public $blogPost;
}
