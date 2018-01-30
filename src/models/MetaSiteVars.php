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

use nystudio107\seomatic\base\FluentModel;
use nystudio107\seomatic\helpers\MetaValue as MetaValueHelper;

/**
 * @inheritdoc
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class MetaSiteVars extends FluentModel
{
    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|MetaSiteVars
     */
    public static function create(array $config = [])
    {
        $model = null;
        $model = new MetaSiteVars($config);

        return $model;
    }

    // Public Properties
    // =========================================================================

    /**
     * The name of the website
     *
     * @var string
     */
    public $siteName = '';

    /**
     * The Twitter handle
     *
     * @var string
     */
    public $twitterHandle = '';

    /**
     * The Facebook profile ID
     *
     * @var string
     */
    public $facebookProfileId = '';

    /**
     * The Facebook app ID
     *
     * @var string
     */
    public $facebookAppId = '';

    /**
     * The Google Site Verification code
     * @var string
     */
    public $googleSiteVerification;

    // Public Methods
    // =========================================================================

    /**
     * Parse the model properties
     */
    public function parseProperties()
    {
        // Parse the meta global vars
        $attributes = $this->getAttributes();
        MetaValueHelper::parseArray($attributes);
        $this->setAttributes($attributes);
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
                    'twitterHandle',
                    'facebookProfileId',
                    'facebookAppId',
                    'googleSiteVerification',
                ],
                'string'
            ],
        ];
    }
}
