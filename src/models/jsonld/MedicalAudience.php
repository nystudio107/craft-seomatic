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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v14.0-release
 * MedicalAudience - Target audiences for medical web pages.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MedicalAudience
 */
class MedicalAudience extends MetaJsonLd implements MedicalAudienceInterface, AudienceInterface, IntangibleInterface, ThingInterface, PeopleAudienceInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MedicalAudience';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MedicalAudience';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Audience';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = <<<SCHEMADESC
Target audiences for medical web pages.
SCHEMADESC;

    use MedicalAudienceTrait;
    use AudienceTrait;
    use IntangibleTrait;
    use ThingTrait;
    use PeopleAudienceTrait;

    // Public methods
    // =========================================================================

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
            'additionalType' => ['URL'],
            'alternateName' => ['Text'],
            'audienceType' => ['Text'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'geographicArea' => ['AdministrativeArea'],
            'healthCondition' => ['MedicalCondition'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'name' => ['Text'],
            'potentialAction' => ['Action'],
            'requiredGender' => ['Text'],
            'requiredMaxAge' => ['Integer'],
            'requiredMinAge' => ['Integer'],
            'sameAs' => ['URL'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'suggestedAge' => ['QuantitativeValue'],
            'suggestedGender' => ['GenderType', 'Text'],
            'suggestedMaxAge' => ['Number'],
            'suggestedMeasurement' => ['QuantitativeValue'],
            'suggestedMinAge' => ['Number'],
            'url' => ['URL']
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'alternateName' => 'An alias for the item.',
            'audienceType' => 'The target group associated with a given audience (e.g. veterans, car owners, musicians, etc.).',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'geographicArea' => 'The geographic area associated with the audience.',
            'healthCondition' => 'Specifying the health condition(s) of a patient, medical study, or other target audience.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'requiredGender' => 'Audiences defined by a person\'s gender.',
            'requiredMaxAge' => 'Audiences defined by a person\'s maximum age.',
            'requiredMinAge' => 'Audiences defined by a person\'s minimum age.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'suggestedAge' => 'The age or age range for the intended audience or person, for example 3-12 months for infants, 1-5 years for toddlers.',
            'suggestedGender' => 'The suggested gender of the intended person or audience, for example "male", "female", or "unisex".',
            'suggestedMaxAge' => 'Maximum recommended age in years for the audience or user.',
            'suggestedMeasurement' => 'A suggested range of body measurements for the intended audience or person, for example inseam between 32 and 34 inches or height between 170 and 190 cm. Typically found on a size chart for wearable products.',
            'suggestedMinAge' => 'Minimum recommended age in years for the audience or user.',
            'url' => 'URL of the item.'
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
            [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
