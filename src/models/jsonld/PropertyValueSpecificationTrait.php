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
 * Trait for PropertyValueSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PropertyValueSpecification
 */
trait PropertyValueSpecificationTrait
{
    /**
     * The lower value of some characteristic or property.
     *
     * @var float|array|Number|Number[]
     */
    public $minValue;

    /**
     * The stepValue attribute indicates the granularity that is expected (and
     * required) of the value in a PropertyValueSpecification.
     *
     * @var float|array|Number|Number[]
     */
    public $stepValue;

    /**
     * Indicates the name of the PropertyValueSpecification to be used in URL
     * templates and form encoding in a manner analogous to HTML's input@name.
     *
     * @var string|array|Text|Text[]
     */
    public $valueName;

    /**
     * Whether or not a property is mutable.  Default is false. Specifying this
     * for a property that also has a value makes it act similar to a "hidden"
     * input in an HTML form.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $readonlyValue;

    /**
     * Specifies the minimum allowed range for number of characters in a literal
     * value.
     *
     * @var float|array|Number|Number[]
     */
    public $valueMinLength;

    /**
     * The default value of the input.  For properties that expect a literal, the
     * default is a literal value, for properties that expect an object, it's an
     * ID reference to one of the current values.
     *
     * @var string|array|Thing|Thing[]|array|Text|Text[]
     */
    public $defaultValue;

    /**
     * Specifies the allowed range for number of characters in a literal value.
     *
     * @var float|array|Number|Number[]
     */
    public $valueMaxLength;

    /**
     * Whether the property must be filled in to complete the action.  Default is
     * false.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $valueRequired;

    /**
     * The upper value of some characteristic or property.
     *
     * @var float|array|Number|Number[]
     */
    public $maxValue;

    /**
     * Whether multiple values are allowed for the property.  Default is false.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $multipleValues;

    /**
     * Specifies a regular expression for testing literal values according to the
     * HTML spec.
     *
     * @var string|array|Text|Text[]
     */
    public $valuePattern;
}
