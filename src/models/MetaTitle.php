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

use nystudio107\seomatic\base\MetaItem;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\helpers\Text as TextHelper;
use nystudio107\seomatic\Seomatic;
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

    public const ITEM_TYPE = 'MetaTitle';
    public const DEFAULT_TITLE_KEY = 'title';

    // Static Methods
    // =========================================================================
    /**
     * @var string
     */
    public $title;

    // Public Properties
    // =========================================================================
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

    /**
     * @param array $config
     *
     * @return MetaTitle
     */
    public static function create(array $config = []): MetaTitle
    {
        return new MetaTitle($config);
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
        $this->key = $this->key ?: lcfirst(self::DEFAULT_TITLE_KEY);
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
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
    public function fields(): array
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
            $separator = MetaValueHelper::parseString($this->separatorChar);
            $position = MetaValueHelper::parseString($this->siteNamePosition);
            switch ($position) {
                case 'before':
                    $prefix = MetaValueHelper::parseString($this->siteName)
                        . ' '
                        . $separator
                        . ' ';
                    $suffix = '';
                    break;
                case 'after':
                    $prefix = '';
                    $suffix = ' '
                        . $separator
                        . ' '
                        . MetaValueHelper::parseString($this->siteName);
                    break;
                default:
                    $prefix = '';
                    $suffix = '';
                    break;
            }
            // Handle the case of empty titles
            if ($prefix === (' ' . $separator . ' ')) {
                $prefix = '';
            }
            if ($suffix === (' ' . $separator)) {
                $suffix = '';
            }
            // Remove potential double spaces
            $prefix = preg_replace('/\s+/', ' ', $prefix);
            $suffix = preg_replace('/\s+/', ' ', $suffix);
            $lengthAdjust = mb_strlen($prefix . $suffix);
            // Parse the data
            $scenario = $this->scenario;
            $this->setScenario('render');
            $data = MetaValueHelper::parseString($data);
            $this->setScenario($scenario);
            // Handle truncating the title
            $truncLen = Seomatic::$settings->maxTitleLength - $lengthAdjust;
            if ($truncLen < 0) {
                $truncLen = 0;
            }
            if (!empty($data)) {
                if (Seomatic::$settings->truncateTitleTags) {
                    $data = TextHelper::truncateOnWord(
                        $data,
                        $truncLen,
                        '…'
                    );
                }
                $data = $prefix . $data . $suffix;
            } else {
                // If no title is provided, just use the site name
                $data = MetaValueHelper::parseString($this->siteName);
            }
            // Trim whitespace
            $data = trim($data);
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
    public function render(array $params = []): string
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
