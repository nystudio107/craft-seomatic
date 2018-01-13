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
use nystudio107\seomatic\services\MetaContainers;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Dependency
{
    // Constants
    // =========================================================================

    const CONFIG_TYPE = 'config';
    const TAG_TYPE = 'tag';

    // Static Methods
    // =========================================================================

    public static function validateDependencies($dependencies)
    {
        // No dependencies means we validate
        if (empty($dependencies) || !is_array($dependencies)) {
            return true;
        }
        $settings = Seomatic::$settings;
        foreach ($dependencies as $dependency) {
            $validates = false;
            // If any dependency key in the array validates, this this dependency validates
            switch ($dependency['type']) {
                // Handle config setting dependencies
                case self::CONFIG_TYPE:
                    foreach ($dependency['keys'] as $key) {
                        // If any value is in the $settings[$key] it validates
                        if (!empty($settings[$key])) {
                            $validates = true;
                        }
                    }
                    break;
                // Handle tag dependencies
                case self::TAG_TYPE:
                    foreach ($dependency['keys'] as $key) {
                        $meta = Seomatic::$plugin->metaContainers->getMetaItemByKey($key, '');
                        if (!empty($meta)) {
                            $options = $meta->tagAttributes();
                            // If the meta item exists, and would render, it validates
                            if ($meta->prepForRender($options)) {
                                $validates = true;
                            }
                        }
                    }
                    break;
            }
            // If any validation rule fails, the dependency does not validate
            if (!$validates) {
                return false;
            }
        }

        return true;
    }
}
