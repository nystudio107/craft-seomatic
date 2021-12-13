<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2021 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\controllers;

use nystudio107\seomatic\helpers\Autocomplete as AutocompleteHelper;

use craft\web\Controller;
use yii\web\Response;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.21
 */
class AutocompleteController extends Controller
{
    /**
     * @param null $additionalCompletionsCacheKey
     * @return Response
     */
    public function actionIndex($additionalCompletionsCacheKey = null): Response
    {
        $result = AutocompleteHelper::generate($additionalCompletionsCacheKey);

        return $this->asJson($result);
    }
}
