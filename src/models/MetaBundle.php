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
use craft\validators\DateTimeValidator;

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
    public $sourceBundleType;

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
     * @var MetaGlobalVars
     */
    public $metaGlobalVars;

    /**
     * @var MetaTagContainer[]
     */
    public $metaTagContainer;

    /**
     * @var MetaLinkContainer[]
     */
    public $metaLinkContainer;

    /**
     * @var MetaScriptContainer[]
     */
    public $metaScriptContainer;

    /**
     * @var MetaJsonLdContainer[]
     */
    public $metaJsonLdContainer;

    /**
     * @var MetaTitleContainer[]
     */
    public $metaTitleContainer;

    /**
     * @var array
     */
    public $redirectsContainer;

    /**
     * @var FrontendTemplateContainer[]
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
        // sourceAltSiteSettings
        if (!empty($this->sourceAltSiteSettings)) {
            $this->sourceAltSiteSettings = json_decode($this->sourceAltSiteSettings, true);
        }
        // sitemapImageFieldMap
        if (!empty($this->sitemapImageFieldMap)) {
            $this->sitemapImageFieldMap = json_decode($this->sitemapImageFieldMap, true);
        }
        // sitemapVideoFieldMap
        if (!empty($this->sitemapVideoFieldMap)) {
            $this->sitemapVideoFieldMap = json_decode($this->sitemapVideoFieldMap, true);
        }
        // Meta global variables
        if (!empty($this->metaGlobalVars)) {
            $metaGlobalVars = json_decode($this->metaGlobalVars, true);
            $this->metaGlobalVars = MetaGlobalVars::create($metaGlobalVars);
        }
        // Meta containers
        if (!empty($this->metaTagContainer)) {
            $metaTagContainers = json_decode($this->metaTagContainer, true);
            $this->metaTagContainer = [];
            foreach ($metaTagContainers as $metaTagContainer) {
                $this->metaTagContainer[] = MetaTagContainer::create($metaTagContainer);
            }
        }
        if (!empty($this->metaLinkContainer)) {
            $metaLinkContainers = json_decode($this->metaLinkContainer, true);
            $this->metaLinkContainer = [];
            foreach ($metaLinkContainers as $metaLinkContainer) {
                $this->metaLinkContainer[] = MetaLinkContainer::create($metaLinkContainer);
            }
        }
        if (!empty($this->metaScriptContainer)) {
            $metaScriptContainers = json_decode($this->metaScriptContainer, true);
            $this->metaScriptContainer = [];
            foreach ($metaScriptContainers as $metaScriptContainer) {
                $this->metaScriptContainer[] = MetaScriptContainer::create($metaScriptContainer);
            }
        }
        if (!empty($this->metaJsonLdContainer)) {
            $metaJsonLdContainers = json_decode($this->metaJsonLdContainer, true);
            $this->metaJsonLdContainer = [];
            foreach ($metaJsonLdContainers as $metaJsonLdContainer) {
                $this->metaJsonLdContainer[] = MetaJsonLdContainer::create($metaJsonLdContainer);
            }
        }
        if (!empty($this->metaTitleContainer)) {
            $metaTitleContainers = json_decode($this->metaTitleContainer, true);
            $this->metaTitleContainer = [];
            foreach ($metaTitleContainers as $metaTitleContainer) {
                $this->metaTitleContainer[] = MetaTitleContainer::create($metaTitleContainer);
            }
        }
        if (!empty($this->frontendTemplatesContainer)) {
            $frontendTemplatesContainers = json_decode($this->frontendTemplatesContainer, true);
            $this->frontendTemplatesContainer = [];
            foreach ($frontendTemplatesContainers as $frontendTemplatesContainer) {
                $this->frontendTemplatesContainer[] = FrontendTemplateContainer::create($frontendTemplatesContainer);
            }
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
                    'sourceBundleType',
                    'sourceId',
                    'sourceName',
                    'sourceHandle',
                    'sourceType',
                    'sourceTemplate',
                    'sourceSiteId',
                    'sourceDateUpdated',
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
                ],
                'string',
            ],
            [['sourceId', 'sourceSiteId'], 'number', 'min' => 1],
            [['sourceDateUpdated'], DateTimeValidator::class],
            [['sourceAltSiteSettings'], 'safe'],
        ];
        return $rules;
    }
}
