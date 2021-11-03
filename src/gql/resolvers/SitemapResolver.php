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
use nystudio107\seomatic\models\SitemapIndexTemplate;
use nystudio107\seomatic\models\SitemapTemplate;

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
    public static function getAllSitemaps($source, array $arguments, $context, ResolveInfo $resolveInfo)
    {
        $siteId = GqlHelper::getSiteIdFromGqlArguments($arguments);
        $site = Craft::$app->getSites()->getSiteById($siteId);

        if (!$site) {
            return [];
        }

        // Get all the indexes as sitemap items
        $sitemapIndexes = self::getSitemapIndexes([
            'groupId' => $site->groupId,
            'siteId' => $siteId,
        ]);

        $sitemapList = array_merge([], $sitemapIndexes);

        // Scrape each index for individual entries
        foreach ($sitemapIndexes as $sitemapIndex) {
            $contents = $sitemapIndex['contents'];
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
     * Return a single sitemap object
     *
     * @return mixed
     */
    public static function getSitemap($source, $arguments, $context, ResolveInfo $resolveInfo)
    {
       return self::getSitemapItemByFilename($arguments['filename']);
    }

    /**
     * Get all the sitemap index items by params.
     *
     * @param array $params
     * @return array
     * @throws \yii\web\NotFoundHttpException
     */
    protected static function getSitemapIndexes(array $params): array
    {
        $indexes = [];
        $sitemapIndex = SitemapIndexTemplate::create();

        $indexes[] = [
            'filename' => $sitemapIndex->getFilename($params),
            'contents' => $sitemapIndex->render($params),
        ];

        return $indexes;
    }

    /**
     * Get a sitemap item by its filename
     *
     * @param $filename
     * @param $matches
     * @return array|null
     * @throws \yii\web\NotFoundHttpException
     */
    protected static function getSitemapItemByFilename($filename)
    {
        if (!preg_match('/sitemaps-(?P<groupId>\d+)-(?P<type>[\w\.*]+)-(?P<handle>[\w\.*]+)-(?P<siteId>\d+)/i', $filename, $matches)) {
            return null;
        }

        $sitemap = SitemapTemplate::create();

        return [
            'filename' => $filename,
            'contents' => $sitemap->render(array_merge($matches, ['immediately' => true]))
        ];
    }
}
