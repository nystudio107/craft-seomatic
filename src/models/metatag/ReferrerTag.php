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

namespace nystudio107\seomatic\models\metatag;

use nystudio107\seomatic\models\MetaTag;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class ReferrerTag extends MetaTag
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'ReferrerTag';

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
            // Referrer tags have specific content attributes
            [
                'content', 'in', 'range' => [
                'no-referrer',
                'origin',
                'no-referrer-when-downgrade',
                'origin-when-crossorigin',
                'unsafe-URL',
            ], 'on' => ['warning'],
            ],
        ]);

        return $rules;
    }
}
