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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v26.0-release
 * CDCPMDRecord - A CDCPMDRecord is a data structure representing a record in a CDC tabular
 * data format       used for hospital data reporting. See
 * [documentation](/docs/cdc-covid.html) for details, and the linked CDC
 * materials for authoritative       definitions used as the source here.
 *
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CDCPMDRecord
 */
class CDCPMDRecord extends MetaJsonLd implements CDCPMDRecordInterface, StructuredValueInterface, IntangibleInterface, ThingInterface
{
    use CDCPMDRecordTrait;
    use StructuredValueTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'CDCPMDRecord';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/CDCPMDRecord';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'StructuredValue';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = "A CDCPMDRecord is a data structure representing a record in a CDC tabular data format\n      used for hospital data reporting. See [documentation](/docs/cdc-covid.html) for details, and the linked CDC materials for authoritative\n      definitions used as the source here.\n      ";


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyNames(): array
    {
        return array_keys($this->getSchemaPropertyExpectedTypes());
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyExpectedTypes(): array
    {
        return [
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'cvdCollectionDate' => ['array', 'DateTime', 'DateTime[]', 'array', 'Text', 'Text[]'],
            'cvdFacilityCounty' => ['array', 'Text', 'Text[]'],
            'cvdFacilityId' => ['array', 'Text', 'Text[]'],
            'cvdNumBeds' => ['array', 'Number', 'Number[]'],
            'cvdNumBedsOcc' => ['array', 'Number', 'Number[]'],
            'cvdNumC19Died' => ['array', 'Number', 'Number[]'],
            'cvdNumC19HOPats' => ['array', 'Number', 'Number[]'],
            'cvdNumC19HospPats' => ['array', 'Number', 'Number[]'],
            'cvdNumC19MechVentPats' => ['array', 'Number', 'Number[]'],
            'cvdNumC19OFMechVentPats' => ['array', 'Number', 'Number[]'],
            'cvdNumC19OverflowPats' => ['array', 'Number', 'Number[]'],
            'cvdNumICUBeds' => ['array', 'Number', 'Number[]'],
            'cvdNumICUBedsOcc' => ['array', 'Number', 'Number[]'],
            'cvdNumTotBeds' => ['array', 'Number', 'Number[]'],
            'cvdNumVent' => ['array', 'Number', 'Number[]'],
            'cvdNumVentUse' => ['array', 'Number', 'Number[]'],
            'datePosted' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'url' => ['array', 'URL', 'URL[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'alternateName' => 'An alias for the item.',
            'cvdCollectionDate' => 'collectiondate - Date for which patient counts are reported.',
            'cvdFacilityCounty' => 'Name of the County of the NHSN facility that this data record applies to. Use [[cvdFacilityId]] to identify the facility. To provide other details, [[healthcareReportingData]] can be used on a [[Hospital]] entry.',
            'cvdFacilityId' => 'Identifier of the NHSN facility that this data record applies to. Use [[cvdFacilityCounty]] to indicate the county. To provide other details, [[healthcareReportingData]] can be used on a [[Hospital]] entry.',
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
            'cvdNumTotBeds' => 'numtotbeds - ALL HOSPITAL BEDS: Total number of all inpatient and outpatient beds, including all staffed, ICU, licensed, and overflow (surge) beds used for inpatients or outpatients.',
            'cvdNumVent' => 'numvent - MECHANICAL VENTILATORS: Total number of ventilators available.',
            'cvdNumVentUse' => 'numventuse - MECHANICAL VENTILATORS IN USE: Total number of ventilators in use.',
            'datePosted' => 'Publication date of an online listing.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'url' => 'URL of the item.',
        ];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRequiredSchema(): array
    {
        return ['description', 'name'];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRecommendedSchema(): array
    {
        return ['image', 'url'];
    }


    /**
     * @inheritdoc
     */
    public function defineRules(): array
    {
        $rules = parent::defineRules();
        $rules = array_merge($rules, [
                [$this->getSchemaPropertyNames(), 'validateJsonSchema'],
                [$this->getGoogleRequiredSchema(), 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
                [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.'],
            ]);

        return $rules;
    }
}
