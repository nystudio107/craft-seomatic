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
use craft\helpers\ArrayHelper;

use yii\helpers\Inflector;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
abstract class MetaItem extends Model implements MetaItemInterface
{
    // Traits
    // =========================================================================

    use MetaItemTrait;

    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['key'], 'required'],
            [['key'], 'string'],
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        switch ($this->scenario) {
            case 'google':
            case 'default':
                unset(
                    $fields['key']
                );
                break;
        }

        return $fields;
    }

    /**
     * @inheritdoc
     */
    public function render(): string
    {
        return '';
    }

    /**
     * @return array
     */
    public function tagAttributes(): array
    {
        $tagAttributes = $this->toArray();
        $tagAttributes = array_filter($tagAttributes);
        foreach ($tagAttributes as $key => $value) {
            ArrayHelper::rename($tagAttributes, $key, Inflector::slug(Inflector::titleize($key)));
        }
        ksort($tagAttributes);

        return $tagAttributes;
    }

    // Private Methods
    // =========================================================================
}
