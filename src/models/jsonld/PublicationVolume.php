<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * PublicationVolume - A part of a successively published publication such as
 * a periodical or multi-volume work, often numbered. It may represent a time
 * span, such as a year. <br/><br/>See also <a
 * href="http://blog.schema.org/2014/09/schemaorg-support-for-bibliographic_2.html">blog
 * post</a>.
 * Extends: CreativeWork
 * @see    http://schema.org/PublicationVolume
 */
class PublicationVolume extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'PublicationVolume';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/PublicationVolume';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A part of a successively published publication such as a periodical or multi-volume work, often numbered. It may represent a time span, such as a year. <br/><br/>See also <a href="http://blog.schema.org/2014/09/schemaorg-support-for-bibliographic_2.html">blog post</a>.';

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
     * The page on which the work ends; for example "138" or "xvi".
     * @var mixed int, string [schema.org types: Integer, Text]
     */
    public $pageEnd;

    /**
     * The page on which the work starts; for example "135" or "xiii".
     * @var mixed int, string [schema.org types: Integer, Text]
     */
    public $pageStart;

    /**
     * Any description of pages that is not separated into pageStart and pageEnd;
     * for example, "1-6, 9, 55" or "10-12, 46-49".
     * @var mixed string [schema.org types: Text]
     */
    public $pagination;

    /**
     * Identifies the volume of publication or multi-part work; for example, "iii"
     * or "2".
     * @var mixed int, string [schema.org types: Integer, Text]
     */
    public $volumeNumber;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'pageEnd',
                'pageStart',
                'pagination',
                'volumeNumber',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'pageEnd' => ['Integer','Text'],
                'pageStart' => ['Integer','Text'],
                'pagination' => ['Text'],
                'volumeNumber' => ['Integer','Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'pageEnd' => 'The page on which the work ends; for example "138" or "xvi".',
                'pageStart' => 'The page on which the work starts; for example "135" or "xiii".',
                'pagination' => 'Any description of pages that is not separated into pageStart and pageEnd; for example, "1-6, 9, 55" or "10-12, 46-49".',
                'volumeNumber' => 'Identifies the volume of publication or multi-part work; for example, "iii" or "2".',
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
                [['pageEnd','pageStart','pagination','volumeNumber',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class PublicationVolume*/
