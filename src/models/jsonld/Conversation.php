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

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Conversation - One or more messages between organizations or people on a
 * particular topic. Individual messages can be linked to the conversation
 * with isPartOf or hasPart properties.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Conversation
 */
class Conversation extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Conversation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Conversation';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'One or more messages between organizations or people on a particular topic. Individual messages can be linked to the conversation with isPartOf or hasPart properties.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
        'about',
        'abstract',
        'accessMode',
        'accessModeSufficient',
        'accessibilityAPI',
        'accessibilityControl',
        'accessibilityFeature',
        'accessibilityHazard',
        'accessibilitySummary',
        'accountablePerson',
        'acquireLicensePage',
        'aggregateRating',
        'alternativeHeadline',
        'associatedMedia',
        'audience',
        'audio',
        'author',
        'award',
        'character',
        'citation',
        'comment',
        'commentCount',
        'conditionsOfAccess',
        'contentLocation',
        'contentRating',
        'contentReferenceTime',
        'contributor',
        'copyrightHolder',
        'copyrightYear',
        'correction',
        'creativeWorkStatus',
        'creator',
        'dateCreated',
        'dateModified',
        'datePublished',
        'discussionUrl',
        'editor',
        'educationalAlignment',
        'educationalUse',
        'encoding',
        'encodingFormat',
        'exampleOfWork',
        'expires',
        'funder',
        'genre',
        'hasPart',
        'headline',
        'inLanguage',
        'interactionStatistic',
        'interactivityType',
        'isAccessibleForFree',
        'isBasedOn',
        'isFamilyFriendly',
        'isPartOf',
        'keywords',
        'learningResourceType',
        'license',
        'locationCreated',
        'mainEntity',
        'maintainer',
        'material',
        'materialExtent',
        'mentions',
        'offers',
        'position',
        'producer',
        'provider',
        'publication',
        'publisher',
        'publisherImprint',
        'publishingPrinciples',
        'recordedAt',
        'releasedEvent',
        'review',
        'schemaVersion',
        'sdDatePublished',
        'sdLicense',
        'sdPublisher',
        'sourceOrganization',
        'spatial',
        'spatialCoverage',
        'sponsor',
        'temporal',
        'temporalCoverage',
        'text',
        'thumbnailUrl',
        'timeRequired',
        'translationOfWork',
        'translator',
        'typicalAgeRange',
        'usageInfo',
        'version',
        'video',
        'workExample',
        'workTranslation'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'about' => ['Thing'],
        'abstract' => ['Text'],
        'accessMode' => ['Text'],
        'accessModeSufficient' => ['ItemList'],
        'accessibilityAPI' => ['Text'],
        'accessibilityControl' => ['Text'],
        'accessibilityFeature' => ['Text'],
        'accessibilityHazard' => ['Text'],
        'accessibilitySummary' => ['Text'],
        'accountablePerson' => ['Person'],
        'acquireLicensePage' => ['CreativeWork', 'URL'],
        'aggregateRating' => ['AggregateRating'],
        'alternativeHeadline' => ['Text'],
        'associatedMedia' => ['MediaObject'],
        'audience' => ['Audience'],
        'audio' => ['AudioObject', 'Clip', 'MusicRecording'],
        'author' => ['Organization', 'Person'],
        'award' => ['Text'],
        'character' => ['Person'],
        'citation' => ['CreativeWork', 'Text'],
        'comment' => ['Comment'],
        'commentCount' => ['Integer'],
        'conditionsOfAccess' => ['Text'],
        'contentLocation' => ['Place'],
        'contentRating' => ['Rating', 'Text'],
        'contentReferenceTime' => ['DateTime'],
        'contributor' => ['Organization', 'Person'],
        'copyrightHolder' => ['Organization', 'Person'],
        'copyrightYear' => ['Number'],
        'correction' => ['CorrectionComment', 'Text', 'URL'],
        'creativeWorkStatus' => ['DefinedTerm', 'Text'],
        'creator' => ['Organization', 'Person'],
        'dateCreated' => ['Date', 'DateTime'],
        'dateModified' => ['Date', 'DateTime'],
        'datePublished' => ['Date', 'DateTime'],
        'discussionUrl' => ['URL'],
        'editor' => ['Person'],
        'educationalAlignment' => ['AlignmentObject'],
        'educationalUse' => ['Text'],
        'encoding' => ['MediaObject'],
        'encodingFormat' => ['Text', 'URL'],
        'exampleOfWork' => ['CreativeWork'],
        'expires' => ['Date'],
        'funder' => ['Organization', 'Person'],
        'genre' => ['Text', 'URL'],
        'hasPart' => ['CreativeWork'],
        'headline' => ['Text'],
        'inLanguage' => ['Language', 'Text'],
        'interactionStatistic' => ['InteractionCounter'],
        'interactivityType' => ['Text'],
        'isAccessibleForFree' => ['Boolean'],
        'isBasedOn' => ['CreativeWork', 'Product', 'URL'],
        'isFamilyFriendly' => ['Boolean'],
        'isPartOf' => ['CreativeWork', 'URL'],
        'keywords' => ['Text'],
        'learningResourceType' => ['Text'],
        'license' => ['CreativeWork', 'URL'],
        'locationCreated' => ['Place'],
        'mainEntity' => ['Thing'],
        'maintainer' => ['Organization', 'Person'],
        'material' => ['Product', 'Text', 'URL'],
        'materialExtent' => ['QuantitativeValue', 'Text'],
        'mentions' => ['Thing'],
        'offers' => ['Demand', 'Offer'],
        'position' => ['Integer', 'Text'],
        'producer' => ['Organization', 'Person'],
        'provider' => ['Organization', 'Person'],
        'publication' => ['PublicationEvent'],
        'publisher' => ['Organization', 'Person'],
        'publisherImprint' => ['Organization'],
        'publishingPrinciples' => ['CreativeWork', 'URL'],
        'recordedAt' => ['Event'],
        'releasedEvent' => ['PublicationEvent'],
        'review' => ['Review'],
        'schemaVersion' => ['Text', 'URL'],
        'sdDatePublished' => ['Date'],
        'sdLicense' => ['CreativeWork', 'URL'],
        'sdPublisher' => ['Organization', 'Person'],
        'sourceOrganization' => ['Organization'],
        'spatial' => ['Place'],
        'spatialCoverage' => ['Place'],
        'sponsor' => ['Organization', 'Person'],
        'temporal' => ['DateTime', 'Text'],
        'temporalCoverage' => ['DateTime', 'Text', 'URL'],
        'text' => ['Text'],
        'thumbnailUrl' => ['URL'],
        'timeRequired' => ['Duration'],
        'translationOfWork' => ['CreativeWork'],
        'translator' => ['Organization', 'Person'],
        'typicalAgeRange' => ['Text'],
        'usageInfo' => ['CreativeWork', 'URL'],
        'version' => ['Number', 'Text'],
        'video' => ['Clip', 'VideoObject'],
        'workExample' => ['CreativeWork'],
        'workTranslation' => ['CreativeWork']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'about' => 'The subject matter of the content. Inverse property: subjectOf.',
        'abstract' => 'An abstract is a short description that summarizes a CreativeWork.',
        'accessMode' => 'The human sensory perceptual system or cognitive faculty through which a person may process or perceive information. Expected values include: auditory, tactile, textual, visual, colorDependent, chartOnVisual, chemOnVisual, diagramOnVisual, mathOnVisual, musicOnVisual, textOnVisual.',
        'accessModeSufficient' => 'A list of single or combined accessModes that are sufficient to understand all the intellectual content of a resource. Expected values include: auditory, tactile, textual, visual.',
        'accessibilityAPI' => 'Indicates that the resource is compatible with the referenced accessibility API (WebSchemas wiki lists possible values).',
        'accessibilityControl' => 'Identifies input methods that are sufficient to fully control the described resource (WebSchemas wiki lists possible values).',
        'accessibilityFeature' => 'Content features of the resource, such as accessible media, alternatives and supported enhancements for accessibility (WebSchemas wiki lists possible values).',
        'accessibilityHazard' => 'A characteristic of the described resource that is physiologically dangerous to some users. Related to WCAG 2.0 guideline 2.3 (WebSchemas wiki lists possible values).',
        'accessibilitySummary' => 'A human-readable summary of specific accessibility features or deficiencies, consistent with the other accessibility metadata but expressing subtleties such as "short descriptions are present but long descriptions will be needed for non-visual users" or "short descriptions are present and no long descriptions are needed."',
        'accountablePerson' => 'Specifies the Person that is legally accountable for the CreativeWork.',
        'acquireLicensePage' => 'Indicates a page documenting how licenses can be purchased or otherwise acquired, for the current item.',
        'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
        'alternativeHeadline' => 'A secondary title of the CreativeWork.',
        'associatedMedia' => 'A media object that encodes this CreativeWork. This property is a synonym for encoding.',
        'audience' => 'An intended audience, i.e. a group for whom something was created. Supersedes serviceAudience.',
        'audio' => 'An embedded audio object.',
        'author' => 'The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.',
        'award' => 'An award won by or for this item. Supersedes awards.',
        'character' => 'Fictional person connected with a creative work.',
        'citation' => 'A citation or reference to another creative work, such as another publication, web page, scholarly article, etc.',
        'comment' => 'Comments, typically from users.',
        'commentCount' => 'The number of comments this CreativeWork (e.g. Article, Question or Answer) has received. This is most applicable to works published in Web sites with commenting system; additional comments may exist elsewhere.',
        'conditionsOfAccess' => 'Conditions that affect the availability of, or method(s) of access to, an item. Typically used for real world items such as an ArchiveComponent held by an ArchiveOrganization. This property is not suitable for use as a general Web access control mechanism. It is expressed only in natural language. For example "Available by appointment from the Reading Room" or "Accessible only from logged-in accounts ".',
        'contentLocation' => 'The location depicted or described in the content. For example, the location in a photograph or painting.',
        'contentRating' => 'Official rating of a piece of content—for example,\'MPAA PG-13\'.',
        'contentReferenceTime' => 'The specific time described by a creative work, for works (e.g. articles, video objects etc.) that emphasise a particular moment within an Event.',
        'contributor' => 'A secondary contributor to the CreativeWork or Event.',
        'copyrightHolder' => 'The party holding the legal copyright to the CreativeWork.',
        'copyrightYear' => 'The year during which the claimed copyright for the CreativeWork was first asserted.',
        'correction' => 'Indicates a correction to a CreativeWork, either via a CorrectionComment, textually or in another document.',
        'creativeWorkStatus' => 'The status of a creative work in terms of its stage in a lifecycle. Example terms include Incomplete, Draft, Published, Obsolete. Some organizations define a set of terms for the stages of their publication lifecycle.',
        'creator' => 'The creator/author of this CreativeWork. This is the same as the Author property for CreativeWork.',
        'dateCreated' => 'The date on which the CreativeWork was created or the item was added to a DataFeed.',
        'dateModified' => 'The date on which the CreativeWork was most recently modified or when the item\'s entry was modified within a DataFeed.',
        'datePublished' => 'Date of first broadcast/publication.',
        'discussionUrl' => 'A link to the page containing the comments of the CreativeWork.',
        'editor' => 'Specifies the Person who edited the CreativeWork.',
        'educationalAlignment' => 'An alignment to an established educational framework.',
        'educationalUse' => 'The purpose of a work in the context of education; for example, \'assignment\', \'group work\'.',
        'encoding' => 'A media object that encodes this CreativeWork. This property is a synonym for associatedMedia. Supersedes encodings. Inverse property: encodesCreativeWork.',
        'encodingFormat' => 'Media type typically expressed using a MIME format (see IANA site and MDN reference) e.g. application/zip for a SoftwareApplication binary, audio/mpeg for .mp3 etc.). In cases where a CreativeWork has several media type representations, encoding can be used to indicate each MediaObject alongside particular encodingFormat information. Unregistered or niche encoding and file formats can be indicated instead via the most appropriate URL, e.g. defining Web page or a Wikipedia/Wikidata entry. Supersedes fileFormat.',
        'exampleOfWork' => 'A creative work that this work is an example/instance/realization/derivation of. Inverse property: workExample.',
        'expires' => 'Date the content expires and is no longer useful or available. For example a VideoObject or NewsArticle whose availability or relevance is time-limited, or a ClaimReview fact check whose publisher wants to indicate that it may no longer be relevant (or helpful to highlight) after some date.',
        'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
        'genre' => 'Genre of the creative work, broadcast channel or group.',
        'hasPart' => 'Indicates an item or CreativeWork that is part of this item, or CreativeWork (in some sense). Inverse property: isPartOf.',
        'headline' => 'Headline of the article.',
        'inLanguage' => 'The language of the content or performance or used in an action. Please use one of the language codes from the IETF BCP 47 standard. See also availableLanguage. Supersedes language.',
        'interactionStatistic' => 'The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used. The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used. Supersedes interactionCount.',
        'interactivityType' => 'The predominant mode of learning supported by the learning resource. Acceptable values are \'active\', \'expositive\', or \'mixed\'.',
        'isAccessibleForFree' => 'A flag to signal that the item, event, or place is accessible for free. Supersedes free.',
        'isBasedOn' => 'A resource from which this work is derived or from which it is a modification or adaption. Supersedes isBasedOnUrl.',
        'isFamilyFriendly' => 'Indicates whether this content is family friendly.',
        'isPartOf' => 'Indicates an item or CreativeWork that this item, or CreativeWork (in some sense), is part of. Inverse property: hasPart.',
        'keywords' => 'Keywords or tags used to describe this content. Multiple entries in a keywords list are typically delimited by commas.',
        'learningResourceType' => 'The predominant type or kind characterizing the learning resource. For example, \'presentation\', \'handout\'.',
        'license' => 'A license document that applies to this content, typically indicated by URL.',
        'locationCreated' => 'The location where the CreativeWork was created, which may not be the same as the location depicted in the CreativeWork.',
        'mainEntity' => 'Indicates the primary entity described in some page or other CreativeWork. Inverse property: mainEntityOfPage.',
        'maintainer' => 'A maintainer of a Dataset, software package (SoftwareApplication), or other Project. A maintainer is a Person or Organization that manages contributions to, and/or publication of, some (typically complex) artifact. It is common for distributions of software and data to be based on "upstream" sources. When maintainer is applied to a specific version of something e.g. a particular version or packaging of a Dataset, it is always possible that the upstream source has a different maintainer. The isBasedOn property can be used to indicate such relationships between datasets to make the different maintenance roles clear. Similarly in the case of software, a package may have dedicated maintainers working on integration into software distributions such as Ubuntu, as well as upstream maintainers of the underlying work.',
        'material' => 'A material that something is made from, e.g. leather, wool, cotton, paper.',
        'materialExtent' => 'The quantity of the materials being described or an expression of the physical space they occupy.',
        'mentions' => 'Indicates that the CreativeWork contains a reference to, but is not necessarily about a concept.',
        'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use businessFunction to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a Demand. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer. Inverse property: itemOffered.',
        'position' => 'The position of an item in a series or sequence of items.',
        'producer' => 'The person or organization who produced the work (e.g. music album, movie, tv/radio series etc.).',
        'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
        'publication' => 'A publication event associated with the item.',
        'publisher' => 'The publisher of the creative work.',
        'publisherImprint' => 'The publishing division which published the comic.',
        'publishingPrinciples' => 'The publishingPrinciples property indicates (typically via URL) a document describing the editorial principles of an Organization (or individual e.g. a Person writing a blog) that relate to their activities as a publisher, e.g. ethics or diversity policies. When applied to a CreativeWork (e.g. NewsArticle) the principles are those of the party primarily responsible for the creation of the CreativeWork. While such policies are most typically expressed in natural language, sometimes related information (e.g. indicating a funder) can be expressed using schema.org terminology.',
        'recordedAt' => 'The Event where the CreativeWork was recorded. The CreativeWork may capture all or part of the event. Inverse property: recordedIn.',
        'releasedEvent' => 'The place and time the release was issued, expressed as a PublicationEvent.',
        'review' => 'A review of the item. Supersedes reviews.',
        'schemaVersion' => 'Indicates (by URL or string) a particular version of a schema used in some CreativeWork. For example, a document could declare a schemaVersion using an URL such as http://schema.org/version/2.0/ if precise indication of schema version was required by some application.',
        'sdDatePublished' => 'Indicates the date on which the current structured data was generated / published. Typically used alongside sdPublisher',
        'sdLicense' => 'A license document that applies to this structured data, typically indicated by URL.',
        'sdPublisher' => 'Indicates the party responsible for generating and publishing the current structured data markup, typically in cases where the structured data is derived automatically from existing published content but published on a different site. For example, student projects and open data initiatives often re-publish existing content with more explicitly structured metadata. The sdPublisher property helps make such practices more explicit.',
        'sourceOrganization' => 'The Organization on whose behalf the creator was working.',
        'spatial' => 'The "spatial" property can be used in cases when more specific properties (e.g. locationCreated, spatialCoverage, contentLocation) are not known to be appropriate.',
        'spatialCoverage' => 'The spatialCoverage of a CreativeWork indicates the place(s) which are the focus of the content. It is a subproperty of contentLocation intended primarily for more technical and detailed materials. For example with a Dataset, it indicates areas that the dataset describes: a dataset of New York weather would have spatialCoverage which was the place: the state of New York.',
        'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
        'temporal' => 'The "temporal" property can be used in cases where more specific properties (e.g. temporalCoverage, dateCreated, dateModified, datePublished) are not known to be appropriate.',
        'temporalCoverage' => 'The temporalCoverage of a CreativeWork indicates the period that the content applies to, i.e. that it describes, either as a DateTime or as a textual string indicating a time period in ISO 8601 time interval format. In the case of a Dataset it will typically indicate the relevant time period in a precise notation (e.g. for a 2011 census dataset, the year 2011 would be written "2011/2012"). Other forms of content e.g. ScholarlyArticle, Book, TVSeries or TVEpisode may indicate their temporalCoverage in broader terms - textually or via well-known URL. Written works such as books may sometimes have precise temporal coverage too, e.g. a work set in 1939 - 1945 can be indicated in ISO 8601 interval format format via "1939/1945". Open-ended date ranges can be written with ".." in place of the end date. For example, "2015-11/.." indicates a range beginning in November 2015 and with no specified final date. This is tentative and might be updated in future when ISO 8601 is officially updated. Supersedes datasetTimeInterval.',
        'text' => 'The textual content of this CreativeWork.',
        'thumbnailUrl' => 'A thumbnail image relevant to the Thing.',
        'timeRequired' => 'Approximate or typical time it takes to work with or through this learning resource for the typical intended target audience, e.g. \'PT30M\', \'PT1H25M\'.',
        'translationOfWork' => 'The work that this work has been translated from. e.g. 物种起源 is a translationOf “On the Origin of Species” Inverse property: workTranslation.',
        'translator' => 'Organization or person who adapts a creative work to different languages, regional differences and technical requirements of a target market, or that translates during some event.',
        'typicalAgeRange' => 'The typical expected age range, e.g. \'7-9\', \'11-\'.',
        'usageInfo' => 'The schema.org usageInfo property indicates further information about a CreativeWork. This property is applicable both to works that are freely available and to those that require payment or other transactions. It can reference additional information e.g. community expectations on preferred linking and citation conventions, as well as purchasing details. For something that can be commercially licensed, usageInfo can provide detailed, resource-specific information about licensing options. This property can be used alongside the license property which indicates license(s) applicable to some piece of content. The usageInfo property can provide information about other licensing options, e.g. acquiring commercial usage rights for an image that is also available under non-commercial creative commons licenses.',
        'version' => 'The version of the CreativeWork embodied by a specified resource.',
        'video' => 'An embedded video object.',
        'workExample' => 'Example/instance/realization/derivation of the concept of this creative work. eg. The paperback edition, first edition, or eBook. Inverse property: exampleOfWork.',
        'workTranslation' => 'A work that is a translation of the content of this work. e.g. 西遊記 has an English workTranslation “Journey to the West”,a German workTranslation “Monkeys Pilgerfahrt” and a Vietnamese translation Tây du ký bình khảo. Inverse property: translationOfWork.'
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
     * The subject matter of the content. Inverse property: subjectOf.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $about;
    /**
     * An abstract is a short description that summarizes a CreativeWork.
     *
     * @var string [schema.org types: Text]
     */
    public $abstract;
    /**
     * The human sensory perceptual system or cognitive faculty through which a
     * person may process or perceive information. Expected values include:
     * auditory, tactile, textual, visual, colorDependent, chartOnVisual,
     * chemOnVisual, diagramOnVisual, mathOnVisual, musicOnVisual, textOnVisual.
     *
     * @var string [schema.org types: Text]
     */
    public $accessMode;
    /**
     * A list of single or combined accessModes that are sufficient to understand
     * all the intellectual content of a resource. Expected values include:
     * auditory, tactile, textual, visual.
     *
     * @var ItemList [schema.org types: ItemList]
     */
    public $accessModeSufficient;
    /**
     * Indicates that the resource is compatible with the referenced accessibility
     * API (WebSchemas wiki lists possible values).
     *
     * @var string [schema.org types: Text]
     */
    public $accessibilityAPI;
    /**
     * Identifies input methods that are sufficient to fully control the described
     * resource (WebSchemas wiki lists possible values).
     *
     * @var string [schema.org types: Text]
     */
    public $accessibilityControl;
    /**
     * Content features of the resource, such as accessible media, alternatives
     * and supported enhancements for accessibility (WebSchemas wiki lists
     * possible values).
     *
     * @var string [schema.org types: Text]
     */
    public $accessibilityFeature;
    /**
     * A characteristic of the described resource that is physiologically
     * dangerous to some users. Related to WCAG 2.0 guideline 2.3 (WebSchemas wiki
     * lists possible values).
     *
     * @var string [schema.org types: Text]
     */
    public $accessibilityHazard;
    /**
     * A human-readable summary of specific accessibility features or
     * deficiencies, consistent with the other accessibility metadata but
     * expressing subtleties such as "short descriptions are present but long
     * descriptions will be needed for non-visual users" or "short descriptions
     * are present and no long descriptions are needed."
     *
     * @var string [schema.org types: Text]
     */
    public $accessibilitySummary;
    /**
     * Specifies the Person that is legally accountable for the CreativeWork.
     *
     * @var Person [schema.org types: Person]
     */
    public $accountablePerson;
    /**
     * Indicates a page documenting how licenses can be purchased or otherwise
     * acquired, for the current item.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $acquireLicensePage;
    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating [schema.org types: AggregateRating]
     */
    public $aggregateRating;
    /**
     * A secondary title of the CreativeWork.
     *
     * @var string [schema.org types: Text]
     */
    public $alternativeHeadline;
    /**
     * A media object that encodes this CreativeWork. This property is a synonym
     * for encoding.
     *
     * @var MediaObject [schema.org types: MediaObject]
     */
    public $associatedMedia;
    /**
     * An intended audience, i.e. a group for whom something was created.
     * Supersedes serviceAudience.
     *
     * @var Audience [schema.org types: Audience]
     */
    public $audience;
    /**
     * An embedded audio object.
     *
     * @var mixed|AudioObject|Clip|MusicRecording [schema.org types: AudioObject, Clip, MusicRecording]
     */
    public $audio;
    /**
     * The author of this content or rating. Please note that author is special in
     * that HTML 5 provides a special mechanism for indicating authorship via the
     * rel tag. That is equivalent to this and may be used interchangeably.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $author;
    /**
     * An award won by or for this item. Supersedes awards.
     *
     * @var string [schema.org types: Text]
     */
    public $award;
    /**
     * Fictional person connected with a creative work.
     *
     * @var Person [schema.org types: Person]
     */
    public $character;
    /**
     * A citation or reference to another creative work, such as another
     * publication, web page, scholarly article, etc.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, Text]
     */
    public $citation;
    /**
     * Comments, typically from users.
     *
     * @var Comment [schema.org types: Comment]
     */
    public $comment;
    /**
     * The number of comments this CreativeWork (e.g. Article, Question or Answer)
     * has received. This is most applicable to works published in Web sites with
     * commenting system; additional comments may exist elsewhere.
     *
     * @var int [schema.org types: Integer]
     */
    public $commentCount;
    /**
     * Conditions that affect the availability of, or method(s) of access to, an
     * item. Typically used for real world items such as an ArchiveComponent held
     * by an ArchiveOrganization. This property is not suitable for use as a
     * general Web access control mechanism. It is expressed only in natural
     * language. For example "Available by appointment from the Reading Room" or
     * "Accessible only from logged-in accounts ".
     *
     * @var string [schema.org types: Text]
     */
    public $conditionsOfAccess;
    /**
     * The location depicted or described in the content. For example, the
     * location in a photograph or painting.
     *
     * @var Place [schema.org types: Place]
     */
    public $contentLocation;
    /**
     * Official rating of a piece of content—for example,'MPAA PG-13'.
     *
     * @var mixed|Rating|string [schema.org types: Rating, Text]
     */
    public $contentRating;
    /**
     * The specific time described by a creative work, for works (e.g. articles,
     * video objects etc.) that emphasise a particular moment within an Event.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $contentReferenceTime;
    /**
     * A secondary contributor to the CreativeWork or Event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $contributor;
    /**
     * The party holding the legal copyright to the CreativeWork.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $copyrightHolder;
    /**
     * The year during which the claimed copyright for the CreativeWork was first
     * asserted.
     *
     * @var float [schema.org types: Number]
     */
    public $copyrightYear;
    /**
     * Indicates a correction to a CreativeWork, either via a CorrectionComment,
     * textually or in another document.
     *
     * @var mixed|CorrectionComment|string|string [schema.org types: CorrectionComment, Text, URL]
     */
    public $correction;
    /**
     * The status of a creative work in terms of its stage in a lifecycle. Example
     * terms include Incomplete, Draft, Published, Obsolete. Some organizations
     * define a set of terms for the stages of their publication lifecycle.
     *
     * @var mixed|DefinedTerm|string [schema.org types: DefinedTerm, Text]
     */
    public $creativeWorkStatus;
    /**
     * The creator/author of this CreativeWork. This is the same as the Author
     * property for CreativeWork.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $creator;
    /**
     * The date on which the CreativeWork was created or the item was added to a
     * DataFeed.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $dateCreated;
    /**
     * The date on which the CreativeWork was most recently modified or when the
     * item's entry was modified within a DataFeed.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $dateModified;
    /**
     * Date of first broadcast/publication.
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $datePublished;
    /**
     * A link to the page containing the comments of the CreativeWork.
     *
     * @var string [schema.org types: URL]
     */
    public $discussionUrl;
    /**
     * Specifies the Person who edited the CreativeWork.
     *
     * @var Person [schema.org types: Person]
     */
    public $editor;
    /**
     * An alignment to an established educational framework.
     *
     * @var AlignmentObject [schema.org types: AlignmentObject]
     */
    public $educationalAlignment;
    /**
     * The purpose of a work in the context of education; for example,
     * 'assignment', 'group work'.
     *
     * @var string [schema.org types: Text]
     */
    public $educationalUse;
    /**
     * A media object that encodes this CreativeWork. This property is a synonym
     * for associatedMedia. Supersedes encodings. Inverse property:
     * encodesCreativeWork.
     *
     * @var MediaObject [schema.org types: MediaObject]
     */
    public $encoding;
    /**
     * Media type typically expressed using a MIME format (see IANA site and MDN
     * reference) e.g. application/zip for a SoftwareApplication binary,
     * audio/mpeg for .mp3 etc.). In cases where a CreativeWork has several media
     * type representations, encoding can be used to indicate each MediaObject
     * alongside particular encodingFormat information. Unregistered or niche
     * encoding and file formats can be indicated instead via the most appropriate
     * URL, e.g. defining Web page or a Wikipedia/Wikidata entry. Supersedes
     * fileFormat.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $encodingFormat;
    /**
     * A creative work that this work is an
     * example/instance/realization/derivation of. Inverse property: workExample.
     *
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $exampleOfWork;
    /**
     * Date the content expires and is no longer useful or available. For example
     * a VideoObject or NewsArticle whose availability or relevance is
     * time-limited, or a ClaimReview fact check whose publisher wants to indicate
     * that it may no longer be relevant (or helpful to highlight) after some
     * date.
     *
     * @var Date [schema.org types: Date]
     */
    public $expires;
    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $funder;
    /**
     * Genre of the creative work, broadcast channel or group.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $genre;
    /**
     * Indicates an item or CreativeWork that is part of this item, or
     * CreativeWork (in some sense). Inverse property: isPartOf.
     *
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $hasPart;
    /**
     * Headline of the article.
     *
     * @var string [schema.org types: Text]
     */
    public $headline;
    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the IETF BCP 47 standard. See also
     * availableLanguage. Supersedes language.
     *
     * @var mixed|Language|string [schema.org types: Language, Text]
     */
    public $inLanguage;
    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication. The most specific child type of InteractionCounter
     * should be used. The number of interactions for the CreativeWork using the
     * WebSite or SoftwareApplication. The most specific child type of
     * InteractionCounter should be used. Supersedes interactionCount.
     *
     * @var InteractionCounter [schema.org types: InteractionCounter]
     */
    public $interactionStatistic;
    /**
     * The predominant mode of learning supported by the learning resource.
     * Acceptable values are 'active', 'expositive', or 'mixed'.
     *
     * @var string [schema.org types: Text]
     */
    public $interactivityType;
    /**
     * A flag to signal that the item, event, or place is accessible for free.
     * Supersedes free.
     *
     * @var bool [schema.org types: Boolean]
     */
    public $isAccessibleForFree;
    /**
     * A resource from which this work is derived or from which it is a
     * modification or adaption. Supersedes isBasedOnUrl.
     *
     * @var mixed|CreativeWork|Product|string [schema.org types: CreativeWork, Product, URL]
     */
    public $isBasedOn;
    /**
     * Indicates whether this content is family friendly.
     *
     * @var bool [schema.org types: Boolean]
     */
    public $isFamilyFriendly;
    /**
     * Indicates an item or CreativeWork that this item, or CreativeWork (in some
     * sense), is part of. Inverse property: hasPart.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $isPartOf;
    /**
     * Keywords or tags used to describe this content. Multiple entries in a
     * keywords list are typically delimited by commas.
     *
     * @var string [schema.org types: Text]
     */
    public $keywords;
    /**
     * The predominant type or kind characterizing the learning resource. For
     * example, 'presentation', 'handout'.
     *
     * @var string [schema.org types: Text]
     */
    public $learningResourceType;
    /**
     * A license document that applies to this content, typically indicated by
     * URL.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $license;
    /**
     * The location where the CreativeWork was created, which may not be the same
     * as the location depicted in the CreativeWork.
     *
     * @var Place [schema.org types: Place]
     */
    public $locationCreated;
    /**
     * Indicates the primary entity described in some page or other CreativeWork.
     * Inverse property: mainEntityOfPage.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $mainEntity;
    /**
     * A maintainer of a Dataset, software package (SoftwareApplication), or other
     * Project. A maintainer is a Person or Organization that manages
     * contributions to, and/or publication of, some (typically complex) artifact.
     * It is common for distributions of software and data to be based on
     * "upstream" sources. When maintainer is applied to a specific version of
     * something e.g. a particular version or packaging of a Dataset, it is always
     * possible that the upstream source has a different maintainer. The isBasedOn
     * property can be used to indicate such relationships between datasets to
     * make the different maintenance roles clear. Similarly in the case of
     * software, a package may have dedicated maintainers working on integration
     * into software distributions such as Ubuntu, as well as upstream maintainers
     * of the underlying work.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $maintainer;
    /**
     * A material that something is made from, e.g. leather, wool, cotton, paper.
     *
     * @var mixed|Product|string|string [schema.org types: Product, Text, URL]
     */
    public $material;
    /**
     * The quantity of the materials being described or an expression of the
     * physical space they occupy.
     *
     * @var mixed|QuantitativeValue|string [schema.org types: QuantitativeValue, Text]
     */
    public $materialExtent;
    /**
     * Indicates that the CreativeWork contains a reference to, but is not
     * necessarily about a concept.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $mentions;
    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event. Use businessFunction to indicate the kind of transaction offered,
     * i.e. sell, lease, etc. This property can also be used to describe a Demand.
     * While this property is listed as expected on a number of common types, it
     * can be used in others. In that case, using a second type, such as Product
     * or a subtype of Product, can clarify the nature of the offer. Inverse
     * property: itemOffered.
     *
     * @var mixed|Demand|Offer [schema.org types: Demand, Offer]
     */
    public $offers;
    /**
     * The position of an item in a series or sequence of items.
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $position;
    /**
     * The person or organization who produced the work (e.g. music album, movie,
     * tv/radio series etc.).
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $producer;
    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $provider;
    /**
     * A publication event associated with the item.
     *
     * @var PublicationEvent [schema.org types: PublicationEvent]
     */
    public $publication;
    /**
     * The publisher of the creative work.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $publisher;
    /**
     * The publishing division which published the comic.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $publisherImprint;
    /**
     * The publishingPrinciples property indicates (typically via URL) a document
     * describing the editorial principles of an Organization (or individual e.g.
     * a Person writing a blog) that relate to their activities as a publisher,
     * e.g. ethics or diversity policies. When applied to a CreativeWork (e.g.
     * NewsArticle) the principles are those of the party primarily responsible
     * for the creation of the CreativeWork. While such policies are most
     * typically expressed in natural language, sometimes related information
     * (e.g. indicating a funder) can be expressed using schema.org terminology.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $publishingPrinciples;
    /**
     * The Event where the CreativeWork was recorded. The CreativeWork may capture
     * all or part of the event. Inverse property: recordedIn.
     *
     * @var Event [schema.org types: Event]
     */
    public $recordedAt;
    /**
     * The place and time the release was issued, expressed as a PublicationEvent.
     *
     * @var PublicationEvent [schema.org types: PublicationEvent]
     */
    public $releasedEvent;
    /**
     * A review of the item. Supersedes reviews.
     *
     * @var Review [schema.org types: Review]
     */
    public $review;
    /**
     * Indicates (by URL or string) a particular version of a schema used in some
     * CreativeWork. For example, a document could declare a schemaVersion using
     * an URL such as http://schema.org/version/2.0/ if precise indication of
     * schema version was required by some application.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $schemaVersion;
    /**
     * Indicates the date on which the current structured data was generated /
     * published. Typically used alongside sdPublisher
     *
     * @var Date [schema.org types: Date]
     */
    public $sdDatePublished;
    /**
     * A license document that applies to this structured data, typically
     * indicated by URL.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $sdLicense;
    /**
     * Indicates the party responsible for generating and publishing the current
     * structured data markup, typically in cases where the structured data is
     * derived automatically from existing published content but published on a
     * different site. For example, student projects and open data initiatives
     * often re-publish existing content with more explicitly structured metadata.
     * The sdPublisher property helps make such practices more explicit.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $sdPublisher;
    /**
     * The Organization on whose behalf the creator was working.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $sourceOrganization;
    /**
     * The "spatial" property can be used in cases when more specific properties
     * (e.g. locationCreated, spatialCoverage, contentLocation) are not known to
     * be appropriate.
     *
     * @var Place [schema.org types: Place]
     */
    public $spatial;
    /**
     * The spatialCoverage of a CreativeWork indicates the place(s) which are the
     * focus of the content. It is a subproperty of contentLocation intended
     * primarily for more technical and detailed materials. For example with a
     * Dataset, it indicates areas that the dataset describes: a dataset of New
     * York weather would have spatialCoverage which was the place: the state of
     * New York.
     *
     * @var Place [schema.org types: Place]
     */
    public $spatialCoverage;
    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $sponsor;
    /**
     * The "temporal" property can be used in cases where more specific properties
     * (e.g. temporalCoverage, dateCreated, dateModified, datePublished) are not
     * known to be appropriate.
     *
     * @var mixed|DateTime|string [schema.org types: DateTime, Text]
     */
    public $temporal;
    /**
     * The temporalCoverage of a CreativeWork indicates the period that the
     * content applies to, i.e. that it describes, either as a DateTime or as a
     * textual string indicating a time period in ISO 8601 time interval format.
     * In the case of a Dataset it will typically indicate the relevant time
     * period in a precise notation (e.g. for a 2011 census dataset, the year 2011
     * would be written "2011/2012"). Other forms of content e.g.
     * ScholarlyArticle, Book, TVSeries or TVEpisode may indicate their
     * temporalCoverage in broader terms - textually or via well-known URL.
     * Written works such as books may sometimes have precise temporal coverage
     * too, e.g. a work set in 1939 - 1945 can be indicated in ISO 8601 interval
     * format format via "1939/1945". Open-ended date ranges can be written with
     * ".." in place of the end date. For example, "2015-11/.." indicates a range
     * beginning in November 2015 and with no specified final date. This is
     * tentative and might be updated in future when ISO 8601 is officially
     * updated. Supersedes datasetTimeInterval.
     *
     * @var mixed|DateTime|string|string [schema.org types: DateTime, Text, URL]
     */
    public $temporalCoverage;
    /**
     * The textual content of this CreativeWork.
     *
     * @var string [schema.org types: Text]
     */
    public $text;
    /**
     * A thumbnail image relevant to the Thing.
     *
     * @var string [schema.org types: URL]
     */
    public $thumbnailUrl;
    /**
     * Approximate or typical time it takes to work with or through this learning
     * resource for the typical intended target audience, e.g. 'PT30M', 'PT1H25M'.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $timeRequired;
    /**
     * The work that this work has been translated from. e.g. 物种起源 is a
     * translationOf “On the Origin of Species” Inverse property:
     * workTranslation.
     *
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $translationOfWork;
    /**
     * Organization or person who adapts a creative work to different languages,
     * regional differences and technical requirements of a target market, or that
     * translates during some event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $translator;
    /**
     * The typical expected age range, e.g. '7-9', '11-'.
     *
     * @var string [schema.org types: Text]
     */
    public $typicalAgeRange;

    // Static Protected Properties
    // =========================================================================
    /**
     * The schema.org usageInfo property indicates further information about a
     * CreativeWork. This property is applicable both to works that are freely
     * available and to those that require payment or other transactions. It can
     * reference additional information e.g. community expectations on preferred
     * linking and citation conventions, as well as purchasing details. For
     * something that can be commercially licensed, usageInfo can provide
     * detailed, resource-specific information about licensing options. This
     * property can be used alongside the license property which indicates
     * license(s) applicable to some piece of content. The usageInfo property can
     * provide information about other licensing options, e.g. acquiring
     * commercial usage rights for an image that is also available under
     * non-commercial creative commons licenses.
     *
     * @var mixed|CreativeWork|string [schema.org types: CreativeWork, URL]
     */
    public $usageInfo;
    /**
     * The version of the CreativeWork embodied by a specified resource.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $version;
    /**
     * An embedded video object.
     *
     * @var mixed|Clip|VideoObject [schema.org types: Clip, VideoObject]
     */
    public $video;
    /**
     * Example/instance/realization/derivation of the concept of this creative
     * work. eg. The paperback edition, first edition, or eBook. Inverse property:
     * exampleOfWork.
     *
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $workExample;
    /**
     * A work that is a translation of the content of this work. e.g. 西遊記
     * has an English workTranslation “Journey to the West”,a German
     * workTranslation “Monkeys Pilgerfahrt” and a Vietnamese translation Tây
     * du ký bình khảo. Inverse property: translationOfWork.
     *
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $workTranslation;

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
            [['about', 'abstract', 'accessMode', 'accessModeSufficient', 'accessibilityAPI', 'accessibilityControl', 'accessibilityFeature', 'accessibilityHazard', 'accessibilitySummary', 'accountablePerson', 'acquireLicensePage', 'aggregateRating', 'alternativeHeadline', 'associatedMedia', 'audience', 'audio', 'author', 'award', 'character', 'citation', 'comment', 'commentCount', 'conditionsOfAccess', 'contentLocation', 'contentRating', 'contentReferenceTime', 'contributor', 'copyrightHolder', 'copyrightYear', 'correction', 'creativeWorkStatus', 'creator', 'dateCreated', 'dateModified', 'datePublished', 'discussionUrl', 'editor', 'educationalAlignment', 'educationalUse', 'encoding', 'encodingFormat', 'exampleOfWork', 'expires', 'funder', 'genre', 'hasPart', 'headline', 'inLanguage', 'interactionStatistic', 'interactivityType', 'isAccessibleForFree', 'isBasedOn', 'isFamilyFriendly', 'isPartOf', 'keywords', 'learningResourceType', 'license', 'locationCreated', 'mainEntity', 'maintainer', 'material', 'materialExtent', 'mentions', 'offers', 'position', 'producer', 'provider', 'publication', 'publisher', 'publisherImprint', 'publishingPrinciples', 'recordedAt', 'releasedEvent', 'review', 'schemaVersion', 'sdDatePublished', 'sdLicense', 'sdPublisher', 'sourceOrganization', 'spatial', 'spatialCoverage', 'sponsor', 'temporal', 'temporalCoverage', 'text', 'thumbnailUrl', 'timeRequired', 'translationOfWork', 'translator', 'typicalAgeRange', 'usageInfo', 'version', 'video', 'workExample', 'workTranslation'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
