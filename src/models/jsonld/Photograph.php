<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Photograph - A photograph.
 * Extends: CreativeWork
 * @see    http://schema.org/Photograph
 */
class Photograph extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Photograph';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Photograph';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A photograph.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreativeWork';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * A characteristic of the described resource that is physiologically
     * dangerous to some users. Related to WCAG 2.0 guideline 2.3 (WebSchemas wiki
     * lists possible values).
     * @var string [schema.org types: Text]
     */
    public $accessibilityHazard;

    /**
     * A secondary title of the CreativeWork.
     * @var string [schema.org types: Text]
     */
    public $alternativeHeadline;

    /**
     * A media object that encodes this CreativeWork. This property is a synonym
     * for encoding.
     * @var MediaObject [schema.org types: MediaObject]
     */
    public $associatedMedia;

    /**
     * An award won by or for this item. Supersedes awards.
     * @var string [schema.org types: Text]
     */
    public $award;

    /**
     * Fictional person connected with a creative work.
     * @var Person [schema.org types: Person]
     */
    public $character;

    /**
     * A citation or reference to another creative work, such as another
     * publication, web page, scholarly article, etc.
     * @var mixed CreativeWork, string [schema.org types: CreativeWork, Text]
     */
    public $citation;

    /**
     * Comments, typically from users.
     * @var mixed Comment [schema.org types: Comment]
     */
    public $comment;

    /**
     * The creator/author of this CreativeWork. This is the same as the Author
     * property for CreativeWork.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $creator;

    /**
     * A link to the page containing the comments of the CreativeWork.
     * @var mixed string [schema.org types: URL]
     */
    public $discussionUrl;

    /**
     * Specifies the Person who edited the CreativeWork.
     * @var mixed Person [schema.org types: Person]
     */
    public $editor;

    /**
     * The purpose of a work in the context of education; for example,
     * 'assignment', 'group work'.
     * @var mixed string [schema.org types: Text]
     */
    public $educationalUse;

    /**
     * Media type, typically MIME format (see IANA site) of the content e.g.
     * application/zip of a SoftwareApplication binary. In cases where a
     * CreativeWork has several media type representations, 'encoding' can be used
     * to indicate each MediaObject alongside particular fileFormat information.
     * Unregistered or niche file formats can be indicated instead via the most
     * appropriate URL, e.g. defining Web page or a Wikipedia entry.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $fileFormat;

    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $funder;

    /**
     * Indicates a CreativeWork that is (in some sense) a part of this
     * CreativeWork. Inverse property: isPartOf.
     * @var mixed CreativeWork [schema.org types: CreativeWork]
     */
    public $hasPart;

    /**
     * Headline of the article.
     * @var mixed string [schema.org types: Text]
     */
    public $headline;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the IETF BCP 47 standard. See also
     * availableLanguage. Supersedes language.
     * @var mixed Language, string [schema.org types: Language, Text]
     */
    public $inLanguage;

    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication. The most specific child type of InteractionCounter
     * should be used. Supersedes interactionCount.
     * @var mixed InteractionCounter [schema.org types: InteractionCounter]
     */
    public $interactionStatistic;

    /**
     * The predominant mode of learning supported by the learning resource.
     * Acceptable values are 'active', 'expositive', or 'mixed'.
     * @var mixed string [schema.org types: Text]
     */
    public $interactivityType;

    /**
     * A resource that was used in the creation of this resource. This term can be
     * repeated for multiple sources. For example,
     * http://example.com/great-multiplication-intro.html. Supersedes
     * isBasedOnUrl.
     * @var mixed CreativeWork, Product, string [schema.org types: CreativeWork, Product, URL]
     */
    public $isBasedOn;

    /**
     * Indicates whether this content is family friendly.
     * @var mixed bool [schema.org types: Boolean]
     */
    public $isFamilyFriendly;

    /**
     * Indicates a CreativeWork that this CreativeWork is (in some sense) part of.
     * Inverse property: hasPart.
     * @var mixed CreativeWork [schema.org types: CreativeWork]
     */
    public $isPartOf;

    /**
     * Indicates that the CreativeWork contains a reference to, but is not
     * necessarily about a concept.
     * @var mixed Thing [schema.org types: Thing]
     */
    public $mentions;

    /**
     * A publication event associated with the item.
     * @var mixed PublicationEvent [schema.org types: PublicationEvent]
     */
    public $publication;

    /**
     * The Event where the CreativeWork was recorded. The CreativeWork may capture
     * all or part of the event. Inverse property: recordedIn.
     * @var mixed Event [schema.org types: Event]
     */
    public $recordedAt;

    /**
     * The place and time the release was issued, expressed as a PublicationEvent.
     * @var mixed PublicationEvent [schema.org types: PublicationEvent]
     */
    public $releasedEvent;

    /**
     * A review of the item. Supersedes reviews.
     * @var mixed Review [schema.org types: Review]
     */
    public $review;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $sponsor;

    /**
     * Approximate or typical time it takes to work with or through this learning
     * resource for the typical intended target audience, e.g. 'P30M', 'P1H25M'.
     * @var mixed Duration [schema.org types: Duration]
     */
    public $timeRequired;

    /**
     * Organization or person who adapts a creative work to different languages,
     * regional differences and technical requirements of a target market, or that
     * translates during some event.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $translator;

    /**
     * An embedded video object.
     * @var mixed VideoObject [schema.org types: VideoObject]
     */
    public $video;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'accessibilityHazard',
                'alternativeHeadline',
                'associatedMedia',
                'award',
                'character',
                'citation',
                'comment',
                'creator',
                'discussionUrl',
                'editor',
                'educationalUse',
                'fileFormat',
                'funder',
                'hasPart',
                'headline',
                'inLanguage',
                'interactionStatistic',
                'interactivityType',
                'isBasedOn',
                'isFamilyFriendly',
                'isPartOf',
                'mentions',
                'publication',
                'recordedAt',
                'releasedEvent',
                'review',
                'sponsor',
                'timeRequired',
                'translator',
                'video',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'accessibilityHazard' => ['Text'],
                'alternativeHeadline' => ['Text'],
                'associatedMedia' => ['MediaObject'],
                'award' => ['Text'],
                'character' => ['Person'],
                'citation' => ['CreativeWork','Text'],
                'comment' => ['Comment'],
                'creator' => ['Organization','Person'],
                'discussionUrl' => ['URL'],
                'editor' => ['Person'],
                'educationalUse' => ['Text'],
                'fileFormat' => ['Text','URL'],
                'funder' => ['Organization','Person'],
                'hasPart' => ['CreativeWork'],
                'headline' => ['Text'],
                'inLanguage' => ['Language','Text'],
                'interactionStatistic' => ['InteractionCounter'],
                'interactivityType' => ['Text'],
                'isBasedOn' => ['CreativeWork','Product','URL'],
                'isFamilyFriendly' => ['Boolean'],
                'isPartOf' => ['CreativeWork'],
                'mentions' => ['Thing'],
                'publication' => ['PublicationEvent'],
                'recordedAt' => ['Event'],
                'releasedEvent' => ['PublicationEvent'],
                'review' => ['Review'],
                'sponsor' => ['Organization','Person'],
                'timeRequired' => ['Duration'],
                'translator' => ['Organization','Person'],
                'video' => ['VideoObject'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'accessibilityHazard' => 'A characteristic of the described resource that is physiologically dangerous to some users. Related to WCAG 2.0 guideline 2.3 (WebSchemas wiki lists possible values).',
                'alternativeHeadline' => 'A secondary title of the CreativeWork.',
                'associatedMedia' => 'A media object that encodes this CreativeWork. This property is a synonym for encoding.',
                'award' => 'An award won by or for this item. Supersedes awards.',
                'character' => 'Fictional person connected with a creative work.',
                'citation' => 'A citation or reference to another creative work, such as another publication, web page, scholarly article, etc.',
                'comment' => 'Comments, typically from users.',
                'creator' => 'The creator/author of this CreativeWork. This is the same as the Author property for CreativeWork.',
                'discussionUrl' => 'A link to the page containing the comments of the CreativeWork.',
                'editor' => 'Specifies the Person who edited the CreativeWork.',
                'educationalUse' => 'The purpose of a work in the context of education; for example, \'assignment\', \'group work\'.',
                'fileFormat' => 'Media type, typically MIME format (see IANA site) of the content e.g. application/zip of a SoftwareApplication binary. In cases where a CreativeWork has several media type representations, \'encoding\' can be used to indicate each MediaObject alongside particular fileFormat information. Unregistered or niche file formats can be indicated instead via the most appropriate URL, e.g. defining Web page or a Wikipedia entry.',
                'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
                'hasPart' => 'Indicates a CreativeWork that is (in some sense) a part of this CreativeWork. Inverse property: isPartOf.',
                'headline' => 'Headline of the article.',
                'inLanguage' => 'The language of the content or performance or used in an action. Please use one of the language codes from the IETF BCP 47 standard. See also availableLanguage. Supersedes language.',
                'interactionStatistic' => 'The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used. Supersedes interactionCount.',
                'interactivityType' => 'The predominant mode of learning supported by the learning resource. Acceptable values are \'active\', \'expositive\', or \'mixed\'.',
                'isBasedOn' => 'A resource that was used in the creation of this resource. This term can be repeated for multiple sources. For example, http://example.com/great-multiplication-intro.html. Supersedes isBasedOnUrl.',
                'isFamilyFriendly' => 'Indicates whether this content is family friendly.',
                'isPartOf' => 'Indicates a CreativeWork that this CreativeWork is (in some sense) part of. Inverse property: hasPart.',
                'mentions' => 'Indicates that the CreativeWork contains a reference to, but is not necessarily about a concept.',
                'publication' => 'A publication event associated with the item.',
                'recordedAt' => 'The Event where the CreativeWork was recorded. The CreativeWork may capture all or part of the event. Inverse property: recordedIn.',
                'releasedEvent' => 'The place and time the release was issued, expressed as a PublicationEvent.',
                'review' => 'A review of the item. Supersedes reviews.',
                'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
                'timeRequired' => 'Approximate or typical time it takes to work with or through this learning resource for the typical intended target audience, e.g. \'P30M\', \'P1H25M\'.',
                'translator' => 'Organization or person who adapts a creative work to different languages, regional differences and technical requirements of a target market, or that translates during some event.',
                'video' => 'An embedded video object.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['accessibilityHazard','alternativeHeadline','associatedMedia','award','character','citation','comment','creator','discussionUrl','editor','educationalUse','fileFormat','funder','hasPart','headline','inLanguage','interactionStatistic','interactivityType','isBasedOn','isFamilyFriendly','isPartOf','mentions','publication','recordedAt','releasedEvent','review','sponsor','timeRequired','translator','video',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Photograph*/
