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

/**
 * schema.org version: v14.0-release
 * Trait for Thing.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Thing
 */

trait ThingTrait
{
    
    /**
     * Indicates a page (or other CreativeWork) for which this thing is the main
     * entity being described. See [background
     * notes](/docs/datamodel.html#mainEntityBackground) for details.
     *
     * @var CreativeWork|URL
     */
    public $mainEntityOfPage;

    /**
     * An alias for the item.
     *
     * @var string|Text
     */
    public $alternateName;

    /**
     * The name of the item.
     *
     * @var string|Text
     */
    public $name;

    /**
     * Indicates a potential Action, which describes an idealized action in which
     * this thing would play an 'object' role.
     *
     * @var Action
     */
    public $potentialAction;

    /**
     * An image of the item. This can be a [[URL]] or a fully described
     * [[ImageObject]].
     *
     * @var URL|ImageObject
     */
    public $image;

    /**
     * URL of the item.
     *
     * @var URL
     */
    public $url;

    /**
     * A description of the item.
     *
     * @var string|Text
     */
    public $description;

    /**
     * A CreativeWork or Event about this Thing.
     *
     * @var Event|CreativeWork
     */
    public $subjectOf;

    /**
     * An additional type for the item, typically used for adding more specific
     * types from external vocabularies in microdata syntax. This is a
     * relationship between something and a class that the thing is in. In RDFa
     * syntax, it is better to use the native RDFa syntax - the 'typeof' attribute
     * - for multiple types. Schema.org tools may have only weaker understanding
     * of extra types, in particular those defined externally.
     *
     * @var URL
     */
    public $additionalType;

    /**
     * A sub property of description. A short description of the item used to
     * disambiguate from other, similar items. Information from other properties
     * (in particular, name) may be necessary for the description to be useful for
     * disambiguation.
     *
     * @var string|Text
     */
    public $disambiguatingDescription;

    /**
     * URL of a reference Web page that unambiguously indicates the item's
     * identity. E.g. the URL of the item's Wikipedia page, Wikidata entry, or
     * official website.
     *
     * @var URL
     */
    public $sameAs;

    /**
     * The identifier property represents any kind of identifier for any kind of
     * [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides
     * dedicated properties for representing many of these, either as textual
     * strings or as URL (URI) links. See [background
     * notes](/docs/datamodel.html#identifierBg) for more details.         
     *
     * @var string|URL|Text|PropertyValue
     */
    public $identifier;

}
