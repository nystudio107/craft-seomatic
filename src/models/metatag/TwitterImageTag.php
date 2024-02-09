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

use craft\validators\UrlValidator;
use nystudio107\seomatic\helpers\UrlHelper;
use nystudio107\seomatic\models\MetaTag;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class TwitterImageTag extends MetaTag
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'TwitterImageTag';

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
            // content in this case should be a fully qualified URL
            [['content'], UrlValidator::class],
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
            if (!empty($data['content'])) {
                $data['content'] = UrlHelper::absoluteUrlWithProtocol($data['content']);
            }
        }

        return $shouldRender;
    }
}
