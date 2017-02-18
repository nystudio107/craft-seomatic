<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic;

use nystudio107\seomatic\twigextensions\JsonLdTwigExtension;
use nystudio107\seomatic\models\JsonLd;

use Craft;
use craft\web\UrlManager;
use craft\helpers\UrlHelper;
use craft\events\RegisterUrlRulesEvent;
use yii\base\Event;

/**
 * SEOmatic plugin base class
 *
 * @author    nystudio107
 * @package   SEOmatic
 * @since     2.0.0
 */
class Seomatic extends \craft\base\Plugin
{
    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * SEOmatic::$plugin
     * @var \nystudio107\seomatic\SEOmatic
     */
    public static $plugin;

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * Seomatic::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        $this->name = $this->getName();

        // Add in our Twig extensions
        Craft::$app->view->twig->addExtension(new JsonLdTwigExtension());

        // Register our site routes
        Event::on(
            UrlManager::className(),
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['sitemap.xml'] = 'seomatic/sitemap/get-index';
            }
        );
/*
        $someSchema = JsonLd::create("Article");
        $someSchema->name = "Andrew";
        $someSchema->url = "https://nystudio107.com";
        $someSchema->description = "This is some description thing";

        $someOtherSchema = JsonLd::create("Person", [
            "name" => "Polly",
            "description" => "wife",
            "url" => "https://nystudio107.com",
            ]);

        $someMoreSchema = JsonLd::create("Person");
        $someMoreSchema->attributes = [
            "name" => "Kumba",
            "description" => "dog",
            "url" => "http://woof.com",
            ];

        $someSchema->author = [$someOtherSchema, $someOtherSchema];
        $someSchema->publisher = $someMoreSchema;
        $someJson = $someSchema->render();
        if ($someSchema->validate())
        {
        }
        else
        {
        //    Craft::dd($someSchema->errors);
        }
        $stuff = (string)$someSchema;
        Craft::dump($stuff);
        Craft::dump($someSchema->getSchemaTypeDescription());
        Craft::dd($someJson);
        */
    }

    /**
     * Returns the component definition that should be registered on the
     * [[\craft\app\web\twig\variables\CraftVariable]] instance for this plugin’s handle.
     *
     * @return mixed|null The component definition to be registered.
     * It can be any of the formats supported by [[\yii\di\ServiceLocator::set()]].
     */
    public function defineTemplateComponent()
    {
        return 'nystudio107\seomatic\variables\SeomaticVariable';
    }

    /**
     * Returns the user-facing name of the plugin, which can override the name in
     * plugin.json
     *
     * @return mixed
     */
    public function getName(): string
    {
         return Craft::t('seomatic', 'SEOmatic');
    }

    /**
     * Returns whether the plugin should get its own tab in the CP header.
     *
     * @return bool
     */
    public static function hasCpSection(): bool
    {
        return false;
    }

    /**
     * Called right before your plugin’s row gets stored in the plugins database table, and tables have been created
     * for it based on its records.
     */
    protected function onBeforeInstall()
    {
    }

    /**
     * Called right after your plugin’s row has been stored in the plugins database table, and tables have been
     * created for it based on its records.
     */
    protected function onAfterInstall()
    {
    }

    /**
     * Called right before your plugin’s record-based tables have been deleted, and its row in the plugins table
     * has been deleted.
     */
    protected function onBeforeUninstall()
    {
    }

    /**
     * Called right after your plugin’s record-based tables have been deleted, and its row in the plugins table
     * has been deleted.
     */
    protected function onAfterUninstall()
    {
    }
}
