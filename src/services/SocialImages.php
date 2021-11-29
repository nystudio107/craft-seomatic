<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\services;

use Craft;
use craft\base\Component;
use craft\base\Element;
use craft\base\VolumeInterface;
use craft\errors\VolumeException;
use craft\helpers\Assets;
use craft\helpers\ElementHelper;
use craft\helpers\FileHelper;
use nystudio107\seomatic\helpers\PullField;
use nystudio107\seomatic\jobs\GenerateBundleSocialImages;
use nystudio107\seomatic\models\MetaBundleSettings;
use nystudio107\seomatic\queue\SingletonJob;
use nystudio107\seomatic\helpers\ImageTransform;
use nystudio107\seomatic\jobs\GenerateElementSocialImages;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\Seomatic;
use Spatie\Browsershot\Browsershot;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.0
 */
class SocialImages extends Component
{
    /**
     * Get social image URL.
     *
     * @param Element $element
     * @param string $transformName
     * @param string $template
     * @param bool $forceUpdate
     * @return string
     * @throws \Throwable
     */
    public function getSocialImageUrl(Element $element, $transformName = 'base', $template = '', $forceUpdate = false): string
    {
        $transformParameters = ImageTransform::getTransformParametersByName($transformName);

        if (empty($transformParameters)) {
            Craft::error(Craft::t('seomatic', 'Cannot find the transform parameters for ' . $transformName), 'seomatic');
            return '';
        }

        $width = $transformParameters['width'];
        $height = $transformParameters['height'];

        $imagePath = $this->getSocialImageSubpath($element, $transformName, $template);

        /** @var Seomatic $seomatic */
        $seomatic = Seomatic::getInstance();

        $volume = $this->getSocialImageVolume();
        if (!$volume) {
            Craft::error(Craft::t('seomatic', 'Cannot find the specified social image volume.', 'seomatic'));
            return '';
        }

        $volumePath = $this->getSocialImageVolumePath($seomatic);

        $fullPath = $volumePath . DIRECTORY_SEPARATOR . $imagePath;

        if ($forceUpdate || !$volume->fileExists($fullPath)) {
            if (empty($template)) {
                $metaBundle = $seomatic->metaBundles->getMetaBundleByElement($element);

                if (!$metaBundle) {
                    Craft::error(Craft::t('seomatic', 'Cannot resolve meta bundle for element ' . $element->id), 'seomatic');
                    return '';
                }

                $template = $metaBundle->metaBundleSettings->seoImageTemplate ?? '';

                if (empty($template)) {
                    Craft::error(Craft::t('seomatic', 'Cannot resolve social image template for element ' . $element->id), 'seomatic');
                    return '';
                }
            }

            try {
                $this->createSocialImage($template, $element, $width, $height, $volume, $fullPath);
            } catch (\Exception $exception) {
                Craft::$app->getErrorHandler()->logException($exception);

                return '';
            }
        }

        return rtrim($volume->getRootUrl(), '/\\') . '/' . $fullPath;
    }

    /**
     * Enqueue updating the social images for an element.
     *
     * @param Element $element
     * @param bool $allSites
     *
     * @throws \Throwable
     * @throws \yii\base\Exception
     */
    public function enqueueUpdatingSocialImagesForElement(Element $element, $allSites = false)
    {
        if ($element->getIsRevision() || $element->getIsDraft()) {
            return;
        }

        $metaBundle = Seomatic::getInstance()->metaBundles->getMetaBundleByElement($element);

        // No vagrants beyond this point
        if (!$metaBundle) {
            return;
        }

        $jobSignature = 'GenerateElementSocialImages' . $element->id.'|'.(int)$allSites.'|'.$element->title;

        $jobConfig = [
            'elementId' => $element->id,
            'allSites' => $allSites,
            'title' => $element->title,
        ];

        SingletonJob::enqueueJob(GenerateElementSocialImages::class, $jobConfig, $jobSignature);
    }

