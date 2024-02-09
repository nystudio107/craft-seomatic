<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\services;

use nystudio107\pluginvite\services\VitePluginService;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\services\FrontendTemplates as FrontendTemplatesService;
use nystudio107\seomatic\services\Helper as HelperService;
use nystudio107\seomatic\services\JsonLd as JsonLdService;
use nystudio107\seomatic\services\Link as LinkService;
use nystudio107\seomatic\services\MetaBundles as MetaBundlesService;
use nystudio107\seomatic\services\MetaContainers as MetaContainersService;
use nystudio107\seomatic\services\Script as ScriptService;
use nystudio107\seomatic\services\SeoElements as SeoElementsService;
use nystudio107\seomatic\services\Sitemaps as SitemapsService;
use nystudio107\seomatic\services\Tag as TagService;
use nystudio107\seomatic\services\Title as TitleService;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     4.0.8
 *
 * @property FrontendTemplatesService $frontendTemplates
 * @property HelperService $helper
 * @property JsonLdService $jsonLd
 * @property LinkService $link
 * @property MetaBundlesService $metaBundles
 * @property MetaContainersService $metaContainers
 * @property ScriptService $script
 * @property SeoElementsService $seoElements
 * @property SitemapsService $sitemaps
 * @property TagService $tag
 * @property TitleService $title
 * @property VitePluginService $vite
 */
trait ServicesTrait
{
    // Static Properties
    // =========================================================================

    public static ?string $majorVersion = '';

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function config(): array
    {
        // Constants aren't allowed in traits until PHP >= 8.2, and config() is called before __construct(),
        // so we can't extract it from the passed in $config
        $majorVersion = '5';
        // Dev server container name & port are based on the major version of this plugin
        $devPort = 3000 + (int)$majorVersion;
        $versionName = 'v' . $majorVersion;
        return [
            'components' => [
                'frontendTemplates' => FrontendTemplatesService::class,
                'helper' => HelperService::class,
                'jsonLd' => JsonLdService::class,
                'link' => LinkService::class,
                'metaBundles' => MetaBundlesService::class,
                'metaContainers' => MetaContainersService::class,
                'script' => ScriptService::class,
                'seoElements' => SeoElementsService::class,
                'sitemaps' => SitemapsService::class,
                'tag' => TagService::class,
                'title' => TitleService::class,
                // Register the vite service
                'vite' => [
                    'assetClass' => SeomaticAsset::class,
                    'checkDevServer' => true,
                    'class' => VitePluginService::class,
                    'devServerInternal' => 'http://craft-seomatic-' . $versionName . '-buildchain-dev:' . $devPort,
                    'devServerPublic' => 'http://localhost:' . $devPort,
                    'errorEntry' => 'src/js/seomatic.js',
                    'useDevServer' => true,
                ],
            ],
        ];
    }

    // Public Methods
    // =========================================================================

    /**
     * Returns the frontendTemplates service
     *
     * @return FrontendTemplatesService The frontendTemplates service
     * @throws InvalidConfigException
     */
    public function getFrontendTemplates(): FrontendTemplatesService
    {
        return $this->get('frontendTemplates');
    }

    /**
     * Returns the helper service
     *
     * @return HelperService The helper service
     * @throws InvalidConfigException
     */
    public function getHelper(): HelperService
    {
        return $this->get('helper');
    }

    /**
     * Returns the jsonLd service
     *
     * @return JsonLdService The jsonLd service
     * @throws InvalidConfigException
     */
    public function getJsonLd(): JsonLdService
    {
        return $this->get('jsonLd');
    }

    /**
     * Returns the link service
     *
     * @return LinkService The link service
     * @throws InvalidConfigException
     */
    public function getLink(): LinkService
    {
        return $this->get('link');
    }

    /**
     * Returns the metaBundles service
     *
     * @return MetaBundlesService The metaBundles service
     * @throws InvalidConfigException
     */
    public function getMetaBundles(): MetaBundlesService
    {
        return $this->get('metaBundles');
    }

    /**
     * Returns the metaContainers service
     *
     * @return MetaContainersService The metaContainers service
     * @throws InvalidConfigException
     */
    public function getMetaContainers(): MetaContainersService
    {
        return $this->get('metaContainers');
    }

    /**
     * Returns the script service
     *
     * @return ScriptService The script service
     * @throws InvalidConfigException
     */
    public function getScript(): ScriptService
    {
        return $this->get('script');
    }

    /**
     * Returns the seoElements service
     *
     * @return SeoElementsService The seoElements service
     * @throws InvalidConfigException
     */
    public function getSeoElements(): SeoElementsService
    {
        return $this->get('seoElements');
    }

    /**
     * Returns the sitemaps service
     *
     * @return SitemapsService The sitemaps service
     * @throws InvalidConfigException
     */
    public function getSitemaps(): SitemapsService
    {
        return $this->get('sitemaps');
    }

    /**
     * Returns the tag service
     *
     * @return TagService The tag service
     * @throws InvalidConfigException
     */
    public function getTag(): TagService
    {
        return $this->get('tag');
    }

    /**
     * Returns the title service
     *
     * @return TitleService The title service
     * @throws InvalidConfigException
     */
    public function getTitle(): TitleService
    {
        return $this->get('title');
    }

    /**
     * Returns the vite service
     *
     * @return VitePluginService The vite service
     * @throws InvalidConfigException
     */
    public function getVite(): VitePluginService
    {
        return $this->get('vite');
    }
}
