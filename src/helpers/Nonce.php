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
use craft\helpers\App;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.11
 */
class Nonce
{
    // Constants
    // =========================================================================

    const CSP_HEADERS = [
        'Content-Security-Policy',
        'X-Content-Security-Policy',
        'X-WebKit-CSP',
    ];

    // Static Methods
    // =========================================================================

    /**
     * @param string $nonce
     * @param string $cspDirective
     */
    private static function includeNonce(string $nonce, string $cspDirective)
    {
        $cspNonceType = self::getCspNonceType();
        if ($cspNonceType) {
            $cspValue = "{$cspDirective} 'nonce-$nonce'";
            foreach(self::CSP_HEADERS as $cspHeader) {
                switch ($cspNonceType) {
                    case 'tag':
                        Craft::$app->getView()->registerMetaTag([
                            'httpEquiv' => $cspHeader,
                            'value' => $cspValue,
                        ]);
                        break;
                    case 'header':
                        Craft::$app->getResponse()->getHeaders()->add($cspHeader, $cspValue . ';');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    /**
     * @return string|null
     */
    private static function getCspNonceType()
    {
        $cspNonceType = !empty(Seomatic::$settings->cspNonce) ? strtolower(Seomatic::$settings->cspNonce) : null;

        return $cspNonceType;
    }

    /**
     * @return string|null
     */
    private static function getNonce()
    {
        $result = null;
        if (self::getCspNonceType() !== null) {
            try {
                $result = bin2hex(random_bytes(22));
            } catch (\Exception $e) {
                // That's okay
            }
        }

        return $result;
    }

}
