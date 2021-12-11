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
 * @since     3.4.22
 */
class AutocompleteController extends Controller
{
    /**
     * @return Response
     */
    public function actionIndex(): Response
    {
        $result = AutocompleteHelper::generate();

        return $this->asJson($result);
    }
}
