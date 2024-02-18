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

namespace nystudio107\seomatic\variables;

use Craft;
use craft\helpers\App;
use craft\helpers\UrlHelper;
use nystudio107\pluginvite\services\VitePluginService;
use nystudio107\seomatic\helpers\Environment as EnvironmentHelper;
use nystudio107\seomatic\models\MetaGlobalVars;
use nystudio107\seomatic\models\MetaSitemapVars;
use nystudio107\seomatic\models\MetaSiteVars;
use nystudio107\seomatic\models\Settings;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\Helper;
use nystudio107\seomatic\services\JsonLd;
use nystudio107\seomatic\services\Link;
use nystudio107\seomatic\services\MetaBundles;
use nystudio107\seomatic\services\MetaContainers;
use nystudio107\seomatic\services\Script;
use nystudio107\seomatic\services\Tag;
use nystudio107\seomatic\services\Title;
use yii\di\ServiceLocator;

/**
 * Seomatic defines the `seomatic` global template variable.
 *
 * @property Helper $helper
 * @property JsonLd $jsonLd
 * @property Link $link
 * @property Script $script
 * @property Tag $tag
 * @property Title $title
 * @property VitePluginService $vite
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
            // Register the vite service
            'vite' => Seomatic::$plugin->getVite(),
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

        $replaceVars = Seomatic::$loadingMetaContainers || Seomatic::$previewingMetaContainers;
        if ($this->meta === null || $replaceVars) {
            $this->meta = Seomatic::$plugin->metaContainers->metaGlobalVars;
        }
        if ($this->site === null || $replaceVars) {
            $this->site = Seomatic::$plugin->metaContainers->metaSiteVars;
        }
        if ($this->sitemap === null || $replaceVars) {
            $this->sitemap = Seomatic::$plugin->metaContainers->metaSitemapVars;
        }
        if ($this->containers === null || $replaceVars) {
            $this->containers = Seomatic::$plugin->metaContainers;
        }
        if ($this->bundles === null || $replaceVars) {
            $this->bundles = Seomatic::$plugin->metaBundles;
        }
        // Set the config settings, parsing the environment if its a frontend request
        $configSettings = Seomatic::$settings;
        if (!$replaceVars && !Craft::$app->getRequest()->getIsCpRequest()) {
            $configSettings->environment = Seomatic::$environment;
        }
        $this->config = $configSettings;
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
     * @return string
     */
    public function getEnvironment()
    {
        return Craft::parseEnv(Seomatic::$environment);
    }

    /**
     * @return string
     */
    public function getEnvironmentMessage()
    {
        $result = '';
        /** @var Settings $settings */
        $settings = Seomatic::$plugin->getSettings();
        $settingsEnv = $settings->environment;
        $settingsEnv = Craft::parseEnv($settingsEnv);
        $env = Seomatic::$environment;
        $settingsUrl = UrlHelper::cpUrl('seomatic/plugin');
        $general = Craft::$app->getConfig()->getGeneral();
        if (!$general->allowAdminChanges) {
            $settingsUrl = '';
        }
        // If they've manually overridden the environment, just return it
        if (EnvironmentHelper::environmentOverriddenByConfig()) {
            return Craft::t('seomatic', 'This is overridden by the `config/seomatic.php` config setting',
                []
            );
        }
        // If they have manually set the environment, just return it
        if (Seomatic::$settings->manuallySetEnvironment) {
            return Craft::t('seomatic', 'This is set manually by the "Manually Set SEOmatic Environment" plugin setting',
                []
            );
        }
        // If devMode is on, always force the environment to be 'local'
        if (Seomatic::$devMode) {
            return Craft::t('seomatic', 'The `{settingsEnv}` [SEOmatic Environment]({settingsUrl}) setting has been overriden to `{env}`, because the `devMode` config setting is enabled. Tracking scripts are disabled, and the `robots` tag is set to `none` to prevent search engine indexing.',
                ['env' => $env, 'settingsEnv' => $settingsEnv, 'settingsUrl' => $settingsUrl]
            );
        }
        // This can change depending on the user settings
        /** @phpstan-ignore-next-line */
        if (Seomatic::$settings->manuallySetEnvironment) {
            $envVar = $settingsEnv;
        } else {
            // Try to also check the `ENVIRONMENT` env var
            $envVar = App::env('ENVIRONMENT');
            $envVar = $envVar ?: App::env('CRAFT_ENVIRONMENT');
        }
        if (!empty($envVar)) {
            $env = EnvironmentHelper::determineEnvironment();
            switch ($env) {
                case EnvironmentHelper::SEOMATIC_DEV_ENV:
                    $additionalMessage = 'Tracking scripts are disabled, and the `robots` tag is set to `none` to prevent search engine indexing.';
                    break;
                case EnvironmentHelper::SEOMATIC_STAGING_ENV:
                    $additionalMessage = 'The `robots` tag is set to `none` to prevent search engine indexing.';
                    break;
                case EnvironmentHelper::SEOMATIC_PRODUCTION_ENV:
                    $additionalMessage = '';
                    break;
                default:
                    $additionalMessage = '';
                    break;
            }
            if ($settings->environment !== $env) {
                return Craft::t('seomatic', 'The `{settingsEnv}` [SEOmatic Environment]({settingsUrl}) setting has been overriden to `{env}`, because the `.env` setting `ENVIRONMENT` is set to `{envVar}`. {additionalMessage}',
                    ['env' => $env, 'settingsEnv' => $settingsEnv, 'settingsUrl' => $settingsUrl, 'envVar' => $envVar, 'additionalMessage' => $additionalMessage]
                );
            }
        }

        return $result;
    }
}
