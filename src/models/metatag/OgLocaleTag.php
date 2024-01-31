<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\models\metatag;

use nystudio107\seomatic\helpers\Localization as LocalizationHelper;
use nystudio107\seomatic\models\MetaTag;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.30
 */
class OgLocaleTag extends MetaTag
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'OgLocaleTag';

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
            // content in this case should be a string
            [['content'], 'string'],
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
                $data['content'] = LocalizationHelper::normalizeOgLocaleLanguage($data['content']);
            }
        }

        return $shouldRender;
    }
}
