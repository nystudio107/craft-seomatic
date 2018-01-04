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
use nystudio107\seomatic\models\Settings;
use nystudio107\seomatic\services\MetaContainers;

use yii\di\ServiceLocator;

/**
 * Seomatic defines the `seomatic` global template variable.
 *
 * @property MetaContainers    meta
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
    public $globals;

    /**
     * @var Settings
     */
    public $settings;

    /**
     * @var MetaContainers
     */
    public $meta;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($config = [])
    {
        /** @noinspection PhpDeprecationInspection */
        $components = [
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

        $this->settings = Seomatic::$plugin->getSettings();
        $this->globals = Seomatic::$plugin->metaContainers->metaGlobalVars;
        $this->meta = Seomatic::$plugin->metaContainers;
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
    public function getContentMetaBundles(bool $allSites = true)
    {
        return Seomatic::$plugin->metaBundles->getContentMetaBundles($allSites);
    }
}
