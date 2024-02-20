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
 * Trait for EducationEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EducationEvent
 */
trait EducationEventTrait
{
    /**
     * The item being described is intended to assess the competency or learning
     * outcome defined by the referenced term.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $assesses;

    /**
     * The item being described is intended to help a person learn the competency
     * or learning outcome defined by the referenced term.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $teaches;

    /**
     * The level in terms of progression through an educational or training
     * context. Examples of educational levels include 'beginner', 'intermediate'
     * or 'advanced', and formal sets of level indicators.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|DefinedTerm|DefinedTerm[]
     */
    public $educationalLevel;
}
