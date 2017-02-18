<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\CreativeWorkSeries;

/**
 * Periodical - A publication in any medium issued in successive parts bearing
 * numerical or chronological designations and intended, such as a magazine,
 * scholarly journal, or newspaper to continue indefinitely. See also blog
 * post.
 * Extends: CreativeWorkSeries
 * @see    http://schema.org/Periodical
 */
class Periodical extends CreativeWorkSeries
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Periodical';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Periodical';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A publication in any medium issued in successive parts bearing numerical or chronological designations and intended, such as a magazine, scholarly journal, or newspaper to continue indefinitely. See also blog post.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'CreativeWorkSeries';

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
     * The International Standard Serial Number (ISSN) that identifies this
     * periodical. You can repeat this property to (for example) identify
     * different formats of this periodical.
     * @var string [schema.org types: Text]
     */
    public $issn;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'issn',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'issn' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'issn' => 'The International Standard Serial Number (ISSN) that identifies this periodical. You can repeat this property to (for example) identify different formats of this periodical.',
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
                [['issn',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Periodical*/
