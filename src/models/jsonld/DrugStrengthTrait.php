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
 * Trait for DrugStrength.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DrugStrength
 */
trait DrugStrengthTrait
{
    /**
     * An active ingredient, typically chemical compounds and/or biologic
     * substances.
     *
     * @var string|array|Text|Text[]
     */
    public $activeIngredient;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var array|MaximumDoseSchedule|MaximumDoseSchedule[]
     */
    public $maximumIntake;

    /**
     * The units of an active ingredient's strength, e.g. mg.
     *
     * @var string|array|Text|Text[]
     */
    public $strengthUnit;

    /**
     * The value of an active ingredient's strength, e.g. 325.
     *
     * @var float|array|Number|Number[]
     */
    public $strengthValue;

    /**
     * The location in which the strength is available.
     *
     * @var array|AdministrativeArea|AdministrativeArea[]
     */
    public $availableIn;
}
