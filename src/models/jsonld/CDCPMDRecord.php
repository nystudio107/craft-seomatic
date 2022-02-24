<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * CDCPMDRecord - A CDCPMDRecord is a data structure representing a record in
 * a CDC tabular data format used for hospital data reporting. See
 * documentation for details, and the linked CDC materials for authoritative
 * definitions used as the source here.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/CDCPMDRecord
 */
class CDCPMDRecord extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'CDCPMDRecord';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/CDCPMDRecord';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A CDCPMDRecord is a data structure representing a record in a CDC tabular data format used for hospital data reporting. See documentation for details, and the linked CDC materials for authoritative definitions used as the source here.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'StructuredValue';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================
    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'cvdCollectionDate',
        'cvdNumBeds',
        'cvdNumBedsOcc',
        'cvdNumC19Died',
        'cvdNumC19HOPats',
        'cvdNumC19HospPats',
        'cvdNumC19MechVentPats',
        'cvdNumC19OFMechVentPats',
        'cvdNumC19OverflowPats',
        'cvdNumICUBeds',
        'cvdNumICUBedsOcc',
        'cvdNumTotBeds',
        'cvdNumVent',
        'cvdNumVentUse',
        'datePosted'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'cvdCollectionDate' => ['DateTime', 'Text'],
        'cvdNumBeds' => ['Number'],
        'cvdNumBedsOcc' => ['Number'],
        'cvdNumC19Died' => ['Number'],
        'cvdNumC19HOPats' => ['Number'],
        'cvdNumC19HospPats' => ['Number'],
        'cvdNumC19MechVentPats' => ['Number'],
        'cvdNumC19OFMechVentPats' => ['Number'],
        'cvdNumC19OverflowPats' => ['Number'],
        'cvdNumICUBeds' => ['Number'],
        'cvdNumICUBedsOcc' => ['Number'],
        'cvdNumTotBeds' => ['Number'],
        'cvdNumVent' => ['Number'],
        'cvdNumVentUse' => ['Number'],
        'datePosted' => ['Date', 'DateTime']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'cvdCollectionDate' => 'collectiondate - Date for which patient counts are reported.',
        'cvdNumBeds' => 'numbeds - HOSPITAL INPATIENT BEDS: Inpatient beds, including all staffed, licensed, and overflow (surge) beds used for inpatients.',
        'cvdNumBedsOcc' => 'numbedsocc - HOSPITAL INPATIENT BED OCCUPANCY: Total number of staffed inpatient beds that are occupied.',
        'cvdNumC19Died' => 'numc19died - DEATHS: Patients with suspected or confirmed COVID-19 who died in the hospital, ED, or any overflow location.',
        'cvdNumC19HOPats' => 'numc19hopats - HOSPITAL ONSET: Patients hospitalized in an NHSN inpatient care location with onset of suspected or confirmed COVID-19 14 or more days after hospitalization.',
        'cvdNumC19HospPats' => 'numc19hosppats - HOSPITALIZED: Patients currently hospitalized in an inpatient care location who have suspected or confirmed COVID-19.',
        'cvdNumC19MechVentPats' => 'numc19mechventpats - HOSPITALIZED and VENTILATED: Patients hospitalized in an NHSN inpatient care location who have suspected or confirmed COVID-19 and are on a mechanical ventilator.',
        'cvdNumC19OFMechVentPats' => 'numc19ofmechventpats - ED/OVERFLOW and VENTILATED: Patients with suspected or confirmed COVID-19 who are in the ED or any overflow location awaiting an inpatient bed and on a mechanical ventilator.',
        'cvdNumC19OverflowPats' => 'numc19overflowpats - ED/OVERFLOW: Patients with suspected or confirmed COVID-19 who are in the ED or any overflow location awaiting an inpatient bed.',
        'cvdNumICUBeds' => 'numicubeds - ICU BEDS: Total number of staffed inpatient intensive care unit (ICU) beds.',
        'cvdNumICUBedsOcc' => 'numicubedsocc - ICU BED OCCUPANCY: Total number of staffed inpatient ICU beds that are occupied.',
        'cvdNumTotBeds' => 'numtotbeds - ALL HOSPITAL BEDS: Total number of all Inpatient and outpatient beds, including all staffed,ICU, licensed, and overflow (surge) beds used for inpatients or outpatients.',
        'cvdNumVent' => 'numvent - MECHANICAL VENTILATORS: Total number of ventilators available.',
        'cvdNumVentUse' => 'numventuse - MECHANICAL VENTILATORS IN USE: Total number of ventilators in use.',
        'datePosted' => 'Publication date of an online listing.'
    ];
    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];
    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];
    /**
     * collectiondate - Date for which patient counts are reported.
     *
     * @var mixed|DateTime|string [schema.org types: DateTime, Text]
     */
    public $cvdCollectionDate;
    /**
     * numbeds - HOSPITAL INPATIENT BEDS: Inpatient beds, including all staffed,
     * licensed, and overflow (surge) beds used for inpatients.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumBeds;
    /**
     * numbedsocc - HOSPITAL INPATIENT BED OCCUPANCY: Total number of staffed
     * inpatient beds that are occupied.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumBedsOcc;
    /**
     * numc19died - DEATHS: Patients with suspected or confirmed COVID-19 who died
     * in the hospital, ED, or any overflow location.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumC19Died;
    /**
     * numc19hopats - HOSPITAL ONSET: Patients hospitalized in an NHSN inpatient
     * care location with onset of suspected or confirmed COVID-19 14 or more days
     * after hospitalization.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumC19HOPats;
    /**
     * numc19hosppats - HOSPITALIZED: Patients currently hospitalized in an
     * inpatient care location who have suspected or confirmed COVID-19.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumC19HospPats;
    /**
     * numc19mechventpats - HOSPITALIZED and VENTILATED: Patients hospitalized in
     * an NHSN inpatient care location who have suspected or confirmed COVID-19
     * and are on a mechanical ventilator.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumC19MechVentPats;
    /**
     * numc19ofmechventpats - ED/OVERFLOW and VENTILATED: Patients with suspected
     * or confirmed COVID-19 who are in the ED or any overflow location awaiting
     * an inpatient bed and on a mechanical ventilator.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumC19OFMechVentPats;
    /**
     * numc19overflowpats - ED/OVERFLOW: Patients with suspected or confirmed
     * COVID-19 who are in the ED or any overflow location awaiting an inpatient
     * bed.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumC19OverflowPats;
    /**
     * numicubeds - ICU BEDS: Total number of staffed inpatient intensive care
     * unit (ICU) beds.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumICUBeds;

    // Static Protected Properties
    // =========================================================================
    /**
     * numicubedsocc - ICU BED OCCUPANCY: Total number of staffed inpatient ICU
     * beds that are occupied.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumICUBedsOcc;
    /**
     * numtotbeds - ALL HOSPITAL BEDS: Total number of all Inpatient and
     * outpatient beds, including all staffed,ICU, licensed, and overflow (surge)
     * beds used for inpatients or outpatients.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumTotBeds;
    /**
     * numvent - MECHANICAL VENTILATORS: Total number of ventilators available.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumVent;
    /**
     * numventuse - MECHANICAL VENTILATORS IN USE: Total number of ventilators in
     * use.
     *
     * @var float [schema.org types: Number]
     */
    public $cvdNumVentUse;
    /**
     * Publication date of an online listing.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $datePosted;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['cvdCollectionDate', 'cvdNumBeds', 'cvdNumBedsOcc', 'cvdNumC19Died', 'cvdNumC19HOPats', 'cvdNumC19HospPats', 'cvdNumC19MechVentPats', 'cvdNumC19OFMechVentPats', 'cvdNumC19OverflowPats', 'cvdNumICUBeds', 'cvdNumICUBedsOcc', 'cvdNumTotBeds', 'cvdNumVent', 'cvdNumVentUse', 'datePosted'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
