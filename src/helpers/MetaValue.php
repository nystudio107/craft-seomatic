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

namespace nystudio107\seomatic\helpers;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\helpers\Field as FieldHelper;

use Craft;
use craft\base\Element;
use craft\elements\Asset;
use craft\errors\SiteNotFoundException;
use craft\helpers\StringHelper;
use craft\web\View;

use yii\base\Exception;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaValue
{
    // Constants
    // =========================================================================

    const MAX_PARSE_TRIES = 5;
    const NO_ALIASES = [
        'twitter:site',
        'twitter:creator',
    ];
    const NO_PARSING = [
        'siteLinksSearchTarget',
    ];
    const PARSE_ONCE = [
        'target',
    ];

    // Static Properties
    // =========================================================================

    /**
     * @var array
     */
    public static $templateObjectVars;

    /**
     * @var View
     */
    public static $view;

    // Static Methods
    // =========================================================================

    /**
     * @param string $metaValue
     * @param bool   $resolveAliases Whether @ aliases should be resolved in this string
     * @param bool   $parseAsTwig    Whether items should be parsed as a Twig template in this string
     * @param int    $tries The number of times to parse the string
     *
     * @return string
     */
    public static function parseString(
        $metaValue,
        bool $resolveAliases = true,
        bool $parseAsTwig = true,
        $tries = self::MAX_PARSE_TRIES
    ) {
        // If it's a string, and there are no dynamic tags, just return the template
        if (\is_string($metaValue) && !StringHelper::contains($metaValue, '{')) {
            return self::parseMetaString($metaValue, $resolveAliases, $parseAsTwig) ?? $metaValue;
        }
        // Parse it repeatedly until it doesn't change
        $value = '';
        while ($metaValue !== $value && $tries) {
            $tries--;
            $value = $metaValue;
            $metaValue = self::parseMetaString($value, $resolveAliases, $parseAsTwig) ?? $metaValue;
        }

        return $metaValue;
    }

    /**
     * @param array $metaArray
     * @param bool  $resolveAliases Whether @ aliases should be resolved in this array
     * @param bool  $parseAsTwig    Whether items should be parsed as a Twig template in this array
     */
    public static function parseArray(array &$metaArray, bool $resolveAliases = true, bool $parseAsTwig = true)
    {
        // Do this here as well so that parseString() won't potentially be constantly switching modes
        // while parsing through the array
        $oldTemplateMode = self::$view->getTemplateMode();
        // Render in site template mode so that we get globals injected
        if ($oldTemplateMode !== self::$view::TEMPLATE_MODE_SITE) {
            try {
                self::$view->setTemplateMode(self::$view::TEMPLATE_MODE_SITE);
            } catch (Exception $e) {
                Craft::error($e->getMessage(), __METHOD__);
            }
        }
        foreach ($metaArray as $key => $value) {
            $shouldParse = $parseAsTwig;
            $shouldAlias = $resolveAliases;
            $tries = self::MAX_PARSE_TRIES;
            if (\in_array($key, self::NO_ALIASES, true)) {
                $shouldAlias = false;
            }
            if (\in_array($key, self::NO_PARSING, true)) {
                $shouldParse = false;
            }
            if (\in_array($key, self::PARSE_ONCE, true)) {
                $tries = 1;
            }
            if ($value !== null) {
                $metaArray[$key] = self::parseString($value, $shouldAlias, $shouldParse, $tries);
            }
        }
        // Restore the template mode
        if ($oldTemplateMode !== self::$view::TEMPLATE_MODE_SITE) {
            try {
                self::$view->setTemplateMode($oldTemplateMode);
            } catch (Exception $e) {
                Craft::error($e->getMessage(), __METHOD__);
            }
        }

        $metaArray = array_filter($metaArray);
    }

    /**
     * Get the language from a siteId
     *
     * @param null|int $siteId
     *
     * @return string
     */
    public static function getSiteLanguage(int $siteId = null): string
    {
        if ($siteId === null) {
            try {
                $siteId = Craft::$app->getSites()->getCurrentSite()->id;
            } catch (SiteNotFoundException $e) {
                $siteId = 1;
                Craft::error($e->getMessage(), __METHOD__);
            }
        }
        $site = Craft::$app->getSites()->getSiteById($siteId);
        if ($site) {
            $language = $site->language;
        } else {
            $language = Craft::$app->language;
        }
        $language = strtolower($language);
        $language = str_replace('_', '-', $language);

        return $language;
    }

    /**
     * Cache frequently accessed properties locally
     */
    public static function cache()
    {
        self::$templateObjectVars = [
            'seomatic' => Seomatic::$seomaticVariable,
        ];

        $element = Seomatic::$matchedElement;
        /** @var Element $element */
        if ($element !== null) {
            try {
                $reflector = new \ReflectionClass(FieldHelper::getElementRootClass($element));
            } catch (\ReflectionException $e) {
                $reflector = null;
                Craft::error($e->getMessage(), __METHOD__);
            }
            if ($reflector) {
                $matchedElementType = strtolower($reflector->getShortName());
                self::$templateObjectVars[$matchedElementType] = $element;
            }
        }

        self::$view = Seomatic::$view;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @param string|Asset $metaValue
     * @param bool   $resolveAliases Whether @ aliases should be resolved in this string
     * @param bool   $parseAsTwig    Whether items should be parsed as a Twig template in this string
     *
     * @return null|string
     */
    protected static function parseMetaString($metaValue, bool $resolveAliases = true, bool $parseAsTwig = true)
    {
        // Handle being passed in a string
        if (\is_string($metaValue)) {
            if ($resolveAliases) {
                // Resolve it as an alias
                $alias = Craft::getAlias($metaValue, false);
                if (\is_string($alias)) {
                    $metaValue = $alias;
                }
            }
            // If there are no dynamic tags, just return the template
            if (!$parseAsTwig || !StringHelper::contains($metaValue, '{')) {
                return trim(html_entity_decode($metaValue, ENT_NOQUOTES, 'UTF-8'));
            }
            $oldTemplateMode = self::$view->getTemplateMode();
            try {
                // Render in site template mode so that we get globals injected
                if ($oldTemplateMode !== self::$view::TEMPLATE_MODE_SITE) {
                    self::$view->setTemplateMode(self::$view::TEMPLATE_MODE_SITE);
                }
                // Render the template out
                $metaValue = trim(html_entity_decode(
                    self::$view->renderObjectTemplate($metaValue, self::$templateObjectVars),
                    ENT_NOQUOTES,
                    'UTF-8'
                ));
                // Restore the template mode
                if ($oldTemplateMode !== self::$view::TEMPLATE_MODE_SITE) {
                    self::$view->setTemplateMode($oldTemplateMode);
                }
            } catch (\Exception $e) {
                $metaValue = Craft::t(
                    'seomatic',
                    'Error rendering `{template}` -> {error}',
                    ['template' => $metaValue, 'error' => $e->getMessage()]
                );
                Craft::error($metaValue, __METHOD__);
                // Restore the template mode
                if ($oldTemplateMode !== self::$view::TEMPLATE_MODE_SITE) {
                    try {
                        self::$view->setTemplateMode($oldTemplateMode);
                    } catch (Exception $e) {
                        Craft::error($e->getMessage(), __METHOD__);
                    }
                }

                return null;
            }
        }
        // Handle being passed in an object
        if (\is_object($metaValue) && $metaValue instanceof Asset) {
            /** @var Asset $metaValue */
            return $metaValue->uri;
        }

        return $metaValue;
    }
}
