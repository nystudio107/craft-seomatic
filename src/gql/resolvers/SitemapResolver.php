<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace nystudio107\seomatic\gql\resolvers;

use Craft;
use GraphQL\Type\Definition\ResolveInfo;
use nystudio107\seomatic\helpers\Gql as GqlHelper;
use nystudio107\seomatic\helpers\PluginTemplate;
use nystudio107\seomatic\helpers\Sitemap;
use nystudio107\seomatic\models\SitemapCustomTemplate;
use nystudio107\seomatic\models\SitemapIndexTemplate;
use nystudio107\seomatic\models\SitemapTemplate;
use nystudio107\seomatic\Seomatic;
use yii\web\NotFoundHttpException;

/**
 * Class SitemapResolver
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.18
 */
class SitemapResolver
{
    // Public Methods
    // =========================================================================

    /**
     * @param $source
     * @param array $arguments
     * @param $context
     * @param ResolveInfo $resolveInfo
     * @return array|array[]|null[]
     * @throws NotFoundHttpException
     */
    public static function getSitemaps($source, array $arguments, $context, ResolveInfo $resolveInfo)
    {
        // If there's a filename provided, return the sitemap.
        if (!empty($arguments['filename'])) {
            return [
                self::getSitemapItemByFilename($arguments['filename']),
            ];
        }
        $siteId = GqlHelper::getSiteIdFromGqlArguments($arguments);
        $site = Craft::$app->getSites()->getSiteById($siteId);

        if (!$site) {
            return [];
        }

        $sitemapList = [];
        // If either of the source bundle arguments are present, get the sitemap
        if (!empty($arguments['sourceBundleType']) || !empty($arguments['sourceBundleHandle'])) {
            $filenames = self::createSitemapFilenamesFromComponents($site->groupId, $arguments['sourceBundleType'] ?? '', $arguments['sourceBundleHandle'] ?? '', $siteId);

            foreach ($filenames as $filename) {
                $sitemapList[] = self::getSitemapItemByFilename($filename);
            }

            return $sitemapList;
        }

        $sitemapIndexItems = [self::getSitemapIndexListEntry($siteId, $site->groupId)];

        // Scrape each index for individual entries
        foreach ($sitemapIndexItems as $sitemapIndexItem) {
            $contents = $sitemapIndexItem['contents'];
            if (preg_match_all('/<loc>(.*?)<\/loc>/m', $contents, $matches)) {
                foreach ($matches[1] as $url) {
                    $parts = explode('/', $url);
                    $filename = end($parts);

                    // Get individual sitemaps
                    $item = self::getSitemapItemByFilename($filename);

                    if ($item) {
                        $sitemapList[] = $item;
                    }
                }
            }
        }

        return $sitemapList;
    }

    /**
     * @param $source
     * @param $arguments
     * @param $context
     * @param ResolveInfo $resolveInfo
     * @return array[]
     * @throws NotFoundHttpException
     */
    public static function getSitemapIndexes($source, $arguments, $context, ResolveInfo $resolveInfo): array
    {
        $siteId = GqlHelper::getSiteIdFromGqlArguments($arguments);
        $groupId = Craft::$app->getSites()->getSiteById($siteId)->groupId;

        $sitemapIndexListEntry = self::getSitemapIndexListEntry($siteId, $groupId);

        return [
            $sitemapIndexListEntry,
        ];
    }

    /**
     * @param $source
     * @param $arguments
     * @param $context
     * @param ResolveInfo $resolveInfo
     * @return array
     */
    public static function getSitemapStyles($source, $arguments, $context, ResolveInfo $resolveInfo): array
    {
        return [
            'filename' => 'sitemap.xsl',
            'contents' => $xml = PluginTemplate::renderPluginTemplate('_frontend/pages/sitemap-styles.twig', []),
        ];
    }

    /**
     * @param $siteId
     * @param $groupId
     * @return array
     * @throws NotFoundHttpException
     */
    protected static function getSitemapIndexListEntry($siteId, $groupId): array
    {
        $sitemapIndex = SitemapIndexTemplate::create();
        if ($sitemapIndex) {
            return [
                'filename' => $sitemapIndex->getFilename($groupId),
                'contents' => $sitemapIndex->render([
                    'siteId' => $siteId,
                    'groupId' => $groupId,
                ]),
            ];
        }

        return [];
    }

    /**
     * @param $filename
     * @return array|null
     * @throws NotFoundHttpException
     */
    protected static function getSitemapItemByFilename($filename)
    {
        if (!preg_match('/sitemaps-(?P<groupId>\d+)-(?P<type>[\w\.*]+)-(?P<handle>[\w\.*]+)-(?P<siteId>\d+)-sitemap(-p(?P<page>\d+))?/i', $filename, $matches)) {
            return null;
        }

        $isCustom = $matches['type'] == 'global' && $matches['handle'] == 'custom';
        $sitemap = $isCustom ? SitemapCustomTemplate::create() : SitemapTemplate::create();

        return [
            'filename' => $filename,
            'contents' => $sitemap->render(array_merge($matches, ['immediately' => true])),
        ];
    }

    /**
     * Construct the expected sitemap filename from the components
     *
     * @param int $groupId
     * @param string $bundleType
     * @param string $bundleHandle
     * @param int $siteId
     * @return string
     */
    protected static function createSitemapFilenamesFromComponents(int $groupId, string $bundleType, string $bundleHandle, int $siteId): array
    {
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle($bundleType, $bundleHandle, $siteId);
        if (!$metaBundle) {
            return [];
        }

        $pageSize = $metaBundle->metaSitemapVars->sitemapPageSize ?? null;
        if (!$pageSize) {
            return ["sitemaps-$groupId-$bundleType-$bundleHandle-$siteId-sitemap.xml"];
        }

        $seoElementClass = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundle->sourceBundleType);
        $totalElements = Sitemap::getTotalElementsInSitemap($seoElementClass, $metaBundle);
        $pageCount = (!empty($pageSize) && $pageSize > 0) ? ceil($totalElements / $pageSize) : 1;

        $sitemapFilenames = [];
        for ($page = 1; $page <= $pageCount; $page++) {
            $sitemapFilenames[] = sprintf('sitemaps-%d-%s-%s-%d-sitemap-p%d.xml', $groupId, $bundleType, $bundleHandle, $siteId, $page);
        }

        return $sitemapFilenames;
    }
}
