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

namespace nystudio107\seomatic\helpers;

use Craft;
use craft\base\Element;
use craft\elements\Asset;
use craft\errors\SiteNotFoundException;
use craft\web\View;
use nystudio107\seomatic\Seomatic;
use ReflectionClass;
use Throwable;
use Twig\Markup;
use yii\base\Exception;
use function in_array;
use function is_object;
use function is_string;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaValue
{
    // Constants
    // =========================================================================

    public const MAX_TEMPLATE_LENGTH = 4096;
    public const MAX_PARSE_TRIES = 5;
    // Semicolon because that is the resolved config key when rendering tags,
    // kebab-case because that is the config keys as defined in the config files.
    public const NO_ALIASES = [
        'twitter:site',
        'twitter:creator',
        'twitterSite',
        'twitterCreator',
    ];
    public const NO_PARSING = [
        'siteLinksSearchTarget',
    ];
    public const PARSE_ONCE = [
        'target',
        'urlTemplate',
    ];

    // Static Properties
    // =========================================================================

    /**
     * @var array
     */
    public static $templateObjectVars;

    /**
     * @var array
     */
    public static $templatePreviewVars = [];

    /**
     * @var View
     */
    public static $view;

    // Static Methods
    // =========================================================================

    /**
     * @param string $metaValue
     * @param bool $resolveAliases Whether @ aliases should be resolved in
     *                               this string
     * @param bool $parseAsTwig Whether items should be parsed as a Twig
     *                               template in this string
     * @param int $tries The number of times to parse the string
     *
     * @return string
     */
    public static function parseString(
        $metaValue,
        bool $resolveAliases = true,
        bool $parseAsTwig = true,
        $tries = self::MAX_PARSE_TRIES,
    ) {
        // If it's a string, and there are no dynamic tags, just return the template
        if (is_string($metaValue) && !str_contains($metaValue, '{')) {
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
     * @param bool $resolveAliases Whether @ aliases should be resolved in
     *                              this array
     * @param bool $parseAsTwig Whether items should be parsed as a Twig
     *                              template in this array
     * @param bool $recursive Whether to recursively parse the array
     */
    public static function parseArray(array &$metaArray, bool $resolveAliases = true, bool $parseAsTwig = true, bool $recursive = false)
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
            if ($recursive && is_array($value)) {
                self::parseArray($value, $resolveAliases, $parseAsTwig, $recursive);
            }
            $shouldParse = $parseAsTwig;
            $shouldAlias = $resolveAliases;
            $tries = self::MAX_PARSE_TRIES;
            if (in_array($key, self::NO_ALIASES, true)) {
                $shouldAlias = false;
            }
            if (in_array($key, self::NO_PARSING, true)) {
                $shouldParse = false;
            }
            if (in_array($key, self::PARSE_ONCE, true)) {
                $tries = 1;
                if (is_string($value) && $value[0] !== '{') {
                    $shouldParse = false;
                }
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

        // Remove any empty values
        $metaArray = array_filter(
            $metaArray,
            [ArrayHelper::class, 'preserveNumerics']
        );
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
            $refHandle = null;
            // Get a fallback from the element's root class name
            $reflector = new ReflectionClass($element);
            $refHandle = strtolower($reflector->getShortName());
            $elementRefHandle = $element::refHandle();
            // Use the SeoElement interface to get the refHandle
            $metaBundleSourceType = Seomatic::$plugin->seoElements->getMetaBundleTypeFromElement($element);
            $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundleSourceType);
            if ($seoElement) {
                $elementRefHandle = $seoElement::getElementRefHandle();
            }
            // Prefer $element::refHandle()
            $matchedElementType = $elementRefHandle ?? $refHandle;
            if ($matchedElementType) {
                self::$templateObjectVars[$matchedElementType] = $element;
                self::$templatePreviewVars[$matchedElementType] = $element;
            }
        }
        self::$templatePreviewVars['object'] = self::$templateObjectVars;
        self::$templatePreviewVars['seomatic'] = Seomatic::$seomaticVariable;

        self::$view = Seomatic::$view;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @param string|object $metaValue
     * @param bool $resolveAliases Whether @ aliases should be resolved
     *                                     in this string
     * @param bool $parseAsTwig Whether items should be parsed as a
     *                                     Twig template in this string
     *
     * @return null|string
     */
    protected static function parseMetaString($metaValue, bool $resolveAliases = true, bool $parseAsTwig = true)
    {
        // Handle being passed in a string
        if (is_string($metaValue)) {
            if ($resolveAliases) {
                // Resolve it as an alias
                try {
                    $alias = Craft::parseEnv($metaValue);
                } catch (\Exception $e) {
                    $alias = false;
                }
                if (is_string($alias)) {
                    $metaValue = $alias;
                }
            }
            // Ensure we aren't passed in an absurdly large object template to parse
            if (strlen($metaValue) > self::MAX_TEMPLATE_LENGTH) {
                $metaValue = mb_substr($metaValue, 0, self::MAX_TEMPLATE_LENGTH);
            }
            // If there are no dynamic tags, just return the template
            if (!$parseAsTwig || !str_contains($metaValue, '{')) {
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
                    self::$view->renderObjectTemplate($metaValue, self::$templateObjectVars, self::$templatePreviewVars),
                    ENT_NOQUOTES,
                    'UTF-8'
                ));
                // Restore the template mode
                if ($oldTemplateMode !== self::$view::TEMPLATE_MODE_SITE) {
                    self::$view->setTemplateMode($oldTemplateMode);
                }
            } catch (Throwable $e) {
                $metaValue = Craft::t(
                    'seomatic',
                    'Error rendering `{template}` -> {error}',
                    ['template' => $metaValue, 'error' => $e->getMessage() . ' - ' . print_r($metaValue, true)]
                );
                Craft::error($metaValue, __METHOD__);
                Craft::$app->getErrorHandler()->logException($e);
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
        if (is_object($metaValue)) {
            if ($metaValue instanceof Markup) {
                return trim(html_entity_decode((string)$metaValue, ENT_NOQUOTES, 'UTF-8'));
            }
            if ($metaValue instanceof Asset) {
                return $metaValue->uri;
            }
        }

        return $metaValue;
    }
}
