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

use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\helpers\PluginTemplate as PluginTemplateHelper;

use Craft;

use yii\web\View;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaScript extends MetaItem
{
    // Constants
    // =========================================================================

    const ITEM_TYPE = 'MetaScript';

    // Static Methods
    // =========================================================================
    /**
     * @var string
     */
    public $name;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $templatePath;

    /**
     * @var string
     */
    public $templateString;

    /**
     * @var int
     */
    public $position = View::POS_HEAD;

    /**
     * @var
     */
    public $bodyTemplatePath;

    /**
     * @var int
     */
    public $bodyPosition = View::POS_BEGIN;

    /**
     * @var array
     */
    public $vars;

    /**
     * @var array
     */
    public $dataLayer = [];

    /**
     * @param array $config
     *
     * @return MetaScript
     */
    public static function create(array $config = []): MetaScript
    {
        $model = new MetaScript($config);
        // Load $templateString from the source template if it's not set
        if (empty($model->templateString)) {
            $model->loadTemplate();
        }

        return $model;
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->key = $this->key ?: lcfirst($this->name);
    }

    /**
     * Load the existing template into a string
     */
    public function loadTemplate()
    {
        $this->templateString = '';
        // Try it from our plugin directory first
        $path = Craft::getAlias('@nystudio107/seomatic/templates/')
            .$this->templatePath;
        if (file_exists($path)) {
            $this->templateString = @file_get_contents($path);
        } else {
            // Next try it from the Craft template directory
            $path = Craft::getAlias('@templates/')
                .$this->templatePath;
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
            [
                [
                    'name',
                    'description',
                    'templatePath',
                    'templateString',
                    'bodyTemplatePath',
                ],
                'string',
            ],
            [
                [
                    'position',
                ],
                'integer',
            ],
            [
                [
                    'name',
                    'description',
                    'templatePath',
                    'templateString',
                    'bodyTemplatePath',
                    'position',
                ],
                'required',
            ],
            [['vars'], 'safe'],
            [['dataLayer'], 'safe'],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        switch ($this->scenario) {
            case 'render':
                $fields = array_diff_key(
                    $fields,
                    array_flip([
                        'name',
                        'description',
                        'environment',
                        'dependencies',
                    ])
                );
                break;
        }

        return $fields;
    }

    /**
     * @inheritdoc
     */
    public function prepForRender(&$data): bool
    {
        $shouldRender = parent::prepForRender($data);
        if ($shouldRender) {
        }

        return $shouldRender;
    }

    /**
     * Render the script body HTML
     *
     * @param array $params
     *
     * @return string
     */
    public function renderBodyHtml(array $params = []): string
    {
        $html = '';
        if (!empty($this->bodyTemplatePath) && $this->prepForRender($params)) {
            $variables = array_merge($this->vars, [
                'dataLayer' => $this->dataLayer,
            ]);
            $html = PluginTemplateHelper::renderPluginTemplate($this->bodyTemplatePath, $variables);
        }

        return $html;
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        $html = '';
        if ($this->prepForRender($params)) {
            $variables = array_merge($this->vars, [
                'dataLayer' => $this->dataLayer,
            ]);
            $html = PluginTemplateHelper::renderStringTemplate($this->templateString, $variables);
        }

        if (empty($html)) {
            $html = '/* '.$this->name.Craft::t('seomatic', ' script did not render').' */'.PHP_EOL;
        }
        return $html;
    }

    /**
     * @inheritdoc
     */
    public function renderAttributes(array $params = []): array
    {
        $attributes = [];

        if ($this->prepForRender($options)) {
            $variables = array_merge($this->vars, [
                'dataLayer' => $this->dataLayer,
            ]);
            $attributes = ['script' => PluginTemplateHelper::renderStringTemplate($this->templateString, $variables)];
        }

        return $attributes;
    }
}
