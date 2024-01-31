<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\base;

use craft\base\ElementInterface;

use craft\base\Model;
use craft\elements\db\ElementQueryInterface;
use nystudio107\seomatic\models\MetaBundle;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */
interface SeoElementInterface
{
    // Public Static Methods
    // =========================================================================

    /**
     * Return the sourceBundleType for that this SeoElement handles
     *
     * @return string
     */
    public static function getMetaBundleType(): string;

    /**
     * Returns an array of the element classes that are handled by this SeoElement
     *
     * @return array
     */
    public static function getElementClasses(): array;

    /**
     * Return the refHandle (e.g.: `entry` or `category`) for the SeoElement
     *
     * @return string
     */
    public static function getElementRefHandle(): string;

    /**
     * Return the handle to a required plugin for this SeoElement type
     *
     * @return null|string
     */
    public static function getRequiredPluginHandle();

    /**
     * Install any event handlers for this SeoElement type
     */
    public static function installEventHandlers();

    /**
     * Return an ElementQuery for the sitemap elements for the given MetaBundle
     *
     * @param MetaBundle $metaBundle
     *
     * @return ElementQueryInterface
     */
    public static function sitemapElementsQuery(MetaBundle $metaBundle): ElementQueryInterface;

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
        int $siteId,
    );

    /**
     * Return a preview URI for a given $sourceHandle and $siteId
     * This just returns the first element
     *
     * @param string    $sourceHandle
     * @param int|null  $siteId
     *
     * @return string|null
     */
    public static function previewUri(string $sourceHandle, $siteId);

    /**
     * Return an array of FieldLayouts from the $sourceHandle
     *
     * @param string $sourceHandle
     *
     * @return array
     */
    public static function fieldLayouts(string $sourceHandle): array;

    /**
     * Return the (entry) type menu as a $id => $name associative array
     *
     * @param string $sourceHandle
     *
     * @return array
     */
    public static function typeMenuFromHandle(string $sourceHandle): array;

    /**
     * Return the source model of the given $sourceId
     *
     * @param int $sourceId
     *
     * @return Model|null
     */
    public static function sourceModelFromId(int $sourceId);

    /**
     * Return the source model of the given $sourceId
     *
     * @param string $sourceHandle
     *
     * @return Model|null
     */
    public static function sourceModelFromHandle(string $sourceHandle);

    /**
     * Return the most recently updated Element from a given source model
     *
     * @param Model $sourceModel
     * @param int   $sourceSiteId
     *
     * @return null|ElementInterface
     */
    public static function mostRecentElement(Model $sourceModel, int $sourceSiteId);

    /**
     * Return the path to the config file directory
     *
     * @return string
     */
    public static function configFilePath(): string;

    /**
     * Return a meta bundle config array for the given $sourceModel
     *
     * @param Model $sourceModel
     *
     * @return array
     */
    public static function metaBundleConfig(Model $sourceModel): array;

    /**
     * Return the source id from the $element
     *
     * @param ElementInterface $element
     *
     * @return int|null
     */
    public static function sourceIdFromElement(ElementInterface $element);

    /**
     * Return the (entry) type id from the $element
     *
     * @param ElementInterface $element
     *
     * @return int|null
     */
    public static function typeIdFromElement(ElementInterface $element);

    /**
     * Return the source handle from the $element
     *
     * @param ElementInterface $element
     *
     * @return string|null
     */
    public static function sourceHandleFromElement(ElementInterface $element);

    /**
     * Create a MetaBundle in the db for each site, from the passed in $sourceModel
     *
     * @param Model $sourceModel
     */
    public static function createContentMetaBundle(Model $sourceModel);

    /**
     * Create all the MetaBundles in the db for this Seo Element
     */
    public static function createAllContentMetaBundles();
}
