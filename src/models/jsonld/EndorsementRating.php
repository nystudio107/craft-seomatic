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

use nystudio107\seomatic\models\jsonld\Rating;

/**
 * EndorsementRating - An EndorsementRating is a rating that expresses some
 * level of endorsement, for example inclusion in a "critic's pick" blog, a
 * "Like" or "+1" on a social network. It can be considered the result of an
 * EndorseAction in which the object of the action is rated positively by some
 * agent. As is common elsewhere in schema.org, it is sometimes more useful to
 * describe the results of such an action without explicitly describing the
 * Action. An EndorsementRating may be part of a numeric scale or organized
 * system, but this is not required: having an explicit type for indicating a
 * positive, endorsement rating is particularly useful in the absence of
 * numeric scales as it helps consumers understand that the rating is broadly
 * positive.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/EndorsementRating
 */
class EndorsementRating extends Rating
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'EndorsementRating';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/EndorsementRating';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An EndorsementRating is a rating that expresses some level of endorsement, for example inclusion in a "critic\'s pick" blog, a "Like" or "+1" on a social network. It can be considered the result of an EndorseAction in which the object of the action is rated positively by some agent. As is common elsewhere in schema.org, it is sometimes more useful to describe the results of such an action without explicitly describing the Action. An EndorsementRating may be part of a numeric scale or organized system, but this is not required: having an explicit type for indicating a positive, endorsement rating is particularly useful in the absence of numeric scales as it helps consumers understand that the rating is broadly positive.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Rating';

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
     * The author of this content or rating. Please note that author is special in
     * that HTML 5 provides a special mechanism for indicating authorship via the
     * rel tag. That is equivalent to this and may be used interchangeably.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $author;

    /**
     * The highest value allowed in this rating system. If bestRating is omitted,
     * 5 is assumed.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $bestRating;

    /**
     * The rating for the content. Usage guidelines:Use values from 0123456789
     * (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather than
     * superficially similiar Unicode symbols. Use '.' (Unicode 'FULL STOP'
     * (U+002E)) rather than ',' to indicate a decimal point. Avoid using these
     * symbols as a readability separator.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $ratingValue;

    /**
     * This Review or Rating is relevant to this part or facet of the
     * itemReviewed.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $reviewAspect;

    /**
     * The lowest value allowed in this rating system. If worstRating is omitted,
     * 1 is assumed.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $worstRating;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'author',
        'bestRating',
        'ratingValue',
        'reviewAspect',
        'worstRating'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'author' => ['Organization','Person'],
        'bestRating' => ['Number','Text'],
        'ratingValue' => ['Number','Text'],
        'reviewAspect' => ['Text'],
        'worstRating' => ['Number','Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'author' => 'The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.',
        'bestRating' => 'The highest value allowed in this rating system. If bestRating is omitted, 5 is assumed.',
        'ratingValue' => 'The rating for the content. Usage guidelines:Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similiar Unicode symbols. Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.',
        'reviewAspect' => 'This Review or Rating is relevant to this part or facet of the itemReviewed.',
        'worstRating' => 'The lowest value allowed in this rating system. If worstRating is omitted, 1 is assumed.'
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
            [['author','bestRating','ratingValue','reviewAspect','worstRating'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
