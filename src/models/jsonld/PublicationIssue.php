<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * PublicationIssue - A part of a successively published publication such as a
 * periodical or publication volume, often numbered, usually containing a
 * grouping of works such as articles. blog post.
 * Extends: CreativeWork
 * @see    http://schema.org/PublicationIssue
 */
class PublicationIssue extends CreativeWork
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'PublicationIssue';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/PublicationIssue';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A part of a successively published publication such as a periodical or publication volume, often numbered, usually containing a grouping of works such as articles. blog post.';

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
     * Identifies the issue of publication; for example, "iii" or "2".
     * @var mixed int, string [schema.org types: Integer, Text]
     */
    public $issueNumber;

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

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'issueNumber',
                'pageEnd',
                'pageStart',
                'pagination',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'issueNumber' => ['Integer','Text'],
                'pageEnd' => ['Integer','Text'],
                'pageStart' => ['Integer','Text'],
                'pagination' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'issueNumber' => 'Identifies the issue of publication; for example, "iii" or "2".',
                'pageEnd' => 'The page on which the work ends; for example "138" or "xvi".',
                'pageStart' => 'The page on which the work starts; for example "135" or "xiii".',
                'pagination' => 'Any description of pages that is not separated into pageStart and pageEnd; for example, "1-6, 9, 55" or "10-12, 46-49".',
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
                [['issueNumber','pageEnd','pageStart','pagination',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class PublicationIssue*/
