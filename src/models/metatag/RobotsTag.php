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

namespace nystudio107\seomatic\models\metatag;

use nystudio107\seomatic\models\MetaTag;

use Craft;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class RobotsTag extends MetaTag
{
    // Constants
    // =========================================================================

    const ITEM_TYPE = 'RobotsTag';

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
            // Robots tags have specific content attributes
            [
                'content', 'in', 'range' => [
                    'all',
                    'index',
                    'noindex',
                    'follow',
                    'nofollow',
                    'none',
                    'noodp',
                    'noarchive',
                    'nosnippet',
                    'noimageindex',
                    'nocache',
                ], 'on' => ['warning'],
            ],
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
            // Set meta robots tag to `none` for http status codes >= 400
            if (Craft::$app->getResponse()->statusCode >= 400) {
                $data['content'] = 'none';
            }
        }

        return $shouldRender;
    }
}