    /**
     * Immediately update the social images for an element.
     *
     * @param Element $element
     * @param bool $allSites
     *
     * @throws \Throwable
     * @throws \yii\base\Exception
     */
    public function updateSocialImagesForElement(Element $element, $allSites = false)
    {
        $metaBundles = [];
        /** @var Seomatic $seomatic */
        $seomatic = Seomatic::getInstance();

        if ($allSites) {
            // Load up all meta bundles for all sites this element can work with
            foreach (ElementHelper::supportedSitesForElement($element) as $site) {
                $siteId = $site['siteId'];
                $element->siteId = $siteId;
                $metaBundles[$siteId] = $seomatic->metaBundles->getMetaBundleByElement($element);
            }
        } else {
            $metaBundles[$element->siteId] = $seomatic->metaBundles->getMetaBundleByElement($element);
        }

        foreach ($metaBundles as $siteId => $metaBundle) {
            // Fetch element as many times as there are sites.
            $element = Craft::$app->getElements()->getElementById($element->id, get_class($element), $siteId);
            // Render the twig code to get this done.
            $seomatic->metaContainers->previewMetaContainers($element->uri, $siteId, true);
        }
    }

    /**
     * Immediately update the social images for a meta bundle.
     *
     * @param MetaBundle $metaBundle
     * @param bool $instant
     *
     * @throws \Throwable
     * @throws \yii\base\Exception
     */
    public function updateSocialImagesForMetaBundle(MetaBundle $metaBundle)
    {
        $seoElement = Seomatic::getInstance()->seoElements->getSeoElementByMetaBundleType($metaBundle->sourceBundleType);
        $query = $seoElement::metaBundleElementsQuery($metaBundle);
        $elements = $query->all();

        /** @var Element $element */
        foreach ($elements as $element) {
            $this->updateSocialImagesForElement($element);
        }
    }

    /**
     * Enqueue updating the social images for a meta bundle.
     *
     * @param MetaBundle $metaBundle
     * @param bool $instant
     *
     * @throws \Throwable
     * @throws \yii\base\Exception
     */
    public function enqueueUpdatingSocialImagesForMetaBundle(MetaBundle $metaBundle)
    {
        $sourceBundleType = $metaBundle->sourceBundleType;
        $sourceId = $metaBundle->sourceId;
        $sourceSiteId = $metaBundle->sourceSiteId;
        $typeId = $metaBundle->typeId;
        $jobSignature = 'GenerateBundleSocialImages' . $sourceBundleType .'|'.(int)$sourceId .'|'.(int)$sourceSiteId .'|'.(int)$typeId;

        $jobConfig = [
            'sourceBundleType' => $sourceBundleType,
            'sourceId' => $sourceId,
            'sourceSiteId' => $sourceSiteId,
            'typeId' => $typeId,
            'title' => $metaBundle->sourceName,
        ];

        SingletonJob::enqueueJob(GenerateBundleSocialImages::class, $jobConfig, $jobSignature);
    }

    /**
     * Invalidate all social images for a meta bundle.
     *
     * @param MetaBundle $metaBundle
     */
    public function invalidateSocialImagesForMetaBundle(MetaBundle $metaBundle)
    {
        $volume = $this->getSocialImageVolume();
        $volumePath = $this->getSocialImageVolumePath();

        if ($volume) {
            $folder = $this->getSocialImageMetaBundleSubfolder($metaBundle);

            try {
                $volume->deleteDir($volumePath . DIRECTORY_SEPARATOR . $folder);
            } catch (VolumeException $exception) {
                // Consider invalidated.
            }
        }
    }

    /**
     * Invalidate social images for an element.
     *
     * @param Element $element
     * @param bool $allSites whether elements in all sites should be invalidated
     */
    public function invalidateSocialImagesForElement(Element $element, $allSites = false)
    {
        $volume = $this->getSocialImageVolume();
        $volumePath = $this->getSocialImageVolumePath();

        if ($volume) {
            if ($allSites) {
                foreach (ElementHelper::supportedSitesForElement($element) as $site) {
                    $folder = $this->getSocialImageSubfolder($element, $site['siteId']);

                    try {
                        $volume->deleteDir($volumePath . DIRECTORY_SEPARATOR . $folder);
                    } catch (VolumeException $exception) {
                        // Consider invalidated.
                    }
                }
            } else {
                $folder = $this->getSocialImageSubfolder($element, $element->siteId);

                try {
                    $volume->deleteDir($volumePath . DIRECTORY_SEPARATOR . $folder);
                } catch (VolumeException $exception) {
                    // Consider invalidated.
                }
            }
        }
    }

