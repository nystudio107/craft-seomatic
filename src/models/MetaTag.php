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

use Stringy\Stringy;

use yii\helpers\Html;
use yii\helpers\Inflector;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaTag extends MetaItem
{
    // Constants
    // =========================================================================

    const ITEM_TYPE = 'MetaTag';

    const DESCRIPTION_TAG = 'description';
    const REFERRER_TAG = 'referrer';
    const ROBOTS_TAG = 'robots';

    const UNIQUEKEYS_TAGS = [
        'og:see_also',
        'og:image',
        'og:image:type',
        'og:image:height',
        'og:image:width',
    ];

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
        foreach ($config as $key => $value) {
            ArrayHelper::rename($config, $key, Inflector::variablize($key));
        }
        $model = new MetaTag($config);

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $charset;

    /**
     * @var string
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

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (empty($this->key)) {
            $this->key = $this->name ?: $this->httpEquiv;
            // $this keys for specific tags
            if (in_array($this->name, self::UNIQUEKEYS_TAGS)) {
                $this->uniqueKeys = true;
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['charset', 'content', 'httpEquiv', 'name'], 'string'],
            // Special validation rules for specific meta tags
            [['content'], 'string', 'length' => [70, 160], 'on' => self::DESCRIPTION_TAG],
            [
                'content', 'in', 'range' => [
                    'no-referrer',
                    'origin',
                    'no-referrer-when-downgrade',
                    'origin-when-crossorigin',
                    'unsafe-URL',
                ], 'on' => self::REFERRER_TAG,
            ],
            [
                'content', 'in', 'range' => [
                    'index',
                    'noindex',
                    'follow',
                    'nofollow',
                    'none',
                    'noodp',
                    'noarchive',
                    'nosnippet',
                    'noimageindex',
                    'nocache',
                ], 'on' => self::ROBOTS_TAG,
            ],
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
    public function prepForRender(&$data): bool
    {
        $shouldRender = parent::prepForRender($data);
        if ($shouldRender) {
            $scenario = $this->scenario;
            $this->setScenario('render');
            $data = $this->tagAttributes();
            $this->setScenario($scenario);
            MetaValueHelper::parseArray($data);
            // Only render if there's more than one attribute
            if (count($data) > 1) {
                // Special-case scenarios
                if (!empty($data['name'])) {
                    switch ($data['name']) {
                        case self::DESCRIPTION_TAG:
                            if (!empty($data['content'])) {
                                $data['content'] = (string)Stringy::create($data['content'])->safeTruncate(
                                    Seomatic::$plugin->getSettings()->maxDescriptionLength,
                                    '…'
                                );
                            }
                            break;
                    }
                }
                // devMove
                if (Seomatic::$devMode) {
                }
            } else {
                $error = Craft::t(
                    'seomatic',
                    '{tagtype} tag `{key}` did not render because it is missing attributes.',
                    ['tagtype' => 'Meta', 'key' => $this->key]
                );
                Craft::error($error, __METHOD__);
                $shouldRender = false;
            }
        }

        return $shouldRender;
    }

    /**
     * @inheritdoc
     */
    public function render($params = []): string
    {
        $html = '';
        $options = $this->tagAttributes();
        if ($this->prepForRender($options)) {
            $html = Html::tag('meta', '', $options);
        }

        return $html;
    }
}
