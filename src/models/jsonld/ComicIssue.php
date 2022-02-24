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

use nystudio107\seomatic\models\jsonld\PublicationIssue;

/**
 * ComicIssue - Individual comic issues are serially published as part of a
 * larger series. For the sake of consistency, even one-shot issues belong to
 * a series comprised of a single issue. All comic issues can be uniquely
 * identified by: the combination of the name and volume number of the series
 * to which the issue belongs; the issue number; and the variant description
 * of the issue (if any).
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/ComicIssue
 */
class ComicIssue extends PublicationIssue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ComicIssue';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ComicIssue';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Individual comic issues are serially published as part of a larger series. For the sake of consistency, even one-shot issues belong to a series comprised of a single issue. All comic issues can be uniquely identified by: the combination of the name and volume number of the series to which the issue belongs; the issue number; and the variant description of the issue (if any).';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'PublicationIssue';

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
        'artist',
        'colorist',
        'inker',
        'letterer',
        'penciler',
        'variantCover'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'artist' => ['Person'],
        'colorist' => ['Person'],
        'inker' => ['Person'],
        'letterer' => ['Person'],
        'penciler' => ['Person'],
        'variantCover' => ['Text']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'artist' => 'The primary artist for a work in a medium other than pencils or digital line art--for example, if the primary artwork is done in watercolors or digital paints.',
        'colorist' => 'The individual who adds color to inked drawings.',
        'inker' => 'The individual who traces over the pencil drawings in ink after pencils are complete.',
        'letterer' => 'The individual who adds lettering, including speech balloons and sound effects, to artwork.',
        'penciler' => 'The individual who draws the primary narrative artwork.',
        'variantCover' => 'A description of the variant cover for the issue, if the issue is a variant printing. For example, "Bryan Hitch Variant Cover" or "2nd Printing Variant".'
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
     * The primary artist for a work in a medium other than pencils or digital
     * line art--for example, if the primary artwork is done in watercolors or
     * digital paints.
     *
     * @var Person [schema.org types: Person]
     */
    public $artist;

    // Static Protected Properties
    // =========================================================================
    /**
     * The individual who adds color to inked drawings.
     *
     * @var Person [schema.org types: Person]
     */
    public $colorist;
    /**
     * The individual who traces over the pencil drawings in ink after pencils are
     * complete.
     *
     * @var Person [schema.org types: Person]
     */
    public $inker;
    /**
     * The individual who adds lettering, including speech balloons and sound
     * effects, to artwork.
     *
     * @var Person [schema.org types: Person]
     */
    public $letterer;
    /**
     * The individual who draws the primary narrative artwork.
     *
     * @var Person [schema.org types: Person]
     */
    public $penciler;
    /**
     * A description of the variant cover for the issue, if the issue is a variant
     * printing. For example, "Bryan Hitch Variant Cover" or "2nd Printing
     * Variant".
     *
     * @var string [schema.org types: Text]
     */
    public $variantCover;

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
            [['artist', 'colorist', 'inker', 'letterer', 'penciler', 'variantCover'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
