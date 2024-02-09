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

use Exception;
use nystudio107\seomatic\Seomatic;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.11
 */
abstract class NonceItem extends MetaItem implements NonceItemInterface
{
    // Traits
    // =========================================================================

    use NonceItemTrait;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        if (!empty(Seomatic::$settings->cspNonce)) {
            $this->nonce = $this->generateNonce();
        }
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['nonce'], 'string'],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields(): array
    {
        $fields = parent::fields();
        switch ($this->scenario) {
            case 'render':
                $fields = array_diff_key(
                    $fields,
                    array_flip([
                        'nonce',
                    ])
                );
                break;
        }

        return $fields;
    }

    /**
     * Generate a random "nonce" for use Content Security Policy implementations as per:
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src
     *
     * @return string|null
     */
    public function generateNonce()
    {
        $result = null;
        try {
            $result = bin2hex(random_bytes(22));
        } catch (Exception $e) {
            // That's okay
        }

        return $result;
    }
}
