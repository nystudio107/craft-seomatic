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
 * Trait for PeopleAudience.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PeopleAudience
 */

trait PeopleAudienceTrait
{
    
    /**
     * Audiences defined by a person's minimum age.
     *
     * @var int|Integer
     */
    public $requiredMinAge;

    /**
     * Maximum recommended age in years for the audience or user.
     *
     * @var float|Number
     */
    public $suggestedMaxAge;

    /**
     * Specifying the health condition(s) of a patient, medical study, or other
     * target audience.
     *
     * @var MedicalCondition
     */
    public $healthCondition;

    /**
     * A suggested range of body measurements for the intended audience or person,
     * for example inseam between 32 and 34 inches or height between 170 and 190
     * cm. Typically found on a size chart for wearable products.
     *
     * @var QuantitativeValue
     */
    public $suggestedMeasurement;

    /**
     * The age or age range for the intended audience or person, for example 3-12
     * months for infants, 1-5 years for toddlers.
     *
     * @var QuantitativeValue
     */
    public $suggestedAge;

    /**
     * Audiences defined by a person's maximum age.
     *
     * @var int|Integer
     */
    public $requiredMaxAge;

    /**
     * Minimum recommended age in years for the audience or user.
     *
     * @var float|Number
     */
    public $suggestedMinAge;

    /**
     * Audiences defined by a person's gender.
     *
     * @var string|Text
     */
    public $requiredGender;

    /**
     * The suggested gender of the intended person or audience, for example
     * "male", "female", or "unisex".
     *
     * @var string|GenderType|Text
     */
    public $suggestedGender;

}
