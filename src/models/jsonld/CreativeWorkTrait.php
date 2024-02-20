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

/**
 * schema.org version: v26.0-release
 * Trait for CreativeWork.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/CreativeWork
 */
trait CreativeWorkTrait
{
    /**
     * The date on which the CreativeWork was most recently modified or when the
     * item's entry was modified within a DataFeed.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $dateModified;

    /**
     * A media object that encodes this CreativeWork. This property is a synonym
     * for encoding.
     *
     * @var array|MediaObject|MediaObject[]
     */
    public $associatedMedia;

    /**
     * The publishing division which published the comic.
     *
     * @var array|Organization|Organization[]
     */
    public $publisherImprint;

    /**
     * A pattern that something has, for example 'polka dot', 'striped', 'Canadian
     * flag'. Values are typically expressed as text, although links to controlled
     * value schemes are also supported.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $pattern;

    /**
     * An embedded audio object.
     *
     * @var array|AudioObject|AudioObject[]|array|MusicRecording|MusicRecording[]|array|Clip|Clip[]
     */
    public $audio;

    /**
     * The Event where the CreativeWork was recorded. The CreativeWork may capture
     * all or part of the event.
     *
     * @var array|Event|Event[]
     */
    public $recordedAt;

    /**
     * Indicates an item or CreativeWork that is part of this item, or
     * CreativeWork (in some sense).
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $hasPart;

    /**
     * Awards won by or for this item.
     *
     * @var string|array|Text|Text[]
     */
    public $awards;

    /**
     * A media object that encodes this CreativeWork. This property is a synonym
     * for associatedMedia.
     *
     * @var array|MediaObject|MediaObject[]
     */
    public $encoding;

    /**
     * A work that is a translation of the content of this work. E.g. 西遊記
     * has an English workTranslation “Journey to the West”, a German
     * workTranslation “Monkeys Pilgerfahrt” and a Vietnamese  translation
     * Tây du ký bình khảo.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $workTranslation;

    /**
     * The place and time the release was issued, expressed as a PublicationEvent.
     *
     * @var array|PublicationEvent|PublicationEvent[]
     */
    public $releasedEvent;

    /**
     * Example/instance/realization/derivation of the concept of this creative
     * work. E.g. the paperback edition, first edition, or e-book.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $workExample;

    /**
     * The "spatial" property can be used in cases when more specific properties
     * (e.g. [[locationCreated]], [[spatialCoverage]], [[contentLocation]]) are
     * not known to be appropriate.
     *
     * @var array|Place|Place[]
     */
    public $spatial;

    /**
     * A list of single or combined accessModes that are sufficient to understand
     * all the intellectual content of a resource. Values should be drawn from the
     * [approved
     * vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessModeSufficient-vocabulary).
     *
     * @var array|ItemList|ItemList[]
     */
    public $accessModeSufficient;

    /**
     * An award won by or for this item.
     *
     * @var string|array|Text|Text[]
     */
    public $award;

    /**
     * A review of the item.
     *
     * @var array|Review|Review[]
     */
    public $review;

    /**
     * Used to indicate a specific claim contained, implied, translated or refined
     * from the content of a [[MediaObject]] or other [[CreativeWork]]. The
     * interpreting party can be indicated using [[claimInterpreter]].
     *
     * @var array|Claim|Claim[]
     */
    public $interpretedAsClaim;

    /**
     * The publisher of the creative work.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $publisher;

    /**
     * A creative work that this work is an
     * example/instance/realization/derivation of.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $exampleOfWork;

    /**
     * Genre of the creative work, broadcast channel or group.
     *
     * @var string|array|URL|URL[]|array|Text|Text[]
     */
    public $genre;

    /**
     * The work that this work has been translated from. E.g. 物种起源 is a
     * translationOf “On the Origin of Species”.
     *
     * @var array|CreativeWork|CreativeWork[]
     */
    public $translationOfWork;

    /**
     * Headline of the article.
     *
     * @var string|array|Text|Text[]
     */
    public $headline;

    /**
     * Indicates a page documenting how licenses can be purchased or otherwise
     * acquired, for the current item.
     *
     * @var array|CreativeWork|CreativeWork[]|array|URL|URL[]
     */
    public $acquireLicensePage;

