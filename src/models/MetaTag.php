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

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\helpers\PluginTemplate as PluginTemplateHelper;

use Craft;
use craft\base\Model;
use craft\helpers\Template;

use yii\helpers\Html;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaTag extends Model
{
    // Constants
    // =========================================================================

    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaTag
     */
    public static function create(array $config = [])
    {
        $model = null;
        $model = new MetaTag($config);

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var array
     */
    public $options;

    // Public Methods
    // =========================================================================

    /**
     * @return string
     */
    public function render()
    {
        return Html::tag('meta', '', $this->options);
    }

    // Private Methods
    // =========================================================================

}