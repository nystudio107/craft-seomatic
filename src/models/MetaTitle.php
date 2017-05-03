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

use Stringy\Stringy;

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
    public function init()
    {
        parent::init();

        if (empty($this->key)) {
            $this->key = 'title';
        }
    }

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
    public function prepForRender(&$data): bool
    {
        $shouldRender = parent::prepForRender($data);
        if ($shouldRender) {
            $scenario = $this->scenario;
            $this->setScenario('render');
            $data = MetaValueHelper::parseString($data);
            $this->setScenario($scenario);
            // Special-case scenarios
            $data = (string)Stringy::create($data)->safeTruncate(
                Seomatic::$plugin->getSettings()->maxTitleLength,
                '…'
            );
            // devMode
            if (Seomatic::$devMode) {
                $data = Seomatic::$settings->devModeTitlePrefix . $data;
            }
        }

        return $shouldRender;
    }

    /**
     * @inheritdoc
     */
    public function render($params = []):string
    {
        $html = '';
        $title = $this->title;
        if ($this->prepForRender($title)) {
            $html = Html::tag('title', $title, []);
        }

        return $html;
    }
}
