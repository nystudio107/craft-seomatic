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
use craft\digitalproducts\elements\Product;
use craft\digitalproducts\events\ProductTypeEvent;
use craft\digitalproducts\gql\interfaces\elements\Product as DigitalProductInterface;
use craft\digitalproducts\models\ProductType;
use craft\digitalproducts\Plugin as DigitalProductsPlugin;
use craft\digitalproducts\services\ProductTypes;
use craft\elements\db\ElementQueryInterface;
use craft\events\DefineHtmlEvent;
use craft\models\Site;
use Exception;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\base\GqlSeoElementInterface;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use yii\base\Event;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.4
 */
class SeoDigitalProduct implements SeoElementInterface, GqlSeoElementInterface
{
    // Constants
    // =========================================================================

    public const META_BUNDLE_TYPE = 'digitalproduct';
    public const ELEMENT_CLASSES = [
        Product::class,
    ];
    public const REQUIRED_PLUGIN_HANDLE = 'digital-products';
    public const CONFIG_FILE_PATH = 'digitalproductmeta/Bundle';

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
        return Product::refHandle() ?? 'product';
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
            ProductTypes::class,
            ProductTypes::EVENT_AFTER_SAVE_PRODUCTTYPE,
            function(ProductTypeEvent $event) {
                Craft::debug(
                    'ProductTypes::EVENT_AFTER_SAVE_PRODUCTTYPE',
                    __METHOD__
                );
                Seomatic::$plugin->metaBundles->resaveMetaBundles(self::META_BUNDLE_TYPE);
            }
        );

        // Install for all non-console requests
        if (!$request->getIsConsoleRequest()) {
            // Handler: ProductTypes::EVENT_AFTER_SAVE_PRODUCTTYPE
            Event::on(
                ProductTypes::class,
                ProductTypes::EVENT_AFTER_SAVE_PRODUCTTYPE,
                /** @var ProductTypeEvent $event */
                static function($event) {
                    Craft::debug(
                        'ProductTypes::EVENT_AFTER_SAVE_PRODUCTTYPE',
                        __METHOD__
                    );
                    if ($event->productType !== null && $event->productType->id !== null) {
                        Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                            SeoProduct::getMetaBundleType(),
                            $event->productType->id,
                            $event->isNew
                        );
                        // Create the meta bundles for this Product Type if it's new
                        if ($event->isNew) {
                            SeoProduct::createContentMetaBundle($event->productType);
                            Seomatic::$plugin->sitemaps->submitSitemapIndex();
                        }
                    }
                }
            );

            /*
             * @TODO Sadly this event doesn't exist yet
            // Handler: ProductTypes::EVENT_AFTER_DELETE_PRODUCTTYPE
            Event::on(
                ProductTypes::class,
                ProductTypes::EVENT_AFTER_DELETE_PRODUCTTYPE,
                function (ProductTypeEvent $event) {
                    Craft::debug(
                        'ProductTypes::EVENT_AFTER_DELETE_PRODUCTTYPE',
                        __METHOD__
                    );
                    if ($event->productType !== null && $event->productType->id !== null) {
                        Seomatic::$plugin->metaBundles->invalidateMetaBundleById(
                            SeoProduct::getMetaBundleType(),
                            $event->productType->id,
                            false
                        );
                        // Delete the meta bundles for this Product Type
                        Seomatic::$plugin->metaBundles->deleteMetaBundleBySourceId(
                            SeoProduct::getMetaBundleType(),
                            $event->productType->id
                        );
                    }
                }
            );
            */
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
            ->type($metaBundle->sourceHandle)
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
            ->type($sourceHandle)
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
        $digitalProducts = DigitalProductsPlugin::getInstance();
        if ($digitalProducts !== null) {
            $layoutId = null;
            try {
                $productType = $digitalProducts->getProductTypes()->getProductTypeByHandle($sourceHandle);
                if ($productType) {
                    $layoutId = $productType->getFieldLayoutId();
                }
            } catch (Exception $e) {
                $layoutId = null;
            }
            if ($layoutId) {
                $layouts[] = Craft::$app->getFields()->getLayoutById($layoutId);
            }
        }

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
        $productType = null;
        $digitalProducts = DigitalProductsPlugin::getInstance();
        if ($digitalProducts !== null) {
            $productType = $digitalProducts->getProductTypes()->getProductTypeById($sourceId);
        }

        return $productType;
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
        $productType = null;
        $digitalProducts = DigitalProductsPlugin::getInstance();
        if ($digitalProducts !== null) {
            $productType = $digitalProducts->getProductTypes()->getProductTypeByHandle($sourceHandle);
        }

        return $productType;
    }

    /**
     * Return the most recently updated Element from a given source model
     *
     * @param Model $sourceModel
     * @param int $sourceSiteId
     *
     * @return null|ElementInterface
     */
    public static function mostRecentElement(Model $sourceModel, int $sourceSiteId)
    {
        /** @var ProductType $sourceModel */
        return Product::find()
            ->type($sourceModel->handle)
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
     * @param Model $sourceModel
     *
     * @return array
     */
    public static function metaBundleConfig(Model $sourceModel): array
    {
        /** @var ProductType $sourceModel */
        return ArrayHelper::merge(
            ConfigHelper::getConfigFromFile(self::configFilePath()),
            [
                'sourceId' => $sourceModel->id,
                'sourceName' => (string)$sourceModel->name,
                'sourceHandle' => $sourceModel->handle,
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
        /** @var Product $element */
        return $element->typeId;
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
        /** @var Product $element */
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
        $sourceHandle = '';
        /** @var Product $element */
        try {
            $sourceHandle = $element->getType()->handle;
        } catch (Exception $e) {
        }

        return $sourceHandle;
    }

    /**
     * Create a MetaBundle in the db for each site, from the passed in $sourceModel
     *
     * @param Model $sourceModel
     */
    public static function createContentMetaBundle(Model $sourceModel)
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
        $digitslProducts = DigitalProductsPlugin::getInstance();
        if ($digitslProducts !== null) {
            // Get all of the calendars with URLs
            $productTypes = $digitslProducts->getProductTypes()->getAllProductTypes();
            foreach ($productTypes as $productType) {
                self::createContentMetaBundle($productType);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public static function getGqlInterfaceTypeName()
    {
        return DigitalProductInterface::getName();
    }
}
