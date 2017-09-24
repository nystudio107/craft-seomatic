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

use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

use craft\base\Model;
use craft\validators\ArrayValidator;

use yii\base\InvalidParamException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaGlobalVars extends Model
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
        // Parse the meta global vars
        $attributes = $model->getAttributes();
        MetaValueHelper::parseArray($attributes);
        $model->setAttributes($attributes);

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var
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
     * @var bool
     */
    public $sitemapUrls;

    /**
     * @var bool
     */
    public $sitemapAssets;

    /**
     * @var bool
     */
    public $sitemapFiles;

    /**
     * @var bool
     */
    public $sitemapAltLinks;

    /**
     * @var string
     */
    public $sitemapChangeFreq;

    /**
     * @var float
     */
    public $sitemapPriority;

    /**
     * @var int
     */
    public $sitemapLimit = null;

    /**
     * @var array
     */
    public $sitemapImageFieldMap = [];

    /**
     * @var array
     */
    public $sitemapVideoFieldMap = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'sitemapUrls',
                    'sitemapAssets',
                    'sitemapFiles',
                    'sitemapAltLinks',
                    'sitemapChangeFreq',
                    'sitemapPriority',
                ],
                'required',
            ],
            [
                [
                    'language',
                    'seoTitle',
                    'seoDescription',
                    'seoImage',
                    'sourceType',
                    'sourceName',
                    'sourceHandle',
                    'sourceTemplate',
                    'sourceType',
                    'sitemapChangeFreq',
                ],
                'string',
            ],
            [['canonicalUrl'], 'url'],
            [['sitemapPriority'], 'number'],
            [['sitemapLimit'], 'integer'],
            [['sitemapUrls', 'sitemapAssets', 'sitemapAltLinks', 'sitemapFiles'], 'boolean'],
            [['sitemapImageFieldMap', 'sitemapVideoFieldMap'], ArrayValidator::class],
        ];
    }

    /**
     * Magic getter/setter for the static properties of the class
     *
     * @param string $method    The method name (static property name)
     * @param array  $args      The arguments list
     *
     * @return mixed           The value of the property
     */
    public function __call($method, $args)
    {
        if (preg_match('/^([gs]et)([A-Z])(.*)$/', $method, $match)) {
            $reflector = new \ReflectionClass(get_called_class());
            $property = strtolower($match[2]).$match[3];
            if ($reflector->hasProperty($property)) {
                $property = $reflector->getProperty($property);
                switch ($match[1]) {
                    case 'get':
                        return $property->getValue();
                    case 'set':
                        $property->setValue($this, $args[0]);
                }
            } else {
                throw new InvalidParamException("Property {$property} doesn't exist");
            }
        }

        return null;
    }
}
