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
 * Trait for DoseSchedule.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DoseSchedule
 */
trait DoseScheduleTrait
{
    /**
     * The value of the dose, e.g. 500.
     *
     * @var float|array|Number|Number[]|array|QualitativeValue|QualitativeValue[]
     */
    public $doseValue;

    /**
     * Characteristics of the population for which this is intended, or which
     * typically uses it, e.g. 'adults'.
     *
     * @var string|array|Text|Text[]
     */
    public $targetPopulation;

    /**
     * The unit of the dose, e.g. 'mg'.
     *
     * @var string|array|Text|Text[]
     */
    public $doseUnit;

    /**
     * How often the dose is taken, e.g. 'daily'.
     *
     * @var string|array|Text|Text[]
     */
    public $frequency;
}
