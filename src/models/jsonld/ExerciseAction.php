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
 * ExerciseAction - The act of participating in exertive activity for the purposes of improving
 * health and fitness.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/ExerciseAction
 */
class ExerciseAction extends MetaJsonLd implements ExerciseActionInterface, PlayActionInterface, ActionInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ExerciseAction';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ExerciseAction';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = <<<SCHEMADESC
The act of participating in exertive activity for the purposes of improving health and fitness.
SCHEMADESC;

    use ExerciseActionTrait;
    use PlayActionTrait;
    use ActionTrait;
    use ThingTrait;

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
            'actionStatus' => ['ActionStatusType'],
            'additionalType' => ['URL'],
            'agent' => ['Organization', 'Person'],
            'alternateName' => ['Text'],
            'audience' => ['Audience'],
            'course' => ['Place'],
            'description' => ['Text'],
            'diet' => ['Diet'],
            'disambiguatingDescription' => ['Text'],
            'distance' => ['Distance'],
            'endTime' => ['DateTime', 'Time'],
            'error' => ['Thing'],
            'event' => ['Event'],
            'exerciseCourse' => ['Place'],
            'exercisePlan' => ['ExercisePlan'],
            'exerciseRelatedDiet' => ['Diet'],
            'exerciseType' => ['Text'],
            'fromLocation' => ['Place'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'instrument' => ['Thing'],
            'location' => ['PostalAddress', 'Text', 'Place', 'VirtualLocation'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'name' => ['Text'],
            'object' => ['Thing'],
            'opponent' => ['Person'],
            'participant' => ['Organization', 'Person'],
            'potentialAction' => ['Action'],
            'provider' => ['Organization', 'Person'],
            'result' => ['Thing'],
            'sameAs' => ['URL'],
            'sportsActivityLocation' => ['SportsActivityLocation'],
            'sportsEvent' => ['SportsEvent'],
            'sportsTeam' => ['SportsTeam'],
            'startTime' => ['DateTime', 'Time'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'target' => ['EntryPoint'],
            'toLocation' => ['Place'],
            'url' => ['URL']
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'actionStatus' => 'Indicates the current disposition of the Action.',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'agent' => 'The direct performer or driver of the action (animate or inanimate). e.g. *John* wrote a book.',
            'alternateName' => 'An alias for the item.',
            'audience' => 'An intended audience, i.e. a group for whom something was created.',
            'course' => 'A sub property of location. The course where this action was taken.',
            'description' => 'A description of the item.',
            'diet' => 'A sub property of instrument. The diet used in this action.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'distance' => 'The distance travelled, e.g. exercising or travelling.',
            'endTime' => 'The endTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to end. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to *December*. For media, including audio and video, it\'s the time offset of the end of a clip within a larger file.  Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.',
            'error' => 'For failed actions, more information on the cause of the failure.',
            'event' => 'Upcoming or past event associated with this place, organization, or action.',
            'exerciseCourse' => 'A sub property of location. The course where this action was taken.',
            'exercisePlan' => 'A sub property of instrument. The exercise plan used on this action.',
            'exerciseRelatedDiet' => 'A sub property of instrument. The diet used in this action.',
            'exerciseType' => 'Type(s) of exercise or activity, such as strength training, flexibility training, aerobics, cardiac rehabilitation, etc.',
            'fromLocation' => 'A sub property of location. The original location of the object or the agent before the action.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'instrument' => 'The object that helped the agent perform the action. e.g. John wrote a book with *a pen*.',
            'location' => 'The location of, for example, where an event is happening, where an organization is located, or where an action takes place.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'object' => 'The object upon which the action is carried out, whose state is kept intact or changed. Also known as the semantic roles patient, affected or undergoer (which change their state) or theme (which doesn\'t). e.g. John read *a book*.',
            'opponent' => 'A sub property of participant. The opponent on this action.',
            'participant' => 'Other co-agents that participated in the action indirectly. e.g. John wrote a book with *Steve*.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
            'result' => 'The result produced in the action. e.g. John wrote *a book*.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'sportsActivityLocation' => 'A sub property of location. The sports activity location where this action occurred.',
            'sportsEvent' => 'A sub property of location. The sports event where this action occurred.',
            'sportsTeam' => 'A sub property of participant. The sports team that participated on this action.',
            'startTime' => 'The startTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to start. For actions that span a period of time, when the action was performed. e.g. John wrote a book from *January* to December. For media, including audio and video, it\'s the time offset of the start of a clip within a larger file.  Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'target' => 'Indicates a target EntryPoint for an Action.',
            'toLocation' => 'A sub property of location. The final location of the object or the agent after the action.',
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
