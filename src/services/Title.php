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

use craft\helpers\Template as TemplateHelper;
use nystudio107\seomatic\base\MetaService;
use nystudio107\seomatic\models\MetaTitle;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\Seomatic;

/**
 * Title service for creating and accessing MetaTitle objects in their meta container
 * An instance of the service is available via [[`Seomatic::$plugin->title`|`seomatic.title`]]
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Title extends MetaService
{
    // Constants
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @param string $key
     * @param string $handle
     *
     * @return null|MetaTitle
     */
    public function get(string $key = 'title', string $handle = self::GENERAL_HANDLE)
    {
        /** @var MetaTitle $metaItem */
        $metaItem = Seomatic::$plugin->metaContainers->getMetaItemByKey($key, MetaTitleContainer::CONTAINER_TYPE);

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function create(array $config = [], $add = true): MetaTitle
    {
        $metaItem = MetaTitle::create($config);
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
        $key = MetaTitleContainer::CONTAINER_TYPE . $handle;
        Seomatic::$plugin->metaContainers->addToMetaContainer($metaItem, $key);

        /** @var MetaTitle $metaItem */
        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        $key = MetaTitleContainer::CONTAINER_TYPE;

        return TemplateHelper::raw(Seomatic::$plugin->metaContainers->renderContainersByType($key));
    }

    /**
     * @param string $handle
     *
     * @return null|MetaTitleContainer
     */
    public function container(string $handle = self::GENERAL_HANDLE)
    {
        $key = MetaTitleContainer::CONTAINER_TYPE . $handle;

        return Seomatic::$plugin->metaContainers->getMetaContainer($key);
    }
}
