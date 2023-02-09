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
     * @var string|Text
     */
    public $audienceType;

    /**
     * The geographic area associated with the audience.
     *
     * @var AdministrativeArea
     */
    public $geographicArea;
}
