<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for Blog.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Blog
 */
trait BlogTrait
{
    /**
     * Indicates a post that is part of a [[Blog]]. Note that historically, what
     * we term a "Blog" was once known as a "weblog", and that what we term a
     * "BlogPosting" is now often colloquially referred to as a "blog".
     *
     * @var BlogPosting
     */
    public $blogPosts;

    /**
     * A posting that is part of this blog.
     *
     * @var BlogPosting
     */
    public $blogPost;

    /**
     * The International Standard Serial Number (ISSN) that identifies this serial
     * publication. You can repeat this property to identify different formats of,
     * or the linking ISSN (ISSN-L) for, this serial publication.
     *
     * @var string|Text
     */
    public $issn;
}
