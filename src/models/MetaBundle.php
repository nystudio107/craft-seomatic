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

use nystudio107\seomatic\base\MetaContainer;

use Craft;
use craft\base\Model;
use craft\helpers\Json as JsonHelper;

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
        // Decode any JSON data
        $properties = $this->getAttributes();
        foreach ($properties as $property => $value) {
            if (!empty($value) && is_string($value)) {
                $this->$property = JsonHelper::decodeIfJson($value);
            }
        }

        // Meta global variables
        if (!empty($this->metaGlobalVars)) {
            $this->metaGlobalVars = MetaGlobalVars::create($this->metaGlobalVars);
        }
        // Meta sitemap variables
        if (!empty($this->metaSitemapVars)) {
            $this->metaSitemapVars = MetaSitemapVars::create($this->metaSitemapVars);
        }
        // Meta containers
        if (!empty($this->metaContainers)) {
            $metaContainers = $this->metaContainers;
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
            $this->redirectsContainer = [];
            foreach ($redirectsContainers as $redirectsContainer) {
                $this->redirectsContainer[] = RedirectsContainer::create($redirectsContainer);
            }
        }
        // Frontend templates
        if (!empty($this->frontendTemplatesContainer)) {
            $frontendTemplatesContainers = $this->frontendTemplatesContainer;
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
