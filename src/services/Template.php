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
use nystudio107\seomatic\base\MetaServiceInterface;
use nystudio107\seomatic\models\EditableTemplate;
use nystudio107\seomatic\models\FrontendTemplateContainer;

use craft\base\Component;
use craft\helpers\Template as TemplateHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Template extends Component implements MetaServiceInterface
{
    // Constants
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @param string $key
     * @param string $handle
     *
     * @return null|EditableTemplate
     */
    public function get(string $key, string $handle = '')
    {
        /** @var  $metaItem EditableTemplate */
        $frontendTemplate = Seomatic::$plugin->frontendTemplates->getFrontendTemplateByKey(
            $key,
            FrontendTemplateContainer::CONTAINER_TYPE
        );

        return $frontendTemplate;
    }

    /**
     * @inheritdoc
     */
    public function create($config = [], $add = true): EditableTemplate
    {
        $frontendTemplate = EditableTemplate::create($config);
        if ($add && !empty($frontendTemplate)) {
            $this->add($frontendTemplate);
        }

        return $frontendTemplate;
    }

    /**
     * @inheritdoc
     */
    public function add($frontendTemplate, string $handle = '')
    {
        $key = FrontendTemplateContainer::CONTAINER_TYPE . $handle;
        Seomatic::$plugin->metaContainers->addToMetaContainer(FrontendTemplateContainer, $key);

        /** @var EditableTemplate $frontendTemplate */
        return $frontendTemplate;
    }

    /**
     * @inheritdoc
     */
    public function render()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function container(string $handle = ''): FrontendTemplateContainer
    {
        $key = FrontendTemplateContainer::CONTAINER_TYPE . $handle;
        return Seomatic::$plugin->metaContainers->getMetaContainer($key);
    }
}
