<?php

/**
 * SEOmatic plugin for Craft CMS 3
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v15.0-release
 * Trait for CDCPMDRecord.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CDCPMDRecord
 */
trait CDCPMDRecordTrait
{
    /**
     * numc19mechventpats - HOSPITALIZED and VENTILATED: Patients hospitalized in
     * an NHSN inpatient care location who have suspected or confirmed COVID-19
     * and are on a mechanical ventilator.
     *
     * @var float|Number
     */
    public $cvdNumC19MechVentPats;

    /**
     * numbedsocc - HOSPITAL INPATIENT BED OCCUPANCY: Total number of staffed
     * inpatient beds that are occupied.
     *
     * @var float|Number
     */
    public $cvdNumBedsOcc;

    /**
     * numbeds - HOSPITAL INPATIENT BEDS: Inpatient beds, including all staffed,
     * licensed, and overflow (surge) beds used for inpatients.
     *
     * @var float|Number
     */
    public $cvdNumBeds;

    /**
     * numventuse - MECHANICAL VENTILATORS IN USE: Total number of ventilators in
     * use.
     *
     * @var float|Number
     */
    public $cvdNumVentUse;

    /**
     * Identifier of the NHSN facility that this data record applies to. Use
     * [[cvdFacilityCounty]] to indicate the county. To provide other details,
     * [[healthcareReportingData]] can be used on a [[Hospital]] entry.
     *
     * @var string|Text
     */
    public $cvdFacilityId;

    /**
     * numc19hosppats - HOSPITALIZED: Patients currently hospitalized in an
     * inpatient care location who have suspected or confirmed COVID-19.
     *
     * @var float|Number
     */
    public $cvdNumC19HospPats;

    /**
     * collectiondate - Date for which patient counts are reported.
     *
     * @var string|DateTime|Text
     */
    public $cvdCollectionDate;

    /**
     * numtotbeds - ALL HOSPITAL BEDS: Total number of all inpatient and
     * outpatient beds, including all staffed, ICU, licensed, and overflow (surge)
     * beds used for inpatients or outpatients.
     *
     * @var float|Number
     */
    public $cvdNumTotBeds;

    /**
     * Name of the County of the NHSN facility that this data record applies to.
     * Use [[cvdFacilityId]] to identify the facility. To provide other details,
     * [[healthcareReportingData]] can be used on a [[Hospital]] entry.
     *
     * @var string|Text
     */
    public $cvdFacilityCounty;

    /**
     * numc19died - DEATHS: Patients with suspected or confirmed COVID-19 who died
     * in the hospital, ED, or any overflow location.
     *
     * @var float|Number
     */
    public $cvdNumC19Died;

    /**
     * numvent - MECHANICAL VENTILATORS: Total number of ventilators available.
     *
     * @var float|Number
     */
    public $cvdNumVent;

    /**
     * Publication date of an online listing.
     *
     * @var DateTime|Date
     */
    public $datePosted;

    /**
     * numicubeds - ICU BEDS: Total number of staffed inpatient intensive care
     * unit (ICU) beds.
     *
     * @var float|Number
     */
    public $cvdNumICUBeds;

    /**
     * numc19overflowpats - ED/OVERFLOW: Patients with suspected or confirmed
     * COVID-19 who are in the ED or any overflow location awaiting an inpatient
     * bed.
     *
     * @var float|Number
     */
    public $cvdNumC19OverflowPats;

    /**
     * numc19hopats - HOSPITAL ONSET: Patients hospitalized in an NHSN inpatient
     * care location with onset of suspected or confirmed COVID-19 14 or more days
     * after hospitalization.
     *
     * @var float|Number
     */
    public $cvdNumC19HOPats;

    /**
     * numc19ofmechventpats - ED/OVERFLOW and VENTILATED: Patients with suspected
     * or confirmed COVID-19 who are in the ED or any overflow location awaiting
     * an inpatient bed and on a mechanical ventilator.
     *
     * @var float|Number
     */
    public $cvdNumC19OFMechVentPats;

    /**
     * numicubedsocc - ICU BED OCCUPANCY: Total number of staffed inpatient ICU
     * beds that are occupied.
     *
     * @var float|Number
     */
    public $cvdNumICUBedsOcc;
}
