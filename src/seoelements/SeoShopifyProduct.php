<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2020 nystudio107
 */

namespace nystudio107\seomatic\seoelements;

use Craft;
use craft\base\ElementInterface;
use craft\base\Model;
use craft\elements\db\ElementQueryInterface;
use craft\events\DefineHtmlEvent;
use craft\models\Site;
use craft\shopify\elements\Product;
use craft\shopify\events\ShopifyProductSyncEvent;
use craft\shopify\services\Products;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\integrations\shopify\ProductType;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use yii\base\Event;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.4
 */
class SeoShopifyProduct implements SeoElementInterface
{
    // Constants
    // =========================================================================

    public const META_BUNDLE_TYPE = 'shopifyproduct';
    public const ELEMENT_CLASSES = [
        Product::class,
    ];
    public const REQUIRED_PLUGIN_HANDLE = 'shopify';
    public const CONFIG_FILE_PATH = 'shopifyproductmeta/Bundle';

    // Public Static Properties
    // =========================================================================

    public static ?ProductType $productType = null;

    // Public Static Methods
    // =========================================================================

    /**
     * Return the sourceBundleType for that this SeoElement handles
     *
     * @return string
     */
    public static function getMetaBundleType(): string
    {
        return self::META_BUNDLE_TYPE;
    }

    /**
     * Returns an array of the element classes that are handled by this SeoElement
     *
     * @return array
     */
    public static function getElementClasses(): array
    {
        return self::ELEMENT_CLASSES;
    }

    /**
     * Return the refHandle (e.g.: `entry` or `category`) for the SeoElement
     *
     * @return string
     */
    public static function getElementRefHandle(): string
    {
        return 'product';
    }

    /**
     * Return the handle to a required plugin for this SeoElement type
     *
     * @return null|string
     */
    public static function getRequiredPluginHandle()
    {
        return self::REQUIRED_PLUGIN_HANDLE;
    }

    /**
     * Install any event handlers for this SeoElement type
     */
    public static function installEventHandlers()
    {
        $request = Craft::$app->getRequest();

        // Install for all requests
        Event::on(
            Products::class,
            Products::EVENT_BEFORE_SYNCHRONIZE_PRODUCT,
            function(ShopifyProductSyncEvent $event) {
                Craft::debug(
                    'Products::EVENT_BEFORE_SYNCHRONIZE_PRODUCT',
                    __METHOD__
                );
                // Ideally we do something useful here, but since there is no concept of "sections" for
                // Shopify products, and our element save listeners will already take care of invalidating
                // the element changes, there's nothing to do here currently
            }
        );

        // Install for all non-console requests
        if (!$request->getIsConsoleRequest()) {
            // There is no concept of "sections" for shopify products, and so nothing additional to invalidate
        }

        // Install only for non-console site requests
        if ($request->getIsSiteRequest() && !$request->getIsConsoleRequest()) {
        }

        // Handler: Product::EVENT_DEFINE_SIDEBAR_HTML
        Event::on(
            Product::class,
            Product::EVENT_DEFINE_SIDEBAR_HTML,
            static function(DefineHtmlEvent $event) {
                Craft::debug(
                    'Product::EVENT_DEFINE_SIDEBAR_HTML',
                    __METHOD__
                );
                $html = '';
                Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
                /** @var Product $product */
                $product = $event->sender ?? null;
                if ($product !== null && $product->uri !== null) {
                    Seomatic::$plugin->metaContainers->previewMetaContainers($product->uri, $product->siteId, true);
                    // Render our preview sidebar template
                    if (Seomatic::$settings->displayPreviewSidebar) {
                        $html .= PluginTemplate::renderPluginTemplate('_sidebars/product-preview.twig');
                    }
                    // Render our analysis sidebar template
// @TODO: This will be added an upcoming 'pro' edition
//                if (Seomatic::$settings->displayAnalysisSidebar) {
//                    $html .= PluginTemplate::renderPluginTemplate('_sidebars/product-analysis.twig');
//                }
                }
                $event->html .= $html;
            }
        );
    }

    /**
     * Return an ElementQuery for the sitemap elements for the given MetaBundle
     *
     * @param MetaBundle $metaBundle
     *
     * @return ElementQueryInterface
     */
    public static function sitemapElementsQuery(MetaBundle $metaBundle): ElementQueryInterface
    {
        $query = Product::find()
            ->siteId($metaBundle->sourceSiteId)
            ->limit($metaBundle->metaSitemapVars->sitemapLimit);

        return $query;
    }

