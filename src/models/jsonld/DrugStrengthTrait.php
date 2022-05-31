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
 * Trait for DrugStrength.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DrugStrength
 */

trait DrugStrengthTrait
{
    
    /**
     * The location in which the strength is available.
     *
     * @var AdministrativeArea
     */
    public $availableIn;

    /**
     * The units of an active ingredient's strength, e.g. mg.
     *
     * @var string|Text
     */
    public $strengthUnit;

    /**
     * Recommended intake of this supplement for a given population as defined by
     * a specific recommending authority.
     *
     * @var MaximumDoseSchedule
     */
    public $maximumIntake;

    /**
     * An active ingredient, typically chemical compounds and/or biologic
     * substances.
     *
     * @var string|Text
     */
    public $activeIngredient;

    /**
     * The value of an active ingredient's strength, e.g. 325.
     *
     * @var float|Number
     */
    public $strengthValue;

}
