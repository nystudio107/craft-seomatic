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

namespace nystudio107\seomatic\seoelements;

use craft\models\EntryDraft;
use craft\models\EntryVersion;
use nystudio107\seomatic\base\SeoElementInterface;
use nystudio107\seomatic\models\MetaBundle;

use craft\base\ElementInterface;
use craft\elements\db\ElementQueryInterface;
use craft\elements\Entry;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
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

    // Static Methods
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
}
