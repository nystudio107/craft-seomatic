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
use nystudio107\seomatic\models\MetaScript;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\Seomatic;

/**
 * Script service for creating and accessing MetaScript objects in their meta container
 * An instance of the service is available via [[`Seomatic::$plugin->script`|`seomatic.script`]]
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Script extends MetaService
{
    // Constants
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @param string $key
     * @param string $handle
     *
     * @return null|MetaScript
     */
    public function get(string $key, string $handle = self::GENERAL_HANDLE)
    {
        /** @var MetaScript $metaItem */
        $metaItem = Seomatic::$plugin->metaContainers->getMetaItemByKey($key, MetaScriptContainer::CONTAINER_TYPE);

        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function create(array $config = [], $add = true): MetaScript
    {
        $metaItem = MetaScript::create($config);
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
        $key = MetaScriptContainer::CONTAINER_TYPE . $handle;
        Seomatic::$plugin->metaContainers->addToMetaContainer($metaItem, $key);

        /** @var MetaScript $metaItem */
        return $metaItem;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        $key = MetaScriptContainer::CONTAINER_TYPE;

        return TemplateHelper::raw(Seomatic::$plugin->metaContainers->renderContainersByType($key));
    }

    /**
     * @param string $handle
     *
     * @return null|MetaScriptContainer
     */
    public function container(string $handle = self::GENERAL_HANDLE)
    {
        $key = MetaScriptContainer::CONTAINER_TYPE . $handle;

        return Seomatic::$plugin->metaContainers->getMetaContainer($key);
    }
}
