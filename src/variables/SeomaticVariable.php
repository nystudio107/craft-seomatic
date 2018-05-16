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

namespace nystudio107\seomatic\variables;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\MetaGlobalVars;
use nystudio107\seomatic\models\MetaSiteVars;
use nystudio107\seomatic\models\MetaSitemapVars;
use nystudio107\seomatic\models\Settings;
use nystudio107\seomatic\services\Helper;
use nystudio107\seomatic\services\JsonLd;
use nystudio107\seomatic\services\Link;
use nystudio107\seomatic\services\Script;
use nystudio107\seomatic\services\Tag;
use nystudio107\seomatic\services\Title;
use nystudio107\seomatic\services\MetaContainers;
use nystudio107\seomatic\services\MetaBundles;

use yii\di\ServiceLocator;

/**
 * Seomatic defines the `seomatic` global template variable.
 *
 * @property Helper     helper
 * @property JsonLd     jsonLd
 * @property Link       link
 * @property Script     script
 * @property Tag        tag
 * @property Title      title
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SeomaticVariable extends ServiceLocator
{
    // Properties
    // =========================================================================

    /**
     * @var MetaGlobalVars
     */
    public $meta;

    /**
     * @var MetaSiteVars
     */
    public $site;

    /**
     * @var MetaSitemapVars
     */
    public $sitemap;

    /**
     * @var Settings
     */
    public $config;

    /**
     * @var MetaContainers
     */
    public $containers;

    /**
     * @var MetaBundles
     */
    public $bundles;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($config = [])
    {
        /** @noinspection PhpDeprecationInspection */
        $components = [
            'helper' => Helper::class,
            'jsonLd' => JsonLd::class,
            'link' => Link::class,
            'script' => Script::class,
            'tag' => Tag::class,
            'title' => Title::class,
        ];

        $config['components'] = $components;

        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $replaceVars = Seomatic::$loadingContainers || Seomatic::$previewingMetaContainers;
        if ($this->meta === null || $replaceVars) {
            $this->meta = Seomatic::$plugin->metaContainers->metaGlobalVars;
        }
        if ($this->site === null || $replaceVars) {
            $this->site = Seomatic::$plugin->metaContainers->metaSiteVars;
        }
        if ($this->sitemap === null || $replaceVars) {
            $this->sitemap = Seomatic::$plugin->metaContainers->metaSitemapVars;
        }

        $this->config = Seomatic::$settings;
    }

    /**
     * Get the plugin's name
     *
     * @return null|string
     */
    public function getPluginName()
    {
        return Seomatic::$plugin->name;
    }

    /**
     * Get all of the meta bundles
     *
     * @param bool $allSites
     *
     * @return array
     */
    public function getContentMetaBundles(bool $allSites = true): array
    {
        return Seomatic::$plugin->metaBundles->getContentMetaBundles($allSites);
    }
}
