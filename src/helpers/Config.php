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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Config extends Component
{
    // Static Methods
    // =========================================================================

    /**
     * Loads a config file from the plugin's config/ folder
     *
     * @param $directory
     * @param $filename
     *
     * @return array
     */
    public static function getConfigFromFile(string $filename, string $directory = '')
    {
        if (!empty($directory)) {
            $directory = DIRECTORY_SEPARATOR . $directory;
        }
        $path = Craft::getAlias('@nystudio107/seomatic')
            . DIRECTORY_SEPARATOR
            . 'config'
            . $directory
            . DIRECTORY_SEPARATOR
            . $filename
            . '.php';
        if (!file_exists($path)) {
            return [];
        }

        if (!is_array($config = @include $path)) {
            return [];
        }

        return $config;
    }
}
