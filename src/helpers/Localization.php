<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\helpers;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.30
 */
class Localization
{
    // Public Static Properties
    // =========================================================================

    // Public Static Methods
    // =========================================================================

    /**
     * Normalizes a language into the correct format (e.g. `de_DE`).
     *
     * @param string $language
     *
     * @return string
     */
    public static function normalizeOgLocaleLanguage(string $language): string
    {
        $language = str_replace('-', '_', $language);

        return $language;
    }
}
