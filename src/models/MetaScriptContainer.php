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
use nystudio107\seomatic\base\NonceContainer;
use nystudio107\seomatic\helpers\ImageTransform as ImageTransformHelper;
use nystudio107\seomatic\Seomatic;
use yii\caching\TagDependency;
use yii\web\View;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaScriptContainer extends NonceContainer
{
    // Constants
    // =========================================================================

    const CONTAINER_TYPE = 'MetaScriptContainer';

    // Public Properties
    // =========================================================================

    /**
     * The data in this container
     *
     * @var MetaScript[] $data
     */
    public $data = [];

    /**
     * @var int
     */
    public $position = View::POS_HEAD;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function includeMetaData($dependency)
    {
        Craft::beginProfile('MetaScriptContainer::includeMetaData', __METHOD__);
        $uniqueKey = $this->handle . $dependency->tags[3] . $this->dataLayerHash();
        $cache = Craft::$app->getCache();
        if ($this->clearCache) {
            TagDependency::invalidate($cache, $dependency->tags[3]);
        }
        $tagData = $cache->getOrSet(
            self::CONTAINER_TYPE . $uniqueKey,
            function () use ($uniqueKey) {
                Craft::info(
                    self::CONTAINER_TYPE . ' cache miss: ' . $uniqueKey,
                    __METHOD__
                );
                $tagData = [];
                if ($this->prepForInclusion()) {
                    /** @var $metaScriptModel MetaScript */
                    foreach ($this->data as $metaScriptModel) {
                        if ($metaScriptModel->include) {
                            // The regular script JS
                            $js = $metaScriptModel->render();
                            if (!empty($js)) {
                                $scenario = $this->scenario;
                                $metaScriptModel->setScenario('render');
                                $options = $metaScriptModel->tagAttributes();
                                $metaScriptModel->setScenario($scenario);
                                $tagData[] = [
                                    'js' => $js,
                                    'position' => $metaScriptModel->position ?? $this->position,
                                    'nonce' => $metaScriptModel->nonce ?? null,
                                    'tagAttrs' => $options,
                                    'bodyJs' => false,
                                ];
                                // If `devMode` is enabled, validate the Meta Script and output any model errors
                                if (Seomatic::$devMode) {
                                    $metaScriptModel->debugMetaItem(
                                        'Script attribute: '
                                    );
                                }
                            }
                            // The body script JS (has no wrapping <script></script> tags, as it can be arbitrary HTML)
                            $bodyJs = $metaScriptModel->renderBodyHtml();
                            if (!empty($bodyJs)) {
                                $scenario = $this->scenario;
                                $metaScriptModel->setScenario('render');
                                $options = $metaScriptModel->tagAttributes();
                                $metaScriptModel->setScenario($scenario);
                                $tagData[] = [
                                    'js' => $bodyJs,
                                    'position' => $metaScriptModel->bodyPosition ?? $this->position,
                                    'nonce' => $metaScriptModel->nonce ?? null,
                                    'tagAttrs' => $options,
                                    'bodyJs' => true,
                                ];
                                // If `devMode` is enabled, validate the Meta Script and output any model errors
                                if (Seomatic::$devMode) {
                                    $metaScriptModel->debugMetaItem(
                                        'Script attribute: '
                                    );
                                }
                            }
                        }
                    }
                }

                return $tagData;
            },
            Seomatic::$cacheDuration,
            $dependency
        );
        // Invalidate the cache we just created if there were pending image transforms in it
        if (ImageTransformHelper::$pendingImageTransforms) {
            TagDependency::invalidate($cache, $dependency->tags[3]);
        }
        // Register the tags
        foreach ($tagData as $config) {
            // Register the tags
            $attrs = $config['tagAttrs'] ?? [];
            if (!empty($config['nonce'])) {
                /** @noinspection SlowArrayOperationsInLoopInspection */
                $attrs = array_merge($attrs, [
                    'nonce' => $config['nonce'],
                ]);
            }
            $bodyJs = $config['bodyJs'] ?? false;
            if ($bodyJs) {
                Seomatic::$view->registerHtml(
                    $config['js'],
                    $config['position'],
                );
            } else {
                Seomatic::$view->registerScript(
                    $config['js'],
                    $config['position'],
                    $attrs
                );
            }
        }

        Craft::endProfile('MetaScriptContainer::includeMetaData', __METHOD__);
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        $html = parent::render($params);
        if ($params['renderScriptTags']) {
            $html =
                '<script>'
                . $html
                . '</script>';
        }

        return $html;
    }

    /**
     * @inheritdoc
     */
    public function normalizeContainerData()
    {
        parent::normalizeContainerData();

        foreach ($this->data as $key => $config) {
            $config['key'] = $key;
            $this->data[$key] = MetaScript::create($config);
        }
    }

    // Protected Methods
    // =========================================================================

    protected function dataLayerHash(): string
    {
        $data = '';
        foreach ($this->data as $metaScriptModel) {
            $data .= serialize($metaScriptModel->dataLayer);
        }

        return md5($data);
    }
}
