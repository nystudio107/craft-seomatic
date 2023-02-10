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
 * Trait for LiveBlogPosting.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/LiveBlogPosting
 */
trait LiveBlogPostingTrait
{
    /**
     * An update to the LiveBlog.
     *
     * @var BlogPosting
     */
    public $liveBlogUpdate;

    /**
     * The time when the live blog will begin covering the Event. Note that
     * coverage may begin before the Event's start time. The LiveBlogPosting may
     * also be created before coverage begins.
     *
     * @var DateTime
     */
    public $coverageStartTime;

    /**
     * The time when the live blog will stop covering the Event. Note that
     * coverage may continue after the Event concludes.
     *
     * @var DateTime
     */
    public $coverageEndTime;
}
