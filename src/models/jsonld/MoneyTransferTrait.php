<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for MoneyTransfer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/MoneyTransfer
 */

trait MoneyTransferTrait
{
    
    /**
     * A bank or bank’s branch, financial institution or international financial
     * institution operating the beneficiary’s bank account or releasing funds
     * for the beneficiary.
     *
     * @var string|BankOrCreditUnion|Text
     */
    public $beneficiaryBank;

    /**
     * The amount of money.
     *
     * @var float|Number|MonetaryAmount
     */
    public $amount;

}
