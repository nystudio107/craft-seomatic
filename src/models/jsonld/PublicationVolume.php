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
 * PublicationVolume - A part of a successively published publication such as
 * a periodical or multi-volume work, often numbered. It may represent a time
 * span, such as a year. <br/><br/>See also <a
 * href="http://blog.schema.org/2014/09/schemaorg-support-for-bibliographic_2.html">blog
 * post</a>.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/PublicationVolume
 */
class PublicationVolume extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'PublicationVolume';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/PublicationVolume';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A part of a successively published publication such as a periodical or multi-volume work, often numbered. It may represent a time span, such as a year. <br/><br/>See also <a href="http://blog.schema.org/2014/09/schemaorg-support-for-bibliographic_2.html">blog post</a>.';

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
     * The page on which the work ends; for example "138" or "xvi".
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $pageEnd;

    /**
     * The page on which the work starts; for example "135" or "xiii".
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $pageStart;

    /**
     * Any description of pages that is not separated into pageStart and pageEnd;
     * for example, "1-6, 9, 55" or "10-12, 46-49".
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $pagination;

    /**
     * Identifies the volume of publication or multi-part work; for example, "iii"
     * or "2".
     *
     * @var mixed|int|string [schema.org types: Integer, Text]
     */
    public $volumeNumber;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'pageEnd',
        'pageStart',
        'pagination',
        'volumeNumber'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'pageEnd' => ['Integer','Text'],
        'pageStart' => ['Integer','Text'],
        'pagination' => ['Text'],
        'volumeNumber' => ['Integer','Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'pageEnd' => 'The page on which the work ends; for example "138" or "xvi".',
        'pageStart' => 'The page on which the work starts; for example "135" or "xiii".',
        'pagination' => 'Any description of pages that is not separated into pageStart and pageEnd; for example, "1-6, 9, 55" or "10-12, 46-49".',
        'volumeNumber' => 'Identifies the volume of publication or multi-part work; for example, "iii" or "2".'
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
            [['pageEnd','pageStart','pagination','volumeNumber'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
