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
 * SpecialAnnouncement - A SpecialAnnouncement combines a simple date-stamped textual information
 * update       with contextualized Web links and other structured data.  It
 * represents an information update made by a       locally-oriented
 * organization, for example schools, pharmacies, healthcare providers,
 * community groups, police,       local government.  For work in progress
 * guidelines on Coronavirus-related markup see [this
 * doc](https://docs.google.com/document/d/14ikaGCKxo50rRM7nvKSlbUpjyIk2WMQd3IkB1lItlrM/edit#).
 *  The motivating scenario for SpecialAnnouncement is the [Coronavirus
 * pandemic](https://en.wikipedia.org/wiki/2019%E2%80%9320_coronavirus_pandemic),
 * and the initial vocabulary is oriented to this urgent situation. Schema.org
 * expect to improve the markup iteratively as it is deployed and as feedback
 * emerges from use. In addition to our usual [Github
 * entry](https://github.com/schemaorg/schemaorg/issues/2490), feedback
 * comments can also be provided in [this
 * document](https://docs.google.com/document/d/1fpdFFxk8s87CWwACs53SGkYv3aafSxz_DTtOQxMrBJQ/edit#).
 *   While this schema is designed to communicate urgent crisis-related
 * information, it is not the same as an emergency warning technology like
 * [CAP](https://en.wikipedia.org/wiki/Common_Alerting_Protocol), although
 * there may be overlaps. The intent is to cover the kinds of everyday
 * practical information being posted to existing websites during an emergency
 * situation.  Several kinds of information can be provided:  We encourage the
 * provision of "name", "text", "datePosted", "expires" (if appropriate),
 * "category" and "url" as a simple baseline. It is important to provide a
 * value for "category" where possible, most ideally as a well known URL from
 * Wikipedia or Wikidata. In the case of the 2019-2020 Coronavirus pandemic,
 * this should be
 * "https://en.wikipedia.org/w/index.php?title=2019-20\_coronavirus\_pandemic"
 * or "https://www.wikidata.org/wiki/Q81068910".  For many of the possible
 * properties, values can either be simple links or an inline description,
 * depending on whether a summary is available. For a link, provide just the
 * URL of the appropriate page as the property's value. For an inline
 * description, use a [[WebContent]] type, and provide the url as a property
 * of that, alongside at least a simple "[[text]]" summary of the page. It is
 * unlikely that a single SpecialAnnouncement will need all of the possible
 * properties simultaneously.  We expect that in many cases the page
 * referenced might contain more specialized structured data, e.g. contact
 * info, [[openingHours]], [[Event]], [[FAQPage]] etc. By linking to those
 * pages from a [[SpecialAnnouncement]] you can help make it clearer that the
 * events are related to the situation (e.g. Coronavirus) indicated by the
 * [[category]] property of the [[SpecialAnnouncement]].  Many
 * [[SpecialAnnouncement]]s will relate to particular regions and to
 * identifiable local organizations. Use [[spatialCoverage]] for the region,
 * and [[announcementLocation]] to indicate specific [[LocalBusiness]]es and
 * [[CivicStructure]]s. If the announcement affects both a particular region
 * and a specific location (for example, a library closure that serves an
 * entire region), use both [[spatialCoverage]] and [[announcementLocation]].
 * The [[about]] property can be used to indicate entities that are the focus
 * of the announcement. We now recommend using [[about]] only for representing
 * non-location entities (e.g. a [[Course]] or a [[RadioStation]]). For
 * places, use [[announcementLocation]] and [[spatialCoverage]]. Consumers of
 * this markup should be aware that the initial design encouraged the use of
 * [[about]] for locations too.  The basic content of [[SpecialAnnouncement]]
 * is similar to that of an [RSS](https://en.wikipedia.org/wiki/RSS) or
 * [Atom](https://en.wikipedia.org/wiki/Atom_(Web_standard)) feed. For
 * publishers without such feeds, basic feed-like information can be shared by
 * posting [[SpecialAnnouncement]] updates in a page, e.g. using JSON-LD. For
 * sites with Atom/RSS functionality, you can point to a feed with the
 * [[webFeed]] property. This can be a simple URL, or an inline [[DataFeed]]
 * object, with [[encodingFormat]] providing media type information, e.g.
 * "application/rss+xml" or "application/atom+xml".
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/SpecialAnnouncement
 */
class SpecialAnnouncement extends MetaJsonLd implements SpecialAnnouncementInterface, CreativeWorkInterface, ThingInterface
{
    use SpecialAnnouncementTrait;
    use CreativeWorkTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'SpecialAnnouncement';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/SpecialAnnouncement';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'CreativeWork';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = "A SpecialAnnouncement combines a simple date-stamped textual information update\n      with contextualized Web links and other structured data.  It represents an information update made by a\n      locally-oriented organization, for example schools, pharmacies, healthcare providers,  community groups, police,\n      local government.\n\nFor work in progress guidelines on Coronavirus-related markup see [this doc](https://docs.google.com/document/d/14ikaGCKxo50rRM7nvKSlbUpjyIk2WMQd3IkB1lItlrM/edit#).\n\nThe motivating scenario for SpecialAnnouncement is the [Coronavirus pandemic](https://en.wikipedia.org/wiki/2019%E2%80%9320_coronavirus_pandemic), and the initial vocabulary is oriented to this urgent situation. Schema.org\nexpect to improve the markup iteratively as it is deployed and as feedback emerges from use. In addition to our\nusual [Github entry](https://github.com/schemaorg/schemaorg/issues/2490), feedback comments can also be provided in [this document](https://docs.google.com/document/d/1fpdFFxk8s87CWwACs53SGkYv3aafSxz_DTtOQxMrBJQ/edit#).\n\n\nWhile this schema is designed to communicate urgent crisis-related information, it is not the same as an emergency warning technology like [CAP](https://en.wikipedia.org/wiki/Common_Alerting_Protocol), although there may be overlaps. The intent is to cover\nthe kinds of everyday practical information being posted to existing websites during an emergency situation.\n\nSeveral kinds of information can be provided:\n\nWe encourage the provision of \"name\", \"text\", \"datePosted\", \"expires\" (if appropriate), \"category\" and\n\"url\" as a simple baseline. It is important to provide a value for \"category\" where possible, most ideally as a well known\nURL from Wikipedia or Wikidata. In the case of the 2019-2020 Coronavirus pandemic, this should be \"https://en.wikipedia.org/w/index.php?title=2019-20\\_coronavirus\\_pandemic\" or \"https://www.wikidata.org/wiki/Q81068910\".\n\nFor many of the possible properties, values can either be simple links or an inline description, depending on whether a summary is available. For a link, provide just the URL of the appropriate page as the property's value. For an inline description, use a [[WebContent]] type, and provide the url as a property of that, alongside at least a simple \"[[text]]\" summary of the page. It is\nunlikely that a single SpecialAnnouncement will need all of the possible properties simultaneously.\n\nWe expect that in many cases the page referenced might contain more specialized structured data, e.g. contact info, [[openingHours]], [[Event]], [[FAQPage]] etc. By linking to those pages from a [[SpecialAnnouncement]] you can help make it clearer that the events are related to the situation (e.g. Coronavirus) indicated by the [[category]] property of the [[SpecialAnnouncement]].\n\nMany [[SpecialAnnouncement]]s will relate to particular regions and to identifiable local organizations. Use [[spatialCoverage]] for the region, and [[announcementLocation]] to indicate specific [[LocalBusiness]]es and [[CivicStructure]]s. If the announcement affects both a particular region and a specific location (for example, a library closure that serves an entire region), use both [[spatialCoverage]] and [[announcementLocation]].\n\nThe [[about]] property can be used to indicate entities that are the focus of the announcement. We now recommend using [[about]] only\nfor representing non-location entities (e.g. a [[Course]] or a [[RadioStation]]). For places, use [[announcementLocation]] and [[spatialCoverage]]. Consumers of this markup should be aware that the initial design encouraged the use of [[about]] for locations too.\n\nThe basic content of [[SpecialAnnouncement]] is similar to that of an [RSS](https://en.wikipedia.org/wiki/RSS) or [Atom](https://en.wikipedia.org/wiki/Atom_(Web_standard)) feed. For publishers without such feeds, basic feed-like information can be shared by posting\n[[SpecialAnnouncement]] updates in a page, e.g. using JSON-LD. For sites with Atom/RSS functionality, you can point to a feed\nwith the [[webFeed]] property. This can be a simple URL, or an inline [[DataFeed]] object, with [[encodingFormat]] providing\nmedia type information, e.g. \"application/rss+xml\" or \"application/atom+xml\".";


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
            'about' => ['array', 'Thing', 'Thing[]'],
            'abstract' => ['array', 'Text', 'Text[]'],
            'accessMode' => ['array', 'Text', 'Text[]'],
            'accessModeSufficient' => ['array', 'ItemList', 'ItemList[]'],
            'accessibilityAPI' => ['array', 'Text', 'Text[]'],
            'accessibilityControl' => ['array', 'Text', 'Text[]'],
            'accessibilityFeature' => ['array', 'Text', 'Text[]'],
            'accessibilityHazard' => ['array', 'Text', 'Text[]'],
            'accessibilitySummary' => ['array', 'Text', 'Text[]'],
            'accountablePerson' => ['array', 'Person', 'Person[]'],
            'acquireLicensePage' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'URL', 'URL[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'aggregateRating' => ['array', 'AggregateRating', 'AggregateRating[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'alternativeHeadline' => ['array', 'Text', 'Text[]'],
            'announcementLocation' => ['array', 'CivicStructure', 'CivicStructure[]', 'array', 'LocalBusiness', 'LocalBusiness[]'],
            'archivedAt' => ['array', 'URL', 'URL[]', 'array', 'WebPage', 'WebPage[]'],
            'assesses' => ['array', 'Text', 'Text[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'associatedMedia' => ['array', 'MediaObject', 'MediaObject[]'],
            'audience' => ['array', 'Audience', 'Audience[]'],
            'audio' => ['array', 'AudioObject', 'AudioObject[]', 'array', 'MusicRecording', 'MusicRecording[]', 'array', 'Clip', 'Clip[]'],
            'author' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'award' => ['array', 'Text', 'Text[]'],
            'awards' => ['array', 'Text', 'Text[]'],
            'category' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'CategoryCode', 'CategoryCode[]', 'array', 'PhysicalActivityCategory', 'PhysicalActivityCategory[]', 'array', 'Thing', 'Thing[]'],
            'character' => ['array', 'Person', 'Person[]'],
            'citation' => ['array', 'Text', 'Text[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'comment' => ['array', 'Comment', 'Comment[]'],
            'commentCount' => ['array', 'Integer', 'Integer[]'],
            'conditionsOfAccess' => ['array', 'Text', 'Text[]'],
            'contentLocation' => ['array', 'Place', 'Place[]'],
            'contentRating' => ['array', 'Rating', 'Rating[]', 'array', 'Text', 'Text[]'],
            'contentReferenceTime' => ['array', 'DateTime', 'DateTime[]'],
            'contributor' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'copyrightHolder' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'copyrightNotice' => ['array', 'Text', 'Text[]'],
            'copyrightYear' => ['array', 'Number', 'Number[]'],
            'correction' => ['array', 'URL', 'URL[]', 'array', 'Text', 'Text[]', 'array', 'CorrectionComment', 'CorrectionComment[]'],
            'countryOfOrigin' => ['array', 'Country', 'Country[]'],
            'creativeWorkStatus' => ['array', 'Text', 'Text[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'creator' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'creditText' => ['array', 'Text', 'Text[]'],
            'dateCreated' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'dateModified' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'datePosted' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'datePublished' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'digitalSourceType' => ['array', 'IPTCDigitalSourceEnumeration', 'IPTCDigitalSourceEnumeration[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'discussionUrl' => ['array', 'URL', 'URL[]'],
            'diseasePreventionInfo' => ['array', 'WebContent', 'WebContent[]', 'array', 'URL', 'URL[]'],
            'diseaseSpreadStatistics' => ['array', 'URL', 'URL[]', 'array', 'Dataset', 'Dataset[]', 'array', 'Observation', 'Observation[]', 'array', 'WebContent', 'WebContent[]'],
            'editEIDR' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'editor' => ['array', 'Person', 'Person[]'],
            'educationalAlignment' => ['array', 'AlignmentObject', 'AlignmentObject[]'],
            'educationalLevel' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'educationalUse' => ['array', 'Text', 'Text[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'encoding' => ['array', 'MediaObject', 'MediaObject[]'],
            'encodingFormat' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'encodings' => ['array', 'MediaObject', 'MediaObject[]'],
            'exampleOfWork' => ['array', 'CreativeWork', 'CreativeWork[]'],
            'expires' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'fileFormat' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'funder' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'funding' => ['array', 'Grant', 'Grant[]'],
            'genre' => ['array', 'URL', 'URL[]', 'array', 'Text', 'Text[]'],
            'gettingTestedInfo' => ['array', 'WebContent', 'WebContent[]', 'array', 'URL', 'URL[]'],
            'governmentBenefitsInfo' => ['array', 'GovernmentService', 'GovernmentService[]'],
            'hasPart' => ['array', 'CreativeWork', 'CreativeWork[]'],
            'headline' => ['array', 'Text', 'Text[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'inLanguage' => ['array', 'Text', 'Text[]', 'array', 'Language', 'Language[]'],
            'interactionStatistic' => ['array', 'InteractionCounter', 'InteractionCounter[]'],
            'interactivityType' => ['array', 'Text', 'Text[]'],
            'interpretedAsClaim' => ['array', 'Claim', 'Claim[]'],
            'isAccessibleForFree' => ['array', 'Boolean', 'Boolean[]'],
            'isBasedOn' => ['array', 'Product', 'Product[]', 'array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'isBasedOnUrl' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]', 'array', 'Product', 'Product[]'],
            'isFamilyFriendly' => ['array', 'Boolean', 'Boolean[]'],
            'isPartOf' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'keywords' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'learningResourceType' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'Text', 'Text[]'],
            'license' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'locationCreated' => ['array', 'Place', 'Place[]'],
            'mainEntity' => ['array', 'Thing', 'Thing[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'maintainer' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'material' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'Product', 'Product[]'],
            'materialExtent' => ['array', 'Text', 'Text[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]'],
            'mentions' => ['array', 'Thing', 'Thing[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'newsUpdatesAndGuidelines' => ['array', 'WebContent', 'WebContent[]', 'array', 'URL', 'URL[]'],
            'offers' => ['array', 'Demand', 'Demand[]', 'array', 'Offer', 'Offer[]'],
            'pattern' => ['array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'Text', 'Text[]'],
            'position' => ['array', 'Integer', 'Integer[]', 'array', 'Text', 'Text[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'producer' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'provider' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'publicTransportClosuresInfo' => ['array', 'URL', 'URL[]', 'array', 'WebContent', 'WebContent[]'],
            'publication' => ['array', 'PublicationEvent', 'PublicationEvent[]'],
            'publisher' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'publisherImprint' => ['array', 'Organization', 'Organization[]'],
            'publishingPrinciples' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'quarantineGuidelines' => ['array', 'WebContent', 'WebContent[]', 'array', 'URL', 'URL[]'],
            'recordedAt' => ['array', 'Event', 'Event[]'],
            'releasedEvent' => ['array', 'PublicationEvent', 'PublicationEvent[]'],
            'review' => ['array', 'Review', 'Review[]'],
            'reviews' => ['array', 'Review', 'Review[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'schemaVersion' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'schoolClosuresInfo' => ['array', 'WebContent', 'WebContent[]', 'array', 'URL', 'URL[]'],
            'sdDatePublished' => ['array', 'Date', 'Date[]'],
            'sdLicense' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'sdPublisher' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'size' => ['array', 'Text', 'Text[]', 'array', 'QuantitativeValue', 'QuantitativeValue[]', 'array', 'DefinedTerm', 'DefinedTerm[]', 'array', 'SizeSpecification', 'SizeSpecification[]'],
            'sourceOrganization' => ['array', 'Organization', 'Organization[]'],
            'spatial' => ['array', 'Place', 'Place[]'],
            'spatialCoverage' => ['array', 'Place', 'Place[]'],
            'sponsor' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'teaches' => ['array', 'Text', 'Text[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'temporal' => ['array', 'DateTime', 'DateTime[]', 'array', 'Text', 'Text[]'],
            'temporalCoverage' => ['array', 'DateTime', 'DateTime[]', 'array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'text' => ['array', 'Text', 'Text[]'],
            'thumbnail' => ['array', 'ImageObject', 'ImageObject[]'],
            'thumbnailUrl' => ['array', 'URL', 'URL[]'],
            'timeRequired' => ['array', 'Duration', 'Duration[]'],
            'translationOfWork' => ['array', 'CreativeWork', 'CreativeWork[]'],
            'translator' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'travelBans' => ['array', 'WebContent', 'WebContent[]', 'array', 'URL', 'URL[]'],
            'typicalAgeRange' => ['array', 'Text', 'Text[]'],
            'url' => ['array', 'URL', 'URL[]'],
            'usageInfo' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'version' => ['array', 'Number', 'Number[]', 'array', 'Text', 'Text[]'],
            'video' => ['array', 'VideoObject', 'VideoObject[]', 'array', 'Clip', 'Clip[]'],
            'webFeed' => ['array', 'DataFeed', 'DataFeed[]', 'array', 'URL', 'URL[]'],
            'workExample' => ['array', 'CreativeWork', 'CreativeWork[]'],
            'workTranslation' => ['array', 'CreativeWork', 'CreativeWork[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'about' => 'The subject matter of the content.',
            'abstract' => 'An abstract is a short description that summarizes a [[CreativeWork]].',
            'accessMode' => 'The human sensory perceptual system or cognitive faculty through which a person may process or perceive information. Values should be drawn from the [approved vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessMode-vocabulary).',
            'accessModeSufficient' => 'A list of single or combined accessModes that are sufficient to understand all the intellectual content of a resource. Values should be drawn from the [approved vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessModeSufficient-vocabulary).',
            'accessibilityAPI' => 'Indicates that the resource is compatible with the referenced accessibility API. Values should be drawn from the [approved vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessibilityAPI-vocabulary).',
            'accessibilityControl' => 'Identifies input methods that are sufficient to fully control the described resource. Values should be drawn from the [approved vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessibilityControl-vocabulary).',
            'accessibilityFeature' => 'Content features of the resource, such as accessible media, alternatives and supported enhancements for accessibility. Values should be drawn from the [approved vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessibilityFeature-vocabulary).',
            'accessibilityHazard' => 'A characteristic of the described resource that is physiologically dangerous to some users. Related to WCAG 2.0 guideline 2.3. Values should be drawn from the [approved vocabulary](https://www.w3.org/2021/a11y-discov-vocab/latest/#accessibilityHazard-vocabulary).',
            'accessibilitySummary' => 'A human-readable summary of specific accessibility features or deficiencies, consistent with the other accessibility metadata but expressing subtleties such as "short descriptions are present but long descriptions will be needed for non-visual users" or "short descriptions are present and no long descriptions are needed".',
            'accountablePerson' => 'Specifies the Person that is legally accountable for the CreativeWork.',
            'acquireLicensePage' => 'Indicates a page documenting how licenses can be purchased or otherwise acquired, for the current item.',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alternateName' => 'An alias for the item.',
            'alternativeHeadline' => 'A secondary title of the CreativeWork.',
            'announcementLocation' => 'Indicates a specific [[CivicStructure]] or [[LocalBusiness]] associated with the SpecialAnnouncement. For example, a specific testing facility or business with special opening hours. For a larger geographic region like a quarantine of an entire region, use [[spatialCoverage]].',
            'archivedAt' => 'Indicates a page or other link involved in archival of a [[CreativeWork]]. In the case of [[MediaReview]], the items in a [[MediaReviewItem]] may often become inaccessible, but be archived by archival, journalistic, activist, or law enforcement organizations. In such cases, the referenced page may not directly publish the content.',
            'assesses' => 'The item being described is intended to assess the competency or learning outcome defined by the referenced term.',
            'associatedMedia' => 'A media object that encodes this CreativeWork. This property is a synonym for encoding.',
            'audience' => 'An intended audience, i.e. a group for whom something was created.',
            'audio' => 'An embedded audio object.',
            'author' => 'The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.',
            'award' => 'An award won by or for this item.',
            'awards' => 'Awards won by or for this item.',
            'category' => 'A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.',
            'character' => 'Fictional person connected with a creative work.',
            'citation' => 'A citation or reference to another creative work, such as another publication, web page, scholarly article, etc.',
            'comment' => 'Comments, typically from users.',
            'commentCount' => 'The number of comments this CreativeWork (e.g. Article, Question or Answer) has received. This is most applicable to works published in Web sites with commenting system; additional comments may exist elsewhere.',
            'conditionsOfAccess' => 'Conditions that affect the availability of, or method(s) of access to, an item. Typically used for real world items such as an [[ArchiveComponent]] held by an [[ArchiveOrganization]]. This property is not suitable for use as a general Web access control mechanism. It is expressed only in natural language.  For example "Available by appointment from the Reading Room" or "Accessible only from logged-in accounts ". ',
            'contentLocation' => 'The location depicted or described in the content. For example, the location in a photograph or painting.',
            'contentRating' => 'Official rating of a piece of content—for example, \'MPAA PG-13\'.',
            'contentReferenceTime' => 'The specific time described by a creative work, for works (e.g. articles, video objects etc.) that emphasise a particular moment within an Event.',
            'contributor' => 'A secondary contributor to the CreativeWork or Event.',
            'copyrightHolder' => 'The party holding the legal copyright to the CreativeWork.',
            'copyrightNotice' => 'Text of a notice appropriate for describing the copyright aspects of this Creative Work, ideally indicating the owner of the copyright for the Work.',
            'copyrightYear' => 'The year during which the claimed copyright for the CreativeWork was first asserted.',
            'correction' => 'Indicates a correction to a [[CreativeWork]], either via a [[CorrectionComment]], textually or in another document.',
            'countryOfOrigin' => 'The country of origin of something, including products as well as creative  works such as movie and TV content.  In the case of TV and movie, this would be the country of the principle offices of the production company or individual responsible for the movie. For other kinds of [[CreativeWork]] it is difficult to provide fully general guidance, and properties such as [[contentLocation]] and [[locationCreated]] may be more applicable.  In the case of products, the country of origin of the product. The exact interpretation of this may vary by context and product type, and cannot be fully enumerated here.',
            'creativeWorkStatus' => 'The status of a creative work in terms of its stage in a lifecycle. Example terms include Incomplete, Draft, Published, Obsolete. Some organizations define a set of terms for the stages of their publication lifecycle.',
            'creator' => 'The creator/author of this CreativeWork. This is the same as the Author property for CreativeWork.',
            'creditText' => 'Text that can be used to credit person(s) and/or organization(s) associated with a published Creative Work.',
            'dateCreated' => 'The date on which the CreativeWork was created or the item was added to a DataFeed.',
            'dateModified' => 'The date on which the CreativeWork was most recently modified or when the item\'s entry was modified within a DataFeed.',
            'datePosted' => 'Publication date of an online listing.',
            'datePublished' => 'Date of first publication or broadcast. For example the date a [[CreativeWork]] was broadcast or a [[Certification]] was issued.',
            'description' => 'A description of the item.',
            'digitalSourceType' => 'Indicates an IPTCDigitalSourceEnumeration code indicating the nature of the digital source(s) for some [[CreativeWork]].',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'discussionUrl' => 'A link to the page containing the comments of the CreativeWork.',
            'diseasePreventionInfo' => 'Information about disease prevention.',
            'diseaseSpreadStatistics' => 'Statistical information about the spread of a disease, either as [[WebContent]], or   described directly as a [[Dataset]], or the specific [[Observation]]s in the dataset. When a [[WebContent]] URL is   provided, the page indicated might also contain more such markup.',
            'editEIDR' => 'An [EIDR](https://eidr.org/) (Entertainment Identifier Registry) [[identifier]] representing a specific edit / edition for a work of film or television.  For example, the motion picture known as "Ghostbusters" whose [[titleEIDR]] is "10.5240/7EC7-228A-510A-053E-CBB8-J" has several edits, e.g. "10.5240/1F2A-E1C5-680A-14C6-E76B-I" and "10.5240/8A35-3BEE-6497-5D12-9E4F-3".  Since schema.org types like [[Movie]] and [[TVEpisode]] can be used for both works and their multiple expressions, it is possible to use [[titleEIDR]] alone (for a general description), or alongside [[editEIDR]] for a more edit-specific description. ',
            'editor' => 'Specifies the Person who edited the CreativeWork.',
            'educationalAlignment' => 'An alignment to an established educational framework.  This property should not be used where the nature of the alignment can be described using a simple property, for example to express that a resource [[teaches]] or [[assesses]] a competency.',
            'educationalLevel' => 'The level in terms of progression through an educational or training context. Examples of educational levels include \'beginner\', \'intermediate\' or \'advanced\', and formal sets of level indicators.',
            'educationalUse' => 'The purpose of a work in the context of education; for example, \'assignment\', \'group work\'.',
            'encoding' => 'A media object that encodes this CreativeWork. This property is a synonym for associatedMedia.',
            'encodingFormat' => 'Media type typically expressed using a MIME format (see [IANA site](http://www.iana.org/assignments/media-types/media-types.xhtml) and [MDN reference](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types)), e.g. application/zip for a SoftwareApplication binary, audio/mpeg for .mp3 etc.  In cases where a [[CreativeWork]] has several media type representations, [[encoding]] can be used to indicate each [[MediaObject]] alongside particular [[encodingFormat]] information.  Unregistered or niche encoding and file formats can be indicated instead via the most appropriate URL, e.g. defining Web page or a Wikipedia/Wikidata entry.',
            'encodings' => 'A media object that encodes this CreativeWork.',
            'exampleOfWork' => 'A creative work that this work is an example/instance/realization/derivation of.',
            'expires' => 'Date the content expires and is no longer useful or available. For example a [[VideoObject]] or [[NewsArticle]] whose availability or relevance is time-limited, a [[ClaimReview]] fact check whose publisher wants to indicate that it may no longer be relevant (or helpful to highlight) after some date, or a [[Certification]] the validity has expired.',
            'fileFormat' => 'Media type, typically MIME format (see [IANA site](http://www.iana.org/assignments/media-types/media-types.xhtml)) of the content, e.g. application/zip of a SoftwareApplication binary. In cases where a CreativeWork has several media type representations, \'encoding\' can be used to indicate each MediaObject alongside particular fileFormat information. Unregistered or niche file formats can be indicated instead via the most appropriate URL, e.g. defining Web page or a Wikipedia entry.',
            'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'genre' => 'Genre of the creative work, broadcast channel or group.',
            'gettingTestedInfo' => 'Information about getting tested (for a [[MedicalCondition]]), e.g. in the context of a pandemic.',
            'governmentBenefitsInfo' => 'governmentBenefitsInfo provides information about government benefits associated with a SpecialAnnouncement.',
            'hasPart' => 'Indicates an item or CreativeWork that is part of this item, or CreativeWork (in some sense).',
            'headline' => 'Headline of the article.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'inLanguage' => 'The language of the content or performance or used in an action. Please use one of the language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47). See also [[availableLanguage]].',
            'interactionStatistic' => 'The number of interactions for the CreativeWork using the WebSite or SoftwareApplication. The most specific child type of InteractionCounter should be used.',
            'interactivityType' => 'The predominant mode of learning supported by the learning resource. Acceptable values are \'active\', \'expositive\', or \'mixed\'.',
            'interpretedAsClaim' => 'Used to indicate a specific claim contained, implied, translated or refined from the content of a [[MediaObject]] or other [[CreativeWork]]. The interpreting party can be indicated using [[claimInterpreter]].',
            'isAccessibleForFree' => 'A flag to signal that the item, event, or place is accessible for free.',
            'isBasedOn' => 'A resource from which this work is derived or from which it is a modification or adaptation.',
            'isBasedOnUrl' => 'A resource that was used in the creation of this resource. This term can be repeated for multiple sources. For example, http://example.com/great-multiplication-intro.html.',
            'isFamilyFriendly' => 'Indicates whether this content is family friendly.',
            'isPartOf' => 'Indicates an item or CreativeWork that this item, or CreativeWork (in some sense), is part of.',
            'keywords' => 'Keywords or tags used to describe some item. Multiple textual entries in a keywords list are typically delimited by commas, or by repeating the property.',
            'learningResourceType' => 'The predominant type or kind characterizing the learning resource. For example, \'presentation\', \'handout\'.',
            'license' => 'A license document that applies to this content, typically indicated by URL.',
            'locationCreated' => 'The location where the CreativeWork was created, which may not be the same as the location depicted in the CreativeWork.',
            'mainEntity' => 'Indicates the primary entity described in some page or other CreativeWork.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'maintainer' => 'A maintainer of a [[Dataset]], software package ([[SoftwareApplication]]), or other [[Project]]. A maintainer is a [[Person]] or [[Organization]] that manages contributions to, and/or publication of, some (typically complex) artifact. It is common for distributions of software and data to be based on "upstream" sources. When [[maintainer]] is applied to a specific version of something e.g. a particular version or packaging of a [[Dataset]], it is always  possible that the upstream source has a different maintainer. The [[isBasedOn]] property can be used to indicate such relationships between datasets to make the different maintenance roles clear. Similarly in the case of software, a package may have dedicated maintainers working on integration into software distributions such as Ubuntu, as well as upstream maintainers of the underlying work.       ',
            'material' => 'A material that something is made from, e.g. leather, wool, cotton, paper.',
            'materialExtent' => 'The quantity of the materials being described or an expression of the physical space they occupy.',
            'mentions' => 'Indicates that the CreativeWork contains a reference to, but is not necessarily about a concept.',
            'name' => 'The name of the item.',
            'newsUpdatesAndGuidelines' => 'Indicates a page with news updates and guidelines. This could often be (but is not required to be) the main page containing [[SpecialAnnouncement]] markup on a site.',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use [[businessFunction]] to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a [[Demand]]. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer.       ',
            'pattern' => 'A pattern that something has, for example \'polka dot\', \'striped\', \'Canadian flag\'. Values are typically expressed as text, although links to controlled value schemes are also supported.',
            'position' => 'The position of an item in a series or sequence of items.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'producer' => 'The person or organization who produced the work (e.g. music album, movie, TV/radio series etc.).',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
            'publicTransportClosuresInfo' => 'Information about public transport closures.',
            'publication' => 'A publication event associated with the item.',
            'publisher' => 'The publisher of the creative work.',
            'publisherImprint' => 'The publishing division which published the comic.',
            'publishingPrinciples' => 'The publishingPrinciples property indicates (typically via [[URL]]) a document describing the editorial principles of an [[Organization]] (or individual, e.g. a [[Person]] writing a blog) that relate to their activities as a publisher, e.g. ethics or diversity policies. When applied to a [[CreativeWork]] (e.g. [[NewsArticle]]) the principles are those of the party primarily responsible for the creation of the [[CreativeWork]].  While such policies are most typically expressed in natural language, sometimes related information (e.g. indicating a [[funder]]) can be expressed using schema.org terminology. ',
            'quarantineGuidelines' => 'Guidelines about quarantine rules, e.g. in the context of a pandemic.',
            'recordedAt' => 'The Event where the CreativeWork was recorded. The CreativeWork may capture all or part of the event.',
            'releasedEvent' => 'The place and time the release was issued, expressed as a PublicationEvent.',
            'review' => 'A review of the item.',
            'reviews' => 'Review of the item.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'schemaVersion' => 'Indicates (by URL or string) a particular version of a schema used in some CreativeWork. This property was created primarily to     indicate the use of a specific schema.org release, e.g. ```10.0``` as a simple string, or more explicitly via URL, ```https://schema.org/docs/releases.html#v10.0```. There may be situations in which other schemas might usefully be referenced this way, e.g. ```http://dublincore.org/specifications/dublin-core/dces/1999-07-02/``` but this has not been carefully explored in the community.',
            'schoolClosuresInfo' => 'Information about school closures.',
            'sdDatePublished' => 'Indicates the date on which the current structured data was generated / published. Typically used alongside [[sdPublisher]].',
            'sdLicense' => 'A license document that applies to this structured data, typically indicated by URL.',
            'sdPublisher' => 'Indicates the party responsible for generating and publishing the current structured data markup, typically in cases where the structured data is derived automatically from existing published content but published on a different site. For example, student projects and open data initiatives often re-publish existing content with more explicitly structured metadata. The [[sdPublisher]] property helps make such practices more explicit.',
            'size' => 'A standardized size of a product or creative work, specified either through a simple textual string (for example \'XL\', \'32Wx34L\'), a  QuantitativeValue with a unitCode, or a comprehensive and structured [[SizeSpecification]]; in other cases, the [[width]], [[height]], [[depth]] and [[weight]] properties may be more applicable. ',
            'sourceOrganization' => 'The Organization on whose behalf the creator was working.',
            'spatial' => 'The "spatial" property can be used in cases when more specific properties (e.g. [[locationCreated]], [[spatialCoverage]], [[contentLocation]]) are not known to be appropriate.',
            'spatialCoverage' => 'The spatialCoverage of a CreativeWork indicates the place(s) which are the focus of the content. It is a subproperty of       contentLocation intended primarily for more technical and detailed materials. For example with a Dataset, it indicates       areas that the dataset describes: a dataset of New York weather would have spatialCoverage which was the place: the state of New York.',
            'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. E.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'teaches' => 'The item being described is intended to help a person learn the competency or learning outcome defined by the referenced term.',
            'temporal' => 'The "temporal" property can be used in cases where more specific properties (e.g. [[temporalCoverage]], [[dateCreated]], [[dateModified]], [[datePublished]]) are not known to be appropriate.',
            'temporalCoverage' => 'The temporalCoverage of a CreativeWork indicates the period that the content applies to, i.e. that it describes, either as a DateTime or as a textual string indicating a time period in [ISO 8601 time interval format](https://en.wikipedia.org/wiki/ISO_8601#Time_intervals). In       the case of a Dataset it will typically indicate the relevant time period in a precise notation (e.g. for a 2011 census dataset, the year 2011 would be written "2011/2012"). Other forms of content, e.g. ScholarlyArticle, Book, TVSeries or TVEpisode, may indicate their temporalCoverage in broader terms - textually or via well-known URL.       Written works such as books may sometimes have precise temporal coverage too, e.g. a work set in 1939 - 1945 can be indicated in ISO 8601 interval format format via "1939/1945".  Open-ended date ranges can be written with ".." in place of the end date. For example, "2015-11/.." indicates a range beginning in November 2015 and with no specified final date. This is tentative and might be updated in future when ISO 8601 is officially updated.',
            'text' => 'The textual content of this CreativeWork.',
            'thumbnail' => 'Thumbnail image for an image or video.',
            'thumbnailUrl' => 'A thumbnail image relevant to the Thing.',
            'timeRequired' => 'Approximate or typical time it usually takes to work with or through the content of this work for the typical or target audience.',
            'translationOfWork' => 'The work that this work has been translated from. E.g. 物种起源 is a translationOf “On the Origin of Species”.',
            'translator' => 'Organization or person who adapts a creative work to different languages, regional differences and technical requirements of a target market, or that translates during some event.',
            'travelBans' => 'Information about travel bans, e.g. in the context of a pandemic.',
            'typicalAgeRange' => 'The typical expected age range, e.g. \'7-9\', \'11-\'.',
            'url' => 'URL of the item.',
            'usageInfo' => 'The schema.org [[usageInfo]] property indicates further information about a [[CreativeWork]]. This property is applicable both to works that are freely available and to those that require payment or other transactions. It can reference additional information, e.g. community expectations on preferred linking and citation conventions, as well as purchasing details. For something that can be commercially licensed, usageInfo can provide detailed, resource-specific information about licensing options.  This property can be used alongside the license property which indicates license(s) applicable to some piece of content. The usageInfo property can provide information about other licensing options, e.g. acquiring commercial usage rights for an image that is also available under non-commercial creative commons licenses.',
            'version' => 'The version of the CreativeWork embodied by a specified resource.',
            'video' => 'An embedded video object.',
            'webFeed' => 'The URL for a feed, e.g. associated with a podcast series, blog, or series of date-stamped updates. This is usually RSS or Atom.',
            'workExample' => 'Example/instance/realization/derivation of the concept of this creative work. E.g. the paperback edition, first edition, or e-book.',
            'workTranslation' => 'A work that is a translation of the content of this work. E.g. 西遊記 has an English workTranslation “Journey to the West”, a German workTranslation “Monkeys Pilgerfahrt” and a Vietnamese  translation Tây du ký bình khảo.',
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
