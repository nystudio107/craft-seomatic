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
use craft\helpers\StringHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Config
{
    // Constants
    // =========================================================================

    const LOCAL_CONFIG_DIR = 'seomatic-config';

    // Static Methods
    // =========================================================================

    /**
     * Loads a config file from, trying @craft/config first, then the plugin's
     * @nystudio107/seomatic
     *
     * @param string $filePath
     *
     * @return array
     */
    public static function getConfigFromFile(string $filePath): array
    {
        // Try craft/config first
        $path = self::getConfigFilePath('@config', $filePath);
        if (!file_exists($path)) {
            // Now try our own internal config
            $path = self::getConfigFilePath('@nystudio107/seomatic', $filePath);
            if (!file_exists($path)) {
                return [];
            }
        }

        if (!\is_array($config = @include $path)) {
            return [];
        }

        // If it's not a multi-environment config, return the whole thing
        if (!array_key_exists('*', $config)) {
            return $config;
        }

        // If no environment was specified, just look in the '*' array
        if (Seomatic::$settings->environment === null) {
            return $config['*'];
        }

        $mergedConfig = [];
        /** @var array $config */
        foreach ($config as $env => $envConfig) {
            if ($env === '*' || StringHelper::contains(Seomatic::$settings->environment, $env)) {
                $mergedConfig = ArrayHelper::merge($mergedConfig, $envConfig);
            }
        }

        return $mergedConfig;
    }

    /**
     * Load an array of config files, merging them together in a single array
     *
     * @param array $filePaths
     *
     * @return array
     */
    public static function getMergedConfigFromFiles(array $filePaths): array
    {
        $mergedConfig = [];
        foreach ($filePaths as $filePath) {
            $mergedConfig = ArrayHelper::merge($mergedConfig, self::getConfigFromFile($filePath));
        }

        return $mergedConfig;
    }

    // Private Methods
    // =========================================================================

    /**
     * Return a path from an alias and a partial path
     *
     * @param string $alias
     * @param string $filePath
     *
     * @return string
     */
    private static function getConfigFilePath(string $alias, string $filePath): string
    {
        $path = DIRECTORY_SEPARATOR . ltrim($filePath, DIRECTORY_SEPARATOR);
        $path = Craft::getAlias($alias)
            . DIRECTORY_SEPARATOR
            . self::LOCAL_CONFIG_DIR
            . str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path)
            . '.php';

        return $path;
    }
}
