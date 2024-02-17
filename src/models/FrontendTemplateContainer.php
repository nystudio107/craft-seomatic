<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\base\Container as SeomaticContainer;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class FrontendTemplateContainer extends SeomaticContainer
{
    // Constants
    // =========================================================================

    public const CONTAINER_TYPE = 'FrontendTemplateContainer';

    // Public Properties
    // =========================================================================

    /**
     * The FrontendTemplates in this container
     *
     * @var EditableTemplate[] $data
     */
    public $data = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData()
    {
        parent::normalizeContainerData();

        /** @var array $config */
        foreach ($this->data as $key => $config) {
            $this->addData(EditableTemplate::create($config), $key);
        }
    }
}
