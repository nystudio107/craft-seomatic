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

use nystudio107\seomatic\models\jsonld\WebPageElement;

/**
 * WPAdBlock - An advertising section of the page.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/WPAdBlock
 */
class WPAdBlock extends WebPageElement
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'WPAdBlock';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/WPAdBlock';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An advertising section of the page.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'WebPageElement';

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
     * The subject matter of the content.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $about;

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
     * @var string [schema.org types: Text]
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
     * @var AudioObject [schema.org types: AudioObject]
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
     * @var mixed|string [schema.org types: Text]
     */
    public $award;

    /**
     * Fictional person connected with a creative work.
     *
     * @var mixed|Person [schema.org types: Person]
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
     * @var mixed|Comment [schema.org types: Comment]
     */
    public $comment;

    /**
     * The number of comments this CreativeWork (e.g. Article, Question or Answer)
     * has received. This is most applicable to works published in Web sites with
     * commenting system; additional comments may exist elsewhere.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $commentCount;

    /**
     * The location depicted or described in the content. For example, the
     * location in a photograph or painting.
     *
     * @var mixed|Place [schema.org types: Place]
     */
    public $contentLocation;

    /**
     * Official rating of a piece of content—for example,'MPAA PG-13'.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $contentRating;

    /**
     * The specific time described by a creative work, for works (e.g. articles,
     * video objects etc.) that emphasise a particular moment within an Event.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
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
     * @var mixed|float [schema.org types: Number]
     */
    public $copyrightYear;

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
     * @var mixed|Date [schema.org types: Date]
     */
    public $datePublished;

    /**
     * A link to the page containing the comments of the CreativeWork.
     *
     * @var mixed|string [schema.org types: URL]
     */
    public $discussionUrl;

    /**
     * Specifies the Person who edited the CreativeWork.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $editor;

    /**
     * An alignment to an established educational framework.
     *
     * @var mixed|AlignmentObject [schema.org types: AlignmentObject]
     */
    public $educationalAlignment;

    /**
     * The purpose of a work in the context of education; for example,
     * 'assignment', 'group work'.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $educationalUse;

    /**
     * A media object that encodes this CreativeWork. This property is a synonym
     * for associatedMedia. Supersedes encodings.
     *
     * @var mixed|MediaObject [schema.org types: MediaObject]
     */
    public $encoding;

    /**
     * A creative work that this work is an
     * example/instance/realization/derivation of. Inverse property: workExample.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $exampleOfWork;

    /**
     * Date the content expires and is no longer useful or available. For example
     * a VideoObject or NewsArticle whose availability or relevance is
     * time-limited, or a ClaimReview fact check whose publisher wants to indicate
     * that it may no longer be relevant (or helpful to highlight) after some
     * date.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $expires;

    /**
     * Media type, typically MIME format (see IANA site) of the content e.g.
     * application/zip of a SoftwareApplication binary. In cases where a
     * CreativeWork has several media type representations, 'encoding' can be used
     * to indicate each MediaObject alongside particular fileFormat information.
     * Unregistered or niche file formats can be indicated instead via the most
     * appropriate URL, e.g. defining Web page or a Wikipedia entry.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $fileFormat;

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
     * Indicates a CreativeWork that is (in some sense) a part of this
     * CreativeWork. Inverse property: isPartOf.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $hasPart;

    /**
     * Headline of the article.
     *
     * @var mixed|string [schema.org types: Text]
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
     * should be used. Supersedes interactionCount.
     *
     * @var mixed|InteractionCounter [schema.org types: InteractionCounter]
     */
    public $interactionStatistic;

    /**
     * The predominant mode of learning supported by the learning resource.
     * Acceptable values are 'active', 'expositive', or 'mixed'.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $interactivityType;

    /**
     * A flag to signal that the item, event, or place is accessible for free.
     * Supersedes free.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $isAccessibleForFree;

    /**
     * A resource that was used in the creation of this resource. This term can be
     * repeated for multiple sources. For example,
     * http://example.com/great-multiplication-intro.html. Supersedes
     * isBasedOnUrl.
     *
     * @var mixed|CreativeWork|Product|string [schema.org types: CreativeWork, Product, URL]
     */
    public $isBasedOn;

    /**
     * Indicates whether this content is family friendly.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $isFamilyFriendly;

    /**
     * Indicates a CreativeWork that this CreativeWork is (in some sense) part of.
     * Inverse property: hasPart.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $isPartOf;

    /**
     * Keywords or tags used to describe this content. Multiple entries in a
     * keywords list are typically delimited by commas.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $keywords;

    /**
     * The predominant type or kind characterizing the learning resource. For
     * example, 'presentation', 'handout'.
     *
     * @var mixed|string [schema.org types: Text]
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
     * @var mixed|Place [schema.org types: Place]
     */
    public $locationCreated;

    /**
     * Indicates the primary entity described in some page or other CreativeWork.
     * Inverse property: mainEntityOfPage.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $mainEntity;

    /**
     * A material that something is made from, e.g. leather, wool, cotton, paper.
     *
     * @var mixed|Product|string|string [schema.org types: Product, Text, URL]
     */
    public $material;

    /**
     * Indicates that the CreativeWork contains a reference to, but is not
     * necessarily about a concept.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $mentions;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event.
     *
     * @var mixed|Offer [schema.org types: Offer]
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
     * @var mixed|PublicationEvent [schema.org types: PublicationEvent]
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
     * @var mixed|Organization [schema.org types: Organization]
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
     * @var mixed|Event [schema.org types: Event]
     */
    public $recordedAt;

    /**
     * The place and time the release was issued, expressed as a PublicationEvent.
     *
     * @var mixed|PublicationEvent [schema.org types: PublicationEvent]
     */
    public $releasedEvent;

    /**
     * A review of the item. Supersedes reviews.
     *
     * @var mixed|Review [schema.org types: Review]
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
     * The Organization on whose behalf the creator was working.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $sourceOrganization;

    /**
     * The spatialCoverage of a CreativeWork indicates the place(s) which are the
     * focus of the content. It is a subproperty of contentLocation intended
     * primarily for more technical and detailed materials. For example with a
     * Dataset, it indicates areas that the dataset describes: a dataset of New
     * York weather would have spatialCoverage which was the place: the state of
     * New York. Supersedes spatial.
     *
     * @var mixed|Place [schema.org types: Place]
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
     * format format via "1939/1945". Supersedes datasetTimeInterval, temporal.
     *
     * @var mixed|DateTime|string|string [schema.org types: DateTime, Text, URL]
     */
    public $temporalCoverage;

    /**
     * The textual content of this CreativeWork.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $text;

    /**
     * A thumbnail image relevant to the Thing.
     *
     * @var mixed|string [schema.org types: URL]
     */
    public $thumbnailUrl;

    /**
     * Approximate or typical time it takes to work with or through this learning
     * resource for the typical intended target audience, e.g. 'P30M', 'P1H25M'.
     *
     * @var mixed|Duration [schema.org types: Duration]
     */
    public $timeRequired;

    /**
     * The work that this work has been translated from. e.g. 物种起源 is a
     * translationOf “On the Origin of Species” Inverse property:
     * workTranslation.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
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
     * @var mixed|string [schema.org types: Text]
     */
    public $typicalAgeRange;

    /**
     * The version of the CreativeWork embodied by a specified resource.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $version;

    /**
     * An embedded video object.
     *
     * @var mixed|VideoObject [schema.org types: VideoObject]
     */
    public $video;

    /**
     * Example/instance/realization/derivation of the concept of this creative
     * work. eg. The paperback edition, first edition, or eBook. Inverse property:
     * exampleOfWork.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $workExample;

    /**
     * A work that is a translation of the content of this work. e.g. 西遊記
     * has an English workTranslation “Journey to the West”,a German
     * workTranslation “Monkeys Pilgerfahrt” and a Vietnamese translation Tây
     * du ký bình khảo. Inverse property: translationOfWork.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $workTranslation;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'about',
        'accessMode',
        'accessModeSufficient',
        'accessibilityAPI',
        'accessibilityControl',
        'accessibilityFeature',
        'accessibilityHazard',
        'accessibilitySummary',
        'accountablePerson',
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
        'contentLocation',
        'contentRating',
        'contentReferenceTime',
        'contributor',
        'copyrightHolder',
        'copyrightYear',
        'creator',
        'dateCreated',
        'dateModified',
        'datePublished',
        'discussionUrl',
        'editor',
        'educationalAlignment',
        'educationalUse',
        'encoding',
        'exampleOfWork',
        'expires',
        'fileFormat',
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
        'material',
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
        'sourceOrganization',
        'spatialCoverage',
        'sponsor',
        'temporalCoverage',
        'text',
        'thumbnailUrl',
        'timeRequired',
        'translationOfWork',
        'translator',
        'typicalAgeRange',
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
        'accessMode' => ['Text'],
        'accessModeSufficient' => ['Text'],
        'accessibilityAPI' => ['Text'],
        'accessibilityControl' => ['Text'],
        'accessibilityFeature' => ['Text'],
        'accessibilityHazard' => ['Text'],
        'accessibilitySummary' => ['Text'],
        'accountablePerson' => ['Person'],
        'aggregateRating' => ['AggregateRating'],
        'alternativeHeadline' => ['Text'],
        'associatedMedia' => ['MediaObject'],
        'audience' => ['Audience'],
        'audio' => ['AudioObject'],
        'author' => ['Organization','Person'],
        'award' => ['Text'],
        'character' => ['Person'],
        'citation' => ['CreativeWork','Text'],
        'comment' => ['Comment'],
        'commentCount' => ['Integer'],
        'contentLocation' => ['Place'],
        'contentRating' => ['Text'],
        'contentReferenceTime' => ['DateTime'],
        'contributor' => ['Organization','Person'],
        'copyrightHolder' => ['Organization','Person'],
        'copyrightYear' => ['Number'],
        'creator' => ['Organization','Person'],
        'dateCreated' => ['Date','DateTime'],
        'dateModified' => ['Date','DateTime'],
        'datePublished' => ['Date'],
        'discussionUrl' => ['URL'],
        'editor' => ['Person'],
        'educationalAlignment' => ['AlignmentObject'],
        'educationalUse' => ['Text'],
        'encoding' => ['MediaObject'],
        'exampleOfWork' => ['CreativeWork'],
        'expires' => ['Date'],
        'fileFormat' => ['Text','URL'],
        'funder' => ['Organization','Person'],
        'genre' => ['Text','URL'],
        'hasPart' => ['CreativeWork'],
        'headline' => ['Text'],
        'inLanguage' => ['Language','Text'],
        'interactionStatistic' => ['InteractionCounter'],
        'interactivityType' => ['Text'],
        'isAccessibleForFree' => ['Boolean'],
        'isBasedOn' => ['CreativeWork','Product','URL'],
        'isFamilyFriendly' => ['Boolean'],
        'isPartOf' => ['CreativeWork'],
        'keywords' => ['Text'],
        'learningResourceType' => ['Text'],
        'license' => ['CreativeWork','URL'],
        'locationCreated' => ['Place'],
        'mainEntity' => ['Thing'],
        'material' => ['Product','Text','URL'],
        'mentions' => ['Thing'],
        'offers' => ['Offer'],
        'position' => ['Integer','Text'],
        'producer' => ['Organization','Person'],
        'provider' => ['Organization','Person'],
        'publication' => ['PublicationEvent'],
        'publisher' => ['Organization','Person'],
        'publisherImprint' => ['Organization'],
        'publishingPrinciples' => ['CreativeWork','URL'],
        'recordedAt' => ['Event'],
        'releasedEvent' => ['PublicationEvent'],
        'review' => ['Review'],
        'schemaVersion' => ['Text','URL'],
        'sourceOrganization' => ['Organization'],
        'spatialCoverage' => ['Place'],
        'sponsor' => ['Organization','Person'],
        'temporalCoverage' => ['DateTime','Text','URL'],
        'text' => ['Text'],
        'thumbnailUrl' => ['URL'],
        'timeRequired' => ['Duration'],
        'translationOfWork' => ['CreativeWork'],
        'translator' => ['Organization','Person'],
        'typicalAgeRange' => ['Text'],
        'version' => ['Number','Text'],
        'video' => ['VideoObject'],
        'workExample' => ['CreativeWork'],
        'workTranslation' => ['CreativeWork']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'about' => 'The subject matter of the content.',
        'accessMode' => 'The human sensory perceptual system or cognitive faculty through which a person may process or perceive information. Expected values include: auditory, tactile, textual, visual, colorDependent, chartOnVisual, chemOnVisual, diagramOnVisual, mathOnVisual, musicOnVisual, textOnVisual.',
        'accessModeSufficient' => 'A list of single or combined accessModes that are sufficient to understand all the intellectual content of a resource. Expected values include: auditory, tactile, textual, visual.',
        'accessibilityAPI' => 'Indicates that the resource is compatible with the referenced accessibility API (WebSchemas wiki lists possible values).',
        'accessibilityControl' => 'Identifies input methods that are sufficient to fully control the described resource (WebSchemas wiki lists possible values).',
        'accessibilityFeature' => 'Content features of the resource, such as accessible media, alternatives and supported enhancements for accessibility (WebSchemas wiki lists possible values).',
        'accessibilityHazard' => 'A characteristic of the described resource that is physiologically dangerous to some users. Related to WCAG 2.0 guideline 2.3 (WebSchemas wiki lists possible values).',
        'accessibilitySummary' => 'A human-readable summary of specific accessibility features or deficiencies, consistent with the other accessibility metadata but expressing subtleties such as "short descriptions are present but long descriptions will be needed for non-visual users" or "short descriptions are present and no long descriptions are needed."',
        'accountablePerson' => 'Specifies the Person that is legally accountable for the CreativeWork.',
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
        'contentLocation' => 'The location depicted or described in the content. For example, the location in a photograph or painting.',
        'contentRating' => 'Official rating of a piece of content—for example,\'MPAA PG-13\'.',
        'contentReferenceTime' => 'The specific time described by a creative work, for works (e.g. articles, video objects etc.) that emphasise a particular moment within an Event.',
        'contributor' => 'A secondary contributor to the CreativeWork or Event.',
        'copyrightHolder' => 'The party holding the legal copyright to the CreativeWork.',
        'copyrightYear' => 'The year during which the claimed copyright for the CreativeWork was first asserted.',
        'creator' => 'The creator/author of this CreativeWork. This is the same as the Author property for CreativeWork.',
        'dateCreated' => 'The date on which the CreativeWork was created or the item was added to a DataFeed.',
        'dateModified' => 'The date on which the CreativeWork was most recently modified or when the item\'s entry was modified within a DataFeed.',
        'datePublished' => 'Date of first broadcast/publication.',
        'discussionUrl' => 'A link to the page containing the comments of the CreativeWork.',
        'editor' => 'Specifies the Person who edited the CreativeWork.',
        'educationalAlignment' => 'An alignment to an established educational framework.',
        'educationalUse' => 'The purpose of a work in the context of education; for example, \'assignment\', \'group work\'.',
        'encoding' => 'A media object that encodes this CreativeWork. This property is a synonym for associatedMedia. Supersedes encodings.',
        'exampleOfWork' => 'A creative work that this work is an example/instance/realization/derivation of. Inverse property: workExample.',
        'expires' => 'Date the content expires and is no longer useful or available. For example a VideoObject or NewsArticle whose availability or relevance is time-limited, or a ClaimReview fact check whose publisher wants to indicate that it may no longer be relevant (or helpful to highlight) after some date.',
        'fileFormat' => 'Media type, typically MIME format (see IANA site) of the content e.g. application/zip of a SoftwareApplication binary. In cases where a CreativeWork has several media type representations, \'encoding\' can be used to indicate each MediaObject alongside particular fileFormat information. Unregistered or niche file formats can be indicated instead via the most appropriate URL, e.g. defining Web page or a Wikipedia entry.',
        'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
        'genre' => 'Genre of the creative work, broadcast channel or group.',
        'hasPart' => 'Indicates a CreativeWork that is (in some sense) a part of this CreativeWork. Inverse property: isPartOf.',
        'headline' => 'Headline of the article.',
        'inLanguage' => 'The language of the content or performance or used in an action. Please use one of the language codes from the IETF BCP 47 standard. See also availableLanguage. Supersedes language.',
        'interactionStatistic' => 'The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used. Supersedes interactionCount.',
        'interactivityType' => 'The predominant mode of learning supported by the learning resource. Acceptable values are \'active\', \'expositive\', or \'mixed\'.',
        'isAccessibleForFree' => 'A flag to signal that the item, event, or place is accessible for free. Supersedes free.',
        'isBasedOn' => 'A resource that was used in the creation of this resource. This term can be repeated for multiple sources. For example, http://example.com/great-multiplication-intro.html. Supersedes isBasedOnUrl.',
        'isFamilyFriendly' => 'Indicates whether this content is family friendly.',
        'isPartOf' => 'Indicates a CreativeWork that this CreativeWork is (in some sense) part of. Inverse property: hasPart.',
        'keywords' => 'Keywords or tags used to describe this content. Multiple entries in a keywords list are typically delimited by commas.',
        'learningResourceType' => 'The predominant type or kind characterizing the learning resource. For example, \'presentation\', \'handout\'.',
        'license' => 'A license document that applies to this content, typically indicated by URL.',
        'locationCreated' => 'The location where the CreativeWork was created, which may not be the same as the location depicted in the CreativeWork.',
        'mainEntity' => 'Indicates the primary entity described in some page or other CreativeWork. Inverse property: mainEntityOfPage.',
        'material' => 'A material that something is made from, e.g. leather, wool, cotton, paper.',
        'mentions' => 'Indicates that the CreativeWork contains a reference to, but is not necessarily about a concept.',
        'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.',
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
        'sourceOrganization' => 'The Organization on whose behalf the creator was working.',
        'spatialCoverage' => 'The spatialCoverage of a CreativeWork indicates the place(s) which are the focus of the content. It is a subproperty of contentLocation intended primarily for more technical and detailed materials. For example with a Dataset, it indicates areas that the dataset describes: a dataset of New York weather would have spatialCoverage which was the place: the state of New York. Supersedes spatial.',
        'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
        'temporalCoverage' => 'The temporalCoverage of a CreativeWork indicates the period that the content applies to, i.e. that it describes, either as a DateTime or as a textual string indicating a time period in ISO 8601 time interval format. In the case of a Dataset it will typically indicate the relevant time period in a precise notation (e.g. for a 2011 census dataset, the year 2011 would be written "2011/2012"). Other forms of content e.g. ScholarlyArticle, Book, TVSeries or TVEpisode may indicate their temporalCoverage in broader terms - textually or via well-known URL. Written works such as books may sometimes have precise temporal coverage too, e.g. a work set in 1939 - 1945 can be indicated in ISO 8601 interval format format via "1939/1945". Supersedes datasetTimeInterval, temporal.',
        'text' => 'The textual content of this CreativeWork.',
        'thumbnailUrl' => 'A thumbnail image relevant to the Thing.',
        'timeRequired' => 'Approximate or typical time it takes to work with or through this learning resource for the typical intended target audience, e.g. \'P30M\', \'P1H25M\'.',
        'translationOfWork' => 'The work that this work has been translated from. e.g. 物种起源 is a translationOf “On the Origin of Species” Inverse property: workTranslation.',
        'translator' => 'Organization or person who adapts a creative work to different languages, regional differences and technical requirements of a target market, or that translates during some event.',
        'typicalAgeRange' => 'The typical expected age range, e.g. \'7-9\', \'11-\'.',
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

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
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
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['about','accessMode','accessModeSufficient','accessibilityAPI','accessibilityControl','accessibilityFeature','accessibilityHazard','accessibilitySummary','accountablePerson','aggregateRating','alternativeHeadline','associatedMedia','audience','audio','author','award','character','citation','comment','commentCount','contentLocation','contentRating','contentReferenceTime','contributor','copyrightHolder','copyrightYear','creator','dateCreated','dateModified','datePublished','discussionUrl','editor','educationalAlignment','educationalUse','encoding','exampleOfWork','expires','fileFormat','funder','genre','hasPart','headline','inLanguage','interactionStatistic','interactivityType','isAccessibleForFree','isBasedOn','isFamilyFriendly','isPartOf','keywords','learningResourceType','license','locationCreated','mainEntity','material','mentions','offers','position','producer','provider','publication','publisher','publisherImprint','publishingPrinciples','recordedAt','releasedEvent','review','schemaVersion','sourceOrganization','spatialCoverage','sponsor','temporalCoverage','text','thumbnailUrl','timeRequired','translationOfWork','translator','typicalAgeRange','version','video','workExample','workTranslation'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
