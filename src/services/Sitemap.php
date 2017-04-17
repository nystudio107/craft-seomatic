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

use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\models\FrontendTemplateContainer;
use nystudio107\seomatic\models\SitemapIndexTemplate;
use nystudio107\seomatic\models\SitemapTemplate;

use Craft;
use craft\base\Component;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Sitemap extends Component
{
    // Protected Properties
    // =========================================================================

    /**
     * @var FrontendTemplateContainer
     */
    protected $sitemapTemplateContainer;

    // Public Methods
    // =========================================================================

    /**
     * Load in the sitemap frontend template containers
     */
    public function loadSitemapContainers()
    {
        $this->sitemapTemplateContainer = FrontendTemplateContainer::create();
        // The Sitemap Index
        $sitemapIndexTemplate = SitemapIndexTemplate::create();
        $this->sitemapTemplateContainer->addData($sitemapIndexTemplate, $sitemapIndexTemplate->action);
        // A generic sitemap
        $sitemapTemplate = SitemapTemplate::create();
        $this->sitemapTemplateContainer->addData($sitemapTemplate, $sitemapTemplate->action);

        // Register our site routes
        Event::on(
            UrlManager::className(),
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules = array_merge(
                    $event->rules,
                    $this->sitemapRouteRules()
                );
            }
        );
    }

    /**
     * @return array
     */
    public function sitemapRouteRules(): array
    {
        $rules = [];
        foreach ($this->sitemapTemplateContainer->data as $sitemapTemplate) {
            /** @var $sitemapTemplate FrontendTemplate */
            $rules = array_merge(
                $rules,
                $sitemapTemplate->routeRules()
            );
        }

        return $rules;
    }

    public function renderTemplate(string $template, $params = []): string
    {
        $html = '';
        if (!empty($this->sitemapTemplateContainer->data[$template])) {
            /** @var $sitemapTemplate FrontendTemplate */
            $sitemapTemplate = $this->sitemapTemplateContainer->data[$template];
            $html = $sitemapTemplate->render($params);
        }

        return $html;
    }
}
