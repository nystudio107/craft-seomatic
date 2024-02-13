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

use Craft;
use nystudio107\seomatic\models\MetaTag;
use nystudio107\seomatic\services\Helper as SeomaticHelper;
use yii\web\BadRequestHttpException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class RobotsTag extends MetaTag
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'RobotsTag';

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
        // Handle a bug where 'content' could be permanently set to 'none'
        if ($this->content === 'none') {
            $this->content = $this->environment['live']['content'] ?? '{{ seomatic.meta.robots }}';
        }
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
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
            $request = Craft::$app->getRequest();
            $response = Craft::$app->getResponse();
            if (!$request->isConsoleRequest) {
                if ($response->statusCode >= 400) {
                    $data['content'] = 'none';
                }
                try {
                    if ($request->getToken() !== null) {
                        $data['content'] = 'none';
                    }
                } catch (BadRequestHttpException $e) {
                }
            }
            // Set meta robots tag to `none` if this is any kind of Craft preview
            if (SeomaticHelper::isPreview()) {
                $data['content'] = 'none';
            }
        }

        return $shouldRender;
    }
}
