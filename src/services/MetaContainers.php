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

use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\models\MetaLink;
use nystudio107\seomatic\models\MetaScript;
use nystudio107\seomatic\models\MetaTag;
use nystudio107\seomatic\models\MetaTitle;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaTitleContainer;

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
    const SEOMATIC_METATITLE_CONTAINER = Seomatic::SEOMATIC_HANDLE . MetaTitle::ITEM_TYPE;

    const METATAG_GENERAL_HANDLE = 'general';
    const METATAG_STANDARD_HANDLE = 'standard';
    const METATAG_OPENGRAPH_HANDLE = 'opengraph';
    const METATAG_TWITTER_HANDLE = 'twitter';
    const METATAG_MISCELLANEOUS_HANDLE = 'misc';

    const METALINK_GENERAL_HANDLE = 'general';
    const METASCRIPT_GENERAL_HANDLE = 'general';
    const METAJSONLD_GENERAL_HANDLE = 'general';
    const METATITLE_GENERAL_HANDLE = 'general';

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
            $this->loadContentMetaContainers();

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
            if ($metaContainer->include) {
                $metaContainer->includeMetaData();
            }
        }
    }

    /**
     * @param string $title
     */
    public function includeMetaTitle(string $title)
    {
        $view = Craft::$app->getView();
        $title = MetaValueHelper::parseString($title);
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
        if (!$key) {
            $key = $key . $type;
        }
        /** @var  $container MetaContainer */
        if (empty($this->metaContainers[$key])) {
            // If the MetaContainer doesn't exist, create it
            $container = $this->createMetaContainer($type, $key);
        } else {
            $container = $this->metaContainers[$key];
        }
        // If $uniqueKeys is set, generate a hash of the data for the key
        $dataKey = $data->key;
        if ($data->uniqueKeys) {
            $dataKey = $this->getHash($data);
        }
        $container->addData($data, $dataKey);
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
     * Load the global site meta containers
     */
    protected function loadGlobalMetaContainers()
    {
        $siteId = Craft::$app->getSites()->currentSite->id;
        $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId);
        if ($metaBundle) {
            foreach ($metaBundle->metaTagContainer as $metaTagContainer) {
                $key = self::SEOMATIC_METATAG_CONTAINER . $metaTagContainer->handle;
                $this->metaContainers[$key] = $metaTagContainer;
            }
            foreach ($metaBundle->metaLinkContainer as $metaLinkContainer) {
                $key = self::SEOMATIC_METALINK_CONTAINER . $metaLinkContainer->handle;
                $this->metaContainers[$key] = $metaLinkContainer;
            }
            foreach ($metaBundle->metaScriptContainer as $metaScriptContainer) {
                $key = self::SEOMATIC_METASCRIPT_CONTAINER . $metaScriptContainer->handle;
                $this->metaContainers[$key] = $metaScriptContainer;
            }
            foreach ($metaBundle->metaJsonLdContainer as $metaJsonLdContainer) {
                $key = self::SEOMATIC_METAJSONLD_CONTAINER . $metaJsonLdContainer->handle;
                $this->metaContainers[$key] = $metaJsonLdContainer;
            }
            foreach ($metaBundle->metaTitleContainer as $metaTitleContainer) {
                $key = self::SEOMATIC_METATITLE_CONTAINER . $metaTitleContainer->handle;
                $this->metaContainers[$key] = $metaTitleContainer;
            }
        }
    }

    /**
     * Load the meta containers specific to the currently rendering template, and
     * combine it with the global meta containers
     */
    protected function loadContentMetaContainers()
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

    /**
     * Add the meta bundle to our existing meta containers, overwriting meta items
     * with the same key
     *
     * @param MetaBundle $metaBundle
     */
    public function addMetaBundleToContainers(MetaBundle $metaBundle)
    {
        foreach ($metaBundle->metaTagContainer as $metaTagContainer) {
            $key = self::SEOMATIC_METATAG_CONTAINER . $metaTagContainer->handle;
            foreach ($metaTagContainer->data as $metaTag) {
                $this->addToMetaContainer(
                    $metaTag,
                    MetaTagContainer::CONTAINER_TYPE,
                    $key
                );
            }
        }
        foreach ($metaBundle->metaLinkContainer as $metaLinkContainer) {
            $key = self::SEOMATIC_METALINK_CONTAINER . $metaLinkContainer->handle;
            foreach ($metaLinkContainer->data as $metaLink) {
                $this->addToMetaContainer(
                    $metaLink,
                    MetaLinkContainer::CONTAINER_TYPE,
                    $key
                );
            }
        }
        foreach ($metaBundle->metaScriptContainer as $metaScriptContainer) {
            $key = self::SEOMATIC_METASCRIPT_CONTAINER . $metaScriptContainer->handle;
            foreach ($metaScriptContainer->data as $metaScript) {
                $this->addToMetaContainer(
                    $metaScript,
                    MetaScriptContainer::CONTAINER_TYPE,
                    $key
                );
            }
        }
        foreach ($metaBundle->metaJsonLdContainer as $metaJsonLdContainer) {
            $key = self::SEOMATIC_METAJSONLD_CONTAINER . $metaJsonLdContainer->handle;
            foreach ($metaJsonLdContainer->data as $metaJsonLd) {
                $this->addToMetaContainer(
                    $metaJsonLd,
                    MetaJsonLdContainer::CONTAINER_TYPE,
                    $key
                );
            }
        }
        foreach ($metaBundle->metaTitleContainer as $metaTitleContainer) {
            $key = self::SEOMATIC_METATITLE_CONTAINER . $metaTitleContainer->handle;
            foreach ($metaTitleContainer->data as $metaTitle) {
                $this->addToMetaContainer(
                    $metaTitle,
                    MetaTitleContainer::CONTAINER_TYPE,
                    $key
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

    // Private Methods
    // =========================================================================
}
