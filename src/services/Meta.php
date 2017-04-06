<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\services;

use nystudio107\seomatic\Seomatic;

use Craft;
use craft\base\Component;

use yii\web\View;

/**
 * Meta Service
 *
 * @author    nystudio107
 * @package   SEOmatic
 * @since     2.0.0
 */

class Meta extends Component
{

    /**
     *
     */
    public function registerMeta()
    {
        $this->includeMetaTags();
        $this->includeScripts();
        $this->includeStructuredData();
    }

    /**
     *
     */
    public function includeMetaTags()
    {
        $view = Craft::$app->getView();
        $view->registerMetaTag([
            'name' => 'description',
            'content' => 'This website is about funny raccoons.'
        ]);
    }

    /**
     *
     */
    public function includeScripts()
    {
        $js = "<script></script>"
        $view = Craft::$app->getView();
        $view->registerJs(
            $js,
            View::POS_HEAD,
            $key,
            $options
        );
    }

    /**
     *
     */
    public function includeStructuredData()
    {
        $view = Craft::$app->getView();
    }
}