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

use Craft;
use nystudio107\seomatic\helpers\Dependency;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\MetaScriptContainer;

use nystudio107\seomatic\Seomatic;

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

    public const CSP_HEADERS = [
        'Content-Security-Policy',
        'X-Content-Security-Policy',
        'X-WebKit-CSP',
    ];

    public const CSP_DIRECTIVE = 'script-src';

    // Public Methods
    // =========================================================================

    /**
     * @inheritDoc
     */
    public function addNonceTags(array $cspNonces)
    {
        if (!empty(Seomatic::$settings->cspNonce) && Seomatic::$settings->cspNonce === 'tag' && !empty($cspNonces)) {
            $serializedNonces = implode(" ", $cspNonces);
            $cspHeader = self::CSP_HEADERS[0];
            $cspDirective = self::CSP_DIRECTIVE;
            $cspValue = "{$cspDirective} {$serializedNonces};";
            $metaTag = Seomatic::$plugin->tag->create([
                'key' => md5($cspValue),
                'httpEquiv' => $cspHeader,
                'content' => $cspValue,
            ]);
        }
    }

    /**
     * @inheritDoc
     */
    public function addNonceHeaders(array $cspNonces)
    {
        if (!empty(Seomatic::$settings->cspNonce) && Seomatic::$settings->cspNonce === 'header' && !empty($cspNonces)) {
            $serializedNonces = implode(" ", $cspNonces);
            $cspDirective = self::CSP_DIRECTIVE;
            $cspValue = "{$cspDirective} {$serializedNonces};";
            foreach (self::CSP_HEADERS as $cspHeader) {
                Craft::$app->getResponse()->getHeaders()->add($cspHeader, $cspValue);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function getCspNonces(): array
    {
        $cspNonces = [];
        /** @var NonceItem $metaItemModel */
        foreach ($this->data as $metaItemModel) {
            if ($metaItemModel->include && !empty($metaItemModel->nonce)) {
                $dependencies = [];
                $nonce = $metaItemModel->nonce;
                if ($this instanceof MetaScriptContainer) {
                    $dependencies = [
                        Dependency::SCRIPT_DEPENDENCY => [$metaItemModel->key],
                    ];
                }
                if ($this instanceof MetaJsonLdContainer) {
                    $dependencies = [
                        Dependency::JSONLD_DEPENDENCY => [$metaItemModel->key],
                    ];
                }
                $cspNonce = "'nonce-{$nonce}'";
                if (Dependency::validateDependencies($dependencies) && !in_array($cspNonce, $cspNonces, true)) {
                    $cspNonces[] = $cspNonce;
                }
            }
        }

        return $cspNonces;
    }

    // Protected Methods
    // =========================================================================


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
