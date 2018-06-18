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
use nystudio107\seomatic\base\MetaContainer;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;
use nystudio107\seomatic\base\FluentModel;

use craft\helpers\Json as JsonHelper;
use craft\validators\ArrayValidator;
use craft\validators\DateTimeValidator;
use nystudio107\seomatic\variables\SeomaticVariable;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaBundle extends FluentModel
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
     * @var MetaSiteVars
     */
    public $metaSiteVars;

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
     * @var FrontendTemplateContainer
     */
    public $frontendTemplatesContainer;

    /**
     * @var MetaBundleSettings
     */
    public $metaBundleSettings;

    // Methods
    // =========================================================================

    /**
     * Create a new meta bundle
     *
     * @param array $config
     *
     * @return null|MetaBundle
     */
    public static function create(array $config = [])
    {
        self::cleanProperties(__CLASS__, $config);
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
            if (!empty($value) && \is_string($value)) {
                $this->$property = JsonHelper::decodeIfJson($value);
            }
        }

        // Meta global variables
        if ($this->metaGlobalVars !== null && \is_array($this->metaGlobalVars)) {
            $this->metaGlobalVars = MetaGlobalVars::create($this->metaGlobalVars);
        }
        // Meta site variables
        if ($this->metaSiteVars !== null && \is_array($this->metaSiteVars)) {
            $this->metaSiteVars = MetaSiteVars::create($this->metaSiteVars);
        }
        // Meta sitemap variables
        if ($this->metaSitemapVars !== null && \is_array($this->metaSitemapVars)) {
            $this->metaSitemapVars = MetaSitemapVars::create($this->metaSitemapVars);
        }
        // Meta bundle settings
        if ($this->metaBundleSettings !== null && \is_array($this->metaBundleSettings)) {
            $this->metaBundleSettings = MetaBundleSettings::create($this->metaBundleSettings);
        }
        // Create our variable so that meta containers can be parsed based on dynamic values
        // Make sure Twig is loaded and instantiated first by priming the pump
        MetaValueHelper::parseString('{prime}');
        $oldSeomaticVariable = Seomatic::$seomaticVariable;
        if (Seomatic::$seomaticVariable === null) {
            Seomatic::$seomaticVariable = new SeomaticVariable();
        }
        $oldMeta = Seomatic::$seomaticVariable->meta;
        $oldSite = Seomatic::$seomaticVariable->site;
        $oldLoadingContainers = Seomatic::$loadingContainers;
        $oldPreviewingMetaContainers = Seomatic::$previewingMetaContainers;
        Seomatic::$loadingContainers = false;
        Seomatic::$previewingMetaContainers = false;
        // Merge these global vars with the MetaContainers global vars
        $globalVars = [];
        if (Seomatic::$plugin->metaContainers->metaGlobalVars !== null) {
            $globalVars = Seomatic::$plugin->metaContainers->metaGlobalVars->getAttributes();
        }
        $thisGlobalVars = $this->metaGlobalVars->getAttributes();
        $thisGlobals = MetaGlobalVars::create(ArrayHelper::merge($globalVars, $thisGlobalVars));
        // Merge these site vars with the MetaContainers site vars
        $siteVars = [];
        if (Seomatic::$plugin->metaContainers->metaSiteVars !== null) {
            $siteVars = Seomatic::$plugin->metaContainers->metaSiteVars->getAttributes();
        }
        $thisSiteVars = $this->metaSiteVars->getAttributes();
        $thisSite = MetaSiteVars::create(ArrayHelper::merge($siteVars, $thisSiteVars));
        Seomatic::$seomaticVariable->meta = $thisGlobals;
        Seomatic::$seomaticVariable->site = $thisSite;
        MetaValueHelper::cache();

        // Meta containers
        if (!empty($this->metaContainers)) {
            $metaContainers = $this->metaContainers;
            $this->metaContainers = [];
            foreach ($metaContainers as $key => $metaContainer) {
                /** @var MetaContainer $containerClass */
                $containerClass = $metaContainer['class'];
                /**  @var array $metaContainer */
                $this->metaContainers[$key] = $containerClass::create($metaContainer);
            }
        }
        // Redirects container
        if ($this->redirectsContainer !== null) {
            //$this->redirectsContainer = RedirectsContainer::create($this->redirectsContainer);
        }
        // Frontend templates
        if ($this->frontendTemplatesContainer !== null && \is_array($this->frontendTemplatesContainer)) {
            $this->frontendTemplatesContainer = FrontendTemplateContainer::create($this->frontendTemplatesContainer);
        }
        // Restore the $seomaticVariable
        Seomatic::$loadingContainers = $oldLoadingContainers;
        Seomatic::$previewingMetaContainers = $oldPreviewingMetaContainers;
        Seomatic::$seomaticVariable->meta = $oldMeta;
        Seomatic::$seomaticVariable->site = $oldSite;
        Seomatic::$seomaticVariable = $oldSeomaticVariable;
        MetaValueHelper::cache();
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
    public function rules(): array
    {
        $rules = [
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
            [
                [
                    'sourceTemplate',
                    'sourceAltSiteSettings',
                ],
                'safe'
            ],
            [
                [
                    'metaContainers',
                    'redirectsContainer',
                ],
                ArrayValidator::class
            ],
            [
                [
                    'metaGlobalVars',
                    'metaSiteVars',
                    'metaSitemapVars',
                    'metaBundleSettings',
                    'frontendTemplatesContainer',
                ],
                'safe'
            ],
        ];
        return $rules;
    }
}
