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

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\FrontendTemplate;

use Craft;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class EditableTemplate extends FrontendTemplate
{
    // Constants
    // =========================================================================

    const TEMPLATE_TYPE = 'EditableTemplate';

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|EditableTemplate
     */
    public static function create(array $config = [])
    {
        $model = null;
        $model = new EditableTemplate($config);
        // Load $templateString from the source template if it's not set
        if (empty($model->templateString)) {
            $model->loadTemplate();
        }

        return $model;
    }


    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $templateVersion;

    /**
     * The template to render this FrontendTemplate
     *
     * @var string
     */
    public $templateString;

    /**
     * @var int
     */
    public $siteId;

    // Public Methods
    // =========================================================================

    /**
     * Load the existing template into a string
     */
    public function loadTemplate()
    {
        $this->templateString = '';
        // Try it from our plugin directory first
        $path = Craft::getAlias('@nystudio107/seomatic/templates/')
            .$this->template;
        if (file_exists($path)) {
            $this->templateString = @file_get_contents($path);
        } else {
            // Next try it from the Craft template directory
            $path = Craft::getAlias('@templates/')
                . $this->template;
            if (file_exists($path)) {
                $this->templateString = @file_get_contents($path);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['templateString'], 'required'],
            [['templateString'], 'string'],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function render($params = []): string
    {
        try {
            $html = Seomatic::$view->renderString($this->templateString);
        } catch (\Exception $e) {
            $html = Craft::t(
                'seomatic',
                'Error rendering `{template}` -> {error}',
                ['template' => $this->templateString, 'error' => $e->getMessage()]
            );
            Craft::error($html, __METHOD__);
        }

        return $html;
    }
}
