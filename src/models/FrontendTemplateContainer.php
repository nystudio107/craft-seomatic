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

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\base\Container as SeomaticContainer;
use nystudio107\seomatic\base\FrontendTemplate;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class FrontendTemplateContainer extends SeomaticContainer
{

    // Public Properties
    // =========================================================================

    /**
     * The FrontendTemplates in this container
     *
     * @var FrontendTemplate
     */
    public $data = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function render($params = []): string
    {
        $html = '';

        /** @var  $frontendTemplateModel FrontendTemplate */
        foreach ($this->data as $frontendTemplateModel) {
            $html .= $frontendTemplateModel->render();
        }

        return $html;
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData(): void
    {
    }
}
