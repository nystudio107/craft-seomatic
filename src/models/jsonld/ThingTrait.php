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
 * Trait for Thing.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Thing
 */
trait ThingTrait
{
    /**
     * The name of the item.
     *
     * @var string|array|Text|Text[]
     */
    public $name;

    /**
     * A description of the item.
     *
     * @var string|array|TextObject|TextObject[]|array|Text|Text[]
     */
    public $description;

    /**
     * A CreativeWork or Event about this Thing.
     *
     * @var array|CreativeWork|CreativeWork[]|array|Event|Event[]
     */
    public $subjectOf;

    /**
     * URL of the item.
     *
     * @var array|URL|URL[]
     */
    public $url;

    /**
     * The identifier property represents any kind of identifier for any kind of
     * [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides
     * dedicated properties for representing many of these, either as textual
     * strings or as URL (URI) links. See [background
     * notes](/docs/datamodel.html#identifierBg) for more details.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]|array|PropertyValue|PropertyValue[]
     */
    public $identifier;

    /**
     * An image of the item. This can be a [[URL]] or a fully described
     * [[ImageObject]].
     *
     * @var array|ImageObject|ImageObject[]|array|URL|URL[]
     */
    public $image;

    /**
     * An additional type for the item, typically used for adding more specific
     * types from external vocabularies in microdata syntax. This is a
     * relationship between something and a class that the thing is in. Typically
     * the value is a URI-identified RDF class, and in this case corresponds to
     * the     use of rdf:type in RDF. Text values can be used sparingly, for
     * cases where useful information can be added without their being an
     * appropriate schema to reference. In the case of text values, the class
     * label should follow the schema.org <a
     * href="https://schema.org/docs/styleguide.html">style guide</a>.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $additionalType;

    /**
     * Indicates a potential Action, which describes an idealized action in which
     * this thing would play an 'object' role.
     *
     * @var array|Action|Action[]
     */
    public $potentialAction;

    /**
     * An alias for the item.
     *
     * @var string|array|Text|Text[]
     */
    public $alternateName;

    /**
     * A sub property of description. A short description of the item used to
     * disambiguate from other, similar items. Information from other properties
     * (in particular, name) may be necessary for the description to be useful for
     * disambiguation.
     *
     * @var string|array|Text|Text[]
     */
    public $disambiguatingDescription;

    /**
     * URL of a reference Web page that unambiguously indicates the item's
     * identity. E.g. the URL of the item's Wikipedia page, Wikidata entry, or
     * official website.
     *
     * @var array|URL|URL[]
     */
    public $sameAs;

    /**
     * Indicates a page (or other CreativeWork) for which this thing is the main
     * entity being described. See [background
     * notes](/docs/datamodel.html#mainEntityBackground) for details.
     *
     * @var array|URL|URL[]|array|CreativeWork|CreativeWork[]
     */
    public $mainEntityOfPage;
}
