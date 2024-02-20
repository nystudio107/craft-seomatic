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
 * Trait for Audience.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Audience
 */
trait AudienceTrait
{
    /**
     * The target group associated with a given audience (e.g. veterans, car
     * owners, musicians, etc.).
     *
     * @var string|array|Text|Text[]
     */
    public $audienceType;

    /**
     * The geographic area associated with the audience.
     *
     * @var array|AdministrativeArea|AdministrativeArea[]
     */
    public $geographicArea;
}
