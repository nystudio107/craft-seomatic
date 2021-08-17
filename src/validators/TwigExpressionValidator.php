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

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\variables\SeomaticVariable;

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
        $error = null;
        if (!empty($value) && \is_string($value)) {
            try {
                if (Seomatic::$seomaticVariable === null) {
                    Seomatic::$seomaticVariable = new SeomaticVariable();
                }
                Craft::$app->getView()->renderString($value, [
                    'seomatic' => Seomatic::$seomaticVariable
                ]);
            } catch (\Exception $e) {
                $error = Craft::t(
                    'seomatic',
                    'Error rendering template string -> {error}',
                    ['error' => $e->getMessage()]
                );
            }
        } else {
            $error = Craft::t('seomatic', 'Is not a string.');
        }
        // If there's an error, add it to the model, and log it
        if ($error) {
            $model->addError($attribute, $error);
            Craft::error($error, __METHOD__);
        }
    }
}
