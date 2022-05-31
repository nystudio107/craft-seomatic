<?php
/**
 * SEOmatic plugin for Craft CMS 4
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
 * Trait for DoseSchedule.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DoseSchedule
 */

trait DoseScheduleTrait
{
    
    /**
     * Characteristics of the population for which this is intended, or which
     * typically uses it, e.g. 'adults'.
     *
     * @var string|Text
     */
    public $targetPopulation;

    /**
     * How often the dose is taken, e.g. 'daily'.
     *
     * @var string|Text
     */
    public $frequency;

    /**
     * The unit of the dose, e.g. 'mg'.
     *
     * @var string|Text
     */
    public $doseUnit;

    /**
     * The value of the dose, e.g. 500.
     *
     * @var float|Number|QualitativeValue
     */
    public $doseValue;

}
