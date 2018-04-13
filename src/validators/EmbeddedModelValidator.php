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

namespace nystudio107\seomatic\validators;

use Craft;

use yii\base\Model;
use yii\validators\Validator;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class EmbeddedModelValidator extends Validator
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;

        if (!empty($value) && \is_object($value) && $value instanceof Model) {
            /** @var Model $value */
            if (!$value->validate()) {
                $errors = $value->getErrors();
                foreach ($errors as $attributeError => $valueErrors) {
                    /** @var array $valueErrors */
                    foreach ($valueErrors as $valueError) {
                        $model->addError(
                            $attribute,
                            Craft::t('seomatic', 'Object failed to validate')
                            .'-'.$attributeError.' - '.$valueError
                        );
                    }
                }
            }
        } else {
            $model->addError($attribute, Craft::t('seomatic', 'Is not a Model object.'));
        }
    }
}
