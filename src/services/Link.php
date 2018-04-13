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
use nystudio107\seomatic\base\MetaService;
use nystudio107\seomatic\models\MetaLink;
use nystudio107\seomatic\models\MetaLinkContainer;

use craft\helpers\Template as TemplateHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Link extends MetaService
{
    // Constants
    // =========================================================================

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
        /** @var  $metaItem MetaLink */
        $metaItem = Seomatic::$plugin->metaContainers->getMetaItemByKey($key, MetaLinkContainer::CONTAINER_TYPE);

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function create(array $config = [], $add = true): MetaLink
    {
        $metaItem = MetaLink::create($config);
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
        $key = MetaLinkContainer::CONTAINER_TYPE.$handle;
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
        $key = MetaLinkContainer::CONTAINER_TYPE.$handle;

        return Seomatic::$plugin->metaContainers->getMetaContainer($key);
    }
}
