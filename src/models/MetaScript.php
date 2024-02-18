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
use nystudio107\seomatic\base\NonceItem;
use nystudio107\seomatic\helpers\PluginTemplate as PluginTemplateHelper;
use yii\web\View;
use function is_string;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaScript extends NonceItem
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'MetaScript';

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
     * @var string
     */
    public $bodyTemplatePath;

    /**
     * @var string
     */
    public $bodyTemplateString;

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
     * @var bool Whether this tag is deprecated or not
     */
    public $deprecated = false;

    /**
     * @var string The deprecation notice to display
     */
    public $deprecationNotice = '';

    /**
     * @var bool Whether this tag is discontinued, and should not be displayed or rendered
     */
    public $discontinued = false;

    /**
     * @param array $config
     *
     * @return MetaScript
     */
    public static function create(array $config = []): MetaScript
    {
        $model = new MetaScript($config);
        // Load $templateString from the source template if it's not set
        if (empty($model->templateString) && !empty($model->templatePath)) {
            $model->templateString = $model->loadTemplate($model->templatePath);
        }

        // Load $templateString from the source template if it's not set
        if (empty($model->bodyTemplateString) && !empty($model->bodyTemplatePath)) {
            $model->bodyTemplateString = $model->loadTemplate($model->bodyTemplatePath);
        }

        return $model;
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

        $this->key = $this->key ?: lcfirst($this->name);
    }

    /**
     * Load the existing template into a string
     *
     * @param string $templatePath
     *
     * @return string
     */
    public function loadTemplate(string $templatePath): string
    {
        $result = '';
        // Try it from our plugin directory first
        $path = Craft::getAlias('@nystudio107/seomatic/templates/')
            . $templatePath;
        if (file_exists($path)) {
            $result = @file_get_contents($path);
        } else {
            // Next try it from the Craft template directory
            $path = Craft::getAlias('@templates/')
                . $templatePath;
            if (file_exists($path)) {
                $result = @file_get_contents($path);
            }
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
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
                    'bodyTemplateString',
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
                    'position',
                ],
                'required',
            ],
            [
                [
                    'templateString',
                    'bodyTemplateString',
                ],
                TwigTemplateValidator::class,
            ],
            [['vars'], 'safe'],
            [['dataLayer'], 'safe'],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields(): array
    {
        $fields = parent::fields();
        switch ($this->scenario) {
            case 'render':
                $fields = array_diff_key(
                    $fields,
                    array_flip([
                        'name',
                        'description',
                        'templatePath',
                        'templateString',
                        'position',
                        'bodyTemplatePath',
                        'bodyTemplateString',
                        'bodyPosition',
                        'vars',
                        'dataLayer',
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
        if ($this->discontinued) {
            return false;
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
            $variables = $this->normalizeScriptVars();
            if (!empty($this->bodyTemplateString)) {
                $html = PluginTemplateHelper::renderStringTemplate($this->bodyTemplateString, $variables);
            }
        }

        return $html;
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        $html = '';
        if (!empty($this->templatePath) && $this->prepForRender($params)) {
            $variables = $this->normalizeScriptVars();
            $html = PluginTemplateHelper::renderStringTemplate($this->templateString, $variables);
        }

        if (empty($html) && !empty($this->templatePath)) {
            $html = '/* ' . $this->name . Craft::t('seomatic', ' script did not render') . ' */' . PHP_EOL;
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
            $variables = $this->normalizeScriptVars();
            if (!empty($this->templateString)) {
                $attributes['script']
                    = PluginTemplateHelper::renderStringTemplate($this->templateString, $variables);
            }
            if (!empty($this->bodyTemplateString)) {
                $attributes['bodyScript']
                    = PluginTemplateHelper::renderStringTemplate($this->bodyTemplateString, $variables);
            }
        }

        return $attributes;
    }

    /**
     * Normalize the script variables by parsing them as environment variables, and trimming whitespace
     *
     * @return array
     */
    private function normalizeScriptVars(): array
    {
        $variables = array_merge($this->vars, [
            'dataLayer' => $this->dataLayer,
        ]);
        foreach ($variables as $key => $value) {
            if (!empty($value['value']) && is_string($value['value'])) {
                $variables[$key]['value'] = Craft::parseEnv($value['value']);
                $variables[$key]['value'] = trim($variables[$key]['value']);
            }
        }

        return $variables;
    }
}
