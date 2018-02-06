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
use nystudio107\seomatic\base\MetaServiceInterface;
use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\models\MetaJsonLdContainer;

use craft\helpers\ArrayHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class JsonLd extends MetaService implements MetaServiceInterface
{
    // Constants
    // =========================================================================

    const DEFAULT_TYPE = 'Thing';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function get(string $key, string $handle = self::GENERAL_HANDLE): MetaJsonLd
    {
        /** @var  $metaItem MetaJsonLd */
        $metaItem = Seomatic::$plugin->metaContainers->getMetaItemByKey($key, MetaJsonLdContainer::CONTAINER_TYPE);

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function create($config = [], $add = true): MetaJsonLd
    {
        $type = self::DEFAULT_TYPE;
        if (!empty($config['type'])) {
            $type = ArrayHelper::remove($config, 'type');
        }
        $metaItem = MetaJsonLd::create($type, $config);
        if ($add && !empty($metaItem)) {
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
    public function container(string $handle = self::GENERAL_HANDLE): MetaJsonLdContainer
    {
        $key = MetaJsonLdContainer::CONTAINER_TYPE . $handle;
        return Seomatic::$plugin->metaContainers->getMetaContainer($key);
    }
}
