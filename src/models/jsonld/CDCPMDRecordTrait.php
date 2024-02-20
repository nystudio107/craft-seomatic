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
 * Trait for CDCPMDRecord.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CDCPMDRecord
 */
trait CDCPMDRecordTrait
{
    /**
     * numbedsocc - HOSPITAL INPATIENT BED OCCUPANCY: Total number of staffed
     * inpatient beds that are occupied.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumBedsOcc;

    /**
     * numventuse - MECHANICAL VENTILATORS IN USE: Total number of ventilators in
     * use.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumVentUse;

    /**
     * numicubedsocc - ICU BED OCCUPANCY: Total number of staffed inpatient ICU
     * beds that are occupied.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumICUBedsOcc;

    /**
     * numbeds - HOSPITAL INPATIENT BEDS: Inpatient beds, including all staffed,
     * licensed, and overflow (surge) beds used for inpatients.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumBeds;

    /**
     * Publication date of an online listing.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $datePosted;

    /**
     * numc19ofmechventpats - ED/OVERFLOW and VENTILATED: Patients with suspected
     * or confirmed COVID-19 who are in the ED or any overflow location awaiting
     * an inpatient bed and on a mechanical ventilator.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumC19OFMechVentPats;

    /**
     * numc19died - DEATHS: Patients with suspected or confirmed COVID-19 who died
     * in the hospital, ED, or any overflow location.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumC19Died;

    /**
     * numc19hopats - HOSPITAL ONSET: Patients hospitalized in an NHSN inpatient
     * care location with onset of suspected or confirmed COVID-19 14 or more days
     * after hospitalization.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumC19HOPats;

    /**
     * numvent - MECHANICAL VENTILATORS: Total number of ventilators available.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumVent;

    /**
     * numtotbeds - ALL HOSPITAL BEDS: Total number of all inpatient and
     * outpatient beds, including all staffed, ICU, licensed, and overflow (surge)
     * beds used for inpatients or outpatients.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumTotBeds;

    /**
     * numc19hosppats - HOSPITALIZED: Patients currently hospitalized in an
     * inpatient care location who have suspected or confirmed COVID-19.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumC19HospPats;

    /**
     * collectiondate - Date for which patient counts are reported.
     *
     * @var string|array|DateTime|DateTime[]|array|Text|Text[]
     */
    public $cvdCollectionDate;

    /**
     * numc19overflowpats - ED/OVERFLOW: Patients with suspected or confirmed
     * COVID-19 who are in the ED or any overflow location awaiting an inpatient
     * bed.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumC19OverflowPats;

    /**
     * Name of the County of the NHSN facility that this data record applies to.
     * Use [[cvdFacilityId]] to identify the facility. To provide other details,
     * [[healthcareReportingData]] can be used on a [[Hospital]] entry.
     *
     * @var string|array|Text|Text[]
     */
    public $cvdFacilityCounty;

    /**
     * Identifier of the NHSN facility that this data record applies to. Use
     * [[cvdFacilityCounty]] to indicate the county. To provide other details,
     * [[healthcareReportingData]] can be used on a [[Hospital]] entry.
     *
     * @var string|array|Text|Text[]
     */
    public $cvdFacilityId;

    /**
     * numicubeds - ICU BEDS: Total number of staffed inpatient intensive care
     * unit (ICU) beds.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumICUBeds;

    /**
     * numc19mechventpats - HOSPITALIZED and VENTILATED: Patients hospitalized in
     * an NHSN inpatient care location who have suspected or confirmed COVID-19
     * and are on a mechanical ventilator.
     *
     * @var float|array|Number|Number[]
     */
    public $cvdNumC19MechVentPats;
}
