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

namespace nystudio107\seomatic\models\metalink;

use nystudio107\seomatic\models\MetaLink;
use nystudio107\seomatic\helpers\UrlHelper;

use Craft;
use craft\helpers\StringHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class AuthorLink extends MetaLink
{
    // Constants
    // =========================================================================

    const ITEM_TYPE = 'AuthorLink';

    // Static Methods
    // =========================================================================

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules()
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
