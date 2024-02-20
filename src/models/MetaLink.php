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
use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\Seomatic;
use yii\helpers\Html;
use yii\helpers\Inflector;
use function count;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaLink extends MetaItem
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'MetaLink';

    public const ARRAY_PROPERTIES = [
        'href',
    ];

    // Static Methods
    // =========================================================================
    /**
     * @var string
     */
    public $crossorigin;

    // Public Properties
    // =========================================================================
    /**
     * @var string|array
     */
    public $href;
    /**
     * @var string|array
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

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

        // Make sure we have a valid key
        $this->key = $this->key ?: lcfirst($this->rel);
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['crossorigin', 'media', 'rel', 'sizes', 'type'], 'string'],
            ['crossorigin', 'in', 'range' => [
                'anonymous',
                'use-credentials',
            ]],
            ['href', 'validateStringOrArray'],
            ['hreflang', 'validateStringOrArray'],
            ['rel', 'required'],
            ['rel', 'in', 'range' => [
                'alternate',
                'author',
                'canonical',
                'creator',
                'dns-prefetch',
                'help',
                'home',
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
    public function fields(): array
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
            if (count($data) > 1) {
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
                    Craft::info('WARNING - ' . $error, __METHOD__);
                }
                $shouldRender = false;
            }
        }

        return $shouldRender;
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        $html = '';
        $linebreak = '';
        // If `devMode` is enabled, make it more human-readable
        if (Seomatic::$devMode) {
            $linebreak = PHP_EOL;
        }
        $configs = $this->tagAttributesArray();
        foreach ($configs as $config) {
            if ($this->prepForRender($config)) {
                ksort($config);
                $html .= Html::tag('link', '', $config) . $linebreak;
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
                $attributes[] = $config;
            }
        }
        if (count($attributes) === 1) {
            $attributes = $attributes[0];
        }

        return $attributes;
    }
}
