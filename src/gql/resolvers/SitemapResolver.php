<?php
/**
 * SEOmatic plugin for Craft CMS
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
use nystudio107\seomatic\models\SitemapCustomTemplate;
use nystudio107\seomatic\models\SitemapIndexTemplate;
use nystudio107\seomatic\models\SitemapTemplate;
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
     * Get all the sitemaps.
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

        // If either of the source bundle arguments are present, get the sitemap
        if (!empty($arguments['sourceBundleType']) || !empty($arguments['sourceBundleHandle'])) {
            $filename = self::createFilenameFromComponents($site->groupId, $arguments['sourceBundleType'] ?? '', $arguments['sourceBundleHandle'] ?? '', $siteId);

            return [
                self::getSitemapItemByFilename($filename),
            ];
        }

        $sitemapIndexItems = [self::getSitemapIndexListEntry($siteId, $site->groupId)];

        $sitemapList = [];
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
     * Get all the sitemap index items by params.
     *
     * @return array
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
        $sitemapIndexItem = [
            'filename' => $sitemapIndex->getFilename($groupId),
            'contents' => $sitemapIndex->render([
                'siteId' => $siteId,
                'groupId' => $groupId,
            ]),
        ];

        return $sitemapIndexItem;
    }

    /**
     * @param $filename
     * @return array|null
     * @throws NotFoundHttpException
     */
    protected static function getSitemapItemByFilename($filename)
    {
        if (!preg_match('/sitemaps-(?P<groupId>\d+)-(?P<type>[\w\.*]+)-(?P<handle>[\w\.*]+)-(?P<siteId>\d+)/i', $filename, $matches)) {
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
    protected static function createFilenameFromComponents(int $groupId, string $bundleType, string $bundleHandle, int $siteId): string
    {
        return "sitemaps-$groupId-$bundleType-$bundleHandle-$siteId-sitemap.xml";
    }
}
