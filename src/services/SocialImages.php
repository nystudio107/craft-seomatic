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
use craft\helpers\Assets;
use craft\helpers\FileHelper;
use nystudio107\seomatic\helpers\ImageTransform;
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

        $imagePath = $this->getSocialImageSubpath($element, $transformName, $template);

        /** @var Seomatic $seomatic */
        $seomatic = Seomatic::getInstance();

        $volume = $this->getSocialImageVolume();
        if (!$volume) {
            Craft::error(Craft::t('seomatic', 'Cannot find the specified social image volume.', 'seomatic'));
            return '';
        }

        $volumePath = $this->getSocialImageVolumePath($seomatic);

        $fullPath =  $volumePath. DIRECTORY_SEPARATOR  . $imagePath;

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
                $view = Craft::$app->getView();
                $templateContent = file_get_contents($view->resolveTemplate($template));
                $html = $view->renderObjectTemplate($templateContent, $element);

                $tempPath = Assets::tempFilePath(ImageTransform::DEFAULT_SOCIAL_FORMAT);
                Browsershot::html($html)
                    ->width($transformParameters['width'])
                    ->height($transformParameters['height'])
                    ->quality(ImageTransform::SOCIAL_TRANSFORM_QUALITY)
                    ->save($tempPath);

                $fileStream = fopen($tempPath, 'rb');
                $volume->createFileByStream($fullPath, $fileStream, [
                    'mimetype' => FileHelper::getMimeType($tempPath)
                ]);

                fclose($fileStream);
                unlink($tempPath);
            } catch (\Exception $exception) {
                Craft::$app->getErrorHandler()->logException($exception);

                return '';
            }
        }

        return rtrim($volume->getRootUrl(), '/\\') . '/' . $fullPath;
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
        return $element->getGqlTypeName() . DIRECTORY_SEPARATOR . $element->id . '-' . $element->siteId;
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
     * @return \nystudio107\seomatic\models\MetaBundle|null
     */
    protected function getMetaBundleByElement(Element $element): \nystudio107\seomatic\models\MetaBundle
    {
        $seomatic = Seomatic::getInstance();
        $source =  $seomatic->metaBundles->getMetaSourceFromElement($element);
        $metaBundle = $seomatic->metaBundles->getMetaBundleBySourceId($source[1], $source[0], $source[3], $source[4]);
        return $metaBundle;
    }
}
