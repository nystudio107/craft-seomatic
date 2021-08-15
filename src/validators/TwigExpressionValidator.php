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

use nystudio107\seomatic\helpers\PluginTemplate;

use Craft;

use yii\base\Model;
use yii\validators\Validator;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.0
 */
class TwigExpressionValidator extends Validator
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function validateAttribute($model, $attribute)
    {
        /** @var Model $model */
        $value = $model->$attribute;

        if (!empty($value) && \is_string($value)) {
            $error = PluginTemplate::isStringTemplateValid($value, []);
            if (!empty($error)) {
                $model->addError($attribute, $error);
            }
        } else {
            $model->addError($attribute, Craft::t('seomatic', 'Is not a string.'));
        }
    }
}
