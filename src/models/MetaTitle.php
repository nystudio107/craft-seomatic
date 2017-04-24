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
use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

use yii\helpers\Html;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaTitle extends MetaItem
{
    // Constants
    // =========================================================================

    const ITEM_TYPE = 'MetaTitle';

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaTitle
     */
    public static function create(array $config = [])
    {
        $model = null;
        $model = new MetaTitle($config);
        $model->key = 'title';

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $title;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['title'], 'required'],
            [['title'], 'string', 'length' => [40, 70]],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function prepForRender(&$data)
    {
        $scenario = $this->scenario;
        $this->setScenario('render');
        $data = MetaValueHelper::parseString($data);
        $this->setScenario($scenario);
        /** @var  $settings Settings */
        $settings = Seomatic::$plugin->getSettings();
        // Special-case scenarios
        if (Seomatic::$devMode) {
            $data = $settings->devModeTitlePrefix . $data;
        }
        switch ($settings->environment) {
            case 'live':
                break;
            case 'staging':
                break;
            case 'local':
                break;
        }
    }

    /**
     * @inheritdoc
     */
    public function render($params = []):string
    {
        $title = $this->title;
        $this->prepForRender($title);
        return Html::tag('title', $title, []);
    }
}
