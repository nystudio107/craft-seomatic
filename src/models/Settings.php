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

use craft\base\Model;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * The public-facing name of the plugin
     *
     * @var string
     */
    public $pluginName = 'SEOmatic';

    /**
     * The server environment, either `live`, `staging`, or `local`
     *
     * @var string
     */
    public $environment = 'live';

    /**
     * If `devMode` is on, prefix the <title> with this string
     *
     * @var string
     */
    public $devModeTitlePrefix = '[devMode] ';

    /**
     * The max number of characters in the `<title>` tag
     *
     * @var int
     */
    public $maxTitleLength = 70;

    /**
     * The max number of characters in the `<meta name="description">` tag
     *
     * @var int
     */
    public $maxDescriptionLength = 160;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['pluginName', 'string'],
            ['pluginName', 'default', 'value' => 'SEOmatic'],
            ['environment', 'string'],
            ['environment', 'default', 'value' => 'live'],
            ['environment', 'in', 'range' => [
                'live',
                'staging',
                'production',
            ]],
            ['devModeTitlePrefix', 'string'],
            ['devModeTitlePrefix', 'default', 'value' => '[devMode] '],
            ['maxTitleLength', 'integer', 'min' => 10],
            ['maxTitleLength', 'default', 'value' => 70],
            ['maxDescriptionLength', 'integer', 'min' => 10],
            ['maxDescriptionLength', 'default', 'value' => 160],
        ];
    }
}
