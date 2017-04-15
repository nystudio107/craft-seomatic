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

use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\models\MetaTag;
use nystudio107\seomatic\models\MetaLink;
use nystudio107\seomatic\models\MetaScript;
use nystudio107\seomatic\models\MetaJsonLd;
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
     * Add the passed in MetaItem to the MetaContainer of the $type and $key
     *
     * @param $data MetaItem
     * @param $type string
     * @param $key  string
     */
    public function addToMetaContainer(MetaItem $data, string $type, string $key = null)
    {
        /** @var  $container MetaContainer */
        $key = $key . $type;
        // If the MetaContainer doesn't exist, create it
        if (empty($this->metaContainers[$key])) {
            $container = $this->createMetaContainer($type, $key);
        } else {
            $container = $this->metaContainers[$key];
        }

        $container->addData($data, $data->key);
    }

    /**
     * Create a MetaContainer of the given $type with the $key
     *
     * @param string $type
     * @param string $key
     *
     * @return MetaContainer
     */
    public function createMetaContainer(string $type, string $key): MetaContainer
    {
        /** @var  $container MetaContainer */
        $container = null;
        if (empty($this->metaContainers[$key])) {
            /** @var  $className MetaContainer */
            $className = null;
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
                $container = $className::create();
                if ($container) {
                    $this->metaContainers[$key] = $container;
                }
            }
        }

        return $container;
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
        /** @var $metaTagModel MetaTag */
        foreach ($metaContainer->data as $metaTagModel) {
            $view->registerMetaTag($metaTagModel->tagAttributes());
            // If `devMode` is enabled, validate the Meta Tag and output any model errors
            if (Craft::$app->getConfig()->getGeneral()->devMode) {
                $this->debugMetaItem(
                    $metaTagModel,
                    "Tag attribute: "
                );
            }
        }
    }

    /**
     * @param MetaLinkContainer $metaContainer
     */
    protected function includeMetaLinks(MetaLinkContainer $metaContainer)
    {
        $view = Craft::$app->getView();
        /** @var $metaLinkModel MetaLink */
        foreach ($metaContainer->data as $metaLinkModel) {
            $view->registerLinkTag($metaLinkModel->tagAttributes());
            // If `devMode` is enabled, validate the Meta Link and output any model errors
            if (Craft::$app->getConfig()->getGeneral()->devMode) {
                $this->debugMetaItem(
                    $metaLinkModel,
                    "Link attribute: "
                );
            }
        }
    }

    /**
     * @param MetaScriptContainer $metaContainer
     */
    protected function includeMetaScript(MetaScriptContainer $metaContainer)
    {
        $view = Craft::$app->getView();
        /** @var $metaScriptModel MetaScript */
        foreach ($metaContainer->data as $metaScriptModel) {
            $js = $metaScriptModel->render();
            $view->registerJs(
                $js,
                $metaContainer->position
            );
            // If `devMode` is enabled, validate the Meta Script and output any model errors
            if (Craft::$app->getConfig()->getGeneral()->devMode) {
                $this->debugMetaItem(
                    $metaScriptModel,
                    "Script attribute: "
                );
            }
        }
    }

    /**
     * @param MetaJsonLdContainer $metaContainer
     */
    protected function includeMetaJsonLd(MetaJsonLdContainer $metaContainer)
    {
        $view = Craft::$app->getView();
        /** @var $metaJsonLdModel MetaJsonLd */
        foreach ($metaContainer->data as $metaJsonLdModel) {
            $metaJsonLdModel->renderRaw = true;
            $metaJsonLdModel->renderScriptTags = false;
            $jsonLd = $metaJsonLdModel->render();
            $view->registerScript(
                $jsonLd,
                View::POS_END,
                ['type' => 'application/ld+json']
            );
            // If `devMode` is enabled, validate the JSON-LD and output any model errors
            if (Craft::$app->getConfig()->getGeneral()->devMode) {
                $this->debugMetaItem(
                    $metaJsonLdModel,
                    'JSON-LD property: ',
                    [
                        'default' => 'error',
                        'google' => 'warning'
                    ]
                );
            }
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * Generate an md5 hash from an object or array
     *
     * @param MetaItem $data
     *
     * @return string
     */
    protected function getHash(MetaItem $data): string
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
     * @param MetaItem $metaItemModel
     * @param string   $errorLabel
     * @param array    $scenarios
     */
    protected function debugMetaItem(
        MetaItem $metaItemModel,
        $errorLabel = "Error: ",
        $scenarios = ['default' => 'error']
    ) {
        $isMetaJsonLdModel = false;
        if (is_subclass_of($metaItemModel, MetaJsonLd::className())) {
            $isMetaJsonLdModel = true;
        }
        foreach ($scenarios as $scenario => $logLevel) {
            $metaItemModel->setScenario($scenario);
            if (!$metaItemModel->validate()) {
                $extraInfo = '';
                // Add a URL to the schema.org type if this is a MetaJsonLD object
                if ($isMetaJsonLdModel) {
                    /** @var  $metaItemModel MetaJsonLd */
                    $extraInfo = ' for http://schema.org/' . $metaItemModel->type;
                }
                $errorMsg =
                    Craft::t('seomatic', 'Scenario: "')
                    . $scenario
                    . '"'
                    . $extraInfo
                    . PHP_EOL
                    . print_r($metaItemModel->render(), true);
                    Craft::info($errorMsg, __METHOD__);
                foreach ($metaItemModel->errors as $param => $errors) {
                    $errorMsg = Craft::t('seomatic', $errorLabel) . $param;
                    foreach ($errors as $error) {
                        $errorMsg .= ' -> ' . $error;
                    }
                    // Change the error level depending on the error message if this is a MetaJsonLD object
                    if ($isMetaJsonLdModel) {
                        if (strpos($error, 'recommended') !== false) {
                            $logLevel = 'warning';
                        }
                        if (strpos($error, 'required') !== false
                            || strpos($error, 'Must be') !== false
                        ) {
                            $logLevel = 'error';
                        }
                    }
                    Craft::$logLevel($errorMsg, __METHOD__);
                    // Extra debugging info for MetaJsonLd objects
                    if ($isMetaJsonLdModel) {
                        $className = get_class($metaItemModel);
                        /** @var  $className MetaJsonLd */
                        $errorMsg = Craft::t('seomatic', $errorLabel) . $param;
                        $errorMsg .= ' -> ' . $className::$schemaPropertyDescriptions[$param];
                        Craft::info($errorMsg, __METHOD__);
                    }
                }
            }
        }
    }

    // Private Methods
    // =========================================================================
}
