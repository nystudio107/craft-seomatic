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

use nystudio107\seomatic\base\FluentModel;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

use Craft;
use craft\validators\ArrayValidator;

/**
 * @inheritdoc
 * @method void setLanguage(string $language)
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaGlobalVars extends FluentModel
{
    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaGlobalVars
     */
    public static function create(array $config = [])
    {
        $model = null;
        $model = new MetaGlobalVars($config);

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $language;

    /**
     * @var string
     */
    public $seoTitle;

    /**
     * @var string
     */
    public $seoDescription;

    /**
     * @var string
     */
    public $seoImage;

    /**
     * @var string
     */
    public $seoImageDescription;

    /**
     * @var string
     */
    public $canonicalUrl;

    /**
     * @var string
     */
    public $robots;

    /**
     * @var string
     */
    public $ogType;

    /**
     * @var string
     */
    public $ogTitle;

    /**
     * @var string
     */
    public $ogDescription;

    /**
     * @var string
     */
    public $ogImage;

    /**
     * @var string
     */
    public $ogImageDescription;

    /**
     * @var string
     */
    public $twitterCard;

    /**
     * @var string
     */
    public $twitterSite;

    /**
     * @var string
     */
    public $twitterCreator;

    /**
     * @var string
     */
    public $twitterTitle;

    /**
     * @var string
     */
    public $twitterDescription;

    /**
     * @var string
     */
    public $twitterImage;

    /**
     * @var string
     */
    public $twitterImageDescription;

    // Public Methods
    // =========================================================================

    /**
     * Parse the model properties
     */
    public function parseProperties()
    {
        // Parse the meta global vars
        $attributes = $this->getAttributes();
        MetaValueHelper::parseArray($attributes);
        $this->setAttributes($attributes);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'language',
                    'seoTitle',
                    'seoDescription',
                    'seoImage',
                    'seoImageDescription',
                    'canonicalUrl',
                    'robots',
                    'ogTitle',
                    'ogDescription',
                    'ogImage',
                    'ogImageDescription',
                    'twitterTitle',
                    'twitterDescription',
                    'twitterImage',
                    'twitterImageDescription',
                ],
                'string',
            ],
            [['canonicalUrl'], 'url'],
        ];
    }
}
