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
 * Trait for WorkBasedProgram.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/WorkBasedProgram
 */
trait WorkBasedProgramTrait
{
    /**
     * A category describing the job, preferably using a term from a taxonomy such
     * as [BLS O*NET-SOC](http://www.onetcenter.org/taxonomy.html),
     * [ISCO-08](https://www.ilo.org/public/english/bureau/stat/isco/isco08/) or
     * similar, with the property repeated for each applicable value. Ideally the
     * taxonomy should be identified, and both the textual label and formal code
     * for the category should be provided.  Note: for historical reasons, any
     * textual label and formal code provided as a literal may be assumed to be
     * from O*NET-SOC.
     *
     * @var string|array|Text|Text[]|array|CategoryCode|CategoryCode[]
     */
    public $occupationalCategory;

    /**
     * The estimated salary earned while in the program.
     *
     * @var array|MonetaryAmountDistribution|MonetaryAmountDistribution[]
     */
    public $trainingSalary;
}
