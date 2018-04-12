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

namespace nystudio107\seomatic\twigextensions;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\variables\SeomaticVariable;

use Craft;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SeomaticTwigExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /**
     * @inheritdoc
     */
    public function getGlobals(): array
    {
        // Seomatic::$view->getIsRenderingPageTemplate() &&
        if (!Seomatic::$seomaticVariable && !Seomatic::$previewingMetaContainers) {
            // Create our variable and stash it in the plugin for global access
            Seomatic::$seomaticVariable = new SeomaticVariable();
            // Get the path for the current request
            $request = Craft::$app->getRequest();
            $requestPath = '/';
            if (!$request->getIsConsoleRequest()) {
                try {
                    $requestPath = $request->getPathInfo();
                } catch (InvalidConfigException $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            // Load the meta containers for this page
            Seomatic::$plugin->metaContainers->loadMetaContainers($requestPath, null);
        }

        return ['seomatic' => Seomatic::$seomaticVariable];
    }

    /**
     * Return our Twig Extension name
     *
     * @return string
     */
    public function getName(): string
    {
        return 'Seomatic';
    }

    /**
     * Return our Twig filters
     *
     * @return array
     */
    public function getFilters(): array
    {
        return [];
    }

    /**
     * Return our Twig functions
     *
     * @return array
     */
    public function getFunctions(): array
    {
        return [];
    }
}
