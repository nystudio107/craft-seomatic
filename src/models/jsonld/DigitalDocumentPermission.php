<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * DigitalDocumentPermission - A permission for a particular person or group
 * to access a particular file.
 * Extends: Intangible
 * @see    http://schema.org/DigitalDocumentPermission
 */
class DigitalDocumentPermission extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'DigitalDocumentPermission';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/DigitalDocumentPermission';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A permission for a particular person or group to access a particular file.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Intangible';

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
     * The person, organization, contact point, or audience that has been granted
     * this permission.
     * @var mixed Audience, ContactPoint, Organization, Person [schema.org types: Audience, ContactPoint, Organization, Person]
     */
    public $grantee;

    /**
     * The type of permission granted the person, organization, or audience.
     * @var mixed DigitalDocumentPermissionType [schema.org types: DigitalDocumentPermissionType]
     */
    public $permissionType;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'grantee',
                'permissionType',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'grantee' => ['Audience','ContactPoint','Organization','Person'],
                'permissionType' => ['DigitalDocumentPermissionType'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'grantee' => 'The person, organization, contact point, or audience that has been granted this permission.',
                'permissionType' => 'The type of permission granted the person, organization, or audience.',
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
                [['grantee','permissionType',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class DigitalDocumentPermission*/
