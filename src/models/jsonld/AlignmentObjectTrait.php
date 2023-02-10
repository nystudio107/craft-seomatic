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
 * Trait for AlignmentObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AlignmentObject
 */
trait AlignmentObjectTrait
{
    /**
     * The name of a node in an established educational framework.
     *
     * @var string|Text
     */
    public $targetName;

    /**
     * The URL of a node in an established educational framework.
     *
     * @var URL
     */
    public $targetUrl;

    /**
     * A category of alignment between the learning resource and the framework
     * node. Recommended values include: 'requires', 'textComplexity',
     * 'readingLevel', and 'educationalSubject'.
     *
     * @var string|Text
     */
    public $alignmentType;

    /**
     * The description of a node in an established educational framework.
     *
     * @var string|Text
     */
    public $targetDescription;

    /**
     * The framework to which the resource being described is aligned.
     *
     * @var string|Text
     */
    public $educationalFramework;
}
