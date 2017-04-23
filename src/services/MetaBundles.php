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
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\records\MetaBundle as MetaBundleRecord;

use Craft;
use craft\base\Component;
use craft\elements\Category;
use craft\elements\Entry;
use craft\helpers\ArrayHelper;
use craft\models\Section_SiteSettings;
use craft\models\CategoryGroup_SiteSettings;
use craft\models\CategoryGroup;
use craft\models\Section;

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
     * @var array indexed by [sourceId][siteId] = id
     */
    protected $metaBundlesBySourceId = [];

    /**
     * @var array indexed by [sourceHandle][siteId] = id
     */
    protected $metaBundlesBySourceHandle = [];

    /**
     * @var array indexed by [sourceTemplate][siteId] = id
     */
    protected $metaBundlesBySourceTemplate = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Invalidate the caches and data structures associated with this MetaBundle
     *
     * @param int  $sourceId
     * @param bool $isNew
     */
    public function invalidateMetaBundle(int $sourceId, bool $isNew)
    {
        $metaBundleInvalidated = false;
        $sites = Craft::$app->getSites()->getAllSites();
        foreach ($sites as $site) {
            // See if this is a section we are tracking
            $metaBundle = $this->getMetaBundleBySourceId($sourceId, $site->id);
            if ($metaBundle) {
                Craft::info(
                    'Invalidating meta bundle: '
                        . $metaBundle->sourceHandle
                        . ' from siteId: '
                        . $site->id,
                    'seomatic'
                );
                // Invalidate sitemap caches after an existing section is saved
                if (!$isNew) {
                    $metaBundleInvalidated = true;
                    Seomatic::$plugin->sitemaps->invalidateSitemapCache(
                        $metaBundle->sourceHandle,
                        $metaBundle->sourceSiteId
                    );
                }
            }
        }
        // If we've invalidated a meta bundle, we need to invalidate the sitemap index, too
        if ($metaBundleInvalidated) {
            Seomatic::$plugin->sitemaps->invalidateSitemapIndexCache();
        }
    }

    /**
     * @param int      $sourceId
     * @param int|null $siteId
     *
     * @return null|MetaBundle
     */
    public function getMetaBundleBySourceId(int $sourceId, int $siteId)
    {
        $metaBundle = null;
        // See if we have the meta bundle cached
        if (!empty($this->metaBundlesBySourceId[$sourceId][$siteId])) {
            $id = $this->metaBundlesBySourceId[$sourceId][$siteId];
            if (!empty($this->metaBundles[$id])) {
                return $this->metaBundles[$id];
            }
        }
        // Look for a matching meta bundle in the db
        $metaBundleRecord = MetaBundleRecord::findOne([
            'sourceId' => $sourceId,
            'sourceSiteId' => $siteId,
        ]);
        if ($metaBundleRecord) {
            $metaBundle = MetaBundle::create($metaBundleRecord->getAttributes(null, self::IGNORE_DB_ATTRIBUTES));
            $id = count($this->metaBundles);
            $this->metaBundles[$id] = $metaBundle;
            $this->metaBundlesBySourceId[$sourceId][$siteId] = $id;
        }

        return $metaBundle;
    }

    /**
     * @param string $sourceHandle
     * @param int    $siteId
     *
     * @return null|MetaBundle
     */
    public function getMetaBundleBySourceHandle(string $sourceHandle, int $siteId)
    {
        $metaBundle = null;
        // See if we have the meta bundle cached
        if (!empty($this->metaBundlesBySourceHandle[$sourceHandle][$siteId])) {
            $id = $this->metaBundlesBySourceHandle[$sourceHandle][$siteId];
            if (!empty($this->metaBundles[$id])) {
                return $this->metaBundles[$id];
            }
        }
        // Look for a matching meta bundle in the db
        $metaBundleRecord = MetaBundleRecord::findOne([
            'sourceHandle' => $sourceHandle,
            'sourceSiteId' => $siteId,
        ]);
        if ($metaBundleRecord) {
            $metaBundle = MetaBundle::create($metaBundleRecord->getAttributes(null, self::IGNORE_DB_ATTRIBUTES));
            $id = count($this->metaBundles);
            $this->metaBundles[$id] = $metaBundle;
            $this->metaBundlesBySourceHandle[$sourceHandle][$siteId] = $id;
        }

        return $metaBundle;
    }

    /**
     * @param string $sourceTemplate
     * @param int    $siteId
     *
     * @return null|MetaBundle
     */
    public function getMetaBundleBySourceTemplate(string $sourceTemplate, int $siteId = null)
    {
        $metaBundle = null;
        // See if we have the meta bundle cached
        if (!empty($this->metaBundlesBySourceTemplate[$sourceTemplate][$siteId])) {
            $id = $this->metaBundlesBySourceTemplate[$sourceTemplate][$siteId];
            if (!empty($this->metaBundles[$id])) {
                return $this->metaBundles[$id];
            }
        }
        // Look for a matching meta bundle in the db
        $metaBundleRecord = MetaBundleRecord::findOne([
            'sourceTemplate' => $sourceTemplate,
            'sourceSiteId' => $siteId,
        ]);
        if ($metaBundleRecord) {
            $metaBundle = MetaBundle::create($metaBundleRecord->getAttributes(null, self::IGNORE_DB_ATTRIBUTES));
            $id = count($this->metaBundles);
            $this->metaBundles[$id] = $metaBundle;
            $this->metaBundlesBySourceTemplate[$sourceTemplate][$siteId] = $id;
        }

        return $metaBundle;
    }

    /**
     * Return all of the content meta bundles
     *
     * @return array
     */
    public function getContentMetaBundles(): array
    {
        $metaBundles = [];
        $metaBundleRecords = MetaBundleRecord::find()
            ->where(['!=', 'sourceHandle', self::GLOBAL_META_BUNDLE])
            ->all();
        foreach ($metaBundleRecords as $metaBundleRecord) {
            $metaBundle = MetaBundle::create($metaBundleRecord->getAttributes(null, self::IGNORE_DB_ATTRIBUTES));
            if ($metaBundle) {
                $metaBundles[] = $metaBundle;
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
        $metaBundleRecord = MetaBundleRecord::findOne([
            'sourceHandle' => self::GLOBAL_META_BUNDLE,
            'sourceSiteId' => $sourceSiteId,
        ]);
        if ($metaBundleRecord) {
            $metaBundle = MetaBundle::create($metaBundleRecord->getAttributes(null, self::IGNORE_DB_ATTRIBUTES));
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
            $sites = Craft::$app->getSites()->getAllSites();
            foreach ($sites as $site) {
                $metaBundle = $this->createMetaBundleFromEntry($section, $site->id);
                if ($metaBundle) {
                    $metaBundleRecord = new MetaBundleRecord($metaBundle->getAttributes());
                    $metaBundleRecord->save();
                }
            }
        }

        // Get all of the category groups with URLs
        $categories = Craft::$app->getCategories()->getAllGroups();
        foreach ($categories as $category) {
            $sites = Craft::$app->getSites()->getAllSites();
            foreach ($sites as $site) {
                $metaBundle = $this->createMetaBundleFromCategory($category, $site->id);
                if ($metaBundle) {
                    $metaBundleRecord = new MetaBundleRecord($metaBundle->getAttributes());
                    $metaBundleRecord->save();
                }
            }
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

    // Protected Methods
    // =========================================================================

    /**
     * Get the language from a siteId
     *
     * @param int $siteId
     *
     * @return string
     */
    protected function getSiteLanguage(int $siteId): string
    {
        $site = Craft::$app->getSites()->getSiteById($siteId);
        $language = $site->language;
        $language = strtolower($language);
        $language = str_replace('_', '-', $language);

        return $language;
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
                    $siteSettingArray['language'] = $this->getSiteLanguage($siteSetting->siteId);
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
        }

        return $metaBundle;
    }

    /**
     * @param Section $section
     * @param int     $siteId
     *
     * @return null|MetaBundle
     */
    protected function createMetaBundleFromEntry(Section $section, int $siteId)
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
                    $siteSettingArray['language'] = $this->getSiteLanguage($siteSetting->siteId);
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
        }

        return $metaBundle;
    }
}
