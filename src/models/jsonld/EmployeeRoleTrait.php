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
 * Trait for EmployeeRole.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EmployeeRole
 */
trait EmployeeRoleTrait
{
    /**
     * The base salary of the job or of an employee in an EmployeeRole.
     *
     * @var float|array|PriceSpecification|PriceSpecification[]|array|MonetaryAmount|MonetaryAmount[]|array|Number|Number[]
     */
    public $baseSalary;

    /**
     * The currency (coded using [ISO
     * 4217](http://en.wikipedia.org/wiki/ISO_4217)) used for the main salary
     * information in this job posting or for this employee.
     *
     * @var string|array|Text|Text[]
     */
    public $salaryCurrency;
}
