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

namespace nystudio107\seomatic\base;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.11
 */
interface NonceItemInterface
{
    // Constants
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * Generate a random "nonce" for use Content Security Policy implementations as per:
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src
     *
     * @return string|null
     */
    public function generateNonce();
}
