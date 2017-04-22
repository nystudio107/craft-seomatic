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

use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\models\MetaScript;
use nystudio107\seomatic\models\MetaTag;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaJsonLdContainer;

use Craft;
use craft\base\Component;
use craft\web\View;

use yii\base\Event;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaContainers extends Component
{
    // Constants
    // =========================================================================

    const SEOMATIC_METATAG_CONTAINER = Seomatic::SEOMATIC_HANDLE . MetaTag::ITEM_TYPE;

    const SEOMATIC_METALINK_CONTAINER = Seomatic::SEOMATIC_HANDLE . MetaLink::ITEM_TYPE;

    const SEOMATIC_METASCRIPT_CONTAINER = Seomatic::SEOMATIC_HANDLE . MetaScript::ITEM_TYPE;

    const SEOMATIC_METAJSONLD_CONTAINER = Seomatic::SEOMATIC_HANDLE . MetaJsonLd::ITEM_TYPE;

    // Protected Properties
    // =========================================================================

    /**
     * @var MetaContainer
     */
    protected $metaContainers = [];

    /**
     * @var bool
     */
    protected $loadingContainers = false;

    /**
     * @var bool
     */
    protected $containersLoaded = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Load the meta containers
     */
    public function loadMetaContainers(): void
    {
        // Avoid recursion
        if (!$this->loadingContainers && !$this->containersLoaded) {
            $this->loadingContainers = true;

            $this->loadGlobalMetaContainers();
            $this->loadSectionMetaContainers();

            // Handler: View::EVENT_END_PAGE
            Event::on(
                View::className(),
                View::EVENT_END_PAGE,
                function (Event $event) {
                    Craft::trace(
                        'View::EVENT_END_PAGE',
                        'seomatic'
                    );
                    // The page is done rendering, include our meta containers
                    $this->includeMetaContainers();
                }
            );
            $this->loadingContainers = false;
            $this->containersLoaded = true;
        }
    }

    /**
     * Include the meta containers
     */
    public function includeMetaContainers(): void
    {
        foreach ($this->metaContainers as $metaContainer) {
            /** @var $metaContainer MetaContainer */
            $metaContainer->includeMetaData();
        }
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

    // Protected Methods
    // =========================================================================

    /**
     *
     */
    protected function loadGlobalMetaContainers()
    {
        $siteId = Craft::$app->getSites()->currentSite->id;
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        if ($metaBundle) {
            $this->metaContainers->addData($metaBundle->metaTagContainer, self::SEOMATIC_METATAG_CONTAINER);
            $this->metaContainers->addData($metaBundle->metaLinkContainer, self::SEOMATIC_METALINK_CONTAINER);
            $this->metaContainers->addData($metaBundle->metaScriptContainer, self::SEOMATIC_METASCRIPT_CONTAINER);
            $this->metaContainers->addData($metaBundle->metaJsonLdContainer, self::SEOMATIC_METAJSONLD_CONTAINER);
        }
    }

    /**
     *
     */
    protected function loadSectionMetaContainers()
    {
        $metaBundle = null;
        $siteId = Craft::$app->getSites()->currentSite->id;
        $view = Craft::$app->getView();
        $template = $view->getRenderingTemplate();
        if ($template) {
            $templatePath = $view->getTemplatesPath() . DIRECTORY_SEPARATOR;
            $template = str_replace($templatePath, '', $template);
            // Try an exact match first
            $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceTemplate(
                $template,
                $siteId
            );
            // Try without the file extension
            if (!$metaBundle) {
                $pathParts = pathinfo($template);
                $template = ($pathParts['dirname'] == '.' ? '' : $pathParts['dirname']) . $pathParts['filename'];
                $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceTemplate(
                    $template,
                    $siteId
                );
            }
        }
        if ($metaBundle) {
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

    // Private Methods
    // =========================================================================
}
