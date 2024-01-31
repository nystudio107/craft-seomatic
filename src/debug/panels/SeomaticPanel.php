<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\debug\panels;

use Craft;
use nystudio107\seomatic\events\MetaBundleDebugDataEvent;
use nystudio107\seomatic\helpers\MetaValue;
use nystudio107\seomatic\models\MetaJsonLd;
use nystudio107\seomatic\services\MetaContainers;
use yii\base\Event;
use yii\debug\Panel;

class SeomaticPanel extends Panel
{
    public const CONTAINER_PARSED_PROPERTIES = [
        'metaGlobalVars',
        'metaSiteVars',
        'metaSitemapVars',
    ];

    /**
     * @var array The accumulated MetaBundle debug data
     */
    protected array $metaBundles = [];

    /**
     * @var string
     */
    protected string $viewPath = '@nystudio107/seomatic/debug/views/seomatic/';

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

        Event::on(MetaContainers::class,
            MetaContainers::EVENT_METABUNDLE_DEBUG_DATA,
            function(MetaBundleDebugDataEvent $e) {
                if ($e->metaBundle) {
                    $this->metaBundles[$e->metaBundleCategory] = $e->metaBundle;
                }
            });
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'Seomatic';
    }

    /**
     * @inheritdoc
     */
    public function getSummary(): string
    {
        return Craft::$app->getView()->render($this->viewPath . 'summary', ['panel' => $this]);
    }

    /**
     * @inheritdoc
     */
    public function getDetail(): string
    {
        return Craft::$app->getView()->render($this->viewPath . 'detail', ['panel' => $this]);
    }

    /**
     * @inheritdoc
     */
    public function save(): array
    {
        $debugData = [];
        foreach ($this->metaBundles as $metaBundleCategory => $metaBundle) {
            $metaBundleArray = $metaBundle->toArray();
            $parsedMetaBundleArray = $metaBundleArray;
            $renderedTags = [];
            // Parse the variables
            foreach (self::CONTAINER_PARSED_PROPERTIES as $property) {
                MetaValue::parseArray($parsedMetaBundleArray[$property], true, true, true);
            }
            // Render the container data as an array, and also as rendered tags
            foreach ($metaBundle->metaContainers as $metaContainerName => $metaContainer) {
                $parsedMetaBundleArray['metaContainers'][$metaContainerName]['data'] = $metaContainer->renderArray();
                $renderedTags[$metaContainerName] = $metaContainer->render();
                // Add in any errors from the rendering process
                foreach ($metaContainer->data as $tagName => $tag) {
                    $isMetaJsonLdModel = false;
                    if (is_subclass_of($tag, MetaJsonLd::class)) {
                        $isMetaJsonLdModel = true;
                    }
                    $scenarios = [
                        'default' => 'error',
                        'warning' => 'warning',
                        'google' => 'warning',
                    ];
                    $modelScenarios = $tag->scenarios();
                    $scenarios = array_intersect_key($scenarios, $modelScenarios);
                    foreach ($scenarios as $scenario => $logLevel) {
                        $tag->setScenario($scenario);
                        $tag->validate();
                        foreach ($tag->errors as $param => $errors) {
                            /** @var array $errors */
                            foreach ($errors as $error) {
                                // Change the error level depending on the error message if this is a MetaJsonLD object
                                if ($isMetaJsonLdModel) {
                                    if (strpos($error, 'recommended') !== false) {
                                        $logLevel = 'warning';
                                    }
                                    if (strpos($error, 'required') !== false
                                        || strpos($error, 'Must be') !== false
                                    ) {
                                        $logLevel = 'error';
                                    }
                                }
                            }
                        }
                        $parsedMetaBundleArray['metaContainers'][$metaContainerName]['data'][$tagName]['__errors'][$logLevel] = $tag->getErrors();
                    }
                }
            }
            $debugData[$metaBundleCategory] = [
                'unparsed' => $metaBundleArray,
                'parsed' => $parsedMetaBundleArray,
                'renderedTags' => $renderedTags,
            ];
        }

        return $debugData;
    }
}
