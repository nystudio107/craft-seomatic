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
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

use Craft;

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

    const ARRAY_PROPERTIES = [
        'href',
    ];

    // Static Methods
    // =========================================================================

    /**
     * @param null|string $tagType
     * @param array $config
     *
     * @return MetaLink
     */
    public static function create($tagType = null, array $config = []): MetaLink
    {
        $tagType = $tagType ? Inflector::variablize($tagType) : $tagType;
        foreach ($config as $key => $value) {
            ArrayHelper::rename($config, $key, Inflector::variablize($key));
        }
        $className = MetaLink::class;
        if ($tagType) {
            // Potentially load a sub-type of MetaTag
            $tagClassName = 'nystudio107\\seomatic\\models\\metalink\\' . ucfirst($tagType) . 'Link';
            /** @var $model MetaLink */
            if (class_exists($tagClassName)) {
                $className = $tagClassName;
            }
        }

        return new $className($config);
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $crossorigin;

    /**
     * @var string|array
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
    public function init()
    {
        parent::init();

        // Make sure we have a valid key
        $this->key = $this->key ?: lcfirst($this->rel);
    }

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
            ['hreflang', 'string'],
            ['rel', 'required'],
            ['rel', 'in', 'range' => [
                'alternate',
                'author',
                'canonical',
                'creator',
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
                'publisher',
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

        return parent::fields();
    }

    /**
     * @inheritdoc
     */
    public function prepForRender(&$data): bool
    {
        $shouldRender = parent::prepForRender($data);
        if ($shouldRender) {
            MetaValueHelper::parseArray($data);
            // Only render if there's more than one attribute
            if (\count($data) > 1) {
                // Special-case scenarios
                if (Seomatic::$devMode) {
                }
            } else {
                if (Seomatic::$devMode) {
                    $error = Craft::t(
                        'seomatic',
                        '{tagtype} tag `{key}` did not render because it is missing attributes.',
                        ['tagtype' => 'Link', 'key' => $this->key]
                    );
                    Craft::error($error, __METHOD__);
                }
                $shouldRender = false;
            }
        }

        return $shouldRender;
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []):string
    {
        $html = '';
        $configs = $this->tagAttributesArray();
        foreach ($configs as $config) {
            if ($this->prepForRender($config)) {
                ksort($config);
                $html = Html::tag('link', '', $config);
            }
        }

        return $html;
    }

    /**
     * @inheritdoc
     */
    public function renderAttributes(array $params = []): array
    {
        $attributes = [];

        $configs = $this->tagAttributesArray();
        foreach ($configs as $config) {
            if ($this->prepForRender($config)) {
                ksort($config);
                $attributes = array_merge($attributes, $config);
            }
        }

        return $attributes;
    }
}
