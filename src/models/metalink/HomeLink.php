<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2020 nystudio107
 */

namespace nystudio107\seomatic\models\metalink;

use craft\helpers\StringHelper;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\MetaLink;

use nystudio107\seomatic\Seomatic;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.14
 */
class HomeLink extends MetaLink
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'HomeLink';

    // Static Methods
    // =========================================================================

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function prepForRender(&$data): bool
    {
        $shouldRender = parent::prepForRender($data);
        if ($shouldRender) {
            // Ensure the href is a full url
            if (!empty($data['href'])) {
                if (Seomatic::$settings->lowercaseCanonicalUrl) {
                    $data['href'] = StringHelper::toLowerCase($data['href']);
                }
                $url = UrlHelper::absoluteUrlWithProtocol($data['href']);
                // The URL should be stripped of its query string already, but because
                // Craft adds the `token` URL param back in via UrlHelper, strip it again
                $url = preg_replace('/\?.*/', '', $url);
                $data['href'] = $url;
            }
        }

        return $shouldRender;
    }
}
