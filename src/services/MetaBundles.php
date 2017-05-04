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

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\MetaValue;
use nystudio107\seomatic\models\MetaBundle;
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

    const IGNORE_DB_ATTRIBUTES = [
        'id',
        'dateCreated',
        'dateUpdated',
        'uid',
    ];

    const META_BUNDLE_UPDATE_ATTRIBUTES = [
        'sourceName',
        'sourceHandle',
        'sourceTemplate',
        'sourceSiteId',
        'sourceAltSiteSettings',
        'sourceDateUpdated',
    ];

    // Protected Properties
    // =========================================================================

    /**
     * @var MetaBundle[] indexed by [id]
     */
    protected $metaBundles = [];

    /**
     * @var array indexed by [sourceId][siteId] = id
     */
    protected $metaBundlesBySourceId = [];

    /**
     * @var array indexed by [sourceHandle][siteId] = id
     */
    protected $metaBundlesBySourceHandle = [];

    // Public Methods
    // =========================================================================

    /**
     * Invalidate the caches and data structures associated with this MetaBundle
     *
     * @param string $sourceType
     * @param int    $sourceId
     * @param bool   $isNew
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
                    // Invalidate caches after an existing section is saved
                    Seomatic::$plugin->metaContainers->invalidateContainerCacheById($sourceId);
                    Seomatic::$plugin->sitemaps->invalidateSitemapCache(
                        $metaBundle->sourceHandle,
                        $metaBundle->sourceSiteId
                    );
                    // Update the meta bundle data
                    $this->updateMetaBundleById($sourceType, $sourceId, $site->id);
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
            // Invalidate sitemap caches after an existing element is saved
            list($sourceId, $siteId) = $this->getMetaSourceIdFromElement($element);
            if ($sourceId) {
                Craft::info(
                    'Invalidating meta bundle: '
                    .$element->uri
                    .'/'
                    .$siteId,
                    __METHOD__
                );
                if (!$isNew) {
                    $sourceType = '';
                    $metaBundleInvalidated = true;
                    Seomatic::$plugin->metaContainers->invalidateContainerCacheByPath($element->uri, $siteId);
                    switch ($element::className()) {
                        case Entry::class:
                            /** @var  $element Entry */
                            $sourceType = self::SECTION_META_BUNDLE;
                            break;

                        case Category::class:
                            /** @var  $element Category */
                            $sourceType = self::CATEGORYGROUP_META_BUNDLE;
                            break;
                        // @todo handle commerce products
                    }
                    // Update the meta bundle data
                    $this->updateMetaBundleById($sourceType, $sourceId, $siteId);
                    // Invalidate the sitemap cache
                    $metaBundle = $this->getMetaBundleBySourceId($sourceType, $sourceId, $siteId);
                    if ($metaBundle) {
                        Seomatic::$plugin->sitemaps->invalidateSitemapCache(
                            $metaBundle->sourceHandle,
                            $metaBundle->sourceSiteId
                        );
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
     * @param string   $sourceType
     * @param int      $sourceId
     * @param int|null $siteId
     *
     * @return null|MetaBundle
     */
    public function getMetaBundleBySourceId(string $sourceType, int $sourceId, int $siteId)
    {
        $metaBundle = null;
        // See if we have the meta bundle cached
        if (!empty($this->metaBundlesBySourceId[$sourceType][$sourceId][$siteId])) {
            $id = $this->metaBundlesBySourceId[$sourceType][$sourceId][$siteId];
            if (!empty($this->metaBundles[$id])) {
                return $this->metaBundles[$id];
            }
        }
        // Look for a matching meta bundle in the db
        $metaBundleArray = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->where([
                'sourceBundleType' => $sourceType,
                'sourceId' => $sourceId,
                'sourceSiteId' => $siteId,
            ])
            ->one();
        if (!empty($metaBundleArray)) {
            $metaBundleArray = array_diff_key($metaBundleArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $metaBundle = MetaBundle::create($metaBundleArray);
            $id = count($this->metaBundles);
            $this->metaBundles[$id] = $metaBundle;
            $this->metaBundlesBySourceId[$sourceType][$sourceId][$siteId] = $id;
        }

        return $metaBundle;
    }


    /**
     * @param string $sourceType
     * @param string $sourceHandle
     * @param int    $siteId
     *
     * @return null|MetaBundle
     */
    public function getMetaBundleBySourceHandle(string $sourceType, string $sourceHandle, int $siteId)
    {
        $metaBundle = null;
        // See if we have the meta bundle cached
        if (!empty($this->metaBundlesBySourceHandle[$sourceType][$sourceHandle][$siteId])) {
            $id = $this->metaBundlesBySourceHandle[$sourceType][$sourceHandle][$siteId];
            if (!empty($this->metaBundles[$id])) {
                return $this->metaBundles[$id];
            }
        }
        // Look for a matching meta bundle in the db
        $metaBundleArray = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->where([
                'sourceHandle' => $sourceHandle,
                'sourceSiteId' => $siteId,
            ])
            ->one();
        if (!empty($metaBundleArray)) {
            $metaBundleArray = array_diff_key($metaBundleArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $metaBundle = MetaBundle::create($metaBundleArray);
            $id = count($this->metaBundles);
            $this->metaBundles[$id] = $metaBundle;
            $this->metaBundlesBySourceHandle[$sourceType][$sourceHandle][$siteId] = $id;
        }

        return $metaBundle;
    }

    /**
     * Update the meta bundle to make sure it's in sync
     *
     * @param string $sourceType
     * @param int    $sourceId
     * @param int    $sourceSiteId
     */
    public function updateMetaBundleById(string $sourceType, int $sourceId, int $sourceSiteId)
    {
        $metaBundleRecord = null;
        // Look for a matching meta bundle in the db
        $metaBundleRecord = MetaBundleRecord::findOne([
            'sourceBundleType' => $sourceType,
            'sourceId' => $sourceId,
            'sourceSiteId' => $sourceSiteId,
        ]);
        /** @var  $metaBundleRecord MetaBundle */
        if ($metaBundleRecord) {
            switch ($metaBundleRecord->sourceBundleType) {
                case self::SECTION_META_BUNDLE:
                    /** @var  $section Section */
                    $section = Craft::$app->getSections()->getSectionById($sourceId);
                    $metaBundle = $this->createMetaBundleFromSection($section, $sourceSiteId);
                    if ($metaBundle) {
                        $metaBundle->validate(null, true);
                        /** @var  $metaBundleRecord MetaBundleRecord */
                        $metaBundleRecord->setAttributes(
                            $metaBundle->getAttributes(self::META_BUNDLE_UPDATE_ATTRIBUTES),
                            false
                        );
                        $metaBundleRecord->save();
                        Craft::info(
                            'Meta bundle updated: '
                            .$sourceId
                            .' from siteId: '
                            .$sourceSiteId,
                            __METHOD__
                        );
                    }
                    break;

                case self::CATEGORYGROUP_META_BUNDLE:
                    /** @var  $category CategoryGroup */
                    $category = Craft::$app->getCategories()->getCategoryById($sourceId);
                    $metaBundle = $this->createMetaBundleFromCategory($category, $sourceSiteId);
                    if ($metaBundle) {
                        /** @var  $metaBundleRecord MetaBundleRecord */
                        $metaBundleRecord->setAttributes(
                            $metaBundle->getAttributes(self::META_BUNDLE_UPDATE_ATTRIBUTES),
                            false
                        );
                        $metaBundleRecord->save();
                    }
                    Craft::info(
                        'Meta bundle updated: '
                        .$sourceId
                        .' from siteId: '
                        .$sourceSiteId,
                        __METHOD__
                    );
                    break;
                // @todo handle commerce products
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
            $metaBundle = null;
            $metaBundle = $this->createMetaBundleFromSection($section, $site->id);
            // Create the meta bundle
            if ($metaBundle) {
                $metaBundleRecord = new MetaBundleRecord($metaBundle->getAttributes());
                $metaBundleRecord->save();
                Craft::info(
                    'Meta bundle created: '
                    . $metaBundle->sourceId
                    .' from siteId: '
                    . $site->id,
                    __METHOD__
                );
            }
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
            $metaBundle = null;
            $metaBundle = $this->createMetaBundleFromCategory($category, $site->id);
            // Create the meta bundle
            if ($metaBundle) {
                $metaBundleRecord = new MetaBundleRecord($metaBundle->getAttributes());
                $metaBundleRecord->save();
                Craft::info(
                    'Meta bundle created: '
                    . $metaBundle->sourceId
                    .' from siteId: '
                    . $site->id,
                    __METHOD__
                );
            }
        }
    }

    /**
     * Delete a meta bundle by $sourceId
     *
     * @param string $sourceType
     * @param int    $sourceId
     */
    public function deleteMetaBundleBySourceId(string $sourceType, int $sourceId)
    {
        $sites = Craft::$app->getSites()->getAllSites();
        /** @var  $site Site */
        foreach ($sites as $site) {
            $metaBundleRecord = null;
            // Look for a matching meta bundle in the db
            $metaBundleRecord = MetaBundleRecord::findOne([
                'sourceBundleType' => $sourceType,
                'sourceId' => $sourceId,
                'sourceSiteId' => $site->id,
            ]);

            if ($metaBundleRecord) {
                $metaBundleRecord->delete();
                Craft::info(
                    'Meta bundle deleted: '
                    .$sourceId
                    .' from siteId: '
                    . $site->id,
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
    public function getMetaSourceIdFromElement(Element $element): array
    {
        $sourceId = 0;
        $siteId = 0;
        // See if this is a section we are tracking
        switch ($element::className()) {
            case Entry::class:
                /** @var  $element Entry */
                $sourceId = $element->sectionId;
                $siteId = $element->siteId;
                break;

            case Category::class:
                /** @var  $element Category */
                $sourceId = $element->groupId;
                $siteId = $element->siteId;
                break;
            // @todo handle commerce products
        }

        return [$sourceId, $siteId];
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
                if (in_array($metaBundleArray['sourceHandle'], $metaBundleSourceHandles)) {
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
     * Get the global meta bundle for the site
     *
     * @param int $sourceSiteId
     *
     * @return null|MetaBundle
     */
    public function getGlobalMetaBundle(int $sourceSiteId)
    {
        $metaBundle = null;
        $metaBundleArray = (new Query())
            ->from(['{{%seomatic_metabundles}}'])
            ->where([
                'sourceBundleType' => self::GLOBAL_META_BUNDLE,
                'sourceSiteId' => $sourceSiteId,
            ])
            ->one();
        if (!empty($metaBundleArray)) {
            $metaBundleArray = array_diff_key($metaBundleArray, array_flip(self::IGNORE_DB_ATTRIBUTES));
            $metaBundle = MetaBundle::create($metaBundleArray);
        }

        return $metaBundle;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @param Section $section
     * @param int     $siteId
     *
     * @return null|MetaBundle
     */
    protected function createMetaBundleFromSection(Section $section, int $siteId)
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
                    $siteSettingArray['language'] = MetaValue::getSiteLanguage($siteSetting->siteId);
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
                $metaBundleDefaults = array_merge(
                    ConfigHelper::getConfigFromFile('EntryMetaBundle', 'defaults'),
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
                $metaBundle = new MetaBundle($metaBundleDefaults);
            }
        }

        return $metaBundle;
    }

    /**
     * @param CategoryGroup $category
     * @param int           $siteId
     *
     * @return null|MetaBundle
     */
    protected function createMetaBundleFromCategory(CategoryGroup $category, int $siteId)
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
                    $siteSettingArray['language'] = MetaValue::getSiteLanguage($siteSetting->siteId);
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
                $metaBundleDefaults = array_merge(
                    ConfigHelper::getConfigFromFile('CategoryMetaBundle', 'defaults'),
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
                $metaBundle = new MetaBundle($metaBundleDefaults);
            }
        }

        return $metaBundle;
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
        // @todo Get all of the Commerce Products with URLs
    }

    /**
     * Create the default global meta bundles
     */
    public function createGlobalMetaBundles()
    {
        $sites = Craft::$app->getSites()->getAllSites();
        foreach ($sites as $site) {
            // Create a new meta bundle with propagated defaults
            $metaBundleDefaults = array_merge(
                ConfigHelper::getConfigFromFile('GlobalMetaBundle', 'defaults'),
                [
                    'sourceSiteId' => $site->id,
                ]
            );
            $metaBundle = new MetaBundle($metaBundleDefaults);
            // Save it out to a record
            $metaBundleRecord = new MetaBundleRecord($metaBundle->getAttributes());
            $metaBundleRecord->save();
        }
    }
}
