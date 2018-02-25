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

use nystudio107\seomatic\base\VarsModel;

use Craft;
use craft\validators\ArrayValidator;

use yii\web\ServerErrorHttpException;

/**
 * @inheritdoc
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaBundleSettings extends VarsModel
{
    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaBundleSettings
     */
    public static function create(array $config = [])
    {
        $model = null;
        $model = new MetaBundleSettings($config);

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * @var int[] The AssetIDs for the SEO Image
     */
    public $seoImageIds = [];

    /**
     * @var int[] The AssetIDs for the Twitter Image
     */
    public $twitterImageIds = [];

    /**
     * @var int[] The AssetIDs for the Facebook OG Image
     */
    public $ogImageIds = [];

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'siteName',
                ],
                'string'
            ],
            [
                [
                    'seoImageIds',
                    'twitterImageIds',
                    'ogImageIds',
                ],
                'each', 'rule' => ['integer'],
            ],
        ];
    }
}
