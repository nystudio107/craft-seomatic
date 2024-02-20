<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\services;

use craft\helpers\ArrayHelper;
use craft\helpers\Template as TemplateHelper;
use nystudio107\seomatic\base\MetaService;
use nystudio107\seomatic\models\MetaTag;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\Seomatic;

/**
 * Tag service for creating and accessing MetaTag objects in their meta container
 * An instance of the service is available via [[`Seomatic::$plugin->tag`|`seomatic.tag`]]
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Tag extends MetaService
{
    // Constants
    // =========================================================================

    public const FACEBOOK_HANDLE = 'opengraph';
    public const TWITTER_HANDLE = 'twitter';
    public const MISC_HANDLE = 'miscellaneous';

    public const DEFAULT_TYPE = null;

    // Public Methods
    // =========================================================================

    /**
     * @param string $key
     * @param string $handle
     *
     * @return null|MetaTag
     */
    public function get(string $key, string $handle = self::GENERAL_HANDLE)
    {
        /** @var MetaTag $metaItem */
        $metaItem = Seomatic::$plugin->metaContainers->getMetaItemByKey($key, MetaTagContainer::CONTAINER_TYPE);

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function create(array $config = [], $add = true): MetaTag
    {
        $type = self::DEFAULT_TYPE;
        if (!empty($config['type'])) {
            $type = ArrayHelper::remove($config, 'type');
        }
        $metaItem = MetaTag::create($type, $config);
        if ($add && $metaItem !== null) {
            $this->add($metaItem);
        }

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function add($metaItem, string $handle = self::GENERAL_HANDLE)
    {
        $key = MetaTagContainer::CONTAINER_TYPE . $handle;
        Seomatic::$plugin->metaContainers->addToMetaContainer($metaItem, $key);

        /** @var MetaTag $metaItem */
        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        $key = MetaTagContainer::CONTAINER_TYPE;

        return TemplateHelper::raw(Seomatic::$plugin->metaContainers->renderContainersByType($key));
    }

    /**
     * @param string $handle
     *
     * @return null|MetaTagContainer
     */
    public function container(string $handle = self::GENERAL_HANDLE)
    {
        $key = MetaTagContainer::CONTAINER_TYPE . $handle;

        return Seomatic::$plugin->metaContainers->getMetaContainer($key);
    }
}
