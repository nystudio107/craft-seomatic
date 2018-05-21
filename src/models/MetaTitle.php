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
    const DEFAULT_TITLE_KEY = 'title';

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return MetaTitle
     */
    public static function create(array $config = []): MetaTitle
    {
        return new MetaTitle($config);
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $siteName;

    /**
     * @var string
     */
    public $siteNamePosition;

    /**
     * @var string
     */
    public $separatorChar;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Make sure we have a valid key
        $this->key = $this->key ?: lcfirst(self::DEFAULT_TITLE_KEY);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['title'], 'required'],
            [['title'], 'string', 'length' => [40, Seomatic::$settings->maxTitleLength], 'on' => ['warning']],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        switch ($this->scenario) {
            case 'render':
                $fields = array_diff_key(
                    $fields,
                    array_flip([
                        'siteName',
                        'siteNamePosition',
                        'separatorChar',
                    ])
                );
                break;
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
            // handle the site name
            $position = MetaValueHelper::parseString($this->siteNamePosition);
            switch ($position) {
                case 'before':
                    $prefix = MetaValueHelper::parseString($this->siteName)
                        . ' '
                        . MetaValueHelper::parseString($this->separatorChar)
                        . ' ';
                    $suffix = '';
                    break;
                case 'after':
                    $prefix = '';
                    $suffix = ' '
                        . MetaValueHelper::parseString($this->separatorChar)
                        . ' '
                        . MetaValueHelper::parseString($this->siteName);
                    break;
                default:
                    $prefix = '';
                    $suffix = '';
                    break;
            }
            $lengthAdjust = mb_strlen($prefix.$suffix);
            // Parse the data
            $scenario = $this->scenario;
            $this->setScenario('render');
            $data = MetaValueHelper::parseString($data);
            $this->setScenario($scenario);
            // Special-case scenarios
            $data = (string)Stringy::create($data)->safeTruncate(
                Seomatic::$settings->maxTitleLength - $lengthAdjust,
                '…'
            );
            $data = $prefix.$data.$suffix;
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
    public function render(array $params = []):string
    {
        $html = '';
        $title = $this->title;
        if ($this->prepForRender($title)) {
            $html = Html::tag('title', $title, []);
        }

        return $html;
    }

    /**
     * @inheritdoc
     */
    public function renderAttributes(array $params = []): array
    {
        $attributes = [];
        $title = $this->title;
        if ($this->prepForRender($title)) {
            $attributes = ['title' => $title];
        }

        return $attributes;
    }
}
