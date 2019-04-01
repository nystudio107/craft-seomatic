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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.1.47
 */
class Environment
{
    // Constants
    // =========================================================================

    const SEOMATIC_DEV_ENV = 'local';
    const SEOMATIC_STAGING_ENV = 'staging';
    const SEOMATIC_PRODUCTION_ENV = 'live';

    const DEV_ENVIRONMENTS = [
        'dev',
        'development',
        'loc',
        'local'
    ];

    const STAGING_ENVIRONMENTS = [
        'stage',
        'staging',
        'test',
        'testing',
        'uat',
        'acc',
        'acceptance',
        'sandbox'
    ];

    const PRODUCTION_ENVIRONMENTS = [
        'live',
        'prod',
        'production',
        'pub',
        'public'
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
        if (Seomatic::$craft31) {
            $env = Craft::parseEnv($env);
        }
        // Try to also check the `ENVIRONMENT` env var
        $environment = getenv('ENVIRONMENT');
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
}
