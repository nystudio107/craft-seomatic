<?php
/**
 * SEOmatic plugin for Craft CMS 4.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2020 nystudio107
 */

namespace nystudio107\seomatic\integrations\shopify;

use Craft;
use craft\base\Model;
use craft\models\FieldLayout;
use craft\models\Section_SiteSettings;
use craft\shopify\Plugin as ShopifyPlugin;

/**
 * Faux Product type model since Shopify products have no concept of "sections"
 *
 * @method FieldLayout getFieldLayout()
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2017, Pixel & Tonic, Inc.
 */
class ProductType extends Model
{
    /**
     * @var int ID
     */
    public $id = 31337;

    /**
     * @var string Name
     */
    public $name = 'Shopify Products';

    /**
     * @var string Handle
     */
    public $handle = 'shopifyproducts';

    /**
     * @var string SKU format
     */
    public $skuFormat;

    /**
     * @var string|null UID
     */
    public $uid = '31337product';


    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->handle;
    }

    /**
     * Returns the product types's site-specific settings.
     *
     * @return Section_SiteSettings[]
     */
    public function getSiteSettings(): array
    {
        $siteSettings = [];
        $shopifyProducts = ShopifyPlugin::getInstance();
        if ($shopifyProducts !== null) {
            $shopifySettings = $shopifyProducts->getSettings();
            $sites = Craft::$app->getSites()->getAllSites();
            foreach ($sites as $site) {
                $siteSettings[$site->id] = new Section_SiteSettings([
                    'id' => $site->id,
                    'sectionId' => $this->id,
                    'siteId' => $site->id,
                    'hasUrls' => !empty($shopifySettings->uriFormat),
                    'uriFormat' => $shopifySettings->uriFormat,
                    'template' => $shopifySettings->template,
                ]);
            }
        }

        return $siteSettings;
    }

    /**
     * @return ?FieldLayout
     */
    public function getProductFieldLayout(): ?FieldLayout
    {
        $shopifyProducts = ShopifyPlugin::getInstance();
        if ($shopifyProducts !== null) {
            return $shopifyProducts->getSettings()->getProductFieldLayout();
        }

        return null;
    }
}
