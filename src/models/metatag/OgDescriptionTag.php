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

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\models\MetaTag;

use Stringy\Stringy;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class OgDescriptionTag extends MetaTag
{
    // Constants
    // =========================================================================

    const ITEM_TYPE = 'OgDescriptionTag';

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
            // Description tags have a special length
            [['content'], 'string', 'length' => [70, 300], 'on' => ['warning']],
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
                $data['content'] = (string)Stringy::create($data['content'])->safeTruncate(
                    300,
                    '…'
                );
            }
        }

        return $shouldRender;
    }
}
