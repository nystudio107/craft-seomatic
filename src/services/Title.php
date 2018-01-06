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
use nystudio107\seomatic\models\MetaTitle;
use nystudio107\seomatic\models\MetaTitleContainer;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Title extends MetaService implements MetaServiceInterface
{
    // Constants
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function get(string $key = 'title', string $handle = self::GENERAL_HANDLE): MetaTitle
    {
        /** @var  $metaItem MetaTitle */
        $metaItem = Seomatic::$plugin->metaContainers->getMetaItemByKey($key, MetaTitleContainer::CONTAINER_TYPE);

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function create($config = []): MetaTitle
    {
        $metaItem = MetaTitle::create($config);

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function add($metaItem, string $handle = self::GENERAL_HANDLE)
    {
        $key = MetaTitleContainer::CONTAINER_TYPE . $handle;
        Seomatic::$plugin->metaContainers->addToMetaContainer($metaItem, $key);
    }

    /**
     * @inheritdoc
     */
    public function container(string $handle = self::GENERAL_HANDLE): MetaTitleContainer
    {
        $key = MetaTitleContainer::CONTAINER_TYPE . $handle;
        return Seomatic::$plugin->metaContainers->getMetaContainer($key);
    }
}
