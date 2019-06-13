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

use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\fields\SeoSettings;
use nystudio107\seomatic\seoelements\SeoCategory;
use nystudio107\seomatic\seoelements\SeoEntry;
use nystudio107\seomatic\seoelements\SeoProduct;
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
use craft\base\Model;
use craft\db\Query;
use craft\models\Section_SiteSettings;
use craft\models\CategoryGroup;
use craft\models\Section;
use craft\models\Site;

use craft\commerce\models\ProductType;

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
     * @param bool $parse Whether the resulting metabundle should be parsed
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
            $id = count($this->metaBundles);
            $this->metaBundles[$id] = $metaBundle;
            $this->metaBundlesBySourceId[$sourceBundleType][$sourceId][$sourceSiteId] = $id;
        } else {
            // If it doesn't exist, create it
            $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
            if ($seoElement !== null) {
                $sourceModel = $seoElement::sourceModelFromId($sourceId);
                if ($sourceModel) {
                    $metaBundle = $this->createMetaBundleFromSeoElement($seoElement, $sourceModel, $sourceSiteId);
                }
            }
        }

        return $metaBundle;
    }

    /**
     * @param string $sourceBundleType
     * @param string $sourceHandle
     * @param int    $sourceSiteId
     *
     * @return null|MetaBundle
     */
    public function getMetaBundleBySourceHandle(string $sourceBundleType, string $sourceHandle, int $sourceSiteId)
    {
        $metaBundle = null;
        // See if we have the meta bundle cached
        if (!empty($this->metaBundlesBySourceHandle[$sourceBundleType][$sourceHandle][$sourceSiteId])) {
            $id = $this->metaBundlesBySourceHandle[$sourceBundleType][$sourceHandle][$sourceSiteId];
            if (!empty($this->metaBundles[$id])) {
                return $this->metaBundles[$id];
            }
        }
        // Look for a matching meta bundle in the db
        $metaBundleArray = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->where([
                'sourceBundleType' => $sourceBundleType,
                'sourceHandle' => $sourceHandle,
                'sourceSiteId' => $sourceSiteId,
            ])
            ->one();
        if (!empty($metaBundleArray)) {
            $metaBundleArray = array_diff_key($metaBundleArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $metaBundle = MetaBundle::create($metaBundleArray);
            $id = count($this->metaBundles);
            $this->metaBundles[$id] = $metaBundle;
            $this->metaBundlesBySourceHandle[$sourceBundleType][$sourceHandle][$sourceSiteId] = $id;
        } else {
            // If it doesn't exist, create it
            $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
            if ($seoElement !== null) {
                $sourceModel = $seoElement::sourceModelFromHandle($sourceHandle);
                if ($sourceModel) {
                    $metaBundle = $this->createMetaBundleFromSeoElement($seoElement, $sourceModel, $sourceSiteId);
                }
            }
        }

        return $metaBundle;
    }

    /**
     * Invalidate the caches and data structures associated with this MetaBundle
     *
     * @param string   $sourceBundleType
     * @param int|null $sourceId
     * @param bool     $isNew
     */
    public function invalidateMetaBundleById(string $sourceBundleType, int $sourceId, bool $isNew = false)
    {
        $metaBundleInvalidated = false;
        $sites = Craft::$app->getSites()->getAllSites();
        foreach ($sites as $site) {
            // See if this is a section we are tracking
            $metaBundle = $this->getMetaBundleBySourceId($sourceBundleType, $sourceId, $site->id);
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
                    if ($sourceBundleType !== self::GLOBAL_META_BUNDLE) {
                        $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
                        if ($seoElement !== null) {
                            /** @var Section|CategoryGroup|ProductType $sourceModel */
                            $sourceModel = $seoElement::sourceModelFromId($sourceId);
                            if ($sourceModel !== null) {
                                $metaBundle->sourceName = $sourceModel->name;
                                $metaBundle->sourceHandle = $sourceModel->handle;
                            }
                        }
                    }
                    // Invalidate caches after an existing section is saved
                    Seomatic::$plugin->metaContainers->invalidateContainerCacheById($sourceId);
                    if (Seomatic::$settings->regenerateSitemapsAutomatically) {
                        Seomatic::$plugin->sitemaps->invalidateSitemapCache(
                            $metaBundle->sourceHandle,
                            $metaBundle->sourceSiteId,
                            $metaBundle->sourceBundleType
                        );
                    }
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
                $metaBundleInvalidated = true;
                Seomatic::$plugin->metaContainers->invalidateContainerCacheByPath($uri, $sourceSiteId);
                // Invalidate the sitemap cache
                $metaBundle = $this->getMetaBundleBySourceId($sourceBundleType, $sourceId, $sourceSiteId);
                if ($metaBundle) {
                    if ($element) {
                        $dateUpdated = $element->dateUpdated ?? $element->dateCreated;
                    } else {
                        try {
                            $dateUpdated = new \DateTime();
                        } catch (\Exception $e) {
                        }
                    }
                    $metaBundle->sourceDateUpdated = $dateUpdated;
                    // Update the meta bundle data
                    $this->updateMetaBundle($metaBundle, $sourceSiteId);
                    if ($metaBundle
                        && $element->scenario !== Element::SCENARIO_ESSENTIALS
                        && Seomatic::$settings->regenerateSitemapsAutomatically) {
                        Seomatic::$plugin->sitemaps->invalidateSitemapCache(
                            $metaBundle->sourceHandle,
                            $metaBundle->sourceSiteId,
                            $metaBundle->sourceBundleType
                        );
                    }
                }
            }
            // If we've invalidated a meta bundle, we need to invalidate the sitemap index, too
            if ($metaBundleInvalidated && $element->scenario !== Element::SCENARIO_ESSENTIALS) {
                Seomatic::$plugin->sitemaps->invalidateSitemapIndexCache();
            }
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
     * @param Element $element
     *
     * @return array
     */
    public function getMetaSourceFromElement(Element $element): array
    {
        $sourceId = 0;
        $sourceSiteId = 0;
        $sourceHandle = '';
        // See if this is a section we are tracking
        $sourceBundleType = Seomatic::$plugin->seoElements->getMetaBundleTypeFromElement($element);
        if ($sourceBundleType) {
            $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
            if ($seoElement) {
                $sourceId = $seoElement::sourceIdFromElement($element);
                $sourceHandle = $seoElement::sourceHandleFromElement($element);
                $sourceSiteId = $element->siteId;
            }
        } else {
            $sourceBundleType = '';
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
     * Set fields the user is unable to edit to an empty string, so they are
     * filtered out when meta containers are combined
     *
     * @param MetaBundle $metaBundle
     * @param string     $fieldHandle
     */
    public function pruneFieldMetaBundleSettings(MetaBundle $metaBundle, string $fieldHandle)
    {
        /** @var SeoSettings $seoSettingsField */
        $seoSettingsField = Craft::$app->getFields()->getFieldByHandle($fieldHandle);
        $seoSettingsEnabledFields = array_flip(array_merge(
            $seoSettingsField->generalEnabledFields,
            $seoSettingsField->twitterEnabledFields,
            $seoSettingsField->facebookEnabledFields,
            $seoSettingsField->sitemapEnabledFields
        ));
        // metaGlobalVars
        /* Don't prune the metaGlobalVars
        $attributes = $metaBundle->metaGlobalVars->getAttributes();
        $emptyValues = array_fill_keys(array_keys(array_diff_key($attributes, $seoSettingsEnabledFields)), '');
        $attributes = array_merge($attributes, $emptyValues);
        $metaBundle->metaGlobalVars->setAttributes($attributes, false);
        */
        // Handle the mainEntityOfPage
        if (!\in_array('mainEntityOfPage', $seoSettingsField->generalEnabledFields, false)) {
            $metaBundle->metaGlobalVars->mainEntityOfPage = '';
        }
        // metaSiteVars
        $attributes = $metaBundle->metaSiteVars->getAttributes();
        $emptyValues = array_fill_keys(array_keys(array_diff_key($attributes, $seoSettingsEnabledFields)), '');
        $attributes = array_merge($attributes, $emptyValues);
        $metaBundle->metaSiteVars->setAttributes($attributes, false);
        // metaSitemapVars
        $attributes = $metaBundle->metaSitemapVars->getAttributes();
        $emptyValues = array_fill_keys(array_keys(array_diff_key($attributes, $seoSettingsEnabledFields)), '');
        $attributes = array_merge($attributes, $emptyValues);
        $metaBundle->metaSitemapVars->setAttributes($attributes, false);
    }

    /**
     * Remove any meta bundles from the $metaBundles array that no longer
     * correspond with a category group or section
     *
     * @param array $metaBundles
     */
    public function pruneVestigialMetaBundles(array &$metaBundles)
    {
        foreach ($metaBundles as $key => $metaBundle) {
            $unsetMetaBundle = false;
            $sourceBundleType = $metaBundle->sourceBundleType;
            if ($sourceBundleType !== self::GLOBAL_META_BUNDLE) {
                $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
                if ($seoElement) {
                    $sourceModel = $seoElement::sourceModelFromHandle($metaBundle->sourceHandle);
                    /** @var Section|CategoryGroup|ProductType $sourceModel */
                    if ($sourceModel === null) {
                        $unsetMetaBundle = true;
                    } else {
                        $unsetMetaBundle = true;
                        $siteSettings = $sourceModel->getSiteSettings();
                        if (!empty($siteSettings)) {
                            /** @var Section_SiteSettings $siteSetting */
                            foreach ($siteSettings as $siteSetting) {
                                if ($siteSetting->siteId == $metaBundle->sourceSiteId && $siteSetting->hasUrls) {
                                    $unsetMetaBundle = false;
                                }
                            }
                        }
                    }
                } else {
                    $unsetMetaBundle = true;
                }
            }
            /** @var MetaBundle $metaBundle */
            if ($unsetMetaBundle) {
                unset($metaBundles[$key]);
            }
        }
        ArrayHelper::multisort($metaBundles, 'sourceName');
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
        $seoElements = Seomatic::$plugin->seoElements->getAllSeoElementTypes();
        foreach ($seoElements as $seoElement) {
            /** @var SeoElementInterface $seoElement */
            $seoElement::createAllContentMetaBundles();
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
        $sourceBundleType = $metaBundle->sourceBundleType;
        $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($sourceBundleType);
        if ($seoElement) {
            $configPath = $seoElement::configFilePath();
            $config = ConfigHelper::getConfigFromFile($configPath);
        }
        // If the config file has a newer version than the $metaBundleArray, merge them
        $shouldUpdate = !empty($config) && version_compare($config['bundleVersion'], $metaBundle->bundleVersion, '>');
        if ($shouldUpdate || $forceUpdate) {
            // Create a new meta bundle
            if ($sourceBundleType === self::GLOBAL_META_BUNDLE) {
                $metaBundle = $this->createGlobalMetaBundleForSite(
                    $metaBundle->sourceSiteId,
                    $metaBundle
                );
            } else {
                $sourceModel = $seoElement::sourceModelFromId($metaBundle->sourceId);
                if ($sourceModel) {
                    $metaBundle = $this->createMetaBundleFromSeoElement(
                        $seoElement,
                        $sourceModel,
                        $metaBundle->sourceSiteId,
                        $metaBundle
                    );
                }
            }
        }

        // If for some reason we were unable to sync this meta bundle, return the old one
        if ($metaBundle === null) {
            $metaBundle = $prevMetaBundle;
        }
    }

    /**
     * @param SeoElementInterface $seoElement
     * @param Model               $sourceModel
     * @param int                 $sourceSiteId
     * @param MetaBundle|null     $baseConfig
     *
     * @return MetaBundle|null
     */
    public function createMetaBundleFromSeoElement(
        $seoElement,
        $sourceModel,
        int $sourceSiteId,
        $baseConfig = null
    ) {
        $metaBundle = null;
        // Get the site settings and turn them into arrays
        /** @var Section|CategoryGroup|ProductType $sourceModel */
        $siteSettings = $sourceModel->getSiteSettings();
        if (!empty($siteSettings[$sourceSiteId])) {
            $siteSettingsArray = [];
            /** @var Section_SiteSettings $siteSetting  */
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
            $siteSetting = $siteSettings[$sourceSiteId];
            if ($siteSetting->hasUrls) {
                // Get the most recent dateUpdated
                $element = $seoElement::mostRecentElement($sourceModel, $sourceSiteId);
                /** @var Element $element */
                if ($element) {
                    $dateUpdated = $element->dateUpdated ?? $element->dateCreated;
                } else {
                    try {
                        $dateUpdated = new \DateTime();
                    } catch (\Exception $e) {
                    }
                }
                // Create a new meta bundle with propagated defaults
                $metaBundleDefaults = ArrayHelper::merge(
                    $seoElement::metaBundleConfig($sourceModel),
                    [
                        'sourceTemplate' => $siteSetting->template,
                        'sourceSiteId' => $siteSetting->siteId,
                        'sourceAltSiteSettings' => $siteSettingsArray,
                        'sourceDateUpdated' => $dateUpdated,
                    ]
                );
                // The mainEntityOfPage computedType must be set before creating the bundle
                if ($baseConfig !== null && !empty($baseConfig->metaGlobalVars->mainEntityOfPage)) {
                    $metaBundleDefaults['metaGlobalVars']['mainEntityOfPage'] =
                        $baseConfig->metaGlobalVars->mainEntityOfPage;
                }
                // Merge in any migrated settings from an old Seomatic_Meta Field
                if ($element !== null) {
                    /** @var Element $elementFromSite */
                    $elementFromSite = Craft::$app->getElements()->getElementById($element->id, null, $sourceSiteId);
                    if ($element instanceof Element) {
                        $config = MigrationHelper::configFromSeomaticMeta(
                            $elementFromSite,
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
                $this->updateMetaBundle($metaBundle, $sourceSiteId);
            }
        }

        return $metaBundle;
    }

    /**
     * @param int             $siteId
     * @param MetaBundle|null $baseConfig
     *
     * @return MetaBundle
     */
    public function createGlobalMetaBundleForSite(int $siteId, $baseConfig = null): MetaBundle
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
            $metaBundleDefaults['metaSiteVars']['identity']['computedType'] =
                $baseConfig->metaSiteVars->identity->computedType;
            $metaBundleDefaults['metaSiteVars']['creator']['computedType'] =
                $baseConfig->metaSiteVars->creator->computedType;
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

    // Protected Methods
    // =========================================================================

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
        // Preserve the Frontend Templates, but add in any new containers
        foreach ($baseConfig->frontendTemplatesContainer->data as $key => $value) {
            $metaBundle->frontendTemplatesContainer->data[$key] = $value;
        }
        // Preserve the metaSitemapVars
        $attributes = $baseConfig->metaSitemapVars->getAttributes();
        $metaBundle->metaSitemapVars->setAttributes($attributes);
        // Preserve the metaBundleSettings
        $attributes = $baseConfig->metaBundleSettings->getAttributes();
        $metaBundle->metaBundleSettings->setAttributes($attributes);
        // Preserve the Script containers, but add in any new containers
        foreach ($baseConfig->metaContainers as $baseMetaContainerName => $baseMetaContainer) {
            if ($baseMetaContainer::CONTAINER_TYPE === MetaScriptContainer::CONTAINER_TYPE) {
                foreach ($baseMetaContainer->data as $key => $value) {
                    if (!empty($metaBundle->metaContainers[$baseMetaContainerName])) {
                        $metaBundle->metaContainers[$baseMetaContainerName]->data[$key] = $value;
                    }
                }
            }
        }
    }
}
