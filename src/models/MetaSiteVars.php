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

use Craft;
use yii\web\ServerErrorHttpException;

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
     * @var string The name of the website
     */
    public $siteName = '';

    /**
     * @var string The Twitter handle
     */
    public $twitterHandle = '';

    /**
     * @var string The Facebook profile ID
     */
    public $facebookProfileId = '';

    /**
     * @var string The Facebook app ID
     */
    public $facebookAppId = '';

    /**
     * @var string The Google Site Verification code
     */
    public $googleSiteVerification;

    /**
     * @var string Link to the Google+ My Business page
     */
    public $googlePublisherLink;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // Set some default values
        if (empty($this->siteName)) {
            try {
                $info = Craft::$app->getInfo();
            } catch (ServerErrorHttpException $e) {
                $info = null;
            }
            $siteName = Craft::$app->config->general->siteName;
            if (is_array($siteName)) {
                $siteName = reset($siteName);
            }
            $this->siteName = $siteName ?? $info->name;
        }
    }

    /**
     * Parse the model properties
     *
     * @inheritdoc
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
