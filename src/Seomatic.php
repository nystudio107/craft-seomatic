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

namespace nystudio107\seomatic;

use nystudio107\seomatic\services\Meta as MetaService;
use nystudio107\seomatic\services\Sitemaps as SitemapsService;
use nystudio107\seomatic\twigextensions\JsonLdTwigExtension;
use nystudio107\seomatic\variables\SeomaticVariable;

use Craft;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;
use yii\web\View;

/**
 * Class Seomatic
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     1.0.0
 *
 * @property  MetaService       meta
 * @property  SitemapsService   sitemaps
 */
class Seomatic extends \craft\base\Plugin
{
    /**
     * @var Seomatic
     */
    public static $plugin;

    /**
     * @inheritdoc
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

        // Listen for the page rendering event
        Event::on(
            View::className(),
            View::EVENT_END_PAGE,
            function (Event $event) {
                $request = Craft::$app->getRequest();
                if (!$request->getIsConsoleRequest()) {
                }
            }
        );
        Craft::info(
            Craft::t(
                'seomatic',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    /**
     * @inheritdoc
     */
    public function defineTemplateComponent()
    {
        return SeomaticVariable::class;
    }

    /**
     * Returns the user-facing name of the plugin, which can override the name in
     * composer.json
     *
     * @return mixed
     */
    public function getName(): string
    {
         return Craft::t('seomatic', 'SEOmatic');
    }
}
