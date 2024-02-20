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
 * Occupation - A profession, may involve prolonged training and/or a formal qualification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Occupation
 */
class Occupation extends MetaJsonLd implements OccupationInterface, IntangibleInterface, ThingInterface
{
    use OccupationTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static $schemaTypeName = 'Occupation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static $schemaTypeScope = 'https://schema.org/Occupation';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static $schemaTypeDescription = 'A profession, may involve prolonged training and/or a formal qualification.';


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
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'educationRequirements' => ['array', 'Text', 'Text[]', 'array', 'EducationalOccupationalCredential', 'EducationalOccupationalCredential[]'],
            'estimatedSalary' => ['array', 'MonetaryAmountDistribution', 'MonetaryAmountDistribution[]', 'array', 'MonetaryAmount', 'MonetaryAmount[]', 'array', 'Number', 'Number[]'],
            'experienceRequirements' => ['array', 'Text', 'Text[]', 'array', 'OccupationalExperienceRequirements', 'OccupationalExperienceRequirements[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'occupationLocation' => ['array', 'AdministrativeArea', 'AdministrativeArea[]'],
            'occupationalCategory' => ['array', 'Text', 'Text[]', 'array', 'CategoryCode', 'CategoryCode[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'qualifications' => ['array', 'EducationalOccupationalCredential', 'EducationalOccupationalCredential[]', 'array', 'Text', 'Text[]'],
            'responsibilities' => ['array', 'Text', 'Text[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'skills' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'Text', 'Text[]'],
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
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'educationRequirements' => 'Educational background needed for the position or Occupation.',
            'estimatedSalary' => 'An estimated salary for a job posting or occupation, based on a variety of variables including, but not limited to industry, job title, and location. Estimated salaries  are often computed by outside organizations rather than the hiring organization, who may not have committed to the estimated value.',
            'experienceRequirements' => 'Description of skills and experience needed for the position or Occupation.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'occupationLocation' => ' The region/country for which this occupational description is appropriate. Note that educational requirements and qualifications can vary between jurisdictions.',
            'occupationalCategory' => 'A category describing the job, preferably using a term from a taxonomy such as [BLS O*NET-SOC](http://www.onetcenter.org/taxonomy.html), [ISCO-08](https://www.ilo.org/public/english/bureau/stat/isco/isco08/) or similar, with the property repeated for each applicable value. Ideally the taxonomy should be identified, and both the textual label and formal code for the category should be provided.  Note: for historical reasons, any textual label and formal code provided as a literal may be assumed to be from O*NET-SOC.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'qualifications' => 'Specific qualifications required for this role or Occupation.',
            'responsibilities' => 'Responsibilities associated with this role or Occupation.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'skills' => 'A statement of knowledge, skill, ability, task or any other assertion expressing a competency that is desired or required to fulfill this role or to work in this occupation.',
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
