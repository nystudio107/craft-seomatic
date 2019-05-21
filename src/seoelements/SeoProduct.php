<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\seoelements;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\models\MetaBundle;

use Craft;
use craft\base\ElementInterface;
use craft\base\Model;
use craft\elements\db\ElementQueryInterface;
use craft\models\Site;

use craft\commerce\Plugin as CommercePlugin;
use craft\commerce\elements\Product;
use craft\commerce\events\ProductTypeEvent;
use craft\commerce\models\ProductType;
use craft\commerce\services\ProductTypes;

use yii\base\Event;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class SeoProduct implements SeoElementInterface
{
    // Constants
    // =========================================================================

    const META_BUNDLE_TYPE = 'product';
    const ELEMENT_CLASSES = [
        Product::class,
    ];
    const REQUIRED_PLUGIN_HANDLE = 'commerce';
    const CONFIG_FILE_PATH = 'productmeta/Bundle';

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
        return Product::refHandle();
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

        // Install for all non-console requests
        if (!$request->getIsConsoleRequest()) {
            // Handler: ProductTypes::EVENT_AFTER_SAVE_PRODUCTTYPE
            Event::on(
                ProductTypes::class,
                ProductTypes::EVENT_AFTER_SAVE_PRODUCTTYPE,
                function (ProductTypeEvent $event) {
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

        // Install only for non-console Control Panel requests
        if ($request->getIsCpRequest() && !$request->getIsConsoleRequest()) {
            // Commerce Product Types sidebar
            $commerce = CommercePlugin::getInstance();
            if ($commerce !== null) {
                Seomatic::$view->hook('cp.commerce.product.edit.details', function (&$context) {
                    $html = '';
                    Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
                    /** @var  $product Product */
                    $product = $context['product'];
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

                    return $html;
                });
            }
        }
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
            ->limit($metaBundle->metaSitemapVars->sitemapLimit)
            ->enabledForSite(true);

        return $query;
    }

    /**
     * Return an ElementInterface for the sitemap alt element for the given MetaBundle
     * and Element ID
     *
     * @param MetaBundle $metaBundle
     * @param int        $elementId
     * @param int        $siteId
     *
     * @return null|ElementInterface
     */
    public static function sitemapAltElement(
        MetaBundle $metaBundle,
        int $elementId,
        int $siteId
    ) {
        return Product::find()
            ->id($elementId)
            ->siteId($siteId)
            ->limit(1)
            ->enabledForSite(true)
            ->one();
    }

    /**
     * Return a preview URI for a given $sourceHandle and $siteId
     * This just returns the first element
     *
     * @param string    $sourceHandle
     * @param int|null  $siteId
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
        $commerce = CommercePlugin::getInstance();
        if ($commerce !== null) {
            $layoutId = null;
            try {
                $productType = $commerce->productTypes->getProductTypeByHandle($sourceHandle);
                if ($productType) {
                    $layoutId = $productType->getFieldLayoutId();
                }
            } catch (\Exception $e) {
                $layoutId = null;
            }
            if ($layoutId) {
                $layouts[] = Craft::$app->getFields()->getLayoutById($layoutId);
            }
        }

        return $layouts;
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
        $commerce = CommercePlugin::getInstance();
        if ($commerce !== null) {
            $productType = $commerce->productTypes->getProductTypeById($sourceId);
        }

        return $productType;
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param string $sourceHandle
     *
     * @return ProductType|null
     */
    public static function sourceModelFromHandle(string $sourceHandle)
    {
        $productType = null;
        $commerce = CommercePlugin::getInstance();
        if ($commerce !== null) {
            $productType = $commerce->productTypes->getProductTypeByHandle($sourceHandle);
        }

        return $productType;
    }

    /**
     * Return the most recently updated Element from a given source model
     *
     * @param Model $sourceModel
     * @param int   $sourceSiteId
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
                'sourceName' => $sourceModel->name,
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
        } catch (InvalidConfigException $e) {
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
            /** @var SeoElementInterface $seoElement */
            Seomatic::$plugin->metaBundles->createMetaBundleFromSeoElement($seoElement, $sourceModel, $site->id);
        }
    }

    /**
     * Create all the MetaBundles in the db for this Seo Element
     */
    public static function createAllContentMetaBundles()
    {
        $commerce = CommercePlugin::getInstance();
        if ($commerce !== null) {
            // Get all of the calendars with URLs
            $productTypes = $commerce->productTypes->getAllProductTypes();
            foreach ($productTypes as $productType) {
                self::createContentMetaBundle($productType);
            }
        }
    }
}
