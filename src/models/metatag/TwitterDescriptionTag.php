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

use nystudio107\seomatic\helpers\Text as TextHelper;
use nystudio107\seomatic\models\MetaTag;
use nystudio107\seomatic\Seomatic;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class TwitterDescriptionTag extends MetaTag
{
    // Constants
    // =========================================================================

    public const ITEM_TYPE = 'TwitterDescriptionTag';

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
            // Description tags have a special length
            [['content'], 'string', 'length' => [70, 200], 'on' => ['warning']],
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
                // Truncate the Description tag content
                if (Seomatic::$settings->truncateDescriptionTags) {
                    $data['content'] = TextHelper::truncateOnWord(
                        $data['content'],
                        Seomatic::$settings->maxDescriptionLength,
                        '…'
                    );
                }
            }
        }

        return $shouldRender;
    }
}
