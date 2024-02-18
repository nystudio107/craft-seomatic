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
use nystudio107\seomatic\models\MetaLink;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\Seomatic;

/**
 * Link service for creating and accessing MetaLink objects in their meta container
 * An instance of the service is available via [[`Seomatic::$plugin->link`|`seomatic.link`]]
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Link extends MetaService
{
    // Constants
    // =========================================================================

    public const DEFAULT_TYPE = null;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    /**
     * @param string $key
     * @param string $handle
     *
     * @return null|MetaLink
     */
    public function get(string $key, string $handle = self::GENERAL_HANDLE)
    {
        /** @var MetaLink $metaItem */
        $metaItem = Seomatic::$plugin->metaContainers->getMetaItemByKey($key, MetaLinkContainer::CONTAINER_TYPE);

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function create(array $config = [], $add = true): MetaLink
    {
        $type = self::DEFAULT_TYPE;
        if (!empty($config['type'])) {
            $type = ArrayHelper::remove($config, 'type');
        }
        $metaItem = MetaLink::create($type, $config);
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
        $key = MetaLinkContainer::CONTAINER_TYPE . $handle;
        Seomatic::$plugin->metaContainers->addToMetaContainer($metaItem, $key);

        /** @var MetaLink $metaItem */
        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        $key = MetaLinkContainer::CONTAINER_TYPE;

        return TemplateHelper::raw(Seomatic::$plugin->metaContainers->renderContainersByType($key));
    }

    /**
     * @param string $handle
     *
     * @return null|MetaLinkContainer
     */
    public function container(string $handle = self::GENERAL_HANDLE)
    {
        $key = MetaLinkContainer::CONTAINER_TYPE . $handle;

        return Seomatic::$plugin->metaContainers->getMetaContainer($key);
    }
}
