<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\console\controllers;

use nystudio107\seomatic\Seomatic;

use Craft;

use yii\console\Controller;

/**
 * SEOmatic Sitemap command
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SitemapController extends Controller
{
    // Public Properties
    // =========================================================================

    /**
     * @var null|string
     */
    public $handle;

    /**
     * @var null|int
     */
    public $siteId;

    /**
     * @var null|string
     */
    public $type;

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array
     */
    protected $allowAnonymous = [
    ];

    // Public Methods
    // =========================================================================

    /**
     * @param string $actionID
     *
     * @return array|string[]
     */
    public function options($actionID): array
    {
        return [
            'handle',
            'siteId',
            'type',
        ];
    }

    /**
     * Generate a sitemap. You can pass in the following parameters:
     * --handle - the handle to the section
     */
    public function actionGenerate()
    {
        echo 'Generating sitemap'.PHP_EOL;
        Seomatic::$plugin->sitemaps->invalidateSitemapCache($this->handle, $this->siteId, $this->type, true);
        Craft::$app->getQueue()->run();
    }
}