    /**
     * The item being described is intended to assess the competency or learning
     * outcome defined by the referenced term.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $assesses;

    /**
     * The status of a creative work in terms of its stage in a lifecycle. Example
     * terms include Incomplete, Draft, Published, Obsolete. Some organizations
     * define a set of terms for the stages of their publication lifecycle.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $creativeWorkStatus;

    /**
     * A license document that applies to this structured data, typically
     * indicated by URL.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $sdLicense;

    /**
     * The purpose of a work in the context of education; for example,
     * 'assignment', 'group work'.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $educationalUse;

    /**
     * The country of origin of something, including products as well as creative
     * works such as movie and TV content.  In the case of TV and movie, this
     * would be the country of the principle offices of the production company or
     * individual responsible for the movie. For other kinds of [[CreativeWork]]
     * it is difficult to provide fully general guidance, and properties such as
     * [[contentLocation]] and [[locationCreated]] may be more applicable.  In the
     * case of products, the country of origin of the product. The exact
     * interpretation of this may vary by context and product type, and cannot be
     * fully enumerated here.
     *
     * @var array|Country|Country[]
     */
    public $countryOfOrigin;

    /**
     * Official rating of a piece of content—for example, 'MPAA PG-13'.
     *
     * @var string|array|Rating|Rating[]|array|Text|Text[]
     */
    public $contentRating;

    /**
     * The location where the CreativeWork was created, which may not be the same
     * as the location depicted in the CreativeWork.
     *
     * @var array|Place|Place[]
     */
    public $locationCreated;

    /**
     * The creator/author of this CreativeWork. This is the same as the Author
     * property for CreativeWork.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $creator;

    /**
     * A human-readable summary of specific accessibility features or
     * deficiencies, consistent with the other accessibility metadata but
     * expressing subtleties such as "short descriptions are present but long
     * descriptions will be needed for non-visual users" or "short descriptions
     * are present and no long descriptions are needed".
     *
     * @var string|array|Text|Text[]
     */
    public $accessibilitySummary;

    /**
     * The number of comments this CreativeWork (e.g. Article, Question or Answer)
     * has received. This is most applicable to works published in Web sites with
     * commenting system; additional comments may exist elsewhere.
     *
     * @var int|array|Integer|Integer[]
     */
    public $commentCount;

    /**
     * The year during which the claimed copyright for the CreativeWork was first
     * asserted.
     *
     * @var float|array|Number|Number[]
     */
    public $copyrightYear;

    /**
     * A resource that was used in the creation of this resource. This term can be
     * repeated for multiple sources. For example,
     * http://example.com/great-multiplication-intro.html.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]|array|Product|Product[]
     */
    public $isBasedOnUrl;

    /**
     * A license document that applies to this content, typically indicated by
     * URL.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $license;

    /**
     * The schema.org [[usageInfo]] property indicates further information about a
     * [[CreativeWork]]. This property is applicable both to works that are freely
     * available and to those that require payment or other transactions. It can
     * reference additional information, e.g. community expectations on preferred
     * linking and citation conventions, as well as purchasing details. For
     * something that can be commercially licensed, usageInfo can provide
     * detailed, resource-specific information about licensing options.  This
     * property can be used alongside the license property which indicates
     * license(s) applicable to some piece of content. The usageInfo property can
     * provide information about other licensing options, e.g. acquiring
     * commercial usage rights for an image that is also available under
     * non-commercial creative commons licenses.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $usageInfo;

    /**
     * A publication event associated with the item.
     *
     * @var array|PublicationEvent|PublicationEvent[]
     */
    public $publication;

    /**
     * Approximate or typical time it usually takes to work with or through the
     * content of this work for the typical or target audience.
     *
     * @var array|Duration|Duration[]
     */
    public $timeRequired;

    /**
     * The predominant mode of learning supported by the learning resource.
     * Acceptable values are 'active', 'expositive', or 'mixed'.
     *
     * @var string|array|Text|Text[]
     */
    public $interactivityType;

    /**
     * The publishingPrinciples property indicates (typically via [[URL]]) a
     * document describing the editorial principles of an [[Organization]] (or
     * individual, e.g. a [[Person]] writing a blog) that relate to their
     * activities as a publisher, e.g. ethics or diversity policies. When applied
     * to a [[CreativeWork]] (e.g. [[NewsArticle]]) the principles are those of
     * the party primarily responsible for the creation of the [[CreativeWork]].
     * While such policies are most typically expressed in natural language,
     * sometimes related information (e.g. indicating a [[funder]]) can be
     * expressed using schema.org terminology.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $publishingPrinciples;

    /**
     * A secondary contributor to the CreativeWork or Event.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $contributor;

    /**
     * A citation or reference to another creative work, such as another
     * publication, web page, scholarly article, etc.
     *
     * @var string|array|Text|Text[]|array|CreativeWork|CreativeWork[]
     */
    public $citation;

