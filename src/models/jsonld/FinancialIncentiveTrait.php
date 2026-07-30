<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v30.0
 * Trait for FinancialIncentive.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/FinancialIncentive
 */
trait FinancialIncentiveTrait
{
    /**
     * The geographic area where a service or offered item is provided.
     *
     * @var string|array|AdministrativeArea|AdministrativeArea[]|array|GeoShape|GeoShape[]|array|Place|Place[]|array|Text|Text[]
     */
    public $areaServed;

    /**
     * The supplier of the incentivized item/service for which the incentive is
     * valid for such as a utility company, merchant, or contractor.
     *
     * @var array|Organization|Organization[]
     */
    public $eligibleWithSupplier;

    /**
     * Describes the amount that can be redeemed from this incentive.
     * <p>[[QuantitativeValue]]: Use this for incentives based on price (either
     * raw amount or percentage-based). For a raw amount example, "You can claim
     * $2,500 - $7,500 from the total cost of installation" would be represented
     * as the following:</p>     {         "@type": "QuantitativeValue",
     * “minValue”: 2500,         “maxValue”: 7500,         "unitCode":
     * "USD"     } <p>[[QuantitativeValue]] can also be used for percentage
     * amounts. In such cases, value is used to represent the incentive’s
     * percentage, while maxValue represents a limit (if one exists) to that
     * incentive. The unitCode should be 'P1' and the unitText should be '%',
     * while valueReference should be used for holding the currency type. For
     * example, "You can claim up to 30% of the total cost of installation, up to
     * a maximum of $7,500" would be:</p>     {         "@type":
     * "QuantitativeValue",         "value": 30,         "unitCode": "P1",
     * "unitText": "%",         “maxValue”: 7500,
     * “valueReference”: “USD”     } <p>[[UnitPriceSpecification]]: Use
     * this for incentives that are based on amounts rather than price. For
     * example, a net metering rebate that pays $10/kWh, up to $1,000:</p>     {
     *       "@type": "UnitPriceSpecification",         "price": 10,
     * "priceCurrency": "USD",         "referenceQuantity": 1,         "unitCode":
     * "DO3",         "unitText": "kw/h",         "maxPrice": 1000,
     * "description": "$10 / kwh up to $1000"     } <p>[[LoanOrCredit]]: Use for
     * incentives that are loan based. For example, a loan of $4,000 - $50,000
     * with a repayment term of 10 years, interest free would look like:</p>     {
     *         "@type": "LoanOrCredit",         "loanTerm": {
     * "@type":"QuantitativeValue",                 "value":"10",
     * "unitCode": "ANN"             },         "amount":[             {
     *       "@type": "QuantitativeValue",                 "Name":"fixed interest
     * rate",                 "value":"0",             },         ],
     * "amount":[             {                 "@type": "MonetaryAmount",
     *         "Name":"min loan amount",                 "value":"4000",
     *       "currency":"CAD"             },             {
     * "@type": "MonetaryAmount",                 "Name":"max loan amount",
     *          "value":"50000",                 "currency":"CAD"             }
     *      ],     }  In summary: <ul><li>Use [[QuantitativeValue]] for
     * absolute/percentage-based incentives applied on the price of a
     * good/service.</li> <li>Use [[UnitPriceSpecification]] for incentives based
     * on a per-unit basis (e.g. net metering).</li> <li>Use [[LoanOrCredit]] for
     * loans/credits.</li> </ul>.
     *
     * @var array|LoanOrCredit|LoanOrCredit[]|array|QuantitativeValue|QuantitativeValue[]|array|UnitPriceSpecification|UnitPriceSpecification[]
     */
    public $incentiveAmount;

    /**
     * The status of the incentive (active, on hold, retired, etc.).
     *
     * @var array|IncentiveStatus|IncentiveStatus[]
     */
    public $incentiveStatus;

    /**
     * The type of incentive offered (tax credit/rebate, tax deduction, tax
     * waiver, subsidies, etc.).
     *
     * @var array|IncentiveType|IncentiveType[]
     */
    public $incentiveType;

    /**
     * The type or specific product(s) and/or service(s) being incentivized.
     * <p>DefinedTermSets are used for product and service categories such as the
     * United Nations Standard Products and Services Code:</p>     {
     * "@type": "DefinedTerm",         "inDefinedTermSet":
     * "https://www.unspsc.org/",         "termCode": "261315XX",         "name":
     * "Photovoltaic module"     }  <p>For a specific product or service, use the
     * Product type:</p>     {         "@type": "Product",         "name":
     * "Kenmore White 17" Microwave",     } For multiple different incentivized
     * items, use multiple [[DefinedTerm]] or [[Product]].
     *
     * @var array|DefinedTerm|DefinedTerm[]|array|Product|Product[]
     */
    public $incentivizedItem;

    /**
     * Optional. Income limit for which the incentive is applicable for.
     * <p>If MonetaryAmount is specified, this should be based on annualized
     * income (e.g. if an incentive is limited to those making <$114,000
     * annually):</p>     {         "@type": "MonetaryAmount",         "maxValue":
     * 114000,         "currency": "USD",     }  Use Text for incentives that are
     * limited based on other criteria, for example if an incentive is only
     * available to recipients making 120% of the median poverty income in their
     * area.
     *
     * @var string|array|MonetaryAmount|MonetaryAmount[]|array|Text|Text[]
     */
    public $incomeLimit;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $provider;

    /**
     * The publisher of the article in question.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $publisher;

    /**
     * Optional. The maximum price the item can have and still qualify for this
     * offer.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $purchasePriceLimit;

    /**
     * Optional. The type of purchase the consumer must make in order to qualify
     * for this incentive.
     *
     * @var array|PurchaseType|PurchaseType[]
     */
    public $purchaseType;

    /**
     * Optional. The types of expenses that are covered by the incentive. For
     * example some incentives are only for the goods (tangible items) but the
     * services (labor) are excluded.
     *
     * @var array|IncentiveQualifiedExpenseType|IncentiveQualifiedExpenseType[]
     */
    public $qualifiedExpense;

    /**
     * The date when the item becomes valid.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $validFrom;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var array|Date|Date[]|array|DateTime|DateTime[]
     */
    public $validThrough;
}
