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

use Craft;
use nystudio107\codeeditor\validators\TwigTemplateValidator;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\helpers\PluginTemplate as PluginTemplateHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class EditableTemplate extends FrontendTemplate
{
    // Constants
    // =========================================================================

    public const TEMPLATE_TYPE = 'EditableTemplate';

    // Static Methods
    // =========================================================================
    /**
     * @var string
     * @deprecated This is no longer used
     */
    public $templateVersion = '1.0.0';


    // Public Properties
    // =========================================================================
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

    /**
     * @param array $config
     *
     * @return null|EditableTemplate
     */
    public static function create(array $config = [])
    {
        $model = new EditableTemplate($config);
        // Load $templateString from the source template if it's not set
        if (empty($model->templateString)) {
            $model->loadTemplate();
        }

        return $model;
    }

    // Public Methods
    // =========================================================================

    /**
     * Load the existing template into a string
     */
    public function loadTemplate()
    {
        $this->templateString = '';
        // First try it from the Craft template directory
        $path = Craft::getAlias('@templates/')
            . $this->template;
        if (file_exists($path)) {
            $this->templateString = @file_get_contents($path);
        } else {
            // Next try from our plugin directory first
            $path = Craft::getAlias('@nystudio107/seomatic/templates/')
                . $this->template;
            if (file_exists($path)) {
                $this->templateString = @file_get_contents($path);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['templateString'], 'required'],
            [['templateString'], 'string'],
            [['templateString'], TwigTemplateValidator::class],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        return PluginTemplateHelper::renderStringTemplate($this->templateString);
    }
}
