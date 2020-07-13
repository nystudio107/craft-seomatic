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

namespace nystudio107\seomatic\base;

use nystudio107\seomatic\Seomatic;

use Craft;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.11
 */
abstract class NonceContainer extends MetaContainer implements NonceContainerInterface
{
    // Traits
    // =========================================================================

    use NonceContainerTrait;

    // Constants
    // =========================================================================

    const CSP_HEADERS = [
        'Content-Security-Policy',
        'X-Content-Security-Policy',
        'X-WebKit-CSP',
    ];

    const CSP_DIRECTIVE = 'script-src';

    // Public Methods
    // =========================================================================

    /**
     * Add nonce <meta http-equiv="Content-Security-Policy" content="script-src 'nonce-XXXXX'">
     * tags to the $container
     */
    public function addNonceTags()
    {
        if (!empty(Seomatic::$settings->cspNonce) && Seomatic::$settings->cspNonce === 'tag') {
            $cspNonces = $this->getCspNonces();
            foreach($cspNonces as $cspNonce) {
                $cspValue = $this->getCspValue($cspNonce, self::CSP_DIRECTIVE);
                $cspHeader = self::CSP_HEADERS[0];
                $metaTag = Seomatic::$plugin->tag->create([
                    'key' => $cspValue,
                    'httpEquiv' => $cspHeader,
                    'content' => $cspValue,
                ]);
            }
        }
    }

    /**
     * Add nonce "Content-Security-Policy: script-src 'nonce-XXXXX'" headers to the $response
     */
    public function addNonceHeaders()
    {
        if (!empty(Seomatic::$settings->cspNonce) && Seomatic::$settings->cspNonce === 'header') {
            $cspNonces = $this->getCspNonces();
            foreach($cspNonces as $cspNonce) {
                $cspValue = $this->getCspValue($cspNonce, self::CSP_DIRECTIVE);
                foreach(self::CSP_HEADERS as $cspHeader) {
                    Craft::$app->getResponse()->getHeaders()->add($cspHeader, $cspValue . ';');
                }
            }
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * Return an array of all of the unique nonces
     *
     * @return array
     */
    protected function getCspNonces()
    {
        $cspNonces = [];
        /** @var NonceItem $metaItemModel */
        foreach ($this->data as $metaItemModel) {
            if ($metaItemModel->include && !empty($metaItemModel->nonce)) {
                $cspNonces[] = $metaItemModel->nonce;
            }
        }

        return array_unique($cspNonces);
    }

    /**
     * Return a CSP value for inclusion in header or meta tag
     *
     * @param string $nonce
     * @param string $cspDirective
     * @return string
     */
    protected function getCspValue(string $nonce, string $cspDirective): string
    {
        return "{$cspDirective} 'nonce-$nonce'";
    }
}
