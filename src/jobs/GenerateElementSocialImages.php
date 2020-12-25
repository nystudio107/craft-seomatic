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

namespace nystudio107\seomatic\jobs;

use Craft;
use craft\base\Element;
use craft\helpers\ElementHelper;
use craft\queue\BaseJob;
use nystudio107\fastcgicachebust\FastcgiCacheBust;
use nystudio107\seomatic\helpers\PullField;
use nystudio107\seomatic\models\MetaBundleSettings;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\Helper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.0
 */
class GenerateElementSocialImages extends BaseJob
{
    // Properties
    // =========================================================================
    /**
     * @var int Element id
     */
    public $elementId;

    /**
     * @var bool Whether all sites for elements should have images re-generated.
     */
    public $allSites = false;

    /**
     * @var string title for the job description
     */
    public $title;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        $metaBundles = [];

        /** @var Element $element */
        $element = Craft::$app->getElements()->getElementById($this->elementId);

        /** @var Seomatic $seomatic */
        $seomatic = Seomatic::getInstance();

        if ($this->allSites) {
            // Load up all meta bundles for all sites this element can work with
            foreach (ElementHelper::supportedSitesForElement($element) as $site) {
                $siteId = $site['siteId'];
                $element->siteId = $siteId;
                $metaBundles[$siteId] = $seomatic->metaBundles->getMetaBundleByElement($element);
            }
        } else {
            $metaBundles[$element->siteId] = $seomatic->metaBundles->getMetaBundleByElement($element);
        }

        $types = ['seoImage', 'ogImage', 'twitterImage'];

        foreach ($metaBundles as $siteId => $metaBundle) {
            if (!$metaBundle) {
                continue;
            }

            $element->siteId = $siteId;
            $processedSettings = [];

            foreach ($types as $imageType) {
                $settings = $this->extractSeoImageSettings($metaBundle->metaBundleSettings, $imageType);
                if (is_array($settings)) {
                    $hash = md5(json_encode($settings) . $siteId);

                    if (!empty($processedSettings[$hash])) {
                        continue;
                    }

                    $twigString = '{{ seomatic.helper.socialImage(object, "' . $settings['transformName'] . '", "' . $settings['template'] . '") }}';
                    Craft::$app->getView()->renderObjectTemplate($twigString, $element);
                    $processedSettings[$hash] = true;
                }
            }
        }
    }

    // Protected Methods
    // =========================================================================
    /**
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('seomatic', 'Generating SEO images for {title}', [
            'title' => $this->title
        ]);
    }

    /**
     * Extract seo image settings from bundle settings by the setting type name.
     *
     * @param MetaBundleSettings $settings
     * @param string $settingName
     * @return array|null
     */
    protected function extractSeoImageSettings(MetaBundleSettings $settings, string $settingName)
    {
        $source = $settings->{$settingName . 'Source'};

        if ($source === 'sameAsSeo') {
            return $this->extractSeoImageSettings($settings, 'seoImage');
        }

        if ($source !== 'fromTemplate') {
            return null;
        }

        return [
            'transformName' => $settingName === 'twitterImage' ? Helper::twitterTransform() : PullField::PULL_ASSET_FIELDS[$settingName]['transformName'],
            'template' => $settings->{$settingName . 'Template'}
        ];
    }
}
