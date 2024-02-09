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

namespace nystudio107\seomatic\twigextensions;

use Craft;
use nystudio107\seomatic\Node\Expression\EmptyCoalesceExpression;
use nystudio107\seomatic\Seomatic;

use nystudio107\seomatic\variables\SeomaticVariable;

use Twig\ExpressionParser;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SeomaticTwigExtension extends AbstractExtension implements GlobalsInterface
{
    /**
     * @inheritdoc
     */
    public function getGlobals(): array
    {
        $request = Craft::$app->getRequest();
        // Seomatic::$view->getIsRenderingPageTemplate() &&
        if (!Seomatic::$seomaticVariable && !Seomatic::$previewingMetaContainers) {
            // Create our variable and stash it in the plugin for global access
            Seomatic::$seomaticVariable = new SeomaticVariable();
            // Get the path for the current request
            $requestPath = '/';
            if (!$request->getIsConsoleRequest()) {
                try {
                    $requestPath = $request->getPathInfo();
                } catch (InvalidConfigException $e) {
                    Craft::error($e->getMessage(), __METHOD__);
                }
            }
            if (!$request->getIsCpRequest()) {
                // Load the meta containers for this page
                Seomatic::$plugin->metaContainers->loadMetaContainers($requestPath, null);
            } else {
                // If this is a CP request, load the bare minimum, which is the global container,
                // and re-init the SEOmatic variable to ensure it points to the new settings
                Seomatic::$plugin->metaContainers->loadGlobalMetaContainers();
                Seomatic::$seomaticVariable->init();
            }
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

    /**
     * @return array
     */
    public function getOperators(): array
    {
        return [
            // Unary operators
            [],
            // Binary operators
            [
                '???' => [
                    'precedence' => 300,
                    'class' => EmptyCoalesceExpression::class,
                    'associativity' => ExpressionParser::OPERATOR_RIGHT,
                ],
            ],
        ];
    }
}
