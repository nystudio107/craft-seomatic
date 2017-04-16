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

use craft\helpers\ArrayHelper;

use yii\helpers\Html;
use yii\helpers\Inflector;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaLink extends MetaItem
{
    // Constants
    // =========================================================================

    const ITEM_TYPE = 'MetaLink';

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaLink
     */
    public static function create(array $config = [])
    {
        $model = null;
        foreach ($config as $key => $value) {
            ArrayHelper::rename($config, $key, Inflector::variablize($key));
        }
        $model = new MetaLink($config);
        $model->key = $model->rel;

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $crossorigin;

    /**
     * @var string
     */
    public $href;

    /**
     * @var string
     */
    public $hreflang;

    /**
     * @var string
     */
    public $media;

    /**
     * @var string
     */
    public $rel;

    /**
     * @var string
     */
    public $sizes;

    /**
     * @var string
     */
    public $type;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['crossorigin', 'href', 'hreflang', 'media', 'rel', 'sizes', 'type'], 'string'],
            ['crossorigin', 'in', 'range' => [
                'anonymous',
                'use-credentials'
            ]],
            ['href', 'url'],
            ['hreflang', 'url'],
            ['rel', 'required'],
            ['rel', 'in', 'range' => [
                'alternate',
                'author',
                'canonical',
                'dns-prefetch',
                'help',
                'icon',
                'license',
                'next',
                'pingback',
                'preconnect',
                'prefetch',
                'preload',
                'prerender',
                'prev',
                'search',
                'stylesheet',
            ]],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        if ($this->scenario === 'default') {
        }

        return $fields;
    }

    /**
     * @inheritdoc
     */
    public function render($params = []):string
    {
        $options = $this->tagAttributes();
        return Html::tag('link', '', $options);
    }
}
