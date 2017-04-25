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

use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

use Craft;
use craft\base\Model;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaGlobalVars extends Model
{
    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaGlobalVars
     */
    public static function create(array $config = [])
    {
        $model = null;
        $model = new MetaGlobalVars($config);
        // Parse the meta global vars
        $attributes = $model->getAttributes();
        MetaValueHelper::parseArray($attributes);
        $model->setAttributes($attributes);

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $seoTitle;

    /**
     * @var string
     */
    public $seoDescription;

    /**
     * @var string
     */
    public $seoImage;

    /**
     * @var string
     */
    public $canonicalUrl;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seoTitle', 'seoDescription', 'seoImage'], 'string'],
            [['canonicalUrl'], 'url'],
        ];
    }
}
