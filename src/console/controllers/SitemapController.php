<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\console\controllers;

use nystudio107\seomatic\models\MetaBundle;
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
        ];
    }

    /**
     * Generate a sitemap. You can pass in a --handle and/or a --siteId
     */
    public function actionGenerate()
    {
        echo 'Generating sitemap'.PHP_EOL;
        if ($this->siteId !== null) {
            $siteIds[] = $this->siteId;
        } else {
            $siteIds = Craft::$app->getSites()->getAllSiteIds();
            if (!\is_array($siteIds)) {
                $siteIds = [$siteIds];
            }
        }
        foreach ($siteIds as $siteId) {
            $metaBundles = Seomatic::$plugin->metaBundles->getContentMetaBundlesForSiteId($siteId);
            Seomatic::$plugin->metaBundles->pruneVestigialMetaBundles($metaBundles);
            /** @var MetaBundle $metaBundle */
            foreach ($metaBundles as $metaBundle) {
                $process = false;
                if ($this->handle === null || $this->handle === $metaBundle->sourceHandle) {
                    $process = true;
                }
                if ($metaBundle->metaSitemapVars->sitemapUrls && $process) {
                    echo 'Generating sitemap for '
                        .$metaBundle->sourceType
                        .' '
                        .$metaBundle->sourceName
                        .', siteId '
                        .$siteId;
                    Seomatic::$plugin->sitemaps->invalidateSitemapCache(
                        $metaBundle->sourceHandle,
                        $siteId,
                        $metaBundle->sourceBundleType,
                        true
                    );
                    Craft::$app->getQueue()->run();
                    echo '---'.PHP_EOL;
                }
            }
        }
    }

    // Protected Methods
    // =========================================================================
}
