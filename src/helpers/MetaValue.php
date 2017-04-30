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

use Craft;
use craft\base\Component;
use craft\base\Element;
use craft\helpers\StringHelper;
use craft\web\View;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaValue extends Component
{
    // Static Properties
    // =========================================================================

    /**
     * @var Element
     */
    public static $matchedElement;

    /**
     * @var View
     */
    public static $view;

    // Static Methods
    // =========================================================================

    /**
     * @param string $metaValue
     *
     * @return string
     */
    public static function parseString(string $metaValue)
    {
        // If there are no dynamic tags, just return the template
        if (!StringHelper::contains($metaValue, '{')) {
            return $metaValue;
        }
        try {
            if (self::$matchedElement) {
                $metaValue = self::$view->renderObjectTemplate($metaValue, self::$matchedElement);
                $metaValue = self::$view->renderString($metaValue);
            } else {
                $metaValue = self::$view->renderString($metaValue);
            }
        } catch (\Exception $e) {
            $metaValue = Craft::t(
                'seomatic',
                'Error rendering `{template}` -> {error}',
                ['template' => $metaValue, 'error' => $e->getMessage()]
            );
            Craft::error($metaValue, __METHOD__);
        }

        return $metaValue;
    }

    /**
     * @param array $metaArray
     */
    public static function parseArray(array &$metaArray)
    {
        foreach ($metaArray as $key => $value) {
            if ($value !== null && is_string($value)) {
                $metaArray[$key] = self::parseString($value);
            }
        }
    }

    /**
     * Cache frequently accessed properties locally
     */
    public static function cache()
    {
        self::$matchedElement = Seomatic::$matchedElement;
        self::$view = Seomatic::$view;
    }
}
