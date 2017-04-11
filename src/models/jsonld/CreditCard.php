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

use nystudio107\seomatic\models\jsonld\PaymentCard;

/**
 * CreditCard - A card payment method of a particular brand or name. Used to
 * mark up a particular payment method and/or the financial product/service
 * that supplies the card account. Commonly used values:
 * http://purl.org/goodrelations/v1#AmericanExpress
 * http://purl.org/goodrelations/v1#DinersClub
 * http://purl.org/goodrelations/v1#Discover
 * http://purl.org/goodrelations/v1#JCB
 * http://purl.org/goodrelations/v1#MasterCard
 * http://purl.org/goodrelations/v1#VISA
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/CreditCard
 */
class CreditCard extends PaymentCard
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'CreditCard';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/CreditCard';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A card payment method of a particular brand or name. Used to mark up a particular payment method and/or the financial product/service that supplies the card account. Commonly used values: http://purl.org/goodrelations/v1#AmericanExpress http://purl.org/goodrelations/v1#DinersClub http://purl.org/goodrelations/v1#Discover http://purl.org/goodrelations/v1#JCB http://purl.org/goodrelations/v1#MasterCard http://purl.org/goodrelations/v1#VISA';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'PaymentCard';

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
     * The amount of money.
     *
     * @var mixed|MonetaryAmount|float [schema.org types: MonetaryAmount, Number]
     */
    public $amount;

    /**
     * The duration of the loan or credit agreement.
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $loanTerm;

    /**
     * Assets required to secure loan or credit repayments. It may take form of
     * third party pledge, goods, financial instruments (cash, securities, etc.)
     *
     * @var mixed|string|Thing [schema.org types: Text, Thing]
     */
    public $requiredCollateral;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'amount',
        'loanTerm',
        'requiredCollateral'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'amount' => ['MonetaryAmount','Number'],
        'loanTerm' => ['QuantitativeValue'],
        'requiredCollateral' => ['Text','Thing']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'amount' => 'The amount of money.',
        'loanTerm' => 'The duration of the loan or credit agreement.',
        'requiredCollateral' => 'Assets required to secure loan or credit repayments. It may take form of third party pledge, goods, financial instruments (cash, securities, etc.)'
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
            [['amount','loanTerm','requiredCollateral'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
