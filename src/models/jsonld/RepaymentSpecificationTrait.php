<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for RepaymentSpecification.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/RepaymentSpecification
 */

trait RepaymentSpecificationTrait
{
    
    /**
     * The number of payments contractually required at origination to repay the
     * loan. For monthly paying loans this is the number of months from the
     * contractual first payment date to the maturity date.
     *
     * @var float|Number
     */
    public $numberOfLoanPayments;

    /**
     * The amount to be paid as a penalty in the event of early payment of the
     * loan.
     *
     * @var MonetaryAmount
     */
    public $earlyPrepaymentPenalty;

    /**
     * The amount of money to pay in a single payment.
     *
     * @var MonetaryAmount
     */
    public $loanPaymentAmount;

    /**
     * Frequency of payments due, i.e. number of months between payments. This is
     * defined as a frequency, i.e. the reciprocal of a period of time.
     *
     * @var float|Number
     */
    public $loanPaymentFrequency;

    /**
     * a type of payment made in cash during the onset of the purchase of an
     * expensive good/service. The payment typically represents only a percentage
     * of the full purchase price.
     *
     * @var float|Number|MonetaryAmount
     */
    public $downPayment;

}
