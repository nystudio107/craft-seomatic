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

use Craft;

use yii\helpers\Html;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaTag extends MetaItem
{
    // Constants
    // =========================================================================

    const ITEM_TYPE = 'Tag';

    // Constants
    // =========================================================================

    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaTag
     */
    public static function create(array $config = [])
    {
        $model = null;
        $model = new MetaTag($config);
        $model->key = $model->options['name'] ?? $model->options['charset'] ?? $model->options['http-equiv'];

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var array
     */
    public $options;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['options'], 'required'],
        ]);

        return $rules;
    }

    /**
     * @return string
     */
    public function render():string
    {
        return Html::tag('meta', '', $this->options);
    }

    // Private Methods
    // =========================================================================

}