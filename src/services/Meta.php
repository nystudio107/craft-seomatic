<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\services;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\MetaTagsContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaJsonLdContainer;

use Craft;
use craft\base\Component;

use yii\web\View;

/**
 * Meta Service
 *
 * @author    nystudio107
 * @package   SEOmatic
 * @since     2.0.0
 */

class Meta extends Component
{
    /**
     * @var array
     */
    protected $metaContainers = [];

    /**
     *
     */
    public function loadMetaContainers()
    {
        $this->metaContainers[] = new MetaTagsContainer();
        $this->metaContainers[] = new MetaScriptContainer();
        $this->metaContainers[] = new MetaJsonLdContainer();
    }

    /**
     *
     */
    public function includeMetaContainers()
    {
        foreach ($this->metaContainers as $metaContainer) {
            switch ($metaContainer->type) {
                case "metaTags":
                    $this->includeMetaTags($metaContainer);
                    break;
                case "metaScript":
                    $this->includeMetaScript($metaContainer);
                    break;
                case "metaJsonLd":
                    $this->includeMetaJsonLd($metaContainer);
                    break;
            }
        }
    }

    /**
     *
     */
    public function includeMetaTags($metaContainer)
    {
        $view = Craft::$app->getView();
        $view->registerMetaTag([
            'name' => 'description',
            'content' => 'This website is about funny raccoons.'
        ]);
    }

    /**
     *
     */
    public function includeMetaScript($metaContainer)
    {
        $js = "echo 'woof';";
        $view = Craft::$app->getView();
        $view->registerJs(
            $js,
            View::POS_HEAD
        );
    }

    /**
     *
     */
    public function includeMetaJsonLd($metaContainer)
    {
        $view = Craft::$app->getView();
    }
}