    /**
     * Conditions that affect the availability of, or method(s) of access to, an
     * item. Typically used for real world items such as an [[ArchiveComponent]]
     * held by an [[ArchiveOrganization]]. This property is not suitable for use
     * as a general Web access control mechanism. It is expressed only in natural
     * language.  For example "Available by appointment from the Reading Room" or
     * "Accessible only from logged-in accounts ".
     *
     * @var string|array|Text|Text[]
     */
    public $conditionsOfAccess;

    /**
     * The predominant type or kind characterizing the learning resource. For
     * example, 'presentation', 'handout'.
     *
     * @var string|array|DefinedTerm|DefinedTerm[]|array|Text|Text[]
     */
    public $learningResourceType;

    /**
     * Indicates a correction to a [[CreativeWork]], either via a
     * [[CorrectionComment]], textually or in another document.
     *
     * @var string|array|URL|URL[]|array|Text|Text[]|array|CorrectionComment|CorrectionComment[]
     */
    public $correction;

    /**
     * The author of this content or rating. Please note that author is special in
     * that HTML 5 provides a special mechanism for indicating authorship via the
     * rel tag. That is equivalent to this and may be used interchangeably.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $author;

    /**
     * Review of the item.
     *
     * @var array|Review|Review[]
     */
    public $reviews;

    /**
     * Indicates an item or CreativeWork that this item, or CreativeWork (in some
     * sense), is part of.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $isPartOf;

    /**
     * The person or organization who produced the work (e.g. music album, movie,
     * TV/radio series etc.).
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $producer;

    /**
     * Thumbnail image for an image or video.
     *
     * @var array|ImageObject|ImageObject[]
     */
    public $thumbnail;

    /**
     * The human sensory perceptual system or cognitive faculty through which a
     * person may process or perceive information. Values should be drawn from the
     * [approved
     * vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessMode-vocabulary).
     *
     * @var string|array|Text|Text[]
     */
    public $accessMode;

    /**
     * An [EIDR](https://eidr.org/) (Entertainment Identifier Registry)
     * [[identifier]] representing a specific edit / edition for a work of film or
     * television.  For example, the motion picture known as "Ghostbusters" whose
     * [[titleEIDR]] is "10.5240/7EC7-228A-510A-053E-CBB8-J" has several edits,
     * e.g. "10.5240/1F2A-E1C5-680A-14C6-E76B-I" and
     * "10.5240/8A35-3BEE-6497-5D12-9E4F-3".  Since schema.org types like
     * [[Movie]] and [[TVEpisode]] can be used for both works and their multiple
     * expressions, it is possible to use [[titleEIDR]] alone (for a general
     * description), or alongside [[editEIDR]] for a more edit-specific
     * description.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $editEIDR;

    /**
     * The temporalCoverage of a CreativeWork indicates the period that the
     * content applies to, i.e. that it describes, either as a DateTime or as a
     * textual string indicating a time period in [ISO 8601 time interval
     * format](https://en.wikipedia.org/wiki/ISO_8601#Time_intervals). In
     * the case of a Dataset it will typically indicate the relevant time period
     * in a precise notation (e.g. for a 2011 census dataset, the year 2011 would
     * be written "2011/2012"). Other forms of content, e.g. ScholarlyArticle,
     * Book, TVSeries or TVEpisode, may indicate their temporalCoverage in broader
     * terms - textually or via well-known URL.       Written works such as books
     * may sometimes have precise temporal coverage too, e.g. a work set in 1939 -
     * 1945 can be indicated in ISO 8601 interval format format via "1939/1945".
     * Open-ended date ranges can be written with ".." in place of the end date.
     * For example, "2015-11/.." indicates a range beginning in November 2015 and
     * with no specified final date. This is tentative and might be updated in
     * future when ISO 8601 is officially updated.
     *
     * @var string|array|DateTime|DateTime[]|array|Text|Text[]|array|URL|URL[]
     */
    public $temporalCoverage;