    /**
     * Return an ElementInterface for the sitemap alt element for the given MetaBundle
     * and Element ID
     *
     * @param MetaBundle $metaBundle
     * @param int $elementId
     * @param int $siteId
     *
     * @return null|ElementInterface
     */
    public static function sitemapAltElement(
        MetaBundle $metaBundle,
        int        $elementId,
        int        $siteId,
    ) {
        return Product::find()
            ->id($elementId)
            ->siteId($siteId)
            ->limit(1)
            ->one();
    }

    /**
     * Return a preview URI for a given $sourceHandle and $siteId
     * This just returns the first element
     *
     * @param string $sourceHandle
     * @param int|null $siteId
     *
     * @return string|null
     */
    public static function previewUri(string $sourceHandle, $siteId)
    {
        $uri = null;
        $element = Product::find()
            ->siteId($siteId)
            ->one();
        if ($element) {
            $uri = $element->uri;
        }

        return $uri;
    }

    /**
     * Return an array of FieldLayouts from the $sourceHandle
     *
     * @param string $sourceHandle
     *
     * @return array
     */
    public static function fieldLayouts(string $sourceHandle): array
    {
        $layouts = [];
        $layouts[] = self::getProductTypeModel()->getProductFieldLayout();

        return $layouts;
    }

    /**
     * Return the (entry) type menu as a $id => $name associative array
     *
     * @param string $sourceHandle
     *
     * @return array
     */
    public static function typeMenuFromHandle(string $sourceHandle): array
    {
        return [];
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param int $sourceId
     *
     * @return ProductType|null
     */
    public static function sourceModelFromId(int $sourceId)
    {
        return self::getProductTypeModel();
    }

    /**
     * Return the source model of the given $sourceHandle
     *
     * @param string $sourceHandle
     *
     * @return ProductType|null
     */
    public static function sourceModelFromHandle(string $sourceHandle)
    {
        return self::getProductTypeModel();
    }

    /**
     * Return the most recently updated Element from a given source model
     *
     * @param ?Model $sourceModel
     * @param int $sourceSiteId
     *
     * @return null|ElementInterface
     */
    public static function mostRecentElement(?Model $sourceModel, int $sourceSiteId)
    {
        return Product::find()
            ->siteId($sourceSiteId)
            ->limit(1)
            ->orderBy(['elements.dateUpdated' => SORT_DESC])
            ->one();
    }

    /**
     * Return the path to the config file directory
     *
     * @return string
     */
    public static function configFilePath(): string
    {
        return self::CONFIG_FILE_PATH;
    }

    /**
     * Return a meta bundle config array for the given $sourceModel
     *
     * @param ?Model $sourceModel
     *
     * @return array
     */
    public static function metaBundleConfig(?Model $sourceModel): array
    {
        return ArrayHelper::merge(
            ConfigHelper::getConfigFromFile(self::configFilePath()),
            [
                'sourceId' => self::getProductTypeModel()->id,
                'sourceName' => self::getProductTypeModel()->name,
                'sourceHandle' => self::getProductTypeModel()->handle,
            ]
        );
    }

    /**
     * Return the source id from the $element
     *
     * @param ElementInterface $element
     *
     * @return int|null
     */
    public static function sourceIdFromElement(ElementInterface $element)
    {
        return self::getProductTypeModel()->id;
    }

    /**
     * Return the (product) type id from the $element
     *
     * @param ElementInterface $element
     *
     * @return int|null
     */
    public static function typeIdFromElement(ElementInterface $element)
    {
        return null;
    }

    /**
     * Return the source handle from the $element
     *
     * @param ElementInterface $element
     *
     * @return string|null
     */
    public static function sourceHandleFromElement(ElementInterface $element)
    {
        return self::getProductTypeModel()->handle;
    }

    /**
     * Create a MetaBundle in the db for each site, from the passed in $sourceModel
     *
     * @param ?Model $sourceModel
     */
    public static function createContentMetaBundle(?Model $sourceModel)
    {
        /** @var ProductType $sourceModel */
        $sites = Craft::$app->getSites()->getAllSites();
        /** @var Site $site */
        foreach ($sites as $site) {
            $seoElement = self::class;
            Seomatic::$plugin->metaBundles->createMetaBundleFromSeoElement($seoElement, $sourceModel, $site->id, null, true);
        }
    }

    /**
     * Create all the MetaBundles in the db for this Seo Element
     */
    public static function createAllContentMetaBundles()
    {
        self::createContentMetaBundle(self::getProductTypeModel());
    }

    // Protected Static Methods
    // =========================================================================

    /**
     * Return a memoized singleton of our faux ProductType
     *
     * @return ProductType
     */
    protected static function getProductTypeModel(): ProductType
    {
        if (!self::$productType) {
            self::$productType = new ProductType();
        }

        return self::$productType;
    }
}
