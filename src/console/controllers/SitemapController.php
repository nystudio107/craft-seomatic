<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\console\controllers;

use nystudio107\seomatic\events\SitemapGeneratedEvent;
use nystudio107\seomatic\helpers\Sitemap;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\models\SitemapTemplate;
use nystudio107\seomatic\Seomatic;

use Craft;
use craft\helpers\App;

use yii\base\Event;
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
     * @var null|string The handle of the section to generate a sitemap for
     */
    public $handle;

    /**
     * @var null|int The siteId to generate a sitemap for
     */
    public $siteId;

    /**
     * @var bool Should the sitemap generation simply be queued, rather than run immediately?
     */
    public $queue = false;

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
            'queue',
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
        // This might take a while
        App::maxPowerCaptain();
        // Process the sitemap generation
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
                        .$siteId
                        .PHP_EOL
                    ;
                    Seomatic::$plugin->sitemaps->invalidateSitemapCache(
                        $metaBundle->sourceHandle,
                        $siteId,
                        $metaBundle->sourceBundleType
                    );
                    // Generate the sitemap so it is in the cache
                    $site = Craft::$app->getSites()->getSiteById($metaBundle->sourceSiteId);
                    if ($site) {
                        $sitemap = SitemapTemplate::create();
                        $sitemap->render([
                            'groupId' => $site->groupId,
                            'siteId' => $metaBundle->sourceSiteId,
                            'handle' => $metaBundle->sourceHandle,
                            'type' => $metaBundle->sourceBundleType,
                            'immediately' => true,
                        ]);
                    }

                    echo '---'.PHP_EOL;
                }
            }
        }
    }

    // Protected Methods
    // =========================================================================
}
