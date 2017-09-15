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

use Craft;
use craft\base\Component;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Config extends Component
{
    // Constants
    // =========================================================================

    const LOCAL_CONFIG_DIR = 'seomatic-config';

    // Static Methods
    // =========================================================================

    /**
     * Loads a config file from the plugin's config/ folder
     *
     * @param string $path
     *
     * @return array
     */
    public static function getConfigFromFile(string $path)
    {
        $path = DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
        $path = Craft::getAlias('@nystudio107/seomatic')
            . DIRECTORY_SEPARATOR
            . self::LOCAL_CONFIG_DIR
            . str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
        if (!file_exists($path)) {
            return [];
        }

        if (!file_exists($path)) {
            return [];
        }

        if (!is_array($config = @include $path)) {
            return [];
        }

        return $config;
    }

    /**
     * Combined multiple config files together, removing the $unsetKeys
     *
     * @param array      $configFiles
     * @param array|null $unsetKeys
     *
     * @return array
     */
    public static function combineConfigFiles(array $configFiles, array $unsetKeys = null)
    {
        $config = [];
        // Coalesce the passed in config files
        foreach ($configFiles as $configFile) {
            $config = array_merge(
                $config,
                self::getConfigFromFile(
                    $configFile['filename'],
                    $configFile['directory']
                )
            );
        }
        // Filter out the $unsetKeys
        if ($unsetKeys) {
            $config = array_diff_key($config, array_flip($unsetKeys));
        }

        return $config;
    }
}