    /**
     * The party holding the legal copyright to the CreativeWork.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $copyrightHolder;

    /**
     * An alignment to an established educational framework.  This property should
     * not be used where the nature of the alignment can be described using a
     * simple property, for example to express that a resource [[teaches]] or
     * [[assesses]] a competency.
     *
     * @var array|AlignmentObject|AlignmentObject[]
     */
    public $educationalAlignment;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var array|Grant|Grant[]
     */
    public $funding;

    /**
     * A material that something is made from, e.g. leather, wool, cotton, paper.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|Product|Product[]
     */
    public $material;

    /**
     * A secondary title of the CreativeWork.
     *
     * @var string|array|Text|Text[]
     */
    public $alternativeHeadline;

    /**
     * The version of the CreativeWork embodied by a specified resource.
     *
     * @var float|string|array|Number|Number[]|array|Text|Text[]
     */
    public $version;

    /**
     * Indicates whether this content is family friendly.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isFamilyFriendly;

    /**
     * The quantity of the materials being described or an expression of the
     * physical space they occupy.
     *
     * @var string|array|Text|Text[]|array|QuantitativeValue|QuantitativeValue[]
     */
    public $materialExtent;

    /**
     * A link to the page containing the comments of the CreativeWork.
     *
     * @var array|URL|URL[]
     */
    public $discussionUrl;

    /**
     * A standardized size of a product or creative work, specified either through
     * a simple textual string (for example 'XL', '32Wx34L'), a  QuantitativeValue
     * with a unitCode, or a comprehensive and structured [[SizeSpecification]];
     * in other cases, the [[width]], [[height]], [[depth]] and [[weight]]
     * properties may be more applicable.
     *
     * @var string|array|Text|Text[]|array|QuantitativeValue|QuantitativeValue[]|array|DefinedTerm|DefinedTerm[]|array|SizeSpecification|SizeSpecification[]
     */
    public $size;

    /**
     * A maintainer of a [[Dataset]], software package ([[SoftwareApplication]]),
     * or other [[Project]]. A maintainer is a [[Person]] or [[Organization]] that
     * manages contributions to, and/or publication of, some (typically complex)
     * artifact. It is common for distributions of software and data to be based
     * on "upstream" sources. When [[maintainer]] is applied to a specific version
     * of something e.g. a particular version or packaging of a [[Dataset]], it is
     * always  possible that the upstream source has a different maintainer. The
     * [[isBasedOn]] property can be used to indicate such relationships between
     * datasets to make the different maintenance roles clear. Similarly in the
     * case of software, a package may have dedicated maintainers working on
     * integration into software distributions such as Ubuntu, as well as upstream
     * maintainers of the underlying work.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $maintainer;

    /**
     * Text of a notice appropriate for describing the copyright aspects of this
     * Creative Work, ideally indicating the owner of the copyright for the Work.
     *
     * @var string|array|Text|Text[]
     */
    public $copyrightNotice;

    /**
     * Comments, typically from users.
     *
     * @var array|Comment|Comment[]
     */
    public $comment;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event. Use [[businessFunction]] to indicate the kind of transaction
     * offered, i.e. sell, lease, etc. This property can also be used to describe
     * a [[Demand]]. While this property is listed as expected on a number of
     * common types, it can be used in others. In that case, using a second type,
     * such as Product or a subtype of Product, can clarify the nature of the
     * offer.
     *
     * @var array|Demand|Demand[]|array|Offer|Offer[]
     */
    public $offers;

    /**
     * The textual content of this CreativeWork.
     *
     * @var string|array|Text|Text[]
     */
    public $text;

    /**
     * Media type, typically MIME format (see [IANA
     * site](http://www.iana.org/assignments/media-types/media-types.xhtml)) of
     * the content, e.g. application/zip of a SoftwareApplication binary. In cases
     * where a CreativeWork has several media type representations, 'encoding' can
     * be used to indicate each MediaObject alongside particular fileFormat
     * information. Unregistered or niche file formats can be indicated instead
     * via the most appropriate URL, e.g. defining Web page or a Wikipedia entry.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $fileFormat;

    /**
     * A media object that encodes this CreativeWork.
     *
     * @var array|MediaObject|MediaObject[]
     */
    public $encodings;

    /**
     * The subject matter of the content.
     *
     * @var array|Thing|Thing[]
     */
    public $about;

    /**
     * An intended audience, i.e. a group for whom something was created.
     *
     * @var array|Audience|Audience[]
     */
    public $audience;

