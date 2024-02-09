<?php

/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2023 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v15.0-release
 * EndorsementRating - An EndorsementRating is a rating that expresses some level of endorsement,
 * for example inclusion in a "critic's pick" blog, a "Like" or "+1" on a
 * social network. It can be considered the [[result]] of an [[EndorseAction]]
 * in which the [[object]] of the action is rated positively by some
 * [[agent]]. As is common elsewhere in schema.org, it is sometimes more
 * useful to describe the results of such an action without explicitly
 * describing the [[Action]].  An [[EndorsementRating]] may be part of a
 * numeric scale or organized system, but this is not required: having an
 * explicit type for indicating a positive, endorsement rating is particularly
 * useful in the absence of numeric scales as it helps consumers understand
 * that the rating is broadly positive.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/EndorsementRating
 */
class EndorsementRating extends MetaJsonLd implements EndorsementRatingInterface, RatingInterface, IntangibleInterface, ThingInterface
{
    use EndorsementRatingTrait;
    use RatingTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'EndorsementRating';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/EndorsementRating';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'Rating';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = "An EndorsementRating is a rating that expresses some level of endorsement, for example inclusion in a \"critic's pick\" blog, a\n\"Like\" or \"+1\" on a social network. It can be considered the [[result]] of an [[EndorseAction]] in which the [[object]] of the action is rated positively by\nsome [[agent]]. As is common elsewhere in schema.org, it is sometimes more useful to describe the results of such an action without explicitly describing the [[Action]].\n\nAn [[EndorsementRating]] may be part of a numeric scale or organized system, but this is not required: having an explicit type for indicating a positive,\nendorsement rating is particularly useful in the absence of numeric scales as it helps consumers understand that the rating is broadly positive.";


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
            'author' => ['Organization', 'Person'],
            'bestRating' => ['Text', 'Number'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'identifier' => ['PropertyValue', 'URL', 'Text'],
            'image' => ['URL', 'ImageObject'],
            'mainEntityOfPage' => ['URL', 'CreativeWork'],
            'name' => ['Text'],
            'potentialAction' => ['Action'],
            'ratingExplanation' => ['Text'],
            'ratingValue' => ['Number', 'Text'],
            'reviewAspect' => ['Text'],
            'sameAs' => ['URL'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'url' => ['URL'],
            'worstRating' => ['Text', 'Number'],
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
            'author' => 'The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.',
            'bestRating' => 'The highest value allowed in this rating system. If bestRating is omitted, 5 is assumed.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'name' => 'The name of the item.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'ratingExplanation' => 'A short explanation (e.g. one to two sentences) providing background context and other information that led to the conclusion expressed in the rating. This is particularly applicable to ratings associated with "fact check" markup using [[ClaimReview]].',
            'ratingValue' => 'The rating for the content.  Usage guidelines:  * Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similar Unicode symbols. * Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.',
            'reviewAspect' => 'This Review or Rating is relevant to this part or facet of the itemReviewed.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'url' => 'URL of the item.',
            'worstRating' => 'The lowest value allowed in this rating system. If worstRating is omitted, 1 is assumed.',
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
