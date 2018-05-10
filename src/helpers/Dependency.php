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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Dependency
{
    // Constants
    // =========================================================================

    const CONFIG_DEPENDENCY = 'config';
    const SITE_DEPENDENCY = 'site';
    const META_DEPENDENCY = 'meta';
    const TAG_DEPENDENCY = 'tag';
    const SCRIPT_DEPENDENCY = 'script';
    const LINK_DEPENDENCY = 'link';
    const JSONLD_DEPENDENCY = 'jsonld';
    const FRONTEND_TEMPLATE_DEPENDENCY = 'frontend_template';

    // Static Methods
    // =========================================================================

    public static function validateDependencies($dependencies): bool
    {
        // No dependencies means we validate
        if (empty($dependencies) || !\is_array($dependencies)) {
            return true;
        }
        $config = Seomatic::$settings;
        $meta = Seomatic::$seomaticVariable->meta;
        $site = Seomatic::$seomaticVariable->site;
        foreach ($dependencies as $type => $keys) {
            /** @var array $keys */
            $validates = false;
            // If any dependency key in the array validates, this this dependency validates
            switch ($type) {
                // Handle config setting dependencies
                case self::CONFIG_DEPENDENCY:
                    foreach ($keys as $key) {
                        // If any value is in the $config[$key] it validates
                        if (!empty($config[$key])) {
                            $validates = true;
                        }
                    }
                    break;
                // Handle site setting dependencies
                case self::SITE_DEPENDENCY:
                    foreach ($keys as $key) {
                        // If any value is in the $site[$key] it validates
                        if (!empty($site[$key])) {
                            $validates = true;
                        }
                    }
                    break;
                // Handle meta setting dependencies
                case self::META_DEPENDENCY:
                    foreach ($keys as $key) {
                        // If any value is in the $meta[$key] it validates
                        if (!empty($meta[$key])) {
                            $validates = true;
                        }
                    }
                    break;
                // Handle tag dependencies
                case self::TAG_DEPENDENCY:
                    foreach ($keys as $key) {
                        $meta = Seomatic::$plugin->tag->get($key);
                        if ($meta !== null) {
                            $options = $meta->tagAttributes();
                            // If the meta item exists, and would render, it validates
                            if ($meta->prepForRender($options)) {
                                $validates = true;
                            }
                        }
                    }
                    break;
                // Handle script dependencies
                case self::SCRIPT_DEPENDENCY:
                    foreach ($keys as $key) {
                        $meta = Seomatic::$plugin->script->get($key);
                        if ($meta !== null) {
                            $options = $meta->tagAttributes();
                            // If the meta item exists, and would render, it validates
                            if ($meta->prepForRender($options)) {
                                $validates = true;
                            }
                        }
                    }
                    break;
                // Handle link dependencies
                case self::LINK_DEPENDENCY:
                    foreach ($keys as $key) {
                        $meta = Seomatic::$plugin->link->get($key);
                        if ($meta !== null) {
                            $options = $meta->tagAttributes();
                            // If the meta item exists, and would render, it validates
                            if ($meta->prepForRender($options)) {
                                $validates = true;
                            }
                        }
                    }
                    break;
                // Handle link dependencies
                case self::JSONLD_DEPENDENCY:
                    foreach ($keys as $key) {
                        $meta = Seomatic::$plugin->jsonLd->get($key);
                        if ($meta !== null) {
                            $options = $meta->tagAttributes();
                            // If the meta item exists, and would render, it validates
                            if ($meta->prepForRender($options)) {
                                $validates = true;
                            }
                        }
                    }
                    break;
                // Handle frontend template dependencies
                case self::FRONTEND_TEMPLATE_DEPENDENCY:
                    foreach ($keys as $key) {
                        $template = Seomatic::$plugin->frontendTemplates->getFrontendTemplateByKey($key);
                        if ($template !== null) {
                            // If the frontend template exists, and is included, it validates
                            if ($template->include) {
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
