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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaScript extends Model
{
    // Constants
    // =========================================================================

    // Static Properties
    // =========================================================================

    // Static Methods
    // =========================================================================

    public static function create(array $config = [])
    {
        $model = null;
        $model = new MetaScript($config);

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $templatePath;

    /**
     * @var array
     */
    public $vars;

    // Public Methods
    // =========================================================================

    /**
     * @return string
     */
    public function render()
    {
        return PluginTemplateHelper::renderPluginTemplate($this->templatePath, $this->vars);
    }

    // Private Methods
    // =========================================================================

}