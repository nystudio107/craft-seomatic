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
 * Trait for AlignmentObject.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/AlignmentObject
 */
trait AlignmentObjectTrait
{
    /**
     * A category of alignment between the learning resource and the framework
     * node. Recommended values include: 'requires', 'textComplexity',
     * 'readingLevel', and 'educationalSubject'.
     *
     * @var string|array|Text|Text[]
     */
    public $alignmentType;

    /**
     * The framework to which the resource being described is aligned.
     *
     * @var string|array|Text|Text[]
     */
    public $educationalFramework;

    /**
     * The description of a node in an established educational framework.
     *
     * @var string|array|Text|Text[]
     */
    public $targetDescription;

    /**
     * The name of a node in an established educational framework.
     *
     * @var string|array|Text|Text[]
     */
    public $targetName;

    /**
     * The URL of a node in an established educational framework.
     *
     * @var array|URL|URL[]
     */
    public $targetUrl;
}
