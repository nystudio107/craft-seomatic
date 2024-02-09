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

namespace nystudio107\seomatic\models\metalink;

use craft\helpers\StringHelper;
use nystudio107\seomatic\helpers\UrlHelper;

use nystudio107\seomatic\models\MetaLink;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class AuthorLink extends MetaLink
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'AuthorLink';

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
            if (!empty($data['href'])) {
                $data['href'] = UrlHelper::absoluteUrlWithProtocol(
                    StringHelper::toLowerCase($data['href'])
                );
            }
        }

        return $shouldRender;
    }
}
