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

namespace nystudio107\seomatic\web;

use Craft;
use yii\base\Exception;
use yii\web\HttpException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class ErrorHandler extends \craft\web\ErrorHandler
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function handleException($exception)
    {
        // If this is a Twig Runtime exception, use the previous one instead
        if ($exception instanceof \Twig_Error_Runtime && ($previousException = $exception->getPrevious()) !== null) {
            $exception = $previousException;
        }

        // If this is a 404 error, see if we can handle it
        if ($exception instanceof HttpException && $exception->statusCode === 404) {
            Craft::dd('Hello, world');
        }

        parent::handleException($exception);
    }
}
