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
 * Trait for DataDownload.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/DataDownload
 */

trait DataDownloadTrait
{
    
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

}
