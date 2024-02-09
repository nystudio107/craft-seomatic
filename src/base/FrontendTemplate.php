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

namespace nystudio107\seomatic\base;

use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\Seomatic;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class FrontendTemplate extends FluentModel implements FrontendTemplateInterface
{
    // Traits
    // =========================================================================

    use FrontendTemplateTrait;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['include'], 'boolean'],
            [['path', 'controller', 'action'], 'required'],
            [['path', 'controller', 'action'], 'string'],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function routeRules(): array
    {
        $rules = [];
        $route =
            Seomatic::$plugin->handle
            . '/'
            . $this->controller
            . '/'
            . $this->action;
        $rules[$this->path] = ['route' => $route];

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        return PluginTemplate::renderPluginTemplate($this->path, $params);
    }
}
