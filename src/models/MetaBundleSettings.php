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
     * @var string The source that the SEO title should come from
     */
    public $seoTitleSource;

    /**
     * @var string the field handle that the SEO title is pulled from
     */
    public $seoTitleField;

    /**
     * @var string The source that the SEO description should come from
     */
    public $seoDescriptionSource;

    /**
     * @var string the field handle that the SEO description is pulled from
     */
    public $seoDescriptionField;

    /**
     * @var string The source that the SEO keywords should come from
     */
    public $seoKeywordsSource;

    /**
     * @var string the field handle that the SEO keywords is pulled from
     */
    public $seoKeywordsField;

    /**
     * @var int[] The AssetIDs for the SEO Image
     */
    public $seoImageIds = [];

    /**
     * @var string The source that the SEO image should come from
     */
    public $seoImageSource = '';

    /**
     * @var string The field handle that SEO Image is pulled from
     */
    public $seoImageField = '';

    /**
     * @var string The source that the SEO image description should come from
     */
    public $seoImageDescriptionSource;

    /**
     * @var string the field handle that the SEO image description is pulled from
     */
    public $seoImageDescriptionField;

    /**
     * @var string The source that the Twitter title should come from
     */
    public $twitterTitleSource;

    /**
     * @var string the field handle that the Twitter title is pulled from
     */
    public $twitterTitleField;

    /**
     * @var string The source that the Twitter description should come from
     */
    public $twitterDescriptionSource;

    /**
     * @var string the field handle that the Twitter description is pulled from
     */
    public $twitterDescriptionField;

    /**
     * @var int[] The AssetIDs for the Twitter Image
     */
    public $twitterImageIds = [];

    /**
     * @var string The source that the Twitter image should come from
     */
    public $twitterImageSource = '';

    /**
     * @var string The field handle that Twitter Image to be pulled from
     */
    public $twitterImageField = '';

    /**
     * @var string The source that the Twitter image description should come from
     */
    public $twitterImageDescriptionSource;

    /**
     * @var string the field handle that the Twitter image description is pulled from
     */
    public $twitterImageDescriptionField;

    /**
     * @var string The source that the Facebook OG title should come from
     */
    public $ogTitleSource;

    /**
     * @var string the field handle that the Facebook OG title is pulled from
     */
    public $ogTitleField;

    /**
     * @var string The source that the Facebook OG description should come from
     */
    public $ogDescriptionSource;

    /**
     * @var string the field handle that the Facebook OG description is pulled from
     */
    public $ogDescriptionField;

    /**
     * @var int[] The AssetIDs for the Facebook OG Image
     */
    public $ogImageIds = [];

    /**
     * @var string The source that the OpenGraph image should come from
     */
    public $ogImageSource = '';

    /**
     * @var string The field handle that OpenGraph Image to be pulled from
     */
    public $ogImageField = '';

    /**
     * @var string The source that the Facebook OG image description should come from
     */
    public $ogImageDescriptionSource;

    /**
     * @var string the field handle that the Facebook OG image description is pulled from
     */
    public $ogImageDescriptionField;

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
                    'seoTitleSource',
                    'seoTitleField',
                    'seoDescriptionSource',
                    'seoDescriptionField',
                    'seoKeywordsSource',
                    'seoKeywordsField',
                    'seoImageSource',
                    'seoImageField',
                    'seoImageDescriptionSource',
                    'seoImageDescriptionField',

                    'twitterTitleSource',
                    'twitterTitleField',
                    'twitterDescriptionSource',
                    'twitterDescriptionField',
                    'twitterImageSource',
                    'twitterImageField',
                    'twitterImageDescriptionSource',
                    'twitterImageDescriptionField',

                    'ogTitleSource',
                    'ogTitleField',
                    'ogDescriptionSource',
                    'ogDescriptionField',
                    'ogImageSource',
                    'ogImageField',
                    'ogImageDescriptionSource',
                    'ogImageDescriptionField',
                ],
                'string'
            ],
            [
                ['seoImageSource', 'twitterImageSource', 'ogImageSource'], 'in', 'range' => [
                    'sameAsSeo',
                    'fromField',
                    'fromAsset',
                    'fromUrl',
                ],
            ],
            [
                ['seoTitleSource', 'twitterTitleSource', 'ogTitleSource'], 'in', 'range' => [
                    'sameAsSeo',
                    'fromField',
                    'fromCustom',
                ],
            ],
            [
                ['seoDescriptionSource', 'twitterDescriptionSource', 'ogDescriptionSource'], 'in', 'range' => [
                    'sameAsSeo',
                    'fromField',
                    'summaryFromField',
                    'fromCustom',
                ],
            ],
            [
                ['seoKeywordsSource'], 'in', 'range' => [
                    'sameAsSeo',
                    'fromField',
                    'keywordsFromField',
                    'fromCustom',
                ],
            ],
            [
                ['seoImageDescriptionSource', 'twitterImageDescriptionSource', 'ogImageDescriptionSource'], 'in', 'range' => [
                    'sameAsSeo',
                    'fromField',
                    'summaryFromField',
                    'fromCustom',
                ],
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
