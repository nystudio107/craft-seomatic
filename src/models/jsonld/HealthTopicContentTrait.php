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
 * Trait for HealthTopicContent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/HealthTopicContent
 */

trait HealthTopicContentTrait
{
    
    /**
     * Indicates the aspect or aspects specifically addressed in some
     * [[HealthTopicContent]]. For example, that the content is an overview, or
     * that it talks about treatment, self-care, treatments or their side-effects.
     *
     * @var HealthAspectEnumeration
     */
    public $hasHealthAspect;

}
