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
        return new MetaBundleSettings($config);
    }

    // Public Properties
    // =========================================================================

    /**
     * @var string The schema.org general type
     */
    public $siteType = 'CreativeWork';

    /**
     * @var string The schema.org sub-type
     */
    public $siteSubType = 'WebPage';

    /**
     * @var string The schema.org specific type
     */
    public $siteSpecificType = '';

    /**
     * @var string The source that the SEO title should come from
     */
    public $seoTitleSource;

    /**
     * @var string the field handle that the SEO title is pulled from
     */
    public $seoTitleField;

    /**
     * @var string The source that the Twitter site name position should come from
     */
    public $siteNamePositionSource;

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
     * @var bool Whether the SEO image should be automatically transformed into an appropriate format
     */
    public $seoImageTransform = true;

    /**
     * @var string The source that the SEO image description should come from
     */
    public $seoImageDescriptionSource;

    /**
     * @var string the field handle that the SEO image description is pulled from
     */
    public $seoImageDescriptionField;

    /**
     * @var string The source that the Twitter creator should come from
     */
    public $twitterCreatorSource;

    /**
     * @var string The field handle that the Twitter creator is pulled from
     */
    public $twitterCreatorField;

    /**
     * @var string The source that the Twitter title should come from
     */
    public $twitterTitleSource;

    /**
     * @var string The field handle that the Twitter title is pulled from
     */
    public $twitterTitleField;

    /**
     * @var string The source that the Twitter site name position should come from
     */
    public $twitterSiteNamePositionSource;

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
     * @var bool Whether the Twitter image should be automatically transformed into an appropriate format
     */
    public $twitterImageTransform = true;

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
     * @var string The source that the Facebook OG site name position should come from
     */
    public $ogSiteNamePositionSource;

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
     * @var bool Whether the OpenGraph image should be automatically transformed into an appropriate format
     */
    public $ogImageTransform = true;

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
    public function rules(): array
    {
        return [
            [
                [
                    'siteType',
                    'siteSubType',
                    'siteSpecificType',

                    'seoTitleSource',
                    'seoTitleField',
                    'siteNamePositionSource',
                    'seoDescriptionSource',
                    'seoDescriptionField',
                    'seoKeywordsSource',
                    'seoKeywordsField',
                    'seoImageSource',
                    'seoImageField',
                    'seoImageDescriptionSource',
                    'seoImageDescriptionField',

                    'twitterCreatorSource',
                    'twitterCreatorField',
                    'twitterTitleSource',
                    'twitterTitleField',
                    'twitterSiteNamePositionSource',
                    'twitterDescriptionSource',
                    'twitterDescriptionField',
                    'twitterImageSource',
                    'twitterImageField',
                    'twitterImageDescriptionSource',
                    'twitterImageDescriptionField',

                    'ogTitleSource',
                    'ogTitleField',
                    'ogSiteNamePositionSource',
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
                [
                    'seoImageTransform',
                    'twitterImageTransform',
                    'ogImageTransform',
                ],
                'boolean'
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
                ['twitterCreatorSource'], 'in', 'range' => [
                'sameAsSite',
                'sameAsSiteTwitter',
                'fromUserField',
                'fromCustom',
                ],
            ],
            [
                ['siteNamePositionSource', 'twitterSiteNamePositionSource', 'ogSiteNamePositionSource'], 'in', 'range' => [
                'sameAsSeo',
                'sameAsGlobal',
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