    /**
     * Keywords or tags used to describe some item. Multiple textual entries in a
     * keywords list are typically delimited by commas, or by repeating the
     * property.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|DefinedTerm|DefinedTerm[]
     */
    public $keywords;

    /**
     * The spatialCoverage of a CreativeWork indicates the place(s) which are the
     * focus of the content. It is a subproperty of       contentLocation intended
     * primarily for more technical and detailed materials. For example with a
     * Dataset, it indicates       areas that the dataset describes: a dataset of
     * New York weather would have spatialCoverage which was the place: the state
     * of New York.
     *
     * @var array|Place|Place[]
     */
    public $spatialCoverage;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. E.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $sponsor;

    /**
     * Indicates that the resource is compatible with the referenced accessibility
     * API. Values should be drawn from the [approved
     * vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessibilityAPI-vocabulary).
     *
     * @var string|array|Text|Text[]
     */
    public $accessibilityAPI;

    /**
     * Indicates the party responsible for generating and publishing the current
     * structured data markup, typically in cases where the structured data is
     * derived automatically from existing published content but published on a
     * different site. For example, student projects and open data initiatives
     * often re-publish existing content with more explicitly structured metadata.
     * The [[sdPublisher]] property helps make such practices more explicit.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $sdPublisher;

    /**
     * The location depicted or described in the content. For example, the
     * location in a photograph or painting.
     *
     * @var array|Place|Place[]
     */
    public $contentLocation;

    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication. The most specific child type of InteractionCounter
     * should be used.
     *
     * @var array|InteractionCounter|InteractionCounter[]
     */
    public $interactionStatistic;

    /**
     * Media type typically expressed using a MIME format (see [IANA
     * site](http://www.iana.org/assignments/media-types/media-types.xhtml) and
     * [MDN
     * reference](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types)),
     * e.g. application/zip for a SoftwareApplication binary, audio/mpeg for .mp3
     * etc.  In cases where a [[CreativeWork]] has several media type
     * representations, [[encoding]] can be used to indicate each [[MediaObject]]
     * alongside particular [[encodingFormat]] information.  Unregistered or niche
     * encoding and file formats can be indicated instead via the most appropriate
     * URL, e.g. defining Web page or a Wikipedia/Wikidata entry.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $encodingFormat;

    /**
     * Indicates a page or other link involved in archival of a [[CreativeWork]].
     * In the case of [[MediaReview]], the items in a [[MediaReviewItem]] may
     * often become inaccessible, but be archived by archival, journalistic,
     * activist, or law enforcement organizations. In such cases, the referenced
     * page may not directly publish the content.
     *
     * @var array|URL|URL[]|array|WebPage|WebPage[]
     */
    public $archivedAt;

    /**
     * Indicates the primary entity described in some page or other CreativeWork.
     *
     * @var array|Thing|Thing[]
     */
    public $mainEntity;

    /**
     * Date of first publication or broadcast. For example the date a
     * [[CreativeWork]] was broadcast or a [[Certification]] was issued.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $datePublished;

    /**
     * A flag to signal that the item, event, or place is accessible for free.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $isAccessibleForFree;

    /**
     * The date on which the CreativeWork was created or the item was added to a
     * DataFeed.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $dateCreated;

    /**
     * The item being described is intended to help a person learn the competency
     * or learning outcome defined by the referenced term.
     *
     * @var string|array|Text|Text[]|array|DefinedTerm|DefinedTerm[]
     */
    public $teaches;

    /**
     * A thumbnail image relevant to the Thing.
     *
     * @var array|URL|URL[]
     */
    public $thumbnailUrl;

    /**
     * Specifies the Person that is legally accountable for the CreativeWork.
     *
     * @var array|Person|Person[]
     */
    public $accountablePerson;

    /**
     * The typical expected age range, e.g. '7-9', '11-'.
     *
     * @var string|array|Text|Text[]
     */
    public $typicalAgeRange;

    /**
     * Indicates the date on which the current structured data was generated /
     * published. Typically used alongside [[sdPublisher]].
     *
     * @var array|Date|Date[]
     */
    public $sdDatePublished;

    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $funder;

