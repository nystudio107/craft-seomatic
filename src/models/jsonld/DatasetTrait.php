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
 * Trait for Dataset.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Dataset
 */

trait DatasetTrait
{
    
    /**
     * A data catalog which contains this dataset.
     *
     * @var DataCatalog
     */
    public $catalog;

    /**
     * A data catalog which contains this dataset (this property was previously
     * 'catalog', preferred name is now 'includedInDataCatalog').
     *
     * @var DataCatalog
     */
    public $includedDataCatalog;

    /**
     * The variableMeasured property can indicate (repeated as necessary) the 
     * variables that are measured in some dataset, either described as text or as
     * pairs of identifier and description using PropertyValue.
     *
     * @var string|PropertyValue|Text
     */
    public $variableMeasured;

    /**
     * A technique or technology used in a [[Dataset]] (or [[DataDownload]],
     * [[DataCatalog]]), corresponding to the method used for measuring the
     * corresponding variable(s) (described using [[variableMeasured]]). This is
     * oriented towards scientific and scholarly dataset publication but may have
     * broader applicability; it is not intended as a full representation of
     * measurement, but rather as a high level summary for dataset discovery.  For
     * example, if [[variableMeasured]] is: molecule concentration,
     * [[measurementTechnique]] could be: "mass spectrometry" or "nmr
     * spectroscopy" or "colorimetry" or "immunofluorescence".  If the
     * [[variableMeasured]] is "depression rating", the [[measurementTechnique]]
     * could be "Zung Scale" or "HAM-D" or "Beck Depression Inventory".  If there
     * are several [[variableMeasured]] properties recorded for some given data
     * object, use a [[PropertyValue]] for each [[variableMeasured]] and attach
     * the corresponding [[measurementTechnique]].       
     *
     * @var string|Text|URL
     */
    public $measurementTechnique;

    /**
     * The range of temporal applicability of a dataset, e.g. for a 2011 census
     * dataset, the year 2011 (in ISO 8601 time interval format).
     *
     * @var DateTime
     */
    public $datasetTimeInterval;

    /**
     * A downloadable form of this dataset, at a specific location, in a specific
     * format.
     *
     * @var DataDownload
     */
    public $distribution;

    /**
     * The International Standard Serial Number (ISSN) that identifies this serial
     * publication. You can repeat this property to identify different formats of,
     * or the linking ISSN (ISSN-L) for, this serial publication.
     *
     * @var string|Text
     */
    public $issn;

    /**
     * A data catalog which contains this dataset.
     *
     * @var DataCatalog
     */
    public $includedInDataCatalog;

}