    /**
     * Get the social image filename from components
     *
     * @param Element $element
     * @param string $transformName
     * @param string $templatePath
     * @return string
     */
    protected function getSocialImageSubpath(Element $element, string $transformName, string $templatePath = ''): string
    {
        $templateHash = !empty($templatePath) ? '_' . substr(sha1($templatePath), 0, 7) : '';
        return $this->getSocialImageSubfolder($element, $element->siteId) . DIRECTORY_SEPARATOR . $transformName . $templateHash . '.' . ImageTransform::DEFAULT_SOCIAL_FORMAT;
    }

    /**
     * @param Element $element
     * @param int $siteId
     * @return string
     */
    protected function getSocialImageSubfolder(Element $element, int $siteId): string
    {
        return $this->getSocialImageMetaBundleSubfolder(Seomatic::getInstance()->metaBundles->getMetaBundleByElement($element)) . DIRECTORY_SEPARATOR . $element->id . '-' . $siteId;
    }

    /**
     * @return VolumeInterface|null
     */
    protected function getSocialImageVolume()
    {
        $volume = Craft::$app->getVolumes()->getVolumeByUid(Seomatic::getInstance()->getSettings()->socialImageVolumeUid);
        return $volume;
    }

    /**
     * @return string
     */
    protected function getSocialImageVolumePath(): string
    {
        return rtrim(Seomatic::getInstance()->getSettings()->socialImageSubpath, '/\\');
    }

    /**
     * @param string $template
     * @param Element $element
     * @param $width
     * @param $height
     * @param VolumeInterface $volume
     * @param string $fullPath
     * @throws \Throwable
     */
    protected function createSocialImage(string $template, Element $element, $width, $height, VolumeInterface $volume, string $fullPath)
    {
        $view = Craft::$app->getView();
        $templatePath = $view->resolveTemplate($template);

        if (empty($templatePath)) {
            throw new InvalidConfigException("Error creating social image - the template `$template` cannot be resolved");
        }

        $templateContent = file_get_contents($templatePath);
        $html = $view->renderObjectTemplate($templateContent, $element);

        $tempPath = Assets::tempFilePath(ImageTransform::DEFAULT_SOCIAL_FORMAT);
        $browserShot = Browsershot::html($html)
            ->width($width)
            ->height($height)
            ->quality(ImageTransform::SOCIAL_TRANSFORM_QUALITY);

        $seomaticSettings = Seomatic::getInstance()->getSettings();

        if (!$seomaticSettings->socialImagesEnableSandbox) {
            $browserShot->noSandbox();
        }

        if ($seomaticSettings->socialImagesChromePath) {
            $browserShot->setChromePath($seomaticSettings->socialImagesChromePath);
        }

        if ($seomaticSettings->socialImagesNodeModulePath) {
            $browserShot->setNodeModulePath($seomaticSettings->socialImagesNodeModulePath);
        }

        try {
            $browserShot->save($tempPath);
        } catch (\Throwable $exception) {
            Craft::error($exception->getMessage(), 'seomatic');
            throw $exception;
        }

        $volume->deleteFile($fullPath);

        $fileStream = fopen($tempPath, 'rb');
        $volume->createFileByStream($fullPath, $fileStream, [
            'mimetype' => FileHelper::getMimeType($tempPath)
        ]);

        fclose($fileStream);
        unlink($tempPath);
    }

    /**
     * Get the social image meta bundle subpath for a meta bundle.
     *
     * @param MetaBundle $metaBundle
     * @return string
     */
    protected function getSocialImageMetaBundleSubfolder(MetaBundle $metaBundle): string
    {
        return "{$metaBundle->sourceType}_{$metaBundle->sourceId}" . (!empty($metaBundle->typeId) ? "_{$metaBundle->typeId}" : '');
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