    /**
     * Date the content expires and is no longer useful or available. For example
     * a [[VideoObject]] or [[NewsArticle]] whose availability or relevance is
     * time-limited, a [[ClaimReview]] fact check whose publisher wants to
     * indicate that it may no longer be relevant (or helpful to highlight) after
     * some date, or a [[Certification]] the validity has expired.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $expires;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var array|AggregateRating|AggregateRating[]
     */
    public $aggregateRating;

    /**
     * The "temporal" property can be used in cases where more specific properties
     * (e.g. [[temporalCoverage]], [[dateCreated]], [[dateModified]],
     * [[datePublished]]) are not known to be appropriate.
     *
     * @var string|array|DateTime|DateTime[]|array|Text|Text[]
     */
    public $temporal;

    /**
     * Identifies input methods that are sufficient to fully control the described
     * resource. Values should be drawn from the [approved
     * vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessibilityControl-vocabulary).
     *
     * @var string|array|Text|Text[]
     */
    public $accessibilityControl;

    /**
     * Content features of the resource, such as accessible media, alternatives
     * and supported enhancements for accessibility. Values should be drawn from
     * the [approved
     * vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessibilityFeature-vocabulary).
     *
     * @var string|array|Text|Text[]
     */
    public $accessibilityFeature;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also
     * [[availableLanguage]].
     *
     * @var string|array|Text|Text[]|array|Language|Language[]
     */
    public $inLanguage;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $provider;

    /**
     * An abstract is a short description that summarizes a [[CreativeWork]].
     *
     * @var string|array|Text|Text[]
     */
    public $abstract;

    /**
     * Indicates an IPTCDigitalSourceEnumeration code indicating the nature of the
     * digital source(s) for some [[CreativeWork]].
     *
     * @var array|IPTCDigitalSourceEnumeration|IPTCDigitalSourceEnumeration[]
     */
    public $digitalSourceType;

    /**
     * The position of an item in a series or sequence of items.
     *
     * @var int|string|array|Integer|Integer[]|array|Text|Text[]
     */
    public $position;

    /**
     * Indicates that the CreativeWork contains a reference to, but is not
     * necessarily about a concept.
     *
     * @var array|Thing|Thing[]
     */
    public $mentions;

    /**
     * The Organization on whose behalf the creator was working.
     *
     * @var array|Organization|Organization[]
     */
    public $sourceOrganization;

    /**
     * An embedded video object.
     *
     * @var array|VideoObject|VideoObject[]|array|Clip|Clip[]
     */
    public $video;

    /**
     * Specifies the Person who edited the CreativeWork.
     *
     * @var array|Person|Person[]
     */
    public $editor;

    /**
     * Text that can be used to credit person(s) and/or organization(s) associated
     * with a published Creative Work.
     *
     * @var string|array|Text|Text[]
     */
    public $creditText;

    /**
     * Indicates (by URL or string) a particular version of a schema used in some
     * CreativeWork. This property was created primarily to     indicate the use
     * of a specific schema.org release, e.g. ```10.0``` as a simple string, or
     * more explicitly via URL, ```https://schema.org/docs/releases.html#v10.0```.
     * There may be situations in which other schemas might usefully be referenced
     * this way, e.g.
     * ```http://dublincore.org/specifications/dublin-core/dces/1999-07-02/``` but
     * this has not been carefully explored in the community.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $schemaVersion;

    /**
     * Organization or person who adapts a creative work to different languages,
     * regional differences and technical requirements of a target market, or that
     * translates during some event.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $translator;

    /**
     * A characteristic of the described resource that is physiologically
     * dangerous to some users. Related to WCAG 2.0 guideline 2.3. Values should
     * be drawn from the [approved
     * vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessibilityHazard-vocabulary).
     *
     * @var string|array|Text|Text[]
     */
    public $accessibilityHazard;

    /**
     * The specific time described by a creative work, for works (e.g. articles,
     * video objects etc.) that emphasise a particular moment within an Event.
     *
     * @var array|DateTime|DateTime[]
     */
    public $contentReferenceTime;

    /**
     * The level in terms of progression through an educational or training
     * context. Examples of educational levels include 'beginner', 'intermediate'
     * or 'advanced', and formal sets of level indicators.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|DefinedTerm|DefinedTerm[]
     */
    public $educationalLevel;

    /**
     * Fictional person connected with a creative work.
     *
     * @var array|Person|Person[]
     */
    public $character;

    /**
     * A resource from which this work is derived or from which it is a
     * modification or adaptation.
     *
     * @var array|Product|Product[]|array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $isBasedOn;
}
