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
        $model->key = $model->templatePath;

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $templatePath;

    /**
     * @var array
     */
    public $vars;

    // Public Methods
    // =========================================================================

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
    public function prepForRender(&$data)
    {
    }

    /**
     * @inheritdoc
     */
    public function render($params = []):string
    {
        return PluginTemplateHelper::renderPluginTemplate($this->templatePath, $this->vars);
    }
}
