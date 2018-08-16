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

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\events\RegisterSitemapUrlsEvent;
use nystudio107\seomatic\helpers\UrlHelper;

use Craft;

use yii\caching\TagDependency;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.1.0
 */
class SitemapCustomTemplate extends FrontendTemplate implements SitemapInterface
{
    // Constants
    // =========================================================================

    /**
     * @event RegisterSitemapUrlsEvent The event that is triggered when registering
     * additional URLs for a sitemap.
     *
     * ---
     * ```php
     * use nystudio107\seomatic\events\RegisterSitemapUrlsEvent;
     * use nystudio107\seomatic\models\SitemapCustomTemplate;
     * use yii\base\Event;
     * Event::on(SitemapCustomTemplate::class, SitemapCustomTemplate::EVENT_REGISTER_SITEMAP_URLS, function(RegisterSitemapUrlsEvent $e) {
     *     $e->sitemapUrls[] = [
     *         'loc' => $url,
     *         'changefreq' => $changeFreq,
     *         'priority' => $priority,
     *         'lastmod' => $lastMod,
     *     ];
     * });
     * ```
     */
    const EVENT_REGISTER_SITEMAP_URLS = 'registerSitemapUrls';

    const TEMPLATE_TYPE = 'SitemapCustomTemplate';

    const CACHE_KEY = 'seomatic_sitemap_';

    const SITEMAP_CACHE_TAG = 'seomatic_sitemap_';

    const CUSTOM_HANDLE = 'custom';

    const CUSTOM_SCOPE = 'global';

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|SitemapCustomTemplate
     */
    public static function create(array $config = [])
    {
        $defaults = [
            'path' => 'sitemaps/<groupId:\d+>/'.self::CUSTOM_SCOPE.'/'.self::CUSTOM_HANDLE.'/<siteId:\d+>/<file:[-\w\.*]+>',
            'template' => '',
            'controller' => 'sitemap',
            'action' => 'sitemap-custom',
        ];
        $config = array_merge($config, $defaults);

        return new SitemapCustomTemplate($config);
    }

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields(): array
    {
        return parent::fields();
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        $cache = Craft::$app->getCache();
        $groupId = $params['groupId'];
        $handle = self::CUSTOM_HANDLE;
        $siteId = $params['siteId'];
        $dependency = new TagDependency([
            'tags' => [
                $this::GLOBAL_SITEMAP_CACHE_TAG,
                $this::SITEMAP_CACHE_TAG.$handle.$siteId,
            ],
        ]);

        return $cache->getOrSet($this::CACHE_KEY.$groupId.self::CUSTOM_SCOPE.$handle.$siteId, function () use (
            $handle,
            $siteId
        ) {
            Craft::info(
                'Sitemap Custom cache miss: '.$handle.'/'.$siteId,
                __METHOD__
            );
            $lines = [];
            // Sitemap index XML header and opening tag
            $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
            // One sitemap entry for each element
            $metaBundle = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($siteId, false);
            // If it's disabled, just throw a 404
            if ($metaBundle === null) {
                throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
            }
            if ($metaBundle) {
                $urlsetLine = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
                $urlsetLine .= '>';
                $lines[] = $urlsetLine;
                // If it's null, just throw a 404
                if ($metaBundle->metaSiteVars->additionalSitemapUrls === null) {
                    throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
                }
                $additionalSitemapUrls = $metaBundle->metaSiteVars->additionalSitemapUrls;
                $additionalSitemapUrls = empty($additionalSitemapUrls) ? [] : $additionalSitemapUrls;
                // Allow plugins/modules to add custom URLs
                $event = new RegisterSitemapUrlsEvent([
                    'sitemapUrls' => $additionalSitemapUrls,
                    'siteId' => $metaBundle->sourceSiteId,
                ]);
                $this->trigger(self::EVENT_REGISTER_SITEMAP_URLS, $event);
                $additionalSitemapUrls = array_filter($event->sitemapUrls);
                // Output the sitemap entry
                foreach ($additionalSitemapUrls as $additionalSitemapUrl) {
                    $url = UrlHelper::siteUrl(
                        $additionalSitemapUrl['loc'],
                        null,
                        null,
                        $metaBundle->sourceSiteId
                    );
                    $dateUpdated = $additionalSitemapUrl['lastmod']
                        ?? $metaBundle->metaSiteVars->additionalSitemapUrlsDateUpdated
                        ?? new \DateTime;
                    $lines[] = '  <url>';
                    // Standard sitemap key/values
                    $lines[] = '    <loc>';
                    $lines[] = '      '.Html::encode($url);
                    $lines[] = '    </loc>';
                    $lines[] = '    <lastmod>';
                    $lines[] = '      '.$dateUpdated->format(\DateTime::W3C);
                    $lines[] = '    </lastmod>';
                    $lines[] = '    <changefreq>';
                    $lines[] = '      '.$additionalSitemapUrl['changefreq'];
                    $lines[] = '    </changefreq>';
                    $lines[] = '    <priority>';
                    $lines[] = '      '.$additionalSitemapUrl['priority'];
                    $lines[] = '    </priority>';
                    $lines[] = '  </url>';
                }
                // Sitemap index closing tag
                $lines[] = '</urlset>';
            }

            return implode("\r\n", $lines);
        }, Seomatic::$cacheDuration, $dependency);
    }

    /**
     * Invalidate a sitemap cache
     *
     * @param int $siteId
     */
    public function invalidateCache(int $siteId)
    {
        $handle = self::CUSTOM_HANDLE;
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, $this::SITEMAP_CACHE_TAG.$handle.$siteId);
        Craft::info(
            'Sitemap Custom cache cleared: '.$handle,
            __METHOD__
        );
    }
}
