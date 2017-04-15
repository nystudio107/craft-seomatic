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
     * Load the meta containers
     */
    public function loadMetaContainers(): void
    {
        $this->loadGlobalMetaContainers();
        $this->loadSectionMetaContainers();
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
    }

    /**
     *
     */
    protected function loadSectionMetaContainers()
    {
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
