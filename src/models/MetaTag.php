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
use function in_array;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaTag extends MetaItem
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'MetaTag';

    public const ARRAY_PROPERTIES = [
        'content',
    ];

    // Static Methods
    // =========================================================================
    /**
     * @var string
     */
    public $charset;

    // Public Properties
    // =========================================================================
    /**
     * @var string|array
     */
    public $content;
    /**
     * @var string
     */
    public $httpEquiv;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $property;

    /**
     * @param null|string $tagType
     * @param array $config
     *
     * @return MetaTag
     */
    public static function create($tagType = null, array $config = []): MetaTag
    {
        $tagType = $tagType ? Inflector::variablize($tagType) : $tagType;
        // Variablize the keys so that they coincide with our property names
        foreach ($config as $key => $value) {
            ArrayHelper::rename($config, $key, Inflector::variablize($key));
        }
        $className = MetaTag::class;
        if ($tagType) {
            // Potentially load a sub-type of MetaTag
            $tagClassName = 'nystudio107\\seomatic\\models\\metatag\\' . ucfirst($tagType) . 'Tag';
            /** @var $model MetaTag */
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
        $this->key = $this->key ?: lcfirst($this->name);
        $this->key = $this->key ?: lcfirst($this->property);
        $this->key = $this->key ?: lcfirst($this->httpEquiv);
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['charset', 'httpEquiv', 'name', 'property'], 'string'],
            [['content'], 'validateStringOrArray'],
            [['name'], 'safe', 'on' => ['warning']],
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

        return $fields;
    }

    /**
     * @inheritdoc
     */
    public function prepForRender(&$data): bool
    {
        $shouldRender = parent::prepForRender($data);
        if ($shouldRender) {
            // MetaValueHelper::parseArray by default resolves aliases
            $shouldResolveAliases = true;
            if (in_array($data['name'] ?? $data['property'] ?? '', MetaValueHelper::NO_ALIASES, true)) {
                // Most tags use `name`-property, Facebook uses `property`-property
                $shouldResolveAliases = false;
            }
            MetaValueHelper::parseArray($data, $shouldResolveAliases);
            // Only render if there's more than one attribute
            if (count($data) > 1) {
                // devMode
                if (Seomatic::$devMode) {
                }
            } else {
                if (Seomatic::$devMode) {
                    $error = Craft::t(
                        'seomatic',
                        '{tagtype} tag `{key}` did not render because it is missing attributes. ' . print_r($data, true),
                        ['tagtype' => 'Meta', 'key' => $this->key]
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
                $html .= Html::tag('meta', '', $config) . $linebreak;
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
