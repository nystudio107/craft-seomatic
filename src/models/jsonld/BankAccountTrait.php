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
 * Trait for BankAccount.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BankAccount
 */

trait BankAccountTrait
{
    
    /**
     * The type of a bank account.
     *
     * @var string|Text|URL
     */
    public $bankAccountType;

    /**
     * A minimum amount that has to be paid in every month.
     *
     * @var MonetaryAmount
     */
    public $accountMinimumInflow;

    /**
     * An overdraft is an extension of credit from a lending institution when an
     * account reaches zero. An overdraft allows the individual to continue
     * withdrawing money even if the account has no funds in it. Basically the
     * bank allows people to borrow a set amount of money.
     *
     * @var MonetaryAmount
     */
    public $accountOverdraftLimit;

}
