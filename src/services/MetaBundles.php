<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\services;

use craft\commerce\models\ProductTypeSite;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\helpers\Migration as MigrationHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\records\MetaBundle as MetaBundleRecord;

use Craft;
use craft\base\Component;
use craft\base\Element;
use craft\db\Query;
use craft\elements\Category;
use craft\elements\Entry;
use craft\models\Section_SiteSettings;
use craft\models\CategoryGroup_SiteSettings;
use craft\models\CategoryGroup;
use craft\models\Section;
use craft\models\Site;

use craft\commerce\Plugin as CommercePlugin;
use craft\commerce\elements\Product;
use craft\commerce\models\ProductType;

use yii\base\InvalidConfigException;
use yii\db\StaleObjectException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaBundles extends Component
{
    // Constants
    // =========================================================================

    const GLOBAL_META_BUNDLE = '__GLOBAL_BUNDLE__';
    const SECTION_META_BUNDLE = 'section';
    const CATEGORYGROUP_META_BUNDLE = 'categorygroup';
    const PRODUCT_META_BUNDLE = 'product';
    const FIELD_META_BUNDLE = 'field';

    const IGNORE_DB_ATTRIBUTES = [
        'id',
        'dateCreated',
        'dateUpdated',
        'uid',
    ];

    // Protected Properties
    // =========================================================================

    /**
     * @var MetaBundle[] indexed by [id]
     */
    protected $metaBundles = [];

    /**
     * @var array indexed by [sourceId][sourceSiteId] = id
     */
    protected $metaBundlesBySourceId = [];

    /**
     * @var array indexed by [sourceHandle][sourceSiteId] = id
     */
    protected $metaBundlesBySourceHandle = [];

    /**
     * @var array indexed by [sourceSiteId] = id
     */
    protected $globalMetaBundles = [];

    // Public Methods
    // =========================================================================

    /**
     * Get the global meta bundle for the site
     *
     * @param int  $sourceSiteId
     * @param bool $parse         Whether the resulting metabundle should be parsed
     *
     * @return null|MetaBundle
     */
    public function getGlobalMetaBundle(int $sourceSiteId, $parse = true)
    {
        $metaBundle = null;
        // See if we have the meta bundle cached
        if (!empty($this->globalMetaBundles[$sourceSiteId])) {
            return $this->globalMetaBundles[$sourceSiteId];
        }
        $metaBundleArray = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->where([
                'sourceBundleType' => self::GLOBAL_META_BUNDLE,
                'sourceSiteId' => $sourceSiteId,
            ])
            ->one();
        if (!empty($metaBundleArray)) {
            // Get the attributes from the db
            $metaBundleArray = array_diff_key($metaBundleArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $metaBundle = MetaBundle::create($metaBundleArray, $parse);
            if ($parse) {
                $this->syncBundleWithConfig($metaBundle);
            }
        } else {
            // If it doesn't exist, create it
            $metaBundle = $this->createGlobalMetaBundleForSite($sourceSiteId);
        }
        if ($parse) {
            // Cache it for future accesses
            $this->globalMetaBundles[$sourceSiteId] = $metaBundle;
        }

        return $metaBundle;
    }

    /**
     * @param MetaBundle $metaBundle
     * @param int        $siteId
     */
    public function updateMetaBundle(MetaBundle $metaBundle, int $siteId)
    {
        // Make sure it validates
        if ($metaBundle->validate(null, true)) {
            // Save it out to a record
            $metaBundleRecord = MetaBundleRecord::findOne([
                'sourceBundleType' => $metaBundle->sourceBundleType,
                'sourceId' => $metaBundle->sourceId,
                'sourceSiteId' => $siteId,
            ]);
            if (!$metaBundleRecord) {
                $metaBundleRecord = new MetaBundleRecord();
            }
            $metaBundleRecord->setAttributes($metaBundle->getAttributes(), false);
            if ($metaBundleRecord->save()) {
                Craft::info(
                    'Meta bundle updated: '
                    .$metaBundle->sourceBundleType
                    .' id: '
                    .$metaBundle->sourceId
                    .' from siteId: '
                    .$metaBundle->sourceSiteId,
                    __METHOD__
                );
            }
        } else {
            Craft::error(
                'Meta bundle failed validation: '
                .print_r($metaBundle->getErrors(), true)
                .' type: '
                .$metaBundle->sourceType
                .' id: '
                .$metaBundle->sourceId
                .' from siteId: '
                .$metaBundle->sourceSiteId,
                __METHOD__
            );
        }
    }

    /**
     * @param string   $sourceBundleType
     * @param int      $sourceId
     * @param int|null $sourceSiteId
     *
     * @return null|MetaBundle
     */
    public function getMetaBundleBySourceId(string $sourceBundleType, int $sourceId, int $sourceSiteId)
    {
        $metaBundle = null;
        // See if we have the meta bundle cached
        if (!empty($this->metaBundlesBySourceId[$sourceBundleType][$sourceId][$sourceSiteId])) {
            $id = $this->metaBundlesBySourceId[$sourceBundleType][$sourceId][$sourceSiteId];
            if (!empty($this->metaBundles[$id])) {
                return $this->metaBundles[$id];
            }
        }
        // Look for a matching meta bundle in the db
        $metaBundleArray = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->where([
                'sourceBundleType' => $sourceBundleType,
                'sourceId' => $sourceId,
                'sourceSiteId' => $sourceSiteId,
            ])
            ->one();
        if (!empty($metaBundleArray)) {
            // Get the attributes from the db
            $metaBundleArray = array_diff_key($metaBundleArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $metaBundle = MetaBundle::create($metaBundleArray);
            $this->syncBundleWithConfig($metaBundle);
            $id = \count($this->metaBundles);
            $this->metaBundles[$id] = $metaBundle;
            $this->metaBundlesBySourceId[$sourceBundleType][$sourceId][$sourceSiteId] = $id;
        } else {
            // If it doesn't exist, create it
            switch ($sourceBundleType) {
                case self::SECTION_META_BUNDLE:
                    /** @var  $section Section */
                    $section = Craft::$app->getSections()->getSectionById($sourceId);
                    if ($section !== null) {
                        $metaBundle = $this->createMetaBundleFromSection($section, $sourceSiteId);
                    }
                    break;

                case self::CATEGORYGROUP_META_BUNDLE:
                    $category = Craft::$app->getCategories()->getGroupById($sourceId);
                    if ($category !== null) {
                        $metaBundle = $this->createMetaBundleFromCategory($category, $sourceSiteId);
                    }
                    break;
                case self::PRODUCT_META_BUNDLE:
                    if (Seomatic::$commerceInstalled) {
                        $commerce = CommercePlugin::getInstance();
                        if ($commerce !== null) {
                            $productType = $commerce->getProductTypes()->getProductTypeById($sourceId);
                            if ($productType !== null) {
                                $metaBundle = $this->createMetaBundleFromProductType($productType, $sourceSiteId);
                            }
                        }
                    }
                    break;
            }
        }

        return $metaBundle;
    }

    /**
     * @param string $sourceType
     * @param string $sourceHandle
     * @param int    $sourceSiteId
     *
     * @return null|MetaBundle
     */
    public function getMetaBundleBySourceHandle(string $sourceType, string $sourceHandle, int $sourceSiteId)
    {
        $metaBundle = null;
        // See if we have the meta bundle cached
        if (!empty($this->metaBundlesBySourceHandle[$sourceType][$sourceHandle][$sourceSiteId])) {
            $id = $this->metaBundlesBySourceHandle[$sourceType][$sourceHandle][$sourceSiteId];
            if (!empty($this->metaBundles[$id])) {
                return $this->metaBundles[$id];
            }
        }
        // Look for a matching meta bundle in the db
        $metaBundleArray = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->where([
                'sourceBundleType' => $sourceType,
                'sourceHandle' => $sourceHandle,
                'sourceSiteId' => $sourceSiteId,
            ])
            ->one();
        if (!empty($metaBundleArray)) {
            $metaBundleArray = array_diff_key($metaBundleArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $metaBundle = MetaBundle::create($metaBundleArray);
            $id = \count($this->metaBundles);
            $this->metaBundles[$id] = $metaBundle;
            $this->metaBundlesBySourceHandle[$sourceType][$sourceHandle][$sourceSiteId] = $id;
        } else {
            // If it doesn't exist, create it
            switch ($sourceType) {
                case self::SECTION_META_BUNDLE:
                    /** @var  $section Section */
                    $section = Craft::$app->getSections()->getSectionByHandle($sourceHandle);
                    if ($section !== null) {
                        $metaBundle = $this->createMetaBundleFromSection($section, $sourceSiteId);
                    }
                    break;

                case self::CATEGORYGROUP_META_BUNDLE:
                    $category = Craft::$app->getCategories()->getGroupByHandle($sourceHandle);
                    if ($category !== null) {
                        $metaBundle = $this->createMetaBundleFromCategory($category, $sourceSiteId);
                    }
                    break;
                case self::PRODUCT_META_BUNDLE:
                    if (Seomatic::$commerceInstalled) {
                        $commerce = CommercePlugin::getInstance();
                        if ($commerce !== null) {
                            $productType = $commerce->getProductTypes()->getProductTypeByHandle($sourceHandle);
                            if ($productType !== null) {
                                $metaBundle = $this->createMetaBundleFromProductType($productType, $sourceSiteId);
                            }
                        }
                    }
                    break;
            }
        }

        return $metaBundle;
    }

    /**
     * Invalidate the caches and data structures associated with this MetaBundle
     *
     * @param string   $sourceType
     * @param int|null $sourceId
     * @param bool     $isNew
     */
    public function invalidateMetaBundleById(string $sourceType, int $sourceId, bool $isNew = false)
    {
        $metaBundleInvalidated = false;
        $sites = Craft::$app->getSites()->getAllSites();
        foreach ($sites as $site) {
            // See if this is a section we are tracking
            $metaBundle = $this->getMetaBundleBySourceId($sourceType, $sourceId, $site->id);
            if ($metaBundle) {
                Craft::info(
                    'Invalidating meta bundle: '
                    .$metaBundle->sourceHandle
                    .' from siteId: '
                    .$site->id,
                    __METHOD__
                );
                // Is this a new source?
                if (!$isNew) {
                    $metaBundleInvalidated = true;
                    // Handle syncing up the sourceHandle
                    $categories = Craft::$app->getCategories();
                    $sections = Craft::$app->getSections();
                    switch ($sourceType) {
                        case self::GLOBAL_META_BUNDLE:
                            break;
                        case self::CATEGORYGROUP_META_BUNDLE:
                            $category = $categories->getGroupById($sourceId);
                            if ($category !== null) {
                                $metaBundle->sourceHandle = $category->handle;
                            }
                            break;
                        case self::SECTION_META_BUNDLE:
                            $section = $sections->getSectionById($sourceId);
                            if ($section !== null) {
                                $metaBundle->sourceHandle = $section->handle;
                            }
                            break;
                        case self::PRODUCT_META_BUNDLE:
                            if (Seomatic::$commerceInstalled) {
                                $commerce = CommercePlugin::getInstance();
                                if ($commerce !== null) {
                                    $productType = $commerce->getProductTypes()->getProductTypeById($sourceId);
                                    if ($productType !== null) {
                                        $metaBundle->sourceHandle = $productType->handle;
                                    }
                                }
                            }
                            break;
                    }
                    // Invalidate caches after an existing section is saved
                    Seomatic::$plugin->metaContainers->invalidateContainerCacheById($sourceId);
                    Seomatic::$plugin->sitemaps->invalidateSitemapCache(
                        $metaBundle->sourceHandle,
                        $metaBundle->sourceSiteId
                    );
                    // Update the meta bundle data
                    $this->updateMetaBundle($metaBundle, $site->id);
                }
            }
        }
        // If we've invalidated a meta bundle, we need to invalidate the sitemap index, too
        if ($metaBundleInvalidated) {
            Seomatic::$plugin->sitemaps->invalidateSitemapIndexCache();
        }
    }

    /**
     * Invalidate the caches and data structures associated with this MetaBundle
     *
     * @param Element $element
     * @param bool    $isNew
     */
    public function invalidateMetaBundleByElement($element, bool $isNew = false)
    {
        $metaBundleInvalidated = false;
        if ($element) {
            $uri = $element->uri ?? '';
            // Invalidate sitemap caches after an existing element is saved
            list($sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId)
                = $this->getMetaSourceFromElement($element);
            if ($sourceId) {
                Craft::info(
                    'Invalidating meta bundle: '
                    .$uri
                    .'/'
                    .$sourceSiteId,
                    __METHOD__
                );
                if (!$isNew) {
                    $sourceType = '';
                    $metaBundleInvalidated = true;
                    Seomatic::$plugin->metaContainers->invalidateContainerCacheByPath($uri, $sourceSiteId);
                    // Invalidate the sitemap cache
                    $metaBundle = $this->getMetaBundleBySourceId($sourceType, $sourceId, $sourceSiteId);
                    if ($metaBundle) {
                        if ($element) {
                            $dateUpdated = $element->dateUpdated ?? $element->dateCreated;
                        } else {
                            $dateUpdated = new \DateTime();
                        }
                        $metaBundle->sourceDateUpdated = $dateUpdated;
                        // Update the meta bundle data
                        $this->updateMetaBundle($metaBundle, $sourceSiteId);
                        if ($metaBundle) {
                            Seomatic::$plugin->sitemaps->invalidateSitemapCache(
                                $metaBundle->sourceHandle,
                                $metaBundle->sourceSiteId
                            );
                        }
                    }
                }
            }
        }
        // If we've invalidated a meta bundle, we need to invalidate the sitemap index, too
        if ($metaBundleInvalidated) {
            Seomatic::$plugin->sitemaps->invalidateSitemapIndexCache();
        }
    }

    /**
     * Delete a meta bundle by $sourceId
     *
     * @param string $sourceBundleType
     * @param int    $sourceId
     */
    public function deleteMetaBundleBySourceId(string $sourceBundleType, int $sourceId)
    {
        $sites = Craft::$app->getSites()->getAllSites();
        /** @var  $site Site */
        foreach ($sites as $site) {
            // Look for a matching meta bundle in the db
            $metaBundleRecord = MetaBundleRecord::findOne([
                'sourceBundleType' => $sourceBundleType,
                'sourceId' => $sourceId,
                'sourceSiteId' => $site->id,
            ]);

            if ($metaBundleRecord) {
                try {
                    $metaBundleRecord->delete();
                } catch (StaleObjectException $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                } catch (\Exception $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                } catch (\Throwable $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
                Craft::info(
                    'Meta bundle deleted: '
                    .$sourceId
                    .' from siteId: '
                    .$site->id,
                    __METHOD__
                );
            }
        }
    }

    /**
     * Create a new meta bundle from the $section
     *
     * @param Section $section
     */
    public function createContentMetaBundleForSection(Section $section)
    {
        $sites = Craft::$app->getSites()->getAllSites();
        /** @var  $site Site */
        foreach ($sites as $site) {
            $this->createMetaBundleFromSection($section, $site->id);
        }
    }

    /**
     * Create a new meta bundle from the $category
     *
     * @param CategoryGroup $category
     */
    public function createContentMetaBundleForCategoryGroup(CategoryGroup $category)
    {
        $sites = Craft::$app->getSites()->getAllSites();
        /** @var  $site Site */
        foreach ($sites as $site) {
            $this->createMetaBundleFromCategory($category, $site->id);
        }
    }

    /**
     * Create a new meta bundle from the $productType
     *
     * @param ProductType $productType
     */
    public function createContentMetaBundleForProductType(ProductType $productType)
    {
        $sites = Craft::$app->getSites()->getAllSites();
        /** @var  $site Site */
        foreach ($sites as $site) {
            $this->createMetaBundleFromProductType($productType, $site->id);
        }
    }

    /**
     * @param Element $element
     *
     * @return array
     */
    public function getMetaSourceFromElement(Element $element): array
    {
        $sourceId = 0;
        $sourceSiteId = 0;
        $sourceBundleType = '';
        $sourceHandle = '';
        // See if this is a section we are tracking
        switch (\get_class($element)) {
            case Entry::class:
                /** @var  $element Entry */
                $sourceId = $element->sectionId;
                $sourceSiteId = $element->siteId;
                $sourceHandle = $element->section->handle;
                $sourceBundleType = self::SECTION_META_BUNDLE;
                break;

            case Category::class:
                /** @var  $element Category */
                $sourceId = $element->groupId;
                $sourceSiteId = $element->siteId;
                try {
                    $sourceHandle = $element->getGroup()->handle;
                } catch (InvalidConfigException $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
                $sourceBundleType = self::CATEGORYGROUP_META_BUNDLE;
                break;

            case Product::class:
                if (Seomatic::$commerceInstalled) {
                    $commerce = CommercePlugin::getInstance();
                    if ($commerce !== null) {
                        /** @var  $element Product */
                        $sourceId = $element->typeId;
                        $sourceSiteId = $element->siteId;
                        try {
                            $sourceHandle = $element->getType()->handle;
                        } catch (InvalidConfigException $e) {
                            Craft::error($e->getMessage(), __METHOD__);
                        }
                        $sourceBundleType = self::PRODUCT_META_BUNDLE;
                    }
                }
                break;
        }

        return [$sourceId, $sourceBundleType, $sourceHandle, $sourceSiteId];
    }

    /**
     * Return all of the content meta bundles
     *
     * @param bool $allSites
     *
     * @return array
     */
    public function getContentMetaBundles(bool $allSites = true): array
    {
        $metaBundles = [];
        $metaBundleSourceHandles = [];
        $metaBundleArrays = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->where(['!=', 'sourceBundleType', self::GLOBAL_META_BUNDLE])
            ->all();
        /** @var  $metaBundleArray array */
        foreach ($metaBundleArrays as $metaBundleArray) {
            $addToMetaBundles = true;
            if (!$allSites) {
                if (\in_array($metaBundleArray['sourceHandle'], $metaBundleSourceHandles, true)) {
                    $addToMetaBundles = false;
                }
                $metaBundleSourceHandles[] = $metaBundleArray['sourceHandle'];
            }
            if ($addToMetaBundles) {
                $metaBundleArray = array_diff_key($metaBundleArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
                $metaBundle = MetaBundle::create($metaBundleArray);
                if ($metaBundle) {
                    $metaBundles[] = $metaBundle;
                }
            }
        }

        return $metaBundles;
    }

    /**
     * Get all of the meta bundles for a given $sourceSiteId
     *
     * @param int $sourceSiteId
     *
     * @return array
     */
    public function getContentMetaBundlesForSiteId(int $sourceSiteId): array
    {
        $metaBundles = [];
        $metaBundleArrays = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->where([
                'sourceSiteId' => $sourceSiteId,
            ])
            ->andWhere(['!=', 'sourceBundleType', self::GLOBAL_META_BUNDLE])
            ->all();
        /** @var  $metaBundleArray array */
        foreach ($metaBundleArrays as $metaBundleArray) {
            $metaBundleArray = array_diff_key($metaBundleArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $metaBundle = MetaBundle::create($metaBundleArray);
            if ($metaBundle) {
                $metaBundles[] = $metaBundle;
            }
        }

        return $metaBundles;
    }

    /**
     * Remove any meta bundles from the $metaBundles array that no longer
     * correspond with a category group or section
     *
     * @param array $metaBundles
     */
    public function pruneVestigialMetaBundles(array &$metaBundles)
    {
        $categories = Craft::$app->getCategories();
        $sections = Craft::$app->getSections();
        foreach ($metaBundles as $key => $metaBundle) {
            $unsetMetaBundle = false;
            /** @var MetaBundle $metaBundle */
            switch ($metaBundle->sourceBundleType) {
                case self::GLOBAL_META_BUNDLE:
                    $unsetMetaBundle = false;
                    break;
                case self::CATEGORYGROUP_META_BUNDLE:
                    $category = $categories->getGroupByHandle($metaBundle->sourceHandle);
                    if ($category === null) {
                        $unsetMetaBundle = true;
                    } else {
                        $siteSettings = $category->getSiteSettings();
                        if (!empty($siteSettings)) {
                            /** @var CategoryGroup_SiteSettings $siteSetting */
                            foreach ($siteSettings as $siteSetting) {
                                if ($siteSetting->siteId == $metaBundle->sourceSiteId && !$siteSetting->hasUrls) {
                                    $unsetMetaBundle = true;
                                }
                            }
                        }
                    }
                    break;
                case self::SECTION_META_BUNDLE:
                    $section = $sections->getSectionByHandle($metaBundle->sourceHandle);
                    if ($section === null) {
                        $unsetMetaBundle = true;
                    } else {
                        $siteSettings = $section->getSiteSettings();
                        if (!empty($siteSettings)) {
                            /** @var Section_SiteSettings $siteSetting */
                            foreach ($siteSettings as $siteSetting) {
                                if ($siteSetting->siteId == $metaBundle->sourceSiteId && !$siteSetting->hasUrls) {
                                    $unsetMetaBundle = true;
                                }
                            }
                        }
                    }
                    break;
                case self::PRODUCT_META_BUNDLE:
                    if (Seomatic::$commerceInstalled) {
                        $commerce = CommercePlugin::getInstance();
                        if ($commerce !== null) {
                            $productType = $commerce->getProductTypes()->getProductTypeByHandle($metaBundle->sourceHandle);
                            if ($productType === null) {
                                $unsetMetaBundle = true;
                            } else {
                                $siteSettings = $productType->getSiteSettings();
                                if (!empty($siteSettings)) {
                                    /** @var Section_SiteSettings $siteSetting */
                                    foreach ($siteSettings as $siteSetting) {
                                        if ($siteSetting->siteId == $metaBundle->sourceSiteId && !$siteSetting->hasUrls) {
                                            $unsetMetaBundle = true;
                                        }
                                    }
                                }
                            }
                        } else {
                            $unsetMetaBundle = true;
                        }
                    } else {
                        $unsetMetaBundle = true;
                    }
                    break;
            }
            if ($unsetMetaBundle) {
                unset($metaBundles[$key]);
            }
        }
    }

    /**
     * Get all of the data from $bundle in containers of $type
     *
     * @param MetaBundle $bundle
     * @param string     $type
     *
     * @return array
     */
    public function getContainerDataFromBundle(MetaBundle $bundle, string $type): array
    {
        $containerData = [];
        foreach ($bundle->metaContainers as $metaContainer) {
            if ($metaContainer::CONTAINER_TYPE === $type) {
                foreach ($metaContainer->data as $dataHandle => $data) {
                    $containerData[$dataHandle] = $data;
                }
            }
        }

        return $containerData;
    }

    /**
     * Create all of the content meta bundles
     */
    public function createContentMetaBundles()
    {
        // Get all of the sections with URLs
        $sections = Craft::$app->getSections()->getAllSections();
        foreach ($sections as $section) {
            $this->createContentMetaBundleForSection($section);
        }

        // Get all of the category groups with URLs
        $categories = Craft::$app->getCategories()->getAllGroups();
        foreach ($categories as $category) {
            $this->createContentMetaBundleForCategoryGroup($category);
        }

        // Get all of the Commerce ProductTypes with URLs
        if (Seomatic::$commerceInstalled) {
            $commerce = CommercePlugin::getInstance();
            if ($commerce !== null) {
                $productTypes = $commerce->getProductTypes()->getAllProductTypes();
                foreach ($productTypes as $productType) {
                    $this->createContentMetaBundleForProductType($productType);
                }
            }
        }
    }

    /**
     * Create the default global meta bundles
     */
    public function createGlobalMetaBundles()
    {
        $sites = Craft::$app->getSites()->getAllSites();
        foreach ($sites as $site) {
            $this->createGlobalMetaBundleForSite($site->id);
        }
    }


    /**
     * Synchronize the passed in metaBundle with the seomatic-config files if
     * there is a newer version of the MetaBundle bundleVersion in the config
     * file
     *
     * @param MetaBundle $metaBundle
     * @param bool       $forceUpdate
     */
    public function syncBundleWithConfig(MetaBundle &$metaBundle, bool $forceUpdate = false)
    {
        $prevMetaBundle = $metaBundle;
        $config = [];
        $sourceType = $metaBundle->sourceBundleType;
        switch ($sourceType) {
            case self::GLOBAL_META_BUNDLE:
                $config = ConfigHelper::getConfigFromFile('globalmeta/Bundle');
                break;
            case self::CATEGORYGROUP_META_BUNDLE:
                $config = ConfigHelper::getConfigFromFile('categorymeta/Bundle');
                break;
            case self::SECTION_META_BUNDLE:
                $config = ConfigHelper::getConfigFromFile('entrymeta/Bundle');
                break;
            case self::PRODUCT_META_BUNDLE:
                if (Seomatic::$commerceInstalled) {
                    $commerce = CommercePlugin::getInstance();
                    if ($commerce !== null) {
                        $config = ConfigHelper::getConfigFromFile('productmeta/Bundle');
                    }
                }
                break;
        }
        // If the config file has a newer version than the $metaBundleArray, merge them
        $shouldUpdate = !empty($config) && version_compare($config['bundleVersion'], $metaBundle->bundleVersion, '>');
        if ($shouldUpdate || $forceUpdate) {
            // Create a new meta bundle
            switch ($sourceType) {
                case self::GLOBAL_META_BUNDLE:
                    $metaBundle = $this->createGlobalMetaBundleForSite(
                        $metaBundle->sourceSiteId,
                        $metaBundle
                    );
                    break;
                case self::CATEGORYGROUP_META_BUNDLE:
                    $category = Craft::$app->getCategories()->getGroupById($metaBundle->sourceId);
                    if ($category !== null) {
                        $metaBundle = $this->createMetaBundleFromCategory(
                            $category,
                            $metaBundle->sourceSiteId,
                            $metaBundle
                        );
                    }
                    break;
                case self::SECTION_META_BUNDLE:
                    $section = Craft::$app->getSections()->getSectionById($metaBundle->sourceId);
                    if ($section !== null) {
                        $metaBundle = $this->createMetaBundleFromSection(
                            $section,
                            $metaBundle->sourceSiteId,
                            $metaBundle
                        );
                        break;
                    }
                case self::PRODUCT_META_BUNDLE:
                    if (Seomatic::$commerceInstalled) {
                        $commerce = CommercePlugin::getInstance();
                        if ($commerce !== null) {
                            $productType = $commerce->getProductTypes()->getProductTypeById($metaBundle->sourceId);
                            if ($productType !== null) {
                                $metaBundle = $this->createMetaBundleFromProductType(
                                    $productType,
                                    $metaBundle->sourceSiteId,
                                    $metaBundle
                                );
                            }
                        }
                    }
                    break;
            }
        }

        // If for some reason we were unable to sync this meta bundle, return the old one
        if ($metaBundle === null) {
            $metaBundle = $prevMetaBundle;
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * @param int             $siteId
     * @param MetaBundle|null $baseConfig
     *
     * @return MetaBundle
     */
    protected function createGlobalMetaBundleForSite(int $siteId, $baseConfig = null): MetaBundle
    {
        // Create a new meta bundle with propagated defaults
        $metaBundleDefaults = ArrayHelper::merge(
            ConfigHelper::getConfigFromFile('globalmeta/Bundle'),
            [
                'sourceSiteId' => $siteId,
            ]
        );
        // The computedType must be set before creating the bundle
        if ($baseConfig !== null) {
            $metaBundleDefaults['metaGlobalVars']['mainEntityOfPage'] = $baseConfig->metaGlobalVars->mainEntityOfPage;
            $metaBundleDefaults['metaSiteVars']['identity']['computedType'] = $baseConfig->metaSiteVars->identity->computedType;
            $metaBundleDefaults['metaSiteVars']['creator']['computedType'] = $baseConfig->metaSiteVars->creator->computedType;
        }
        $metaBundle = MetaBundle::create($metaBundleDefaults);
        if ($metaBundle !== null) {
            if ($baseConfig !== null) {
                $this->mergeMetaBundleSettings($metaBundle, $baseConfig);
            }
            $this->updateMetaBundle($metaBundle, $siteId);
        }

        return $metaBundle;
    }

    /**
     * @param Section         $section
     * @param int             $siteId
     * @param MetaBundle|null $baseConfig
     *
     * @return null|MetaBundle
     */
    protected function createMetaBundleFromSection(Section $section, int $siteId, $baseConfig = null)
    {
        $metaBundle = null;
        // Get the site settings and turn them into arrays
        $siteSettings = $section->getSiteSettings();
        if (!empty($siteSettings[$siteId])) {
            $siteSettingsArray = [];
            /** @var  $siteSetting Section_SiteSettings */
            foreach ($siteSettings as $siteSetting) {
                if ($siteSetting->hasUrls) {
                    $siteSettingArray = $siteSetting->toArray();
                    // Get the site language
                    $siteSettingArray['language'] = MetaValueHelper::getSiteLanguage($siteSetting->siteId);
                    $siteSettingsArray[] = $siteSettingArray;
                }
            }
            $siteSettingsArray = ArrayHelper::index($siteSettingsArray, 'siteId');
            // Create a MetaBundle for this site
            $siteSetting = $siteSettings[$siteId];
            if ($siteSetting->hasUrls) {
                // Get the most recent dateUpdated
                $element = Entry::find()
                    ->section($section->handle)
                    ->siteId($siteSetting->siteId)
                    ->limit(1)
                    ->orderBy(['elements.dateUpdated' => SORT_DESC])
                    ->one();
                if ($element) {
                    $dateUpdated = $element->dateUpdated ?? $element->dateCreated;
                } else {
                    $dateUpdated = new \DateTime();
                }
                // Create a new meta bundle with propagated defaults
                $metaBundleDefaults = ArrayHelper::merge(
                    ConfigHelper::getConfigFromFile('entrymeta/Bundle'),
                    [
                        'sourceId' => $section->id,
                        'sourceName' => $section->name,
                        'sourceHandle' => $section->handle,
                        'sourceType' => $section->type,
                        'sourceTemplate' => $siteSetting->template,
                        'sourceSiteId' => $siteSetting->siteId,
                        'sourceAltSiteSettings' => $siteSettingsArray,
                        'sourceDateUpdated' => $dateUpdated,
                    ]
                );
                // The mainEntityOfPage computedType must be set before creating the bundle
                if ($baseConfig !== null && !empty($baseConfig->metaGlobalVars->mainEntityOfPage)) {
                    $metaBundleDefaults['metaGlobalVars']['mainEntityOfPage'] = $baseConfig->metaGlobalVars->mainEntityOfPage;
                }
                // Merge in any migrated settings from an old Seomatic_Meta Field
                if (!empty($element)) {
                    $element = Craft::$app->getElements()->getElementById($element->id, null, $siteId);
                    if ($element instanceof Element) {
                        $config = MigrationHelper::configFromSeomaticMeta(
                            $element,
                            MigrationHelper::SECTION_MIGRATION_CONTEXT
                        );
                        $metaBundleDefaults = ArrayHelper::merge(
                            $metaBundleDefaults,
                            $config
                        );
                    }
                }
                $metaBundle = MetaBundle::create($metaBundleDefaults);
                if ($baseConfig !== null) {
                    $this->mergeMetaBundleSettings($metaBundle, $baseConfig);
                }
                $this->updateMetaBundle($metaBundle, $siteId);
            }
        }

        return $metaBundle;
    }

    /**
     * @param CategoryGroup   $category
     * @param int             $siteId
     * @param MetaBundle|null $baseConfig
     *
     * @return null|MetaBundle
     */
    protected function createMetaBundleFromCategory(CategoryGroup $category, int $siteId, $baseConfig = null)
    {
        $metaBundle = null;
        // Get the site settings and turn them into arrays
        $siteSettings = $category->getSiteSettings();
        if (!empty($siteSettings[$siteId])) {
            $siteSettingsArray = [];
            /** @var  $siteSetting CategoryGroup_SiteSettings */
            foreach ($siteSettings as $siteSetting) {
                if ($siteSetting->hasUrls) {
                    $siteSettingArray = $siteSetting->toArray();
                    // Get the site language
                    $siteSettingArray['language'] = MetaValueHelper::getSiteLanguage($siteSetting->siteId);
                    $siteSettingsArray[] = $siteSettingArray;
                }
            }
            $siteSettingsArray = ArrayHelper::index($siteSettingsArray, 'siteId');
            // Create a MetaBundle for this site
            $siteSetting = $siteSettings[$siteId];
            if ($siteSetting->hasUrls) {
                // Get the most recent dateUpdated
                $element = Category::find()
                    ->group($category->handle)
                    ->siteId($siteSetting->siteId)
                    ->limit(1)
                    ->orderBy(['elements.dateUpdated' => SORT_DESC])
                    ->one();
                if ($element) {
                    $dateUpdated = $element->dateUpdated ?? $element->dateCreated;
                } else {
                    $dateUpdated = new \DateTime();
                }
                // Create a new meta bundle with propagated defaults
                $metaBundleDefaults = ArrayHelper::merge(
                    ConfigHelper::getConfigFromFile('categorymeta/Bundle'),
                    [
                        'sourceId' => $category->id,
                        'sourceName' => $category->name,
                        'sourceHandle' => $category->handle,
                        'sourceTemplate' => $siteSetting->template,
                        'sourceSiteId' => $siteSetting->siteId,
                        'sourceAltSiteSettings' => $siteSettingsArray,
                        'sourceDateUpdated' => $dateUpdated,
                    ]
                );
                // The mainEntityOfPage computedType must be set before creating the bundle
                if ($baseConfig !== null && !empty($baseConfig->metaGlobalVars->mainEntityOfPage)) {
                    $metaBundleDefaults['metaGlobalVars']['mainEntityOfPage'] = $baseConfig->metaGlobalVars->mainEntityOfPage;
                }
                // Merge in any migrated settings from an old Seomatic_Meta Field
                if (!empty($element)) {
                    $element = Craft::$app->getElements()->getElementById($element->id, null, $siteId);
                    if ($element instanceof Element) {
                        $config = MigrationHelper::configFromSeomaticMeta(
                            $element,
                            MigrationHelper::SECTION_MIGRATION_CONTEXT
                        );
                        $metaBundleDefaults = ArrayHelper::merge(
                            $metaBundleDefaults,
                            $config
                        );
                    }
                }
                $metaBundle = MetaBundle::create($metaBundleDefaults);
                if ($baseConfig !== null) {
                    $this->mergeMetaBundleSettings($metaBundle, $baseConfig);
                }
                $this->updateMetaBundle($metaBundle, $siteId);
            }
        }

        return $metaBundle;
    }


    /**
     * @param ProductType     $productType
     * @param int             $siteId
     * @param MetaBundle|null $baseConfig
     *
     * @return null|MetaBundle
     */
    protected function createMetaBundleFromProductType(ProductType $productType, int $siteId, $baseConfig = null)
    {
        $metaBundle = null;
        // Get the site settings and turn them into arrays
        $siteSettings = $productType->getSiteSettings();
        if (!empty($siteSettings[$siteId])) {
            $siteSettingsArray = [];
            /** @var  $siteSetting ProductTypeSite */
            foreach ($siteSettings as $siteSetting) {
                if ($siteSetting->hasUrls) {
                    $siteSettingArray = $siteSetting->toArray();
                    // Get the site language
                    $siteSettingArray['language'] = MetaValueHelper::getSiteLanguage($siteSetting->siteId);
                    $siteSettingsArray[] = $siteSettingArray;
                }
            }
            $siteSettingsArray = ArrayHelper::index($siteSettingsArray, 'siteId');
            // Create a MetaBundle for this site
            $siteSetting = $siteSettings[$siteId];
            if ($siteSetting->hasUrls) {
                // Get the most recent dateUpdated
                $element = Product::find()
                    ->type($productType->handle)
                    ->siteId($siteSetting->siteId)
                    ->limit(1)
                    ->orderBy(['elements.dateUpdated' => SORT_DESC])
                    ->one();
                if ($element) {
                    $dateUpdated = $element->dateUpdated ?? $element->dateCreated;
                } else {
                    $dateUpdated = new \DateTime();
                }
                // Create a new meta bundle with propagated defaults
                $metaBundleDefaults = ArrayHelper::merge(
                    ConfigHelper::getConfigFromFile('productmeta/Bundle'),
                    [
                        'sourceId' => $productType->id,
                        'sourceName' => $productType->name,
                        'sourceHandle' => $productType->handle,
                        'sourceTemplate' => $siteSetting->template,
                        'sourceSiteId' => $siteSetting->siteId,
                        'sourceAltSiteSettings' => $siteSettingsArray,
                        'sourceDateUpdated' => $dateUpdated,
                    ]
                );
                // The mainEntityOfPage computedType must be set before creating the bundle
                if ($baseConfig !== null && !empty($baseConfig->metaGlobalVars->mainEntityOfPage)) {
                    $metaBundleDefaults['metaGlobalVars']['mainEntityOfPage'] = $baseConfig->metaGlobalVars->mainEntityOfPage;
                }
                // Merge in any migrated settings from an old Seomatic_Meta Field
                if (!empty($element)) {
                    $element = Craft::$app->getElements()->getElementById($element->id, null, $siteId);
                    if ($element instanceof Element) {
                        $config = MigrationHelper::configFromSeomaticMeta(
                            $element,
                            MigrationHelper::SECTION_MIGRATION_CONTEXT
                        );
                        $metaBundleDefaults = ArrayHelper::merge(
                            $metaBundleDefaults,
                            $config
                        );
                    }
                }
                $metaBundle = MetaBundle::create($metaBundleDefaults);
                if ($baseConfig !== null) {
                    $this->mergeMetaBundleSettings($metaBundle, $baseConfig);
                }
                $this->updateMetaBundle($metaBundle, $siteId);
            }
        }

        return $metaBundle;
    }

    /**
     * Preserve user settings from the meta bundle when updating it from the
     * config
     *
     * @param MetaBundle $metaBundle The new meta bundle
     * @param MetaBundle $baseConfig The existing meta bundle to preserve
     *                               settings from
     */
    protected function mergeMetaBundleSettings(MetaBundle $metaBundle, MetaBundle $baseConfig)
    {
        // Preserve the metaGlobalVars
        $attributes = $baseConfig->metaGlobalVars->getAttributes();
        $metaBundle->metaGlobalVars->setAttributes($attributes);
        // Preserve the metaSiteVars
        if ($baseConfig->metaSiteVars !== null) {
            $attributes = $baseConfig->metaSiteVars->getAttributes();
            $metaBundle->metaSiteVars->setAttributes($attributes);
            if ($baseConfig->metaSiteVars->identity !== null) {
                $attributes = $baseConfig->metaSiteVars->identity->getAttributes();
                $metaBundle->metaSiteVars->identity->setAttributes($attributes);
            }
            if ($baseConfig->metaSiteVars->creator !== null) {
                $attributes = $baseConfig->metaSiteVars->creator->getAttributes();
                $metaBundle->metaSiteVars->creator->setAttributes($attributes);
            }
        }
        // Preserve the Frontend Templates
        $attributes = $baseConfig->frontendTemplatesContainer->getAttributes();
        $metaBundle->frontendTemplatesContainer->setAttributes($attributes);
        // Preserve the metaSitemapVars
        $attributes = $baseConfig->metaSitemapVars->getAttributes();
        $metaBundle->metaSitemapVars->setAttributes($attributes);
        // Preserve the metaBundleSettings
        $attributes = $baseConfig->metaBundleSettings->getAttributes();
        $metaBundle->metaBundleSettings->setAttributes($attributes);
        // Preserve the vars from each Tracking Script
        $scripts = Seomatic::$plugin->metaBundles->getContainerDataFromBundle(
            $baseConfig,
            MetaScriptContainer::CONTAINER_TYPE
        );
        foreach ($scripts as $scriptHandle => $scriptData) {
            foreach ($metaBundle->metaContainers as $metaContainer) {
                if ($metaContainer::CONTAINER_TYPE === MetaScriptContainer::CONTAINER_TYPE) {
                    $data = $metaContainer->getData($scriptHandle);
                    if ($data) {
                        /** @var array $scriptData */
                        foreach ($scriptData as $key => $value) {
                            if (\is_array($value)) {
                                foreach ($value as $varsKey => $varsValue) {
                                    if (isset($varsValue['value'])) {
                                        $data->$key[$varsKey]['value'] = $varsValue['value'];
                                    }
                                }
                            } else {
                                if ($key === 'include') {
                                    $data->$key = $value;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
