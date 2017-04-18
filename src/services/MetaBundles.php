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

use craft\elements\Category;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\MetaBundle;

use Craft;
use craft\base\Component;
use craft\elements\Entry;
use craft\helpers\ArrayHelper;
use craft\models\Section_SiteSettings;
use craft\models\CategoryGroup_SiteSettings;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaBundles extends Component
{
    // Protected Properties
    // =========================================================================

    /**
     * @var MetaBundle[]
     */
    protected $_metaBundles;

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
        // See if this is a section we are tracking
        $metaBundle = $this->metaBundleBySourceId($sourceId);
        if ($metaBundle) {
            Craft::info(
                'Invalidating meta bundle: ' . $metaBundle->sourceHandle,
                'seomatic'
            );
            // Invalidate sitemap caches after an existing section is saved
            if (!$isNew) {
                Seomatic::$plugin->sitemap->invalidateSitemapCache($metaBundle->sourceHandle);
                Seomatic::$plugin->sitemap->invalidateSitemapIndexCache();
            }
        }
    }

    /**
     * @param int      $sourceId
     * @param int|null $siteId
     *
     * @return MetaBundle
     */
    public function metaBundleBySourceId(int $sourceId, int $siteId = null): MetaBundle
    {
        // @todo this should look in the seomatic_meta_bundles db table
        $metaBundles = $this->metaBundles();
        /** @var  $metaBundle MetaBundle */
        foreach ($metaBundles as $metaBundle) {
            if ($sourceId == $metaBundle->sourceId) {
                if ($siteId == null || $siteId == $metaBundle->sourceSiteId) {
                    return $metaBundle;
                }
            }
        }

        return null;
    }

    /**
     * @param string $handle
     * @param int    $siteId
     *
     * @return null|MetaBundle
     */
    public function metaBundleByHandle(string $handle, int $siteId = null): MetaBundle
    {
        // @todo this should look in the seomatic_meta_bundles db table
        $metaBundles = $this->metaBundles();
        /** @var  $metaBundle MetaBundle */
        foreach ($metaBundles as $metaBundle) {
            if ($handle === $metaBundle->sourceHandle) {
                if ($siteId == null || $siteId == $metaBundle->sourceSiteId) {
                    return $metaBundle;
                }
            }
        }

        return null;
    }

    /**
     * Return all of the Meta Bundles
     *
     * @return MetaBundle[]
     */
    public function metaBundles(): array
    {
        if ($this->_metaBundles) {
            return $this->_metaBundles;
        }
        // @todo this should look in the seomatic_meta_bundles db table
        $metaBundles = [];

        // Get all of the sections with URLs
        $sections = Craft::$app->getSections()->getAllSections();
        foreach ($sections as $section) {
            // Get the site settings and turn them into arrays
            $siteSettings = $section->getSiteSettings();
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
            // Get a MetaBundle for each site
            foreach ($siteSettings as $siteSetting) {
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
                        // Create the meta bundle
                        $metaBundle = new MetaBundle([
                            'sourceElementType'     => Entry::class,
                            'sourceId'              => $section->id,
                            'sourceName'            => $section->name,
                            'sourceHandle'          => $section->handle,
                            'sourceType'            => $section->type,
                            'sourceTemplate'        => $siteSetting->template,
                            'sourceSiteId'          => $siteSetting->siteId,
                            'sourceAltSiteSettings' => $siteSettingsArray,
                            'sourceDateUpdated'     => $dateUpdated,
                        ]);
                        $metaBundles[] = $metaBundle;
                    }
                }
            }
        }

        // Get all of the category groups with URLs
        $categories = Craft::$app->getCategories()->getAllGroups();
        foreach ($categories as $category) {
            // Get the site settings and turn them into arrays
            $siteSettings = $category->getSiteSettings();
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
            // Get a MetaBundle for each site
            foreach ($siteSettings as $siteSetting) {
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
                        $metaBundle = new MetaBundle([
                            'sourceElementType'     => Category::class,
                            'sourceId'              => $category->id,
                            'sourceName'            => $category->name,
                            'sourceHandle'          => $category->handle,
                            'sourceType'            => 'category',
                            'sourceTemplate'        => $siteSetting->template,
                            'sourceSiteId'          => $siteSetting->siteId,
                            'sourceAltSiteSettings' => $siteSettingsArray,
                            'sourceDateUpdated'     => $dateUpdated,
                        ]);
                        $metaBundles[] = $metaBundle;
                    }
                }
            }
        }

        // @todo Get all of the Commerce Products with URLs

        $this->_metaBundles = $metaBundles;

        return $metaBundles;
    }

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
}
