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
 * Trait for Observation.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Observation
 */
trait ObservationTrait
{
    /**
     * Identifies the denominator variable when an observation represents a ratio
     * or percentage.
     *
     * @var array|StatisticalVariable|StatisticalVariable[]
     */
    public $measurementDenominator;

    /**
     * The observationDate of an [[Observation]].
     *
     * @var array|DateTime|DateTime[]
     */
    public $observationDate;

    /**
     * The measuredProperty of an [[Observation]], typically via its
     * [[StatisticalVariable]]. There are various kinds of applicable
     * [[Property]]: a schema.org property, a property from other RDF-compatible
     * systems, e.g. W3C RDF Data Cube, Data Commons, Wikidata, or schema.org
     * extensions such as [GS1's](https://www.gs1.org/voc/?show=properties).
     *
     * @var array|Property|Property[]
     */
    public $measuredProperty;

    /**
     * The length of time an Observation took place over. The format follows
     * `P[0-9]*[Y|M|D|h|m|s]`. For example, P1Y is Period 1 Year, P3M is Period 3
     * Months, P3h is Period 3 hours.
     *
     * @var string|array|Text|Text[]
     */
    public $observationPeriod;

    /**
     * A technique, method or technology used in an [[Observation]],
     * [[StatisticalVariable]] or [[Dataset]] (or [[DataDownload]],
     * [[DataCatalog]]), corresponding to the method used for measuring the
     * corresponding variable(s) (for datasets, described using
     * [[variableMeasured]]; for [[Observation]], a [[StatisticalVariable]]).
     * Often but not necessarily each [[variableMeasured]] will have an explicit
     * representation as (or mapping to) an property such as those defined in
     * Schema.org, or other RDF vocabularies and "knowledge graphs". In that case
     * the subproperty of [[variableMeasured]] called [[measuredProperty]] is
     * applicable.      The [[measurementTechnique]] property helps when extra
     * clarification is needed about how a [[measuredProperty]] was measured. This
     * is oriented towards scientific and scholarly dataset publication but may
     * have broader applicability; it is not intended as a full representation of
     * measurement, but can often serve as a high level summary for dataset
     * discovery.   For example, if [[variableMeasured]] is: molecule
     * concentration, [[measurementTechnique]] could be: "mass spectrometry" or
     * "nmr spectroscopy" or "colorimetry" or "immunofluorescence". If the
     * [[variableMeasured]] is "depression rating", the [[measurementTechnique]]
     * could be "Zung Scale" or "HAM-D" or "Beck Depression Inventory".   If there
     * are several [[variableMeasured]] properties recorded for some given data
     * object, use a [[PropertyValue]] for each [[variableMeasured]] and attach
     * the corresponding [[measurementTechnique]]. The value can also be from an
     * enumeration, organized as a [[MeasurementMetholdEnumeration]].
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|MeasurementMethodEnum|MeasurementMethodEnum[]|array|Text|Text[]|array|URL|URL[]
     */
    public $measurementTechnique;

    /**
     * Provides additional qualification to an observation. For example, a GDP
     * observation measures the Nominal value.
     *
     * @var array|Enumeration|Enumeration[]
     */
    public $measurementQualifier;

    /**
     * A [[marginOfError]] for an [[Observation]].
     *
     * @var array|QuantitativeValue|QuantitativeValue[]
     */
    public $marginOfError;

    /**
     * The variableMeasured property can indicate (repeated as necessary) the
     * variables that are measured in some dataset, either described as text or as
     * pairs of identifier and description using PropertyValue, or more explicitly
     * as a [[StatisticalVariable]].
     *
     * @var string|array|Text|Text[]|array|Property|Property[]|array|StatisticalVariable|StatisticalVariable[]|array|PropertyValue|PropertyValue[]
     */
    public $variableMeasured;

    /**
     * The [[observationAbout]] property identifies an entity, often a [[Place]],
     * associated with an [[Observation]].
     *
     * @var array|Thing|Thing[]|array|Place|Place[]
     */
    public $observationAbout;

    /**
     * A subproperty of [[measurementTechnique]] that can be used for specifying
     * specific methods, in particular via [[MeasurementMethodEnum]].
     *
     * @var string|array|URL|URL[]|array|DefinedTerm|DefinedTerm[]|array|MeasurementMethodEnum|MeasurementMethodEnum[]|array|Text|Text[]
     */
    public $measurementMethod;
}
