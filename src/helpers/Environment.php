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
use craft\helpers\App;
use nystudio107\seomatic\Seomatic;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.1.47
 */
class Environment
{
    // Constants
    // =========================================================================

    public const SEOMATIC_DEV_ENV = 'local';
    public const SEOMATIC_STAGING_ENV = 'staging';
    public const SEOMATIC_PRODUCTION_ENV = 'live';

    public const DEV_ENVIRONMENTS = [
        'dev',
        'development',
        'loc',
        'local',
    ];

    public const STAGING_ENVIRONMENTS = [
        'stage',
        'staging',
        'test',
        'testing',
        'uat',
        'acc',
        'acceptance',
        'sandbox',
    ];

    public const PRODUCTION_ENVIRONMENTS = [
        'live',
        'prod',
        'production',
        'pub',
        'public',
    ];

    // Static Methods
    // =========================================================================

    /**
     * Return the current environment, taking into account both the CP setting
     * and also the ENVIRONMENT variable setting (if applicable)
     *
     * @return string
     */
    public static function determineEnvironment(): string
    {
        // Default to whatever they have the environment set to
        $env = Seomatic::$settings->environment;
        $env = Craft::parseEnv($env);
        // If they've manually overridden the environment, just return it
        if (self::environmentOverriddenByConfig()) {
            return $env;
        }
        if (Seomatic::$settings->manuallySetEnvironment) {
            return $env;
        }
        // Try to also check the `ENVIRONMENT` env var
        $environment = App::env('ENVIRONMENT');
        $environment = $environment ?: App::env('CRAFT_ENVIRONMENT');
        if (!empty($environment)) {
            $environment = strtolower($environment);
            // See if the environment matches a development environment
            if (in_array($environment, self::DEV_ENVIRONMENTS, false)) {
                $env = self::SEOMATIC_DEV_ENV;
            }
            // See if the environment matches a staging environment
            if (in_array($environment, self::STAGING_ENVIRONMENTS, false)) {
                $env = self::SEOMATIC_STAGING_ENV;
            }
            // See if the environment matches a production environment
            if (in_array($environment, self::PRODUCTION_ENVIRONMENTS, false)) {
                $env = self::SEOMATIC_PRODUCTION_ENV;
            }
        }
        // If devMode is on, always force the environment to be 'local'
        if (Seomatic::$devMode) {
            $env = self::SEOMATIC_DEV_ENV;
        }

        return $env;
    }

    /**
     * Determine whether the user has overridden the `environment` setting via
     * a `config/seomatic.php` file
     *
     * @return bool
     */
    public static function environmentOverriddenByConfig(): bool
    {
        $result = false;

        $config = Craft::$app->getConfig()->getConfigFromFile('seomatic');
        if (!empty($config['environment'])) {
            $result = true;
        }

        return $result;
    }
}
