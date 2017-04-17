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

use craft\base\Model;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaBundle extends Model
{
    // Properties
    // =========================================================================

    /**
     * @var string
     */
    public $sourceElementType;

    /**
     * @var int
     */
    public $sourceId;

    /**
     * @var string
     */
    public $sourceName;

    /**
     * @var string
     */
    public $sourceHandle;

    /**
     * @var string
     */
    public $sourceType;

    /**
     * @var string
     */
    public $sourceTemplate;

    /**
     * @var int
     */
    public $sourceSiteId;

    /**
     * @var array
     */
    public $sourceAltSiteSettings = [];

    /**
     * @var string
     */
    public $sourceDateUpdated;

    /**
     * @var bool
     */
    public $sitemapUrls = true;

    /**
     * @var bool
     */
    public $sitemapAssets = true;

    /**
     * @var bool
     */
    public $sitemapFiles = true;

    /**
     * @var bool
     */
    public $sitemapAltLinks = true;

    /**
     * @var string
     */
    public $sitemapChangeFreq = 'weekly';

    /**
     * @var float
     */
    public $sitemapPriority = 0.5;

    // Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function datetimeAttributes(): array
    {
        $names = parent::datetimeAttributes();
        $names[] = 'sourceDateUpdated';

        return $names;
    }

    /**
     * Validation rules
     * @return array the validation rules
     */
    public function rules()
    {
        $rules = [
            [
                [
                    'sourceElementType',
                    'sourceId',
                    'sourceName',
                    'sourceHandle',
                    'sourceType',
                    'sourceTemplate',
                    'sourceSiteId',
                    'sourceDateUpdated',
                    'sitemapUrls',
                    'sitemapAssets',
                    'sitemapFiles',
                    'sitemapAltLinks',
                    'sitemapChangeFreq',
                    'sitemapPriority',
                ],
                'required'
            ],
            [
                [
                    'sourceType',
                    'sourceName',
                    'sourceHandle',
                    'sourceTemplate',
                    'sourceType',
                    'sitemapChangeFreq',
                ],
                'string'
            ],
            [['sourceId', 'sourceSiteId'], 'number', 'min' => 1],
            [['sourceDateUpdated'], 'datetime'],
            [['sourceAltSiteSettings'], 'safe'],
            [['sitemapPriority'], 'number'],
            [['sitemapUrls', 'sitemapAssets', 'sitemapAltLinks', 'sitemapFiles'], 'boolean'],
        ];
        return $rules;
    }
}