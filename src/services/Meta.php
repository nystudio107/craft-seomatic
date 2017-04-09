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
use nystudio107\seomatic\models\MetaTagsContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaJsonLdContainer;

use Craft;
use craft\base\Component;

use yii\web\View;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Meta extends Component
{
    // Constants
    // =========================================================================

    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    // Public Properties
    // =========================================================================

    /**
     * @var array
     */
    protected $metaContainers = [];

    // Public Methods
    // =========================================================================

    /**
     *
     */
    public function loadMetaContainers()
    {
        $this->loadGlobalMetaContainers();
        $this->loadSectionMetaContainers();
    }

    /**
     * @param $type
     * @param $data
     */
    public function addMetaContainer($type, $data)
    {
        $container = null;
        switch ($type) {
            case MetaTagsContainer::CONTAINER_TYPE:
                $container = new MetaTagsContainer([
                    'data' => $data,
                ]);
                break;
            case MetaScriptContainer::CONTAINER_TYPE:
                $container = new MetaScriptContainer([
                    'data' => $data,
                ]);
                break;
            case MetaJsonLdContainer::CONTAINER_TYPE:
                $container = new MetaJsonLdContainer([
                    'data' => $data,
                ]);
                break;
        }
        if ($container) {
            $this->metaContainers[] = $container;
        }
    }

    /**
     *
     */
    public function includeMetaContainers()
    {
        foreach ($this->metaContainers as $metaContainer) {
            switch ($metaContainer->type) {
                case MetaTagsContainer::CONTAINER_TYPE:
                    $this->includeMetaTags($metaContainer);
                    break;
                case MetaScriptContainer::CONTAINER_TYPE:
                    $this->includeMetaScript($metaContainer);
                    break;
                case MetaJsonLdContainer::CONTAINER_TYPE:
                    $this->includeMetaJsonLd($metaContainer);
                    break;
            }
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     *
     */
    protected function loadGlobalMetaContainers()
    {
        $this->metaContainers[] = MetaTagsContainer::create();
        $this->metaContainers[] = MetaScriptContainer::create();
        $this->metaContainers[] = MetaJsonLdContainer::create();
    }

    /**
     *
     */
    protected function loadSectionMetaContainers()
    {
    }

    /**
     *
     */
    protected function includeMetaTags($metaContainer)
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
    protected function includeMetaScript($metaContainer)
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
    protected function includeMetaJsonLd($metaContainer)
    {
        $view = Craft::$app->getView();
    }

    // Private Methods
    // =========================================================================
}