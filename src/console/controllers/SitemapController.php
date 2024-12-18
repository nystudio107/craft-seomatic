<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\console\controllers;

use yii\console\Controller;

/**
 * SEOmatic Sitemap command
 *
 * @deprecated This CLI command is no longer needed because of the paginated sitemap generation
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SitemapController extends Controller
{
    // Public Properties
    // =========================================================================

    /**
     * @var null|string The handle of the section to generate a sitemap for
     */
    public $handle;

    /**
     * @var null|int The siteId to generate a sitemap for
     */
    public $siteId;

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array
     */
    protected array|bool|int $allowAnonymous = [
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
        ];
    }

    /**
     * Generate a sitemap. You can pass in a --handle and/or a --siteId
     */
    public function actionGenerate()
    {
        echo 'This CLI command is no longer needed because of the paginated sitemap generation' . PHP_EOL;
    }

    // Protected Methods
    // =========================================================================
}
