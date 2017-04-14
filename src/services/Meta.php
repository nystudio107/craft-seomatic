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

use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
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
     * @param string $title
     */
    public function includeMetaTitle(string $title)
    {
        $view = Craft::$app->getView();
        $view->title = $title;
    }

    /**
     * @param $type string
     * @param $data MetaItem
     * @param $key  string
     */
    public function addMetaContainer($type, $data, $key = null)
    {
        $container = null;
        $className = null;
        $key = $key . $type ?: $this->getHash($data . $type);
        // If a container already exists with this $key, just add to it
        if (!empty($this->metaContainers[$key])) {
            $container = $this->metaContainers[$key];
            $container->data[$data->key] = $data;
        } else {
            // Create a new container based on the type passed in
            switch ($type) {
                case MetaTagContainer::CONTAINER_TYPE:
                    $className = MetaTagContainer::className();
                    break;
                case MetaLinkContainer::CONTAINER_TYPE:
                    $className = MetaLinkContainer::className();
                    break;
                case MetaScriptContainer::CONTAINER_TYPE:
                    $className = MetaScriptContainer::className();
                    break;
                case MetaJsonLdContainer::CONTAINER_TYPE:
                    $className = MetaJsonLdContainer::className();
                    break;
            }
            if ($className) {
                $metaItem = [];
                $metaItem[$data->key] = $data;
                $container = new $className([
                    'data' => $metaItem,
                ]);
                if ($container) {
                    $this->metaContainers[$key] = $container;
                }
            }
        }
    }

    /**
     *
     */
    public function includeMetaContainers()
    {
        foreach ($this->metaContainers as $metaContainer) {
            switch ($metaContainer::CONTAINER_TYPE) {
                case MetaTagContainer::CONTAINER_TYPE:
                    $this->includeMetaTags($metaContainer);
                    break;
                case MetaLinkContainer::CONTAINER_TYPE:
                    $this->includeMetaLinks($metaContainer);
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
    }

    /**
     *
     */
    protected function loadSectionMetaContainers()
    {
    }

    /**
     * @param MetaTagContainer $metaContainer
     */
    protected function includeMetaTags(MetaTagContainer $metaContainer)
    {
        $view = Craft::$app->getView();
        foreach ($metaContainer->data as $metaTagModel) {
            $view->registerMetaTag($metaTagModel->options);
        }
    }

    /**
     * @param MetaLinkContainer $metaContainer
     */
    protected function includeMetaLinks(MetaLinkContainer $metaContainer)
    {
        $view = Craft::$app->getView();
        foreach ($metaContainer->data as $metaLinkModel) {
            $view->registerLinkTag($metaLinkModel->options);
        }
    }

    /**
     * @param MetaScriptContainer $metaContainer
     */
    protected function includeMetaScript(MetaScriptContainer $metaContainer)
    {
        $view = Craft::$app->getView();
        foreach ($metaContainer->data as $metaScriptModel) {
            $js = $metaScriptModel->render();
            $view->registerJs(
                $js,
                $metaContainer->position
            );
        }
    }

    /**
     * @param MetaJsonLdContainer $metaContainer
     */
    protected function includeMetaJsonLd(MetaJsonLdContainer $metaContainer)
    {
        $view = Craft::$app->getView();
        foreach ($metaContainer->data as $jsonLdModel) {
            $jsonLd = $jsonLdModel->render(true, false);
            $view->registerScript(
                $jsonLd,
                View::POS_END,
                ['type' => 'application/ld+json']
            );
            // If `devMode` is enabled, validate the JSON-LD and output any model errors
            if (Craft::$app->getConfig()->getGeneral()->devMode) {
                $this->debugJsonLd($jsonLdModel);
            }
        }
    }

    // Protected Methods
    // =========================================================================

    protected function getHash($data)
    {
        if (is_object($data)) {
            $data = $data->toArray();
        }
        if (is_array($data)) {
            $data = serialize($data);
        }

        return md5($data);
    }

    /**
     * Validate the JSON-LD and output any model errors
     *
     * @param $jsonLdModel
     */
    protected function debugJsonLd($jsonLdModel)
    {
        $scenarios = ['default', 'google'];
        foreach ($scenarios as $scenario) {
            $jsonLdModel->setScenario($scenario);
            if (!$jsonLdModel->validate()) {
                $errorMsg =
                    Craft::t('seomatic', 'Scenario: "')
                    . $scenario
                    . '"'
                    . PHP_EOL
                    . print_r($jsonLdModel->render(false, false), true);
                if ($scenario == 'default') {
                    Craft::error($errorMsg, __METHOD__);
                } else {
                    Craft::warning($errorMsg, __METHOD__);
                }
                foreach ($jsonLdModel->errors as $param => $errors) {
                    $errorMsg = Craft::t('seomatic', 'JSON-LD property: ') . $param;
                    foreach ($errors as $error) {
                        $errorMsg .= ' -> ' . $error;
                    }
                    if ($scenario == 'default') {
                        Craft::error($errorMsg, __METHOD__);
                    } else {
                        Craft::warning($errorMsg, __METHOD__);
                    }
                }
            }
        }
    }

    // Private Methods
    // =========================================================================
}