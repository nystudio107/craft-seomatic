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
 * Trait for GovernmentService.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/GovernmentService
 */
trait GovernmentServiceTrait
{
    /**
     * The operating organization, if different from the provider.  This enables
     * the representation of services that are provided by an organization, but
     * operated by another organization like a subcontractor.
     *
     * @var array|Organization|Organization[]
     */
    public $serviceOperator;

    /**
     * Indicates a legal jurisdiction, e.g. of some legislation, or where some
     * government service is based.
     *
     * @var string|array|AdministrativeArea|AdministrativeArea[]|array|Text|Text[]
     */
    public $jurisdiction;
}
