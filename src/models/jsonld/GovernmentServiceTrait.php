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
 * Trait for GovernmentService.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/GovernmentService
 */

trait GovernmentServiceTrait
{
    
    /**
     * Indicates a legal jurisdiction, e.g. of some legislation, or where some
     * government service is based.
     *
     * @var string|Text|AdministrativeArea
     */
    public $jurisdiction;

    /**
     * The operating organization, if different from the provider.  This enables
     * the representation of services that are provided by an organization, but
     * operated by another organization like a subcontractor.
     *
     * @var Organization
     */
    public $serviceOperator;

}
