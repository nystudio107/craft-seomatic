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

use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\models\MetaBundle;

use Craft;
use craft\base\ElementInterface;
use craft\base\Model;
use craft\elements\db\ElementQueryInterface;
use craft\elements\Entry;
use craft\models\EntryDraft;
use craft\models\EntryVersion;
use craft\models\Section;

use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
class SeoEntry implements SeoElementInterface
{
    // Constants
    // =========================================================================

    const META_BUNDLE_TYPE = 'section';
    const ELEMENT_CLASSES = [
        Entry::class,
        EntryDraft::class,
        EntryVersion::class,
    ];
    const REQUIRED_PLUGIN_HANDLE = null;
    const CONFIG_FILE_PATH = 'entrymeta/Bundle';

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
        return Entry::refHandle();
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
     * Return an ElementQuery for the sitemap elements for the given MetaBundle
     *
     * @param MetaBundle $metaBundle
     *
     * @return ElementQueryInterface
     */
    public static function sitemapElementsQuery(MetaBundle $metaBundle): ElementQueryInterface
    {
        $query = Entry::find()
            ->section($metaBundle->sourceHandle)
            ->siteId($metaBundle->sourceSiteId)
            ->enabledForSite(true)
            ->limit($metaBundle->metaSitemapVars->sitemapLimit);
        if ($metaBundle->sourceType === 'structure'
            && !empty($metaBundle->metaSitemapVars->structureDepth)) {
            $query->level($metaBundle->metaSitemapVars->structureDepth.'<=');
        }

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
    ): ElementInterface {
        return Entry::find()
            ->section($metaBundle->sourceHandle)
            ->id($elementId)
            ->siteId($siteId)
            ->enabledForSite(true)
            ->limit(1)
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
        $element = Entry::find()
            ->section($sourceHandle)
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
        $section = Craft::$app->getSections()->getSectionByHandle($sourceHandle);
        if ($section) {
            $entryTypes = $section->getEntryTypes();
            foreach ($entryTypes as $entryType) {
                if ($entryType->fieldLayoutId) {
                    $layouts[] = Craft::$app->getFields()->getLayoutById($entryType->fieldLayoutId);
                }
            }
        }

        return $layouts;
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param int $sourceId
     *
     * @return Section|null
     */
    public static function sourceModelFromId(int $sourceId)
    {
        return Craft::$app->getSections()->getSectionById($sourceId);
    }

    /**
     * Return the source model of the given $sourceId
     *
     * @param string $sourceHandle
     *
     * @return Section|null
     */
    public static function sourceModelFromHandle(string $sourceHandle)
    {
        return Craft::$app->getSections()->getSectionByHandle($sourceHandle);
    }

    /**
     * Return the most recently updated Element from a given source model
     *
     * @param Model $sourceModel
     * @param int   $sourceSiteId
     *
     * @return ElementInterface
     */
    public static function mostRecentElement(Model $sourceModel, int $sourceSiteId): ElementInterface
    {
        /** @var Section $sourceModel */
        return Entry::find()
            ->section($sourceModel->handle)
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
        /** @var Section $sourceModel */
        return ArrayHelper::merge(
            ConfigHelper::getConfigFromFile(self::configFilePath()),
            [
                'sourceId' => $sourceModel->id,
                'sourceName' => $sourceModel->name,
                'sourceHandle' => $sourceModel->handle,
                'sourceType' => $sourceModel->type,
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
        /** @var Entry $element */
        return $element->sectionId;
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
        /** @var Entry $element */
        try {
            $sourceHandle = $element->getSection()->handle;
        } catch (InvalidConfigException $e) {
        }

        return $sourceHandle;
    }
}
