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
use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\Seomatic;

/**
 * JSON-LD service for creating and accessing MetaJsonLd objects in their meta container
 * An instance of the service is available via [[`Seomatic::$plugin->jsonLd`|`seomatic.jsonLd`]]
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class JsonLd extends MetaService
{
    // Constants
    // =========================================================================

    public const DEFAULT_TYPE = 'Thing';

    // Public Methods
    // =========================================================================

    /**
     * @param string $key
     * @param string $handle
     *
     * @return null|MetaJsonLd
     */
    public function get(string $key, string $handle = self::GENERAL_HANDLE)
    {
        /** @var MetaJsonLd $metaItem */
        $metaItem = Seomatic::$plugin->metaContainers->getMetaItemByKey($key, MetaJsonLdContainer::CONTAINER_TYPE);

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function create(array $config = [], $add = true): MetaJsonLd
    {
        $type = self::DEFAULT_TYPE;
        if (!empty($config['type'])) {
            $type = ArrayHelper::remove($config, 'type');
        }
        $metaItem = MetaJsonLd::create($type, $config);
        if ($add && $metaItem !== null) {
            $this->add($metaItem);
        }

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function add($metaItem, string $handle = self::GENERAL_HANDLE): MetaJsonLd
    {
        $key = MetaJsonLdContainer::CONTAINER_TYPE . $handle;
        Seomatic::$plugin->metaContainers->addToMetaContainer($metaItem, $key);

        /** @var MetaJsonLd $metaItem */
        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        $key = MetaJsonLdContainer::CONTAINER_TYPE;

        return TemplateHelper::raw(Seomatic::$plugin->metaContainers->renderContainersByType($key));
    }

    /**
     * @param string $handle
     *
     * @return null|MetaJsonLdContainer
     */
    public function container(string $handle = self::GENERAL_HANDLE)
    {
        $key = MetaJsonLdContainer::CONTAINER_TYPE . $handle;

        return Seomatic::$plugin->metaContainers->getMetaContainer($key);
    }
}
