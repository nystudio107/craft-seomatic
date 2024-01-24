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
interface NonceContainerInterface
{
    // Public Methods
    // =========================================================================

    /**
     * Add nonce <meta http-equiv="Content-Security-Policy" content="script-src 'nonce-XXXXX'">
     * tags to the $container
     *
     * @param array $cspNonces the array of nonces to add
     */
    public function addNonceTags(array $cspNonces);

    /**
     * Add nonce "Content-Security-Policy: script-src 'nonce-XXXXX'" headers to the $response
     *
     * @param array $cspNonces the array of nonces to add
     */
    public function addNonceHeaders(array $cspNonces);

    /**
     * Return an array of all of the unique nonces
     *
     * @return array
     */
    public function getCspNonces(): array;
}
