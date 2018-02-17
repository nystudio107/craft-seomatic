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

use nystudio107\seomatic\helpers\PluginTemplate as PluginTemplateHelper;
use nystudio107\seomatic\base\MetaItem;

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
     * @param array $config
     *
     * @return null|MetaScript
     */
    public static function create(array $config = [])
    {
        $model = null;
        $model = new MetaScript($config);

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $templatePath;

    /**
     * @var int
     */
    public $position = View::POS_HEAD;

    /**
     * @var array
     */
    public $vars;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (empty($this->key)) {
            $this->key = $this->templatePath;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['templatePath'], 'required'],
            [['templatePath'], 'string'],
            [['vars'], 'safe'],
        ]);

        return $rules;
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
     * @inheritdoc
     */
    public function render($params = []):string
    {
        $html = '';
        if ($this->prepForRender($options)) {
            $html = PluginTemplateHelper::renderPluginTemplate($this->templatePath, $this->vars);
        }

        return $html;
    }

    /**
     * @inheritdoc
     */
    public function renderAttributes($params = []): array
    {
        $attributes = [];

        if ($this->prepForRender($options)) {
            $attributes = ['script' => PluginTemplateHelper::renderPluginTemplate($this->templatePath, $this->vars)];
        }

        return $attributes;
    }

}
