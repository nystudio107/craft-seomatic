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

namespace nystudio107\seomatic\base;

use craft\base\Model;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class FrontendTemplate extends Model implements FrontendTemplateInterface
{
    // Traits
    // =========================================================================

    use FrontendTemplateTrait;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['route'], 'required'],
            [['route'], 'string'],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function render(): string
    {
        return '';
    }
}
