<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * WebSite - A WebSite is a set of related web pages and other items typically
 * served from a single web domain and accessible via URLs.
 * Extends: CreativeWork
 * @see    http://schema.org/WebSite
 */
class WebSite extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'WebSite';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/WebSite';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A WebSite is a set of related web pages and other items typically served from a single web domain and accessible via URLs.';

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
     * The subject matter of the content.
     * @var Thing [schema.org types: Thing]
     */
    public $about;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     * @var AggregateRating [schema.org types: AggregateRating]
     */
    public $aggregateRating;

    /**
     * An intended audience, i.e. a group for whom something was created.
     * Supersedes serviceAudience.
     * @var Audience [schema.org types: Audience]
     */
    public $audience;

    /**
     * An award won by or for this item. Supersedes awards.
     * @var string [schema.org types: Text]
     */
    public $award;

    /**
     * Indicates a CreativeWork that is (in some sense) a part of this
     * CreativeWork. Inverse property: isPartOf.
     * @var CreativeWork [schema.org types: CreativeWork]
     */
    public $hasPart;

    /**
     * A resource that was used in the creation of this resource. This term can be
     * repeated for multiple sources. For example,
     * http://example.com/great-multiplication-intro.html. Supersedes
     * isBasedOnUrl.
     * @var mixed CreativeWork, Product, string [schema.org types: CreativeWork, Product, URL]
     */
    public $isBasedOn;

    /**
     * Indicates a CreativeWork that this CreativeWork is (in some sense) part of.
     * Inverse property: hasPart.
     * @var mixed CreativeWork [schema.org types: CreativeWork]
     */
    public $isPartOf;

    /**
     * Indicates the primary entity described in some page or other CreativeWork.
     * Inverse property: mainEntityOfPage.
     * @var mixed Thing [schema.org types: Thing]
     */
    public $mainEntity;

    /**
     * Indicates that the CreativeWork contains a reference to, but is not
     * necessarily about a concept.
     * @var mixed Thing [schema.org types: Thing]
     */
    public $mentions;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event.
     * @var mixed Offer [schema.org types: Offer]
     */
    public $offers;

    /**
     * A review of the item. Supersedes reviews.
     * @var mixed Review [schema.org types: Review]
     */
    public $review;

    /**
     * Organization or person who adapts a creative work to different languages,
     * regional differences and technical requirements of a target market, or that
     * translates during some event.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $translator;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'about',
                'aggregateRating',
                'audience',
                'award',
                'hasPart',
                'isBasedOn',
                'isPartOf',
                'mainEntity',
                'mentions',
                'offers',
                'review',
                'translator',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'about' => ['Thing'],
                'aggregateRating' => ['AggregateRating'],
                'audience' => ['Audience'],
                'award' => ['Text'],
                'hasPart' => ['CreativeWork'],
                'isBasedOn' => ['CreativeWork','Product','URL'],
                'isPartOf' => ['CreativeWork'],
                'mainEntity' => ['Thing'],
                'mentions' => ['Thing'],
                'offers' => ['Offer'],
                'review' => ['Review'],
                'translator' => ['Organization','Person'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'about' => 'The subject matter of the content.',
                'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
                'audience' => 'An intended audience, i.e. a group for whom something was created. Supersedes serviceAudience.',
                'award' => 'An award won by or for this item. Supersedes awards.',
                'hasPart' => 'Indicates a CreativeWork that is (in some sense) a part of this CreativeWork. Inverse property: isPartOf.',
                'isBasedOn' => 'A resource that was used in the creation of this resource. This term can be repeated for multiple sources. For example, http://example.com/great-multiplication-intro.html. Supersedes isBasedOnUrl.',
                'isPartOf' => 'Indicates a CreativeWork that this CreativeWork is (in some sense) part of. Inverse property: hasPart.',
                'mainEntity' => 'Indicates the primary entity described in some page or other CreativeWork. Inverse property: mainEntityOfPage.',
                'mentions' => 'Indicates that the CreativeWork contains a reference to, but is not necessarily about a concept.',
                'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.',
                'review' => 'A review of the item. Supersedes reviews.',
                'translator' => 'Organization or person who adapts a creative work to different languages, regional differences and technical requirements of a target market, or that translates during some event.',
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
                [['about','aggregateRating','audience','award','hasPart','isBasedOn','isPartOf','mainEntity','mentions','offers','review','translator',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class WebSite*/
