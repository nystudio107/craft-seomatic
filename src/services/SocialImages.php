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
use craft\helpers\FileHelper;
use nystudio107\seomatic\helpers\ImageTransform;
use nystudio107\seomatic\helpers\PullField;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\MetaBundleSettings;
use nystudio107\seomatic\Seomatic;
use Spatie\Browsershot\Browsershot;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.0
 */
class SocialImages extends Component
{
    /**
     * @var MetaBundle[]
     */
    private $_memoizedBundles = [];

    /**
     * Get social image URL.
     *
     * @param Element $element
     * @param string $transformName
     * @param string $template
     * @return string
     */
    public function getSocialImageUrl(Element $element, $transformName = 'base', $template = ''): string
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

        if (!$volume->fileExists($fullPath)) {
            if (empty($template)) {
                $metaBundle = $this->getMetaBundleByElement($element);

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
     * Update the social images for an element.
     *
     * @param Element $element
     * @throws \craft\errors\VolumeException
     * @throws \yii\base\Exception
     */
    public function updateSocialImages(Element $element)
    {
        if ($element->getIsRevision() || $element->getIsDraft()) {
            return;
        }

        $metaBundle = $this->getMetaBundleByElement($element);

        if (!$metaBundle) {
            return;
        }

        $this->invalidateSocialImagesForElement($element);

        $types = ['seoImage', 'ogImage', 'twitterImage'];

        foreach ($types as $imageType) {
            $settings = $this->extractSeoImageSettings($metaBundle->metaBundleSettings, $imageType);

            if (is_array($settings)) {
                $twigString = '{{ seomatic.helper.socialImage(object, "' . $settings['transformName'] . '", "' . $settings['template'] . '") }}';
                Craft::$app->getView()->renderObjectTemplate($twigString, $element);
            }
        }
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
     */
    public function invalidateSocialImagesForElement(Element $element)
    {
        $volume = $this->getSocialImageVolume();
        $volumePath = $this->getSocialImageVolumePath();

        if ($volume) {
            $folder = $this->getSocialImageSubfolder($element);

            try {
                $volume->deleteDir($volumePath . DIRECTORY_SEPARATOR . $folder);
            } catch (VolumeException $exception) {
                // Consider invalidated.
            }
        }
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
        return $this->getSocialImageSubfolder($element) . DIRECTORY_SEPARATOR . $transformName . $templateHash . '.' . ImageTransform::DEFAULT_SOCIAL_FORMAT;
    }

    /**
     * @param Element $element
     * @return string
     */
    protected function getSocialImageSubfolder(Element $element): string
    {
        return $this->getSocialImageMetaBundleSubfolder($this->getMetaBundleByElement($element)) . DIRECTORY_SEPARATOR . $element->id . '-' . $element->siteId;
    }

    /**
     * @return VolumeInterface|null
     */
    protected function getSocialImageVolume(): VolumeInterface
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
     * @param Seomatic $seomatic
     * @param Element $element
     * @return MetaBundle|null
     */
    protected function getMetaBundleByElement(Element $element)
    {
        if (empty($this->_memoizedBundles[$element->uid])) {
            $seomatic = Seomatic::getInstance();
            $source = $seomatic->metaBundles->getMetaSourceFromElement($element);
            $this->_memoizedBundles[$element->uid] = $seomatic->metaBundles->getMetaBundleBySourceId($source[1], $source[0], $source[3], $source[4]);
        }

        return $this->_memoizedBundles[$element->uid];
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
        $templateContent = file_get_contents($view->resolveTemplate($template));
        $html = $view->renderObjectTemplate($templateContent, $element);

        $tempPath = Assets::tempFilePath(ImageTransform::DEFAULT_SOCIAL_FORMAT);
        Browsershot::html($html)
            ->width($width)
            ->height($height)
            ->quality(ImageTransform::SOCIAL_TRANSFORM_QUALITY)
            ->save($tempPath);

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
}
