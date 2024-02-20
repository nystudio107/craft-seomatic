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
 * EducationalOccupationalProgram - A program offered by an institution which determines the learning progress
 * to achieve an outcome, usually a credential like a degree or certificate.
 * This would define a discrete set of opportunities (e.g., job, courses) that
 * together constitute a program with a clear start, end, set of requirements,
 * and transition to a new occupational opportunity (e.g., a job), or
 * sometimes a higher educational opportunity (e.g., an advanced degree).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EducationalOccupationalProgram
 */
class EducationalOccupationalProgram extends MetaJsonLd implements EducationalOccupationalProgramInterface, IntangibleInterface, ThingInterface
{
    use EducationalOccupationalProgramTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'EducationalOccupationalProgram';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/EducationalOccupationalProgram';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'A program offered by an institution which determines the learning progress to achieve an outcome, usually a credential like a degree or certificate. This would define a discrete set of opportunities (e.g., job, courses) that together constitute a program with a clear start, end, set of requirements, and transition to a new occupational opportunity (e.g., a job), or sometimes a higher educational opportunity (e.g., an advanced degree).';


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
            'applicationDeadline' => ['array', 'Date', 'Date[]'],
            'applicationStartDate' => ['array', 'Date', 'Date[]'],
            'dayOfWeek' => ['array', 'DayOfWeek', 'DayOfWeek[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'educationalCredentialAwarded' => ['array', 'URL', 'URL[]', 'array', 'EducationalOccupationalCredential', 'EducationalOccupationalCredential[]', 'array', 'Text', 'Text[]'],
            'educationalProgramMode' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'endDate' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'financialAidEligible' => ['array', 'Text', 'Text[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'hasCourse' => ['array', 'Course', 'Course[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'maximumEnrollment' => ['array', 'Integer', 'Integer[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'numberOfCredits' => ['array', 'Integer', 'Integer[]', 'array', 'StructuredValue', 'StructuredValue[]'],
            'occupationalCategory' => ['array', 'Text', 'Text[]', 'array', 'CategoryCode', 'CategoryCode[]'],
            'occupationalCredentialAwarded' => ['array', 'EducationalOccupationalCredential', 'EducationalOccupationalCredential[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'offers' => ['array', 'Demand', 'Demand[]', 'array', 'Offer', 'Offer[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'programPrerequisites' => ['array', 'EducationalOccupationalCredential', 'EducationalOccupationalCredential[]', 'array', 'Course', 'Course[]', 'array', 'AlignmentObject', 'AlignmentObject[]', 'array', 'Text', 'Text[]'],
            'programType' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'Text', 'Text[]'],
            'provider' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'salaryUponCompletion' => ['array', 'MonetaryAmountDistribution', 'MonetaryAmountDistribution[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'startDate' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'termDuration' => ['array', 'Duration', 'Duration[]'],
            'termsPerYear' => ['array', 'Number', 'Number[]'],
            'timeOfDay' => ['array', 'Text', 'Text[]'],
            'timeToComplete' => ['array', 'Duration', 'Duration[]'],
            'trainingSalary' => ['array', 'MonetaryAmountDistribution', 'MonetaryAmountDistribution[]'],
            'typicalCreditsPerTerm' => ['array', 'Integer', 'Integer[]', 'array', 'StructuredValue', 'StructuredValue[]'],
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
            'applicationDeadline' => 'The date at which the program stops collecting applications for the next enrollment cycle.',
            'applicationStartDate' => 'The date at which the program begins collecting applications for the next enrollment cycle.',
            'dayOfWeek' => 'The day of the week for which these opening hours are valid.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'educationalCredentialAwarded' => 'A description of the qualification, award, certificate, diploma or other educational credential awarded as a consequence of successful completion of this course or program.',
            'educationalProgramMode' => 'Similar to courseMode, the medium or means of delivery of the program as a whole. The value may either be a text label (e.g. "online", "onsite" or "blended"; "synchronous" or "asynchronous"; "full-time" or "part-time") or a URL reference to a term from a controlled vocabulary (e.g. https://ceds.ed.gov/element/001311#Asynchronous ).',
            'endDate' => 'The end date and time of the item (in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO_8601)).',
            'financialAidEligible' => 'A financial aid type or program which students may use to pay for tuition or fees associated with the program.',
            'hasCourse' => 'A course or class that is one of the learning opportunities that constitute an educational / occupational program. No information is implied about whether the course is mandatory or optional; no guarantee is implied about whether the course will be available to everyone on the program.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'maximumEnrollment' => 'The maximum number of students who may be enrolled in the program.',
            'name' => 'The name of the item.',
            'numberOfCredits' => 'The number of credits or units awarded by a Course or required to complete an EducationalOccupationalProgram.',
            'occupationalCategory' => 'A category describing the job, preferably using a term from a taxonomy such as [BLS O*NET-SOC](http://www.onetcenter.org/taxonomy.html), [ISCO-08](https://www.ilo.org/public/english/bureau/stat/isco/isco08/) or similar, with the property repeated for each applicable value. Ideally the taxonomy should be identified, and both the textual label and formal code for the category should be provided.  Note: for historical reasons, any textual label and formal code provided as a literal may be assumed to be from O*NET-SOC.',
            'occupationalCredentialAwarded' => 'A description of the qualification, award, certificate, diploma or other occupational credential awarded as a consequence of successful completion of this course or program.',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use [[businessFunction]] to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a [[Demand]]. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer.       ',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'programPrerequisites' => 'Prerequisites for enrolling in the program.',
            'programType' => 'The type of educational or occupational program. For example, classroom, internship, alternance, etc.',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
            'salaryUponCompletion' => 'The expected salary upon completing the training.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'startDate' => 'The start date and time of the item (in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO_8601)).',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'termDuration' => 'The amount of time in a term as defined by the institution. A term is a length of time where students take one or more classes. Semesters and quarters are common units for term.',
            'termsPerYear' => 'The number of times terms of study are offered per year. Semesters and quarters are common units for term. For example, if the student can only take 2 semesters for the program in one year, then termsPerYear should be 2.',
            'timeOfDay' => 'The time of day the program normally runs. For example, "evenings".',
            'timeToComplete' => 'The expected length of time to complete the program if attending full-time.',
            'trainingSalary' => 'The estimated salary earned while in the program.',
            'typicalCreditsPerTerm' => 'The number of credits or units a full-time student would be expected to take in 1 term however \'term\' is defined by the institution.',
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
