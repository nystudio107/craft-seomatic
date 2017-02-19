<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * ProgramMembership - Used to describe membership in a loyalty programs (e.g.
 * "StarAliance"), traveler clubs (e.g. "AAA"), purchase clubs ("Safeway
 * Club"), etc.
 *
 * Extends: Intangible
 * @see    http://schema.org/ProgramMembership
 */
class ProgramMembership extends Intangible
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'ProgramMembership';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/ProgramMembership';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'Used to describe membership in a loyalty programs (e.g. "StarAliance"), traveler clubs (e.g. "AAA"), purchase clubs ("Safeway Club"), etc.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The organization (airline, travelers' club, etc.) the membership is made
     * with.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $hostingOrganization;

    /**
     * A member of an Organization or a ProgramMembership. Organizations can be
     * members of organizations; ProgramMembership is typically for individuals.
     * Supersedes members, musicGroupMember. Inverse property: memberOf.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $member;

    /**
     * A unique identifier for the membership.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $membershipNumber;

    /**
     * The program providing the membership.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $programName;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'hostingOrganization',
            'member',
            'membershipNumber',
            'programName',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'hostingOrganization' => ['Organization'],
            'member' => ['Organization','Person'],
            'membershipNumber' => ['Text'],
            'programName' => ['Text'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'hostingOrganization' => 'The organization (airline, travelers\' club, etc.) the membership is made with.',
            'member' => 'A member of an Organization or a ProgramMembership. Organizations can be members of organizations; ProgramMembership is typically for individuals. Supersedes members, musicGroupMember. Inverse property: memberOf.',
            'membershipNumber' => 'A unique identifier for the membership.',
            'programName' => 'The program providing the membership.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['hostingOrganization','member','membershipNumber','programName',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
