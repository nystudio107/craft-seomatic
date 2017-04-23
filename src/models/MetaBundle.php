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

use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\FrontendTemplateContainer;

use Craft;
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
     * @var \DateTime
     */
    public $sourceDateUpdated;

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
     * @var MetaTagContainer
     */
    public $metaTagContainer;

    /**
     * @var MetaLinkContainer
     */
    public $metaLinkContainer;

    /**
     * @var MetaScriptContainer
     */
    public $metaScriptContainer;

    /**
     * @var MetaJsonLdContainer
     */
    public $metaJsonLdContainer;

    /**
     * @var array
     */
    public $redirectsContainer;

    /**
     * @var array
     */
    public $frontendTemplatesContainer;

    // Methods
    // =========================================================================

    /**
     * Create a new meta bundle
     *
     * @param array $config
     *
     * @return null|MetaBundle
     */
    public static function create($config = [])
    {
        $model = new MetaBundle($config);
        if ($model) {
            $model->normalizeMetaBundleData();
        }

        return $model;
    }

    /**
     * Normalizes the meta bundles’s data for use.
     *
     * This is called after meta bundle data is loaded, to allow it to be
     * parsed, models instantiated, etc.
     */
    public function normalizeMetaBundleData()
    {
        if (!empty($this->metaTagContainer)) {
            $data = json_decode($this->metaTagContainer, true);
            $this->metaTagContainer = MetaTagContainer::create($data);
        }
        if (!empty($this->metaLinkContainer)) {
            $data = json_decode($this->metaLinkContainer, true);
            $this->metaLinkContainer = MetaLinkContainer::create($data);
        }
        if (!empty($this->metaScriptContainer)) {
            $data = json_decode($this->metaScriptContainer, true);
            $this->metaScriptContainer = MetaScriptContainer::create($data);
        }
        if (!empty($this->metaJsonLdContainer)) {
            $data = json_decode($this->metaJsonLdContainer, true);
            $this->metaJsonLdContainer = MetaJsonLdContainer::create($data);
        }
        if (!empty($this->frontendTemplatesContainer)) {
            $data = json_decode($this->frontendTemplatesContainer, true);
            $this->frontendTemplatesContainer = FrontendTemplateContainer::create($data);
        }
    }

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
                'required',
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
                'string',
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