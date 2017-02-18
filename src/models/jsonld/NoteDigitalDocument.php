<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\DigitalDocument;

/**
 * NoteDigitalDocument - A file containing a note, primarily for the author.
 * Extends: DigitalDocument
 * @see    http://schema.org/NoteDigitalDocument
 */
class NoteDigitalDocument extends DigitalDocument
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'NoteDigitalDocument';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/NoteDigitalDocument';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A file containing a note, primarily for the author.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'DigitalDocument';

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
     * A permission related to the access to this document (e.g. permission to
     * read or write an electronic document). For a public document, specify a
     * grantee with an Audience with audienceType equal to "public".
     * @var DigitalDocumentPermission [schema.org types: DigitalDocumentPermission]
     */
    public $hasDigitalDocumentPermission;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'hasDigitalDocumentPermission',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'hasDigitalDocumentPermission' => ['DigitalDocumentPermission'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'hasDigitalDocumentPermission' => 'A permission related to the access to this document (e.g. permission to read or write an electronic document). For a public document, specify a grantee with an Audience with audienceType equal to "public".',
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
                [['hasDigitalDocumentPermission',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class NoteDigitalDocument*/
