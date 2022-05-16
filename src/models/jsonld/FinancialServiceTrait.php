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
 * Trait for FinancialService.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/FinancialService
 */

trait FinancialServiceTrait
{
    
    /**
     * Description of fees, commissions, and other terms applied either to a class
     * of financial product, or by a financial service organization.
     *
     * @var string|URL|Text
     */
    public $feesAndCommissionsSpecification;

}
