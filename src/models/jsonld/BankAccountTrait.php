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
 * Trait for BankAccount.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/BankAccount
 */
trait BankAccountTrait
{
    /**
     * A minimum amount that has to be paid in every month.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $accountMinimumInflow;

    /**
     * An overdraft is an extension of credit from a lending institution when an
     * account reaches zero. An overdraft allows the individual to continue
     * withdrawing money even if the account has no funds in it. Basically the
     * bank allows people to borrow a set amount of money.
     *
     * @var array|MonetaryAmount|MonetaryAmount[]
     */
    public $accountOverdraftLimit;

    /**
     * The type of a bank account.
     *
     * @var string|array|Text|Text[]|array|URL|URL[]
     */
    public $bankAccountType;
}
