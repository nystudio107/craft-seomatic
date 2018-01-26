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

use Craft;
use craft\base\Model;
use craft\validators\DateTimeValidator;
use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\base\MetaContainerInterface;

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
    public $bundleVersion;

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
     * @var MetaSitemapVars
     */
    public $metaSitemapVars;

    /**
     * @var MetaContainer[]
     */
    public $metaContainers;

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
            if (is_string($this->sourceAltSiteSettings)) {
                $this->sourceAltSiteSettings = json_decode($this->sourceAltSiteSettings, true);
            }
        }
        // sitemapImageFieldMap
        if (!empty($this->sitemapImageFieldMap)) {
            if (is_string($this->sitemapImageFieldMap)) {
                $this->sitemapImageFieldMap = json_decode($this->sitemapImageFieldMap, true);
            }
        }
        // sitemapVideoFieldMap
        if (!empty($this->sitemapVideoFieldMap)) {
            if (is_string($this->sitemapVideoFieldMap)) {
                $this->sitemapVideoFieldMap = json_decode($this->sitemapVideoFieldMap, true);
            }
        }
        // Meta global variables
        if (!empty($this->metaGlobalVars)) {
            if (is_string($this->metaGlobalVars)) {
                $this->metaGlobalVars = json_decode($this->metaGlobalVars, true);
            }
            $this->metaGlobalVars = MetaGlobalVars::create($this->metaGlobalVars);
        }
        // Meta sitemap variables
        if (!empty($this->metaSitemapVars)) {
            if (is_string($this->metaSitemapVars)) {
                $this->metaSitemapVars = json_decode($this->metaSitemapVars, true);
            }
            $this->metaSitemapVars = MetaSitemapVars::create($this->metaSitemapVars);
        }
        // Meta containers
        if (!empty($this->metaContainers)) {
            $metaContainers = $this->metaContainers;
            if (is_string($metaContainers)) {
                $metaContainers = json_decode($metaContainers, true);
            }
            $this->metaContainers = [];
            /**  @var MetaContainer $metaContainer */
            foreach ($metaContainers as $key => $metaContainer) {
                /** @var MetaContainer $containerClass */
                $containerClass = $metaContainer['class'];
                $this->metaContainers[$key] = $containerClass::create($metaContainer);
            }
        }
        // Redirects container
        if (!empty($this->redirectsContainer)) {
            $redirectsContainers = $this->redirectsContainer;
            if (is_string($redirectsContainers)) {
                $redirectsContainers = json_decode($redirectsContainers, true);
            }
            $this->redirectsContainer = [];
            foreach ($redirectsContainers as $redirectsContainer) {
                $this->redirectsContainer[] = RedirectsContainer::create($redirectsContainer);
            }
        }
        // Frontend templates
        if (!empty($this->frontendTemplatesContainer)) {
            $frontendTemplatesContainers = $this->frontendTemplatesContainer;
            if (is_string($frontendTemplatesContainers)) {
                $frontendTemplatesContainers = json_decode($frontendTemplatesContainers, true);
            }
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
                    'bundleVersion',
                    'sourceBundleType',
                    'sourceId',
                    'sourceName',
                    'sourceHandle',
                    'sourceType',
                    'sourceSiteId',
                    'sourceDateUpdated',
                ],
                'required',
            ],
            [
                [
                    'bundleVersion',
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
            [['sourceTemplate', 'sourceAltSiteSettings'], 'safe'],
        ];
        return $rules;
    }
}
