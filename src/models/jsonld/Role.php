<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * Role - Represents additional information about a relationship or property.
 * For example a Role can be used to say that a 'member' role linking some
 * SportsTeam to a player occurred during a particular time period. Or that a
 * Person's 'actor' role in a Movie was for some particular characterName.
 * Such properties can be attached to a Role entity, which is then associated
 * with the main entities using ordinary properties like 'member' or 'actor'.
 * See also blog post.
 * Extends: Intangible
 * @see    http://schema.org/Role
 */
class Role extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'Role';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/Role';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Represents additional information about a relationship or property. For example a Role can be used to say that a \'member\' role linking some SportsTeam to a player occurred during a particular time period. Or that a Person\'s \'actor\' role in a Movie was for some particular characterName. Such properties can be attached to a Role entity, which is then associated with the main entities using ordinary properties like \'member\' or \'actor\'. See also blog post.';

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
     * The end date and time of the item (in ISO 8601 date format).
     * @var mixed Date, DateTime [schema.org types: Date, DateTime]
     */
    public $endDate;

    /**
     * A role played, performed or filled by a person or organization. For
     * example, the team of creators for a comic book might fill the roles named
     * 'inker', 'penciller', and 'letterer'; or an athlete in a SportsTeam might
     * play in the position named 'Quarterback'. Supersedes namedPosition.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $roleName;

    /**
     * The start date and time of the item (in ISO 8601 date format).
     * @var mixed Date, DateTime [schema.org types: Date, DateTime]
     */
    public $startDate;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'endDate',
                'roleName',
                'startDate',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'endDate' => ['Date','DateTime'],
                'roleName' => ['Text','URL'],
                'startDate' => ['Date','DateTime'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'endDate' => 'The end date and time of the item (in ISO 8601 date format).',
                'roleName' => 'A role played, performed or filled by a person or organization. For example, the team of creators for a comic book might fill the roles named \'inker\', \'penciller\', and \'letterer\'; or an athlete in a SportsTeam might play in the position named \'Quarterback\'. Supersedes namedPosition.',
                'startDate' => 'The start date and time of the item (in ISO 8601 date format).',
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
                [['endDate','roleName','startDate',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class Role*/